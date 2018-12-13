<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'blog';



	$conn = new mysqli($servername,$username,$password,$db);

	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	} else {
		$article = $_GET['article_id'];
		$query_str = "SELECT id, author, tags, content, date_published, title FROM blog.articles WHERE id=?";
		$stmt = $conn->prepare($query_str);
		$stmt->bind_param("i",$article);

		$stmt->bind_result($id,$author,$tags,$content,$date_published,$title);
		$stmt->execute();
		$stmt->fetch();
		$data = array("id"=>$id,"author"=>$author,"tags"=>$tags,"content"=>$content,"date_published"=>$date_published,"title"=>$title);

		$stmt->close();
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<!-- meta -->
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/ionicons.min.css">
		<link rel="stylesheet" href="css/pace.css">
	    <link rel="stylesheet" href="css/custom.css">

	    <!-- js -->
	    <script src="js/jquery-2.1.3.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/pace.min.js"></script>
	    <script src="js/modernizr.custom.js"></script>

	    <title><?php echo $data['title']; ?></title>
	</head>

	<body id="single">

		<!-- facebook comment bullshit -->
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1628581433917037&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		

	    <meta property="fb:app_id" content="1628581433917037" />


		<div class="container">	
			<header id="site-header">
				<div class="row">
					<div class="col-md-4 col-sm-5 col-xs-8">
						<div class="logo">
							<h1><a href="index.php">Robert Kulesza</h1>
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
									<input type="search" placeholder="Search"
									name='search' required>
									<button name='srch_bttn' type="submit"><span class="ion-ios-search-strong"></span></button>
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
								<h1 class="entry-title"><?php echo $data['title']; ?></h1>
								<div class="entry-meta">
									<span class="post-category">

										<?php

										$tags = preg_split("~;~",$data["tags"]);

										for($x = 0; $x < count($tags); $x++){
											if($x > 0) echo "&nbsp";
											echo "<a href='full-width.php?tag=".$tags[$x]."'>";
											echo $tags[$x];
											echo "</a>";
										}
										?></span>
			
									<span class="post-date">

										<?php 
											$arch = substr($data['date_published'],0,7);
											echo '<a href=full-width.php?archive='.$arch.'><time class="entry-date" datetime="'.$data['date_published'].'">';
											echo $data['date_published']; 
											echo "</time></a>";
										?></span>
			
									<span class="post-author"><a href="about.php"><?php echo $data['author']; ?></a></span>
			
									<?php
										echo '<a href="single.php?article_id='.$data["id"].'">';
										echo '<span class="fb-comments-count" data-href="http://www.kuleszar.com/single.php?article_id='.$data["id"].'">0</span>';
										echo ' Comments</a>';
									?>
								</div>
							</header>
							<div class="entry-content clearfix">
								<?php echo $data['content']; ?>
							</div>
						</article>

						
						<?php 
							echo '<div id="comments" class="fb-comments" data-href="http://www.kuleszar.com/single.php?article_id=';
							echo $_GET["article_id"];
							echo'" data-width="0" data-numposts="5"></div>';
						?>

					</main>
					<aside class="col-md-4">
						<div class="widget widget-recent-posts">		
							<h3 class="widget-title">Recent Posts</h3>		
							<ul>
									<?php
										$rp_query_str = "SELECT * FROM blog.articles ORDER BY date_published DESC LIMIT 3";
										$rp_query = mysqli_query($conn,$rp_query_str);
										$rec_posts = array();

										while($row = mysqli_fetch_assoc($rp_query)){
											array_push($rec_posts,$row);
										}


										for($c = 0; $c < count($rec_posts); $c++){
											echo "<li>";
											echo "<a href='single.php?article_id=".$rec_posts[$c]["id"]."'>";
											echo $rec_posts[$c]["title"];
											echo "</a>";
											echo "</li>";
										}
									?>
							</ul>
						</div>

						<?php

						$month = "month(archive)";
						$year = "year(archive)";
						$archives_query_str = "SELECT ".$month." , ".$year." FROM blog.archives where 1";
						$archives_query = mysqli_query($conn,$archives_query_str);

						$archives = array();

						while($row = mysqli_fetch_assoc($archives_query)){
							array_push($archives,$row[$year]."-0".$row[$month]);
						}

						?>
						<div class="widget widget-archives">		
							<h3 class="widget-title">Archives</h3>		
							<ul>
								<?php
									for($x = 0; $x < count($archives); $x++){
										echo "<li>";
										echo "<a href='full-width.php?archive=".$archives[$x]."'>".$archives[$x]."</a>";
										echo "</li>";
									}
								?>
							</ul>
						</div>

						<?php

						$tags_query_str = "SELECT * FROM blog.tags where 1";
						$tags_query = mysqli_query($conn,$tags_query_str);

						$tags = array();

						while($row = mysqli_fetch_assoc($tags_query)){
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
						<p class="copyright">&copy; 2018 Robert Kulesza</p>
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
