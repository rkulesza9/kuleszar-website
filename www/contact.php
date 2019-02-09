<?php
	include 'dbconfig.php';
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}else {

		if(isset($_POST['submit'])){
			$fromEmail = "robertkulesza@kuleszar.com"; // replace with my domain
    		$toEmail = "kuleszamusician@gmail.com";      // replace with my domain

		    $name = $_POST['name'];
    		$email = $_POST['email'];
    		$subject = $_POST['subject'];
    		$message = $_POST['message'];

    		$emailMessage = array(
        		"Name: ".$name,
        		"Email: ".$email,
        		"Subject: ".$subject,
        		"Message: ".$message
    		);
    		$emailMessage = implode("\r\n", $emailMessage);

		    $headers = array("From: ".$fromEmail,
        		"Reply-To: ".$fromEmail,
        		"X-Mailer: PHP/" . PHP_VERSION
    		);
    		$headers = implode("\r\n", $headers);

    		$output = mail($toEmail, "contact form entry - kuleszar.com", $emailMessage, $headers, "-f".$fromEmail);

    		echo("<script>alert('Contact Form Submitted');</script>");
		}

	}
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

		<div class="content-body">
			<div class="container">
				<div class="row">
					<main class="col-md-12">
						<h1 class="page-title">Contact</h1>
						<article class="post">
							<div class="entry-content clearfix">
								<form method="post" class="contact-form" action="contact.php">
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											<input type="text" name="name" placeholder="Name" required>
											<input type="email" name="email" placeholder="Email" required>
											<input type="text" name="subject" placeholder="Subject" required>
											<textarea name="message" rows="7" placeholder="Your Message" required></textarea>
											<button name="submit" class="btn-send btn-5 btn-5b ion-ios-paperplane"><span>Drop Me a Line</span></button>
										</div>
									</div>	<!-- row -->
								</form>
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
