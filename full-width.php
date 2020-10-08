<?php
	include 'dbconfig.php';
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	} else {
		$adjustment = "";



		if(isset($_GET['tag'])){
			$adjustment = 'where id in (select a_id from tagged where t_id=(select id from tags where tag=?))';
		}
		elseif(isset($_GET['archive'])){
			$adjustment = "WHERE date_published >= ? AND date_published <= ?";
			/*
				SET @start = '2018-06-01';
				SET @end = '2018-06-01';

				SELECT * FROM blog.articles WHERE date_published >= @start AND date_published <= @end;
			*/
		}
		elseif(isset($_GET['search'])){
			$adjustment = "WHERE INSTR(tags, ?) OR date_published= ? OR INSTR(title, ?) OR INSTR(content, ?)";
		}

		$query_str = "SELECT id, SUBSTRING(content,1,500), title, date_published, author FROM articles";
		$query_str = $query_str." ".$adjustment;
		$query_str = $query_str." ORDER BY date_published DESC";

		$stmt = $conn->prepare($query_str);

		if(isset($_GET['tag'])){
			$stmt->bind_param("s",$tag);
			$tag = $_GET['tag'];
		}
		if(isset($_GET['archive'])){
			$stmt->bind_param("ss",$start,$end);
			$start = $_GET['archive']."-01";
			$end = $_GET['archive']."-31";
		}
		if(isset($_GET['search'])){
			$srch = $_GET['search'];
			$stmt->bind_param("ssss",$srch,$srch,$srch,$srch);
		}

		$stmt->bind_result($id,$cont,$title,$dp,$author);

		$stmt->execute();

		$data = array();

		$tags = 'puppy';
		while($stmt->fetch()){
			$row = array("id"=>$id,"SUBSTRING(content,1,500)"=>$cont, "tags"=>$tags, "title"=>$title, "date_published"=>$dp,"author"=>$author);
			array_push($data,$row);
		}
		$stmt->close();
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
					<main class="col-md-12">

						<?php
							$safe_tags = "<p><a><h>";
							$content_lbl = $content;
							for($x=0; $x<count($data); $x++){
								$article_id = $data[$x]['id'];
								$article_href = "single.php?article_id=".$data[$x]['id'];
								$title = $data[$x]['title'];
								$tag_href = "full-width.php?tag=";
								$tags = preg_split("~;~",$data[$x]['tags']);
								$archive = $data[$x]['date_published'];
								$archive_href = "full-width.php?archive=".substr($archive,0,7);
								$author = $data[$x]['author'];
								$content = strip_tags($data[$x][$content_lbl],$safe_tags);

								echo '<article class="post post-1">
							<header class="entry-header">
								<h1 class="entry-title">
									<a href="'.$article_href.'">'.$title.'</a>
								</h1>
								<div class="entry-meta"><span class="post-category">';

								for($y = 0; $y < count($tags); $y++){
									if($y > 0) echo '&nbsp';
									echo '<a href="'.$tag_href.$tags[$y].'">'.$tags[$y].'</a>';
								}

								echo '</span>

									<span class="post-date"><a href="'.$archive_href.'"><time class="entry-date" datetime="2012-11-09T23:15:57+00:00">'.$archive.'</time></a></span>

									<span class="post-author"><a href="about.php">'.$author.'</a></span>

									<span class="comments-link"><a href="single.php?article_id='.$article_id.'"><span class="fb-comments-count" data-href="http://www.kuleszar.com/single.php?article_id='.$article_id.'">0</span> Comments</a></span>
								</div>
							</header>
							<div class="entry-content clearfix">'.$content.'

								<div class="read-more cl-effect-14">
									<a href="'.$article_href.'" class="more-link">Continue reading <span class="meta-nav">→</span></a>
								</div>
							</div>
						</article>';
							}
						?>

					</main>
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
