<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';

	@sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CeMaST || Professional Development</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="//iguides.illinoisstate.edu/favIcon/favicon.ico" type="image/x-icon" />
	
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/services.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/compiled/portfolio.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />
    <link rel="stylesheet" href="css/lib/flexslider.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
   <div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand"><strong>CeMaST Video</strong></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">HOME</a></li>
					<li class="dropdown active">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">CURRICULUM VIDEOS <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="grade k-5.php">Grade K-5</a></li>
							<li><a href="grade 6-8.php">Grade 6-8</a></li>
							<li><a href="grade 9-12.php">Grade 9-12</a></li>
							<li><a href="professional-development.php">Professional Development</a></li>
						</ul>
					</li>
					<?php						 
						if (login_check($mysqli) == true) {
							//logged in
							echo '<li><a href="upload.php">UPLOAD VIDEO</a></li>';								
						}
					?>
					<li><a href="contact.php">CONTACT US</a></li>
					<?php						 
						if (login_check($mysqli) == true) {
							//logged in
							echo '<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . htmlentities($_SESSION['username']) .' <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="includes/logout.php">Log out</a></li>							
									</ul>
								</li>';								
						} else {
							//logged out
							echo '<li><a href="sign-up.php">Sign up</a></li>
								<li><a href="sign-in.php">Sign in</a></li>';
						}
					?>
				</ul>
            </div>
        </div>
    </div>
	<!-- Filter row -->
	<div id="portfolio">
        <div class="container">
            <div class="section_header">
                <h3>Curriculum Videos</h3>
            </div>
            <div class="row">
				<div class="col-md-12">
					<div id="filters_container">
						<ul id="filters">
							<li><a href="#professional-development">Professional Development</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Professional Development -->
    <div id="service_1">
        <div class="container">
            <div class="section_header">
                <h3 id="professional-development">Professional Development</h3>
            </div>
            <!-- Start of videos row -->
            <div class="row feature_wrapper">
                <!-- Videos Row -->
                <div class="features_op1_row">
                    <!-- Copy this section for single video -->
                    <div class="col-sm-4 feature first">
						<div class="img_box">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/j8BMJO8A5ok" frameborder="0" allowfullscreen class="img-responsive"></iframe>
                        </div>
                        <div class="text">
                            <h6>Engines: Fifth Grade Creative Core Curriculum</h6>
                            <p>
                                The Center for Mathematics, Science, and Technology at Illinois State University has partnered with TPS Publishing to produce, promote, and distribute the Creative Core Curriculum program. Both the mathematics and science Creative Core Curriculum programs consist of a series of lessons and practice sheets that specifically address Common Core Standards for Mathematics or Next Generation Science Standards grades K-5.
                            </p>
                        </div>
                    </div>
                    <!-- Copy this section for single video -->
                    <div class="col-sm-4 feature">
                        <div class="img_box">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/qu2gYCtWZtE" frameborder="0" allowfullscreen class="img-responsive"></iframe>
                        </div>
                        <div class="text">
                            <h6>Introduction to STEM Projects</h6>
                            <p>
                                The Center for Mathematics, Science, and Technology at Illinois State University has partnered with TPS Publishing to produce, promote, and distribute the Creative Core Curriculum program. Both the mathematics and science Creative Core Curriculum programs consist of a series of lessons and practice sheets that specifically address Common Core Standards for Mathematics or Next Generation Science Standards grades K-5. 
                            </p>
                        </div>
                    </div>
                    <!-- Copy this section for single video -->
                    <div class="col-sm-4 feature last">
                        <div class="img_box">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/j8BMJO8A5ok" frameborder="0" allowfullscreen class="img-responsive"></iframe>
                        </div>
                        <div class="text">
                            <h6>Engines: Fifth Grade Creative Core Curriculum</h6>
                            <p>
                                The Center for Mathematics, Science, and Technology at Illinois State University has partnered with TPS Publishing to produce, promote, and distribute the Creative Core Curriculum program. Both the mathematics and science Creative Core Curriculum programs consist of a series of lessons and practice sheets that specifically address Common Core Standards for Mathematics or Next Generation Science Standards grades K-5.
                            </p>
                        </div>
                    </div>
                </div>
            </div><br>
			<!-- End of videos row -->
        </div>
    </div>
	<!-- End of Professional Development -->

    <!-- starts footer -->
    <!-- To edit the footer go to footer.html -->
	<?php include("footer.html")?>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script type="text/javascript" src="js/flexslider.js"></script>
</body>
</html>