<?php
  include "../dbconfig.php";
  if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);


  }else {

    if(isset($_POST['submit'])){

        $fromEmail = "robertkulesza@kuleszar.com"; // replace with my domain
        $toEmail = "kuleszamusician@gmail.com";   // replace with my domain

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

        $output = mail($toEmail, "business form entry - kuleszar.com/business", $emailMessage, $headers, "-f".$fromEmail);

        echo("<script>alert('Business Form Submitted');</script>");
    }

  }
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">

    <link rel="icon" type="image/png" href="../img/logo.png">
        <!-- title of site -->
        <title>Robert Kulesza Business</title>

        <!-- For favicon png -->
		<!--<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>-->

        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!--flat icon css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >

        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		<!-- top-area Start -->
		<header class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav navbar-fixed dark no-background">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.php">Robert Kulesza</a>
			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                <li class=" smooth-menu active"></li>
			                    <li class=" smooth-menu"><a href="#education">education</a></li>
			                    <li class="smooth-menu"><a href="#skills">skills</a></li>
			                    <li class="smooth-menu"><a href="#experience">experience</a></li>
			                   <!-- <li class="smooth-menu"><a href="#profiles">profile</a></li>
			                    <li class="smooth-menu"><a href="#portfolio">portfolio</a></li>
			                    <li class="smooth-menu"><a href="#clients">clients</a></li> -->
			                    <li class="smooth-menu"><a href="#contact">contact</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->

		    <div class="clearfix"></div>

		</header><!-- /.top-area-->
		<!-- top-area End -->

		<!--welcome-hero start -->
		<section id="welcome-hero" class="welcome-hero">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="header-text">
							<h2>hi <span>,</span> i am <br> Robert <br> Kulesza <span>.</span>   </h2>
							<p>Multi-plaftorm Developer (android, ios, desktop, web).</p>
              <a target="_blank" href="https://docs.google.com/document/d/1X0mQmsEkjs9c4w5-ScHWE-ytSyZ1-I9Irq_xT3kJdLY/edit#heading=h.gjdgxs" >download resume</a><br><br>
							<a href="https://drive.google.com/file/d/1iXe3r6M0wyCI03H6oOdllr7NQwiHj6Q5/view?usp=sharing" download>download resume TXT</a>
						</div><!--/.header-text-->
					</div><!--/.col-->
				</div><!-- /.row-->
			</div><!-- /.container-->

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--about start -->
		<section id="about" class="about">
			<div class="section-heading text-center">
				<h2>about me</h2>
			</div>
			<div class="container">
				<div class="about-content">
					<div class="row">
						<div class="col-sm-6">
							<div class="single-about-txt">
								<h3>
                    I am a multi-platform developer with a bachelors degree in Computer Science and Mathematics from Kean University.
                </h3>
								<p>
									Has web development experience from working at Vorexa and from portfolio projects including experience with various backend languages and web APIs. Has experience from various portfolio projects that show my skills in android programming and html5 programming. Has problem solving skills as shown through experience solving complex problems at Vorexa, and through projects in my portfolio.
								</p>
								<div class="row">
									<div class="col-sm-4">
										<div class="single-about-add-info">
											<h3>phone</h3>
											<p>732-618-8342</p>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="single-about-add-info">
											<h3>email</h3>
											<p>kuleszar@kean.edu</p>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="single-about-add-info">
											<h3>website</h3>
											<p>www.kuleszar.com</p>
										</div>
									</div>
                  <div class="col-sm-4">
                    <div class="single-about-add-info">
                      <h3>github</h3>
                      <p>www.github.com/rkulesza9</p>
                    </div>
                  </div>
								</div>
							</div>
						</div>
						<div class="col-sm-offset-1 col-sm-5">
							<div class="single-about-img">
								<img src="assets/images/about/me2.jpg" alt="profile_image">
								<div class="about-list-icon">
									<ul>
										<li>
											<a href="http://www.facebook.com/koolesza">
												<i  class="fa fa-facebook" aria-hidden="true"></i>
											</a>
										</li>
                    <li>
											<a href="twitter.com/robkulesza">
												<i  class="fa fa-twitter" aria-hidden="true"></i>
											</a>

										</li>
                    <li>
                      <a href="https://www.linkedin.com/in/robert-kulesza-6a31b2155/">
                        <i  class="fa fa-linkedin" aria-hidden="true"></i>
                      </a>
                    </li><!-- / li -->
										<!--<li>
											<a href="#">
												<i  class="fa fa-dribbble" aria-hidden="true"></i>
											</a>

										</li>
										<li>
											<a href="#">
												<i  class="fa fa-twitter" aria-hidden="true"></i>
											</a>

										</li>
										<li>
											<a href="#">
												<i  class="fa fa-linkedin" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i  class="fa fa-instagram" aria-hidden="true"></i>
											</a>
										</li>


									</ul>  -->
								</div><!-- /.about-list-icon -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</section><!--/.about-->
		<!--about end -->

		<!--education start -->
		<section id="education" class="education">
			<div class="section-heading text-center">
				<h2>education</h2>
			</div>
			<div class="container">
				<div class="education-horizontal-timeline">
					<div class="row">
            <div class="col-sm-4">
              <div class="single-horizontal-timeline">
                <div class="experience-time">
                  <h2>Sept 2019 - Current</h2>
                  <h3>M.S. <span>in </span> Computer Information Systems</h3>
                </div><!--/.experience-time-->
                <div class="timeline-horizontal-border">
                  <i class="fa fa-circle" aria-hidden="true"></i>
                  <span class="single-timeline-horizontal"></span>
                </div>
                <div class="timeline">
                  <div class="timeline-content">
                    <h4 class="title">
                      Kean University
                    </h4>
                    <h5>New Jersey, USA</h5>
                    <p class="description">
                      Currently attending Kean University until graduation by May, 2021.<br>
                      Specialized in Machine Learning and Artificial Intelligence.
                    </p>
                  </div><!--/.timeline-content-->
                </div><!--/.timeline-->
              </div>
            </div>
						<div class="col-sm-4">
							<div class="single-horizontal-timeline">
								<div class="experience-time">
									<h2>Sept 2017 - Aug 2019</h2>
									<h3>B.A. <span>in </span> Mathematics</h3>
								</div><!--/.experience-time-->
								<div class="timeline-horizontal-border">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span class="single-timeline-horizontal"></span>
								</div>
								<div class="timeline">
									<div class="timeline-content">
										<h4 class="title">
											Kean University
										</h4>
										<h5>New Jersey, USA</h5>
										<p class="description">
                      Maintained a GPA of above 3.8.
                      <br>Dean's List Honoree.
                      <br>Phi Kappa Phi (National Honor Society)
                      <br>Lambda Alpha Sigma (Kean’s Honor Society)
										</p>
									</div><!--/.timeline-content-->
								</div><!--/.timeline-->
							</div>
						</div>
						<div class="col-sm-4">
							<div class="single-horizontal-timeline">
								<div class="experience-time">
									<h2>Sept 2014 - May 2016</h2>
									<h3>A.A. <span>of </span> Mathematics</h3>
								</div><!--/.experience-time-->
								<div class="timeline-horizontal-border">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span class="single-timeline-horizontal"></span>
								</div>
								<div class="timeline">
									<div class="timeline-content">
										<h4 class="title">
											Ocean County College
										</h4>
										<h5>New Jersey, USA</h5>
										<p class="description">
                      Maintained a GPA of above 3.5.
                      <br> Dean's List Honoree.
                      <br> Graduated member of the Tau Iota Chapter of Phi Theta Kappa (Honor Society).
										</p>
									</div><!--/.timeline-content-->
								</div><!--/.timeline-->
							</div>
						</div>
					</div>
				</div>
			</div>

		</section><!--/.education-->
		<!--education end -->

		<!--skills start -->
		<section id="skills" class="skills">
				<div class="skill-content">
					<div class="section-heading text-center">
						<h2>skills</h2>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="single-skill-content">
									<div class="barWrapper">
										<span class="progressText">Java</span>
										<div class="single-progress-txt">
											<div class="progress ">
												<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="100" style="">

												</div>
											</div>
											<h3>2 Github Projects, 5 classes</h3>
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">PHP</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="100" style="">

											   </div>
											</div>
											<h3>2 Github Projects, 1 Job, 2 Classes</h3>
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">Python</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="27" aria-valuemin="10" aria-valuemax="100" style="">

											   </div>
											</div>
											<h3>Undergrad Research, 1 Class</h3>
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">C++</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="27" aria-valuemin="10" aria-valuemax="100" style="">

											   </div>
											</div>
											<h3>2 Classes</h3>
										</div>
									</div><!-- /.barWrapper -->
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-skill-content">
									<div class="barWrapper">
										<span class="progressText">html, css, & javascript</span>
										<div class="single-progress-txt">
											<div class="progress ">
												<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="100" style="">

												</div>
											</div>
											<h3>2 Github Projects, 1 Job, 2 Classes</h3>
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">SQL</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="100" style="">

											   </div>
											</div>
											<h3>2 Github Projects, 1 Job, 2 Classes</h3>
										</div>
									</div><!-- /.barWrapper
									<div class="barWrapper">
										<span class="progressText">communication</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="10" aria-valuemax="100" style="">

											   </div>
											</div>
											<h3>97%</h3>
										</div>
									</div><!-- /.barWrapper-->
									<div class="barWrapper">
										<span class="progressText"> Android</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="57" aria-valuemin="10" aria-valuemax="100" style="">

											   </div>
											</div>
											<h3>2 Github Projects</h3>
										</div>
									</div><!-- /.barWrapper
								</div>
							</div>
						</div><!-- /.row -->
					</div>	<!-- /.container -->
				</div><!-- /.skill-content-->

		</section><!--/.skills-->
		<!--skills end -->

		<!--experience start -->
		<section id="experience" class="experience">
			<div class="section-heading text-center">
				<h2>experience</h2>
			</div>
			<div class="container">
				<div class="experience-content">
						<div class="main-timeline">
							<ul>
                <li>
                  <div class="single-timeline-box fix">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="experience-time text-right">
                          <h2>MAY 2019 - CURRENT</h2>
                          <h3>Student Worker Research Assistant</h3>
                        </div><!--/.experience-time-->
                      </div><!--/.col-->
                      <div class="col-md-offset-1 col-md-5">
                        <div class="timeline">
                          <div class="timeline-content">
                            <h4 class="title">
                              <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                              Office of Institutional Research, Kean University
                            </h4>
                            <h5>Union, NJ USA</h5>
                            <p class="description">
                              Executes SQL queries for data requests<br>
                              Creates web pages using ASP, SQL, and more<br>
                            </p>
                          </div><!--/.timeline-content-->
                        </div><!--/.timeline-->
                      </div><!--/.col-->
                    </div>
                  </div><!--/.single-timeline-box-->
                <li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-5">
												<div class="experience-time text-right">
													<h2>OCT 2018 - MAY 2019</h2>
													<h3>Undergraduate Research Assistant</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5">
												<div class="timeline">
													<div class="timeline-content">
														<h4 class="title">
															<span><i class="fa fa-circle" aria-hidden="true"></i></span>
															Kean University
														</h4>
														<h5>Union, NJ USA</h5>
														<p class="description">
															Created and programmed solutions to current Artificial Intelligence research problems.<br>
                              Experience in neural network programming and using neural networks for machine learning.<br>
                              Experience writing formal research papers.<br>
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>
								<li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-5">
												<div class="experience-time text-right">
													<h2>JUN 2018 - CURRENT</h2>
													<h3>Banquet Server</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5">
												<div class="timeline">
													<div class="timeline-content">
														<h4 class="title">
															<span><i class="fa fa-circle" aria-hidden="true"></i></span>
															IPlay America
														</h4>
														<h5>Freehold, NJ USA</h5>
														<p class="description">
															Set up and maintained event rooms.<br>
                              Served food and cleaned up after customers.<br>
                              Worked in teams for each event, often working multiple events simultaneously. (teamwork)
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>

                <li>
                  <div class="single-timeline-box fix">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="experience-time text-right">
                          <h2>MAR 2015 - MAY 2019</h2>
                          <h3>Cashier</h3>
                        </div><!--/.experience-time-->
                      </div><!--/.col-->
                      <div class="col-md-offset-1 col-md-5">
                        <div class="timeline">
                          <div class="timeline-content">
                            <h4 class="title">
                              <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                              Stop and Shop
                            </h4>
                            <h5>Point Pleasant, NJ USA</h5>
                            <p class="description">
                            Assist customers by providing information and resolving their complaints.</br>
                            Assist other departments such as the dairy, grocery, and produce departments when requested.</br>
                            Worked autonomously to complete the tasks given to me.</br>
                            Supervise cashiers-in-training and provide them with instruction.</br>
                            Processed customer orders and handled money.
                            </p>
                          </div><!--/.timeline-content-->
                        </div><!--/.timeline-->
                      </div><!--/.col-->
                    </div>
                  </div><!--/.single-timeline-box-->
                </li>

								<li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-5">
												<div class="experience-time text-right">
													<h2>SEP 2012 - SEP 2013</h2>
													<h3>Programmer (Project by Project)</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5">
												<div class="timeline">
													<div class="timeline-content">
														<h4 class="title">
															<span><i class="fa fa-circle" aria-hidden="true"></i></span>
															Vorexa
														</h4>
														<h5>Manasquan, NJ USA</h5>
														<p class="description">
															Debug applications before putting them on the client's server.<br>
                              Added customer-requested functionality to existing websites and applications.<br>
                              Gained exeperience using HTML, CSS, javascript, PHP, and mysql.
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>

                <li>
                  <div class="single-timeline-box fix">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="experience-time text-right">
                          <h2>FEB 2011 - SEP 2016</h2>
                          <h3>Assistant Manager</h3>
                        </div><!--/.experience-time-->
                      </div><!--/.col-->
                      <div class="col-md-offset-1 col-md-5">
                        <div class="timeline">
                          <div class="timeline-content">
                            <h4 class="title">
                              <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                              The Grand Carwash
                            </h4>
                            <h5>Point Pleasant, NJ USA</h5>
                            <p class="description">
                            Supervise employees and assign them tasks throughout the day.<br>
                            Clean, test, and maintain machinery.<br>
                            Prepped and detailed cars.</br>
                            Handled customer complaints and filled out damage reports.</br>
                            Make product orders for the store connected to the carwash.</br>
                            Worked as a Cashier at the Carwash store.<br>
                            Train new employees to carry out daily tasks.<br>
                            Fixed coin machines and coin-operated vacuum pumps.
                            </p>
                          </div><!--/.timeline-content-->
                        </div><!--/.timeline-->
                      </div><!--/.col-->
                    </div>
                  </div><!--/.single-timeline-box-->
                </li>

							</ul>
						</div><!--.main-timeline-->
					</div><!--.experience-content-->
			</div>

		</section><!--/.experience-->
		<!--experience end -->

		<!--profiles start -->
		<!-- <section id="profiles" class="profiles">
			<div class="profiles-details">
				<div class="section-heading text-center">
					<h2>profiles</h2>
				</div>
				<div class="container">
					<div class="profiles-content">
						<div class="row">
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-themeforest"></i></a>
										<div class="profile-icon-name">themeforest</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-themeforest"></i></a>
											<div class="profile-icon-name">themeforest</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-dribbble"></i></a>
										<div class="profile-icon-name">dribbble</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-dribbble"></i></a>
											<div class="profile-icon-name">dribbble</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-behance-logo"></i></a>
										<div class="profile-icon-name">behance</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-behance-logo"></i></a>
											<div class="profile-icon-name">behance</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile profile-no-border">
									<div class="profile-txt">
										<a href=""><i class="flaticon-github-logo"></i></a>
										<div class="profile-icon-name">github</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-github-logo"></i></a>
											<div class="profile-icon-name">github</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="profile-border"></div>
						<div class="row">
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-flickr-website-logo-silhouette"></i></a>
										<div class="profile-icon-name">flickR</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-flickr-website-logo-silhouette"></i></a>
											<div class="profile-icon-name">flickR</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-smug"></i></a>
										<div class="profile-icon-name">smungMung</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-smug"></i></a>
											<div class="profile-icon-name">smungMung</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-squarespace-logo"></i></a>
										<div class="profile-icon-name">squareSpace</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-squarespace-logo"></i></a>
											<div class="profile-icon-name">squareSpace</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile profile-no-border">
									<div class="profile-txt">
										<a href=""><i class="flaticon-bitbucket-logotype-camera-lens-in-perspective"></i></a>
										<div class="profile-icon-name">bitBucket</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-bitbucket-logotype-camera-lens-in-perspective"></i></a>
											<div class="profile-icon-name">bitBucket</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section><!--/.profiles-->
		<!--profiles end -->

		<!--portfolio start
		<section id="portfolio" class="portfolio">
			<div class="portfolio-details">
				<div class="section-heading text-center">
					<h2>portfolio</h2>
				</div>
				<div class="container">
					<div class="portfolio-content">
						<div class="isotope">
							<div class="row">

								<div class="col-sm-4">
									<div class="item">
										<img src="assets/images/portfolio/p1.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												ui/ux design
											</a>
										</div><!-- /.isotope-overlay --
									</div><!-- /.item --
									<div class="item">
										<img src="assets/images/portfolio/p2.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												ui/ux design
											</a>
										</div><!-- /.isotope-overlay --
									</div><!-- /.item --
								</div><!-- /.col --

								<div class="col-sm-4">
									<div class="item">
										<img src="assets/images/portfolio/p3.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												web design
											</a>
										</div><!-- /.isotope-overlay --
									</div><!-- /.item --
								</div><!-- /.col

								<div class="col-sm-4">
									<div class="item">
										<img src="assets/images/portfolio/p4.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												web development
											</a>
										</div><!-- /.isotope-overlay --
									</div><!-- /.item --
									<div class="item">
										<img src="assets/images/portfolio/p5.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												web development
											</a>
										</div><!-- /.isotope-overlay --
									</div><!-- /.item --
								</div><!-- /.col --
							</div><!-- /.row --
						</div><!--/.isotope--
					</div><!--/.gallery-content--
				</div><!--/.container--
			</div><!--/.portfolio-details--

		</section><!--/.portfolio--
		<!--portfolio end -->

		<!--clients start --
		<section id="clients" class="clients">
			<div class="section-heading text-center">
				<h2>clients</h2>
			</div>
			<div class="clients-area">
				<div class="container">
					<div class="owl-carousel owl-theme" id="client">
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c1.png" alt="brand-image" />
							</a>
						</div><!--/.item--
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c2.png" alt="brand-image" />
							</a>
						</div><!--/.item--
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c3.png" alt="brand-image" />
							</a>
						</div><!--/.item--
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c4.png" alt="brand-image" />
							</a>
						</div><!--/.item--
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c5.png" alt="brand-image" />
							</a>
						</div><!--/.item--
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c6.png" alt="brand-image" />
							</a>
						</div><!--/.item--
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c7.png" alt="brand-image" />
							</a>
						</div><!--/.item--
					</div><!--/.owl-carousel--
				</div><!--/.container--
			</div><!--/.clients-area--

		</section><!--/.clients--

		</section><!--/.clients--
		<!--clients end -->

		<!--contact start -->
		<section id="contact" class="contact">
			<div class="section-heading text-center">
				<h2>contact me</h2>
			</div>
			<div class="container">
				<div class="contact-content">
					<div class="row">
						<div class="col-md-offset-1 col-md-5 col-sm-6">
							<div class="single-contact-box">
								<div class="contact-form">

									<form action="index.php" method="POST">
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
												  <input type="text" class="form-control" id="name" placeholder="Name*" name="name">
												</div><!--/.form-group-->
											</div><!--/.col-->
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<input type="email" class="form-control" id="email" placeholder="Email*" name="email">
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<textarea class="form-control" rows="8" id="comment" placeholder="Message" name="message"></textarea>
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="single-contact-btn">
													<input type='submit' class="contact-btn" role="button" name="submit" style="border:none;background-color:inherit;"/>
												</div><!--/.single-single-contact-btn-->
											</div><!--/.col-->
										</div><!--/.row-->
									</form><!--/form-->
								</div><!--/.contact-form-->
							</div><!--/.single-contact-box-->
						</div><!--/.col-->
						<div class="col-md-offset-1 col-md-5 col-sm-6">
							<div class="single-contact-box">
								<div class="contact-adress">
									<div class="contact-add-head">
										<h3>Robert Kulesza</h3>
										<p>Multi-Platform Developer</p>
									</div>
									<div class="contact-add-info">
										<div class="single-contact-add-info">
											<h3>phone</h3>
											<p>732-618-8342</p>
										</div>
										<div class="single-contact-add-info">
											<h3>email</h3>
											<p>kuleszar@kean.edu</p>
										</div>
										<div class="single-contact-add-info">
											<h3>website</h3>
											<p>www.kuleszar.com</p>
										</div>
                    <div class="single-contact-add-info">
                      <h3>github</h3>
                      <p>www.github.com/rkulesza9</p>
                    </div>
									</div>
								</div><!--/.contact-adress-->
								<div class="hm-foot-icon">
									<ul>
										<li><a href="www.facebook.com/koolesza"><i class="fa fa-facebook"></i></a></li><!--/li-->
										<!--<li><a href="#"><i class="fa fa-dribbble"></i></a></li><!--/li--
										<li><a href="#"><i class="fa fa-twitter"></i></a></li><!--/li--
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li><!--/li--
										<li><a href="#"><i class="fa fa-instagram"></i></a></li><!--/li-->
									</ul><!--/ul-->
								</div><!--/.hm-foot-icon-->
							</div><!--/.single-contact-box-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.contact-content-->
			</div><!--/.container-->

		</section><!--/.contact-->
		<!--contact end -->

		<!--footer-copyright start-->
		<footer id="footer-copyright" class="footer-copyright">
			<div class="container">
				<div class="hm-footer-copyright text-center">
					<p>
						&copy; copyright Robert Kulesza. theme by <a href="https://www.themesine.com/">themesine</a>
					</p><!--/p-->
				</div><!--/.text-center-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" ></i>
				</div>

			</div><!--/.scroll-Top-->

        </footer><!--/.footer-copyright-->
		<!--footer-copyright end-->

		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>

        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>

		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!-- jquery.sticky.js -->
		<script src="assets/js/jquery.sticky.js"></script>

		<!-- for progress bar start-->

		<!-- progressbar js -->
		<script src="assets/js/progressbar.js"></script>

		<!-- appear js -->
		<script src="assets/js/jquery.appear.js"></script>

		<!-- for progress bar end -->

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>

    </body>

</html>
