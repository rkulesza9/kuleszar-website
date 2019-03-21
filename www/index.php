<?php
	include 'dbconfig.php';
	$safe_tags = "<p><a><h>";

	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}else {
		$query_str = "SELECT id, SUBSTRING(content,1,500), title, date_published, year(archive) as year, month(archive) as month, author FROM articles ORDER BY date_published DESC LIMIT 4";
		$result = $conn->query($query_str);

		$data = array();

		while($row = $result->fetch_assoc()){
			$row['archive'] = $row['year']."-".$row['month'];
			array_push($data,$row);
		}
	}

	for($x=0; $x<count($data); $x++){
		//get $tags
		$sql = "select tag from tags where id in (select t_id from tagged where a_id=?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i",$data[$x]["id"]);
		$stmt->bind_result($tag);
		$stmt->execute();
		$stmt->fetch();
		$tags = $tag;
		while($stmt->fetch()){
			$tags .= ";".$tag;
		}
		$data[$x]['tags'] = $tags;
		$stmt->close();
	}

	$content = "SUBSTRING(content,1,500)";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Robert Kulesza</title>

		<!-- meta -->
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/ionicons.min.css">
		<link rel="stylesheet" href="css/pace.css">
	    <link rel="stylesheet" href="css/custom.css">
			 <link rel="icon" type="image/png" href="img/logo.png">

	    <!-- js -->
	    <script src="js/jquery-2.1.3.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/pace.min.js"></script>
	    <script src="js/modernizr.custom.js"></script>
	</head>

	<body>
				<!-- facebook comment bullshit -->
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1628581433917037&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<div class="container">
			<header id="site-header">
				<div class="row">
					<div class="col-md-4 col-sm-5 col-xs-8">
						<div class="logo">
							<h1><a href="index.php">Robert Kulesza</a></h1>
						</div>
					</div><!-- col-md-4 -->
					<div class="col-md-8 col-sm-7 col-xs-4">
						<nav class="main-nav" role="navigation">
							<div class="navbar-header">
  								<button type="button" id="trigger-overlay" class="navbar-toggle">
    								<span class="ion-navicon"></span>
  								</button>
							</div>

							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  								<ul class="nav navbar-nav navbar-right">
    								<li class="cl-effect-11"><a href="index.php" data-hover="Home">Home</a></li>
    								<li class="cl-effect-11"><a href="full-width.php" data-hover="Blog">Blog</a></li>
    								<li class="cl-effect-11"><a href="about.php" data-hover="About">About</a></li>
    								<li class="cl-effect-11"><a href="contact.php" data-hover="Contact">Contact</a></li>
  								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
						<div id="header-search-box">
							<a id="search-menu" href="#"><span id="search-icon" class="ion-ios-search-strong"></span></a>
							<div id="search-form" class="search-form">
								<form role="search" method="get" id="searchform" action="full-width.php">
									<input type="search" placeholder="Search" name='search' required>
									<button type="submit" name="srch_bttn"><span class="ion-ios-search-strong"></span></button>
								</form>
							</div>
						</div>
					</div><!-- col-md-8 -->
				</div>

			</header>
		</div>

		<div class="content-body">
			<div class="container">
				<div class="row">
					<main class="col-md-8">
						<article class="post post-1">
							<header class="entry-header">
								<h1 class="entry-title">
									<?php
										if(count($data) > 0){
										echo "<a href='single.php?article_id=".$data[0]["id"]."'>";
										echo $data[0]["title"];
										echo "</a>";
									}
									?>
								</h1>
								<div class="entry-meta">
										<?php
										if(count($data) > 0){
											echo '<span class="post-category">';
										$tags = preg_split("~;~",$data[0]["tags"]);

										for($x = 0; $x < count($tags); $x++){
											if($x > 0) echo "&nbsp";
											echo "<a href='full-width.php?tag=".$tags[$x]."'>";
											echo $tags[$x];
											echo "</a>";
										}
										echo '</span>';
									}
										?>

									<?php
										if(count($data) > 0){
											echo '<span class="post-date">';
											echo "<a href='full-width.php?archive=".$data[0]['archive']."'>";
											echo "<time class='entry-date' datetime='".$data[0]["date_published"]."'>";
											echo $data[0]["date_published"];
											echo "</time>";
											echo "</a>";
											echo '</span>';
										}
									?></span>


										<?php if(count($data) > 0){
											echo '<span class="post-author"><a href="about.php">';
											echo $data[0]["author"];
											echo '</a></span>';
										}  ?>

									<?php
									if(count($data) > 0){
										echo '<a href="single.php?article_id='.$data[0]["id"].'">';
										echo '<span class="fb-comments-count" data-href="http://www.kuleszar.com/single.php?article_id='.$data[0]["id"].'"> 0</span>';
										echo ' Comments</a>';
									}
									?>

								</div>
							</header>
							<div class="entry-content clearfix">
								<?php if(count($data) > 0) echo strip_tags($data[0][$content],$safe_tags); ?>
								<div class="read-more cl-effect-14">

									<?php
									if(count($data) > 0){
										echo "<a href='single.php?article_id=".$data[0]["id"]."'>";
										echo "Continue reading";
										echo "<span class='meta-nav'>→</span>";
										echo "</a>";
									}
									?>
								</div>
							</div>
						</article>

						<article class="post post-2">
							<header class="entry-header">
								<h1 class="entry-title">
									<?php
									if(count($data) > 1){
										echo "<a href='single.php?article_id=".$data[1]["id"]."'>";
										echo $data[1]["title"];
										echo "</a>";
									}
									?>
								</h1>
								<div class="entry-meta">
									<?php
									if(count($data) > 1){
										echo '<span class="post-category">';
										$tags = preg_split("~;~",$data[1]["tags"]);

										for($x = 0; $x < count($tags); $x++){
											if($x > 0) echo "&nbsp";
											echo "<a href='full-width.php?tag=".$tags[$x]."'>";
											echo $tags[$x];
											echo "</a>";
										}
										echo "</span>";
									}									?>




									<?php
										if(count($data) > 1){
											echo '<span class="post-date">';
											echo "<a href='full-width.php?archive=".$data[1]['archive']."'>";
											echo "<time class='entry-date' datetime='".$data[1]["date_published"]."'>";
											echo $data[1]["date_published"];
											echo "</time>";
											echo "</a>";
											echo '</span>';
										}
									?>




										<?php if(count($data) > 1){
											echo '<span class="post-author"><a href="about.php">';
											echo $data[1]["author"];
											echo '</a></span>';
										}
										?>

									<?php
									if(count($data) > 1){
										echo '<a href="single.php?article_id='.$data[1]["id"].'">';
										echo '<span class="fb-comments-count" data-href="http://www.kuleszar.com/single.php?article_id='.$data[1]["id"].'"> 0</span>';
										echo ' Comments</a>';
									}
									?>
								</div>
							</header>
							<div class="entry-content clearfix">
								<?php if(count($data) > 1) echo strip_tags($data[1][$content],$safe_tags); ?>
								<div class="read-more cl-effect-14">
									<?php
									if(count($data) > 1){
										echo "<a href='single.php?article_id=".$data[1]["id"]."'>";
										echo "Continue reading";
										echo "<span class='meta-nav'>→</span>";
										echo "</a>";
									}
									?>
								</div>
							</div>
						</article>

						<article class="post post-3">
							<header class="entry-header">
								<header class="entry-header">
								<h1 class="entry-title">
									<?php
										if(count($data) > 2){
											echo "<a href='single.php?article_id=".$data[2]["id"]."'>";
											echo $data[2]["title"];
											echo "</a>";
										}
									?>
								</h1>
								<div class="entry-meta">
									<?php
									if(count($data) > 2){
										echo '<span class="post-category">';
										$tags = preg_split("~;~",$data[2]["tags"]);

										for($x = 0; $x < count($tags); $x++){
											if($x > 0) echo "&nbsp";
											echo "<a href='full-width.php?tag=".$tags[$x]."'>";
											echo $tags[$x];
											echo "</a>";
										}
										echo '</span>';
									}
									?>


									<?php
									if(count($data) > 2){
										echo '<span class="post-date">';
										echo "<a href='full-width.php?archive=".$data[2]['archive']."'>";
										echo "<time class='entry-date' datetime='".$data[2]["date_published"]."'>";
										echo $data[2]["date_published"];
										echo "</time>";
										echo "</a>";
										echo '</span>';
									}
									?>


										<?php
										if(count($data) > 2){
											echo '<span class="post-author"><a href="about.php">';
										 	echo $data[2]["author"];
										 	echo '</a></span>';
										}
										 ?>

									<?php
									if(count($data) > 2){
										echo '<a href="single.php?article_id='.$data[2]["id"].'">';
										echo '<span class="fb-comments-count" data-href="http://www.kuleszar.com/single.php?article_id='.$data[2]["id"].'"> 0</span>';
										echo ' Comments</a>';
									}
									?>
								</div>
							</header>
							<div class="entry-content clearfix">
								<?php if(count($data) > 2) echo strip_tags($data[2][$content],$safe_tags); ?>
								<div class="read-more cl-effect-14">
									<?php
									if(count($data) > 2){
										echo "<a href='single.php?article_id=".$data[2]["id"]."'>";
										echo "Continue reading";
										echo "<span class='meta-nav'>→</span>";
										echo "</a>";
									}
									?>
								</div>
							</div>
						</article>

						<article class="post post-4">
							<header class="entry-header">
								<h1 class="entry-title">
									<?php
									if(count($data) > 3){
										echo "<a href='single.php?article_id=".$data[3]["id"]."'>";
										echo $data[3]["title"];
										echo "</a>";
									}
									?>
								</h1>
								<div class="entry-meta">
									<?php
									if(count($data) > 3){
										echo '<span class="post-category">';
										$tags = preg_split("~;~",$data[0]["tags"]);

										for($x = 0; $x < count($tags); $x++){
											if($x > 0) echo "&nbsp";
											echo "<a href='full-width.php?tag=".$tags[$x]."'>";
											echo $tags[$x];
											echo "</a>";
										}
										echo '</span>';
									}
									?>


									<?php
									if(count($data) > 3){
										echo '<span class="post-date">';
										echo "<a href='full-width.php?archive=".$data[3]['archive']."'>";
										echo "<time class='entry-date' datetime='".$data[3]["date_published"]."'>";
										echo $data[3]["date_published"];
										echo "</time>";
										echo "</a>";
										echo '</span>';
									}
									?>


										<?php if(count($data) > 3){
											echo '<span class="post-author"><a href="about.php">';
											echo $data[3]["author"];
											echo '</a></span>';
										}

										?>

									<?php
									if(count($data) > 3){
										echo '<a href="single.php?article_id='.$data[3]["id"].'">';
										echo '<span class="fb-comments-count" data-href="http://www.kuleszar.com/single.php?article_id='.$data[3]["id"].'">0</span>';
										echo ' Comments</a>';
									}
									?>
								</div>
							</header>
							<div class="entry-content clearfix">
								<?php if(count($data) > 3) echo strip_tags($data[3][$content],$safe_tags); ?>
								<div class="read-more cl-effect-14">
									<?php
									if(count($data) > 3){
										echo "<a href='single.php?article_id=".$data[3]["id"]."'>";
										echo "Continue reading";
										echo "<span class='meta-nav'>→</span>";
										echo "</a>";
									}
									?>
								</div>
							</div>
						</article>
					</main>
					<aside class="col-md-4">
						<div class="widget widget-recent-posts">
							<h3 class="widget-title">Recent Posts</h3>
							<ul>

									<?php
									if(count($data) > 0){
										echo "<li>";
										echo "<a href='single.php?article_id=".$data[0]["id"]."'>";
										echo $data[0]["title"];
										echo "</a>";
										echo "</li>";
									}

									if(count($data) > 1){
										echo "<li>";
										echo "<a href='single.php?article_id=".$data[1]["id"]."'>";
										echo $data[1]["title"];
										echo "</a>";
										echo "</li>";
									}

									if(count($data) > 2){
										echo "<li>";
										echo "<a href='single.php?article_id=".$data[2]["id"]."'>";
										echo $data[2]["title"];
										echo "</a>";
										echo "</li>";
									}
									?>
							</ul>
						</div>
						<div class="widget widget-archives">
							<h3 class="widget-title">Archives</h3>
							<ul>
								<?php
									$sql = 'select distinct year(archive), month(archive) from articles';
									$stmt = $conn->prepare($sql);
									$stmt->bind_result($year,$month);
									$stmt->execute();

									while($stmt->fetch()){
										$archive = "$year-$month";
										echo "<li>";
										echo "<a href='full-width.php?archive=".$archive."'>".$archive."</a>";
										echo "</li>";
									}

									$stmt->close();
								?>
							</ul>
						</div>

						<?php

						$tags_query_str = "SELECT * FROM blog.tags where 1";

						$tags_query = $conn->query($tags_query_str);

						$tags = array();

						while($row = $tags_query->fetch_assoc()){
							array_push($tags,$row['tag']);
						}

						?>

						<div class="widget widget-category">
							<h3 class="widget-title">Category</h3>
							<ul>
								<?php
									for($x = 0; $x < count($tags); $x++){
										echo "<li>";
										echo "<a href='full-width.php?tag=".$tags[$x]."'>".$tags[$x]."</a>";
										echo "</li>";
									}
								?>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
		<footer id="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="copyright">&copy; 2018 Robert Kulesza - theme from <a href="www.themewagon.com">Theme Wagon</a></p>
					</div>
				</div>
			</div>
		</footer>

		<!-- Mobile Menu -->
		<div class="overlay overlay-hugeinc">
			<button type="button" class="overlay-close"><span class="ion-ios-close-empty"></span></button>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="full-width.php">Blog</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
		</div>

		<script src="js/script.js"></script>

	</body>
</html>
