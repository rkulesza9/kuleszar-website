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

	<body id="page">
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
		<style>
			figure {
				width: 50%;
				height: 50%;
			}

		</style>
		<div class="content-body">
			<div class="container">
				<div class="row">
					<main class="col-md-12">
						<h1 class="page-title">About Me</h1>
						<article class="post">
							<div class="entry-content clearfix">
								<figure class="img-responsive-center">

									<img class="img-responsive" src="img/me.jpg" alt="Developer Image">
								</figure>

								<style>
									#tbl1 {
										margin-bottom: 50px;
									}
									#tbl1-body>tr>td,th {
										padding:10px;
									}
								</style>

								<table id='tbl1'>
									<tbody id='tbl1-body'>
									<tr><th>Name</th><td>Robert Kulesza</td><th>University</th><td>Kean University</td></tr>
									<tr><th>Age</th><td>23</td><th>Major</th><td>Mathematics & Computer Science</td></tr>
									<tr><th>Birthdate</th><td>August 4, 1995</td><th>grad. date</th><td>May 2020</td></tr>
								</tbody>
								</table>

								<h1> Hello World! </h1>
								<p>I am a Computer Science and Mathematics major at Kean university. I love doing mathematics, programming, and creating things. Most of all, I enjoy learning and strive to constantly be in a position to learn new things. This website is the product of those four things. </p>

								<h2>What can you expect to find here?</h2>

								<p> I'm going to compile a list of categories that will give you a quick picture of what I will post on here. I'll update the list as time goes on. As a mathematics student, I know it's important to be concise! </p>

								<ul>
									<li>General Science, Computer Science, and Mathematics Articles</li>
									<li>math proofs</li>
									<li>personal life & accomplishments</li>
								</ul>


								<div class="height-40px"></div>
								<h2 class="title text-center">Social Media</h2>
								<ul class="social">
									<li class="facebook"><a href="https://www.facebook.com/koolesza"><span class="ion-social-facebook"></span></a></li>
									<li class="twitter"><a href="https://twitter.com/robkulesza"><span class="ion-social-twitter"></span></a></li>
									<li class='linkedin'><a href="https://www.linkedin.com/in/robert-kulesza-6a31b2155/"><span class='ion-social-linkedin'></span></a></li>
									<!--<li class="google-plus"><a href="#"><span class="ion-social-googleplus"></span></a></li>
									<li class="tumblr"><a href="#"><span class="ion-social-tumblr"></span></a></li>-->
								</ul>
							</div>
						</article>
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
