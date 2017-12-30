<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';

	@sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CeMaST</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="//iguides.illinoisstate.edu/favIcon/favicon.ico" type="image/x-icon" />
	
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />    
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />    

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="pull_top">
    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand"><strong>CeMaST Video</strong></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">HOME</a></li>
					<li class="dropdown">
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

    <section id="feature_slider" class="lol">
        <!-- 
            Each slide is composed by <img> and .info
            - .info's position is customized with css in index.css
            - each <img> parallax effect is declared by the following params inside its class:
            
            example: class="asset left-472 sp600 t120 z3"
            left-472 means left: -472px from the center
            sp600 is speed transition
            t120 is top to 120px
            z3 is z-index to 3
            Note: Maintain this order of params

            For the backgrounds, you can combine from the bgs folder :D
        -->
		<!-- Change url('img/slides/scene1/picture.jpg') to change picture source -->
        <article class="slide" id="showcasing" style="background: url('img/slides/scene1/cemast1.jpg') repeat-x top center;">
            <div class="info">
				<!-- Text that shows up on scene 1 -->
                <h2>Watch videos to see the curriculum in action.</h2>
            </div>
        </article>
		<!-- Change url('img/slides/scene2/picture.jpg') to change picture source -->
        <article class="slide" id="showcasing" style="background: url('img/slides/scene2/cemast2.jpg') repeat-x top center;">
            <div class="info">
				<!-- Text that shows up on scene 2 -->
                <h2>Upload your own videos to show to others.</h2>
            </div>
        </article>
		<!-- Change url('img/slides/scene3/picture.jpg') to change picture source -->
		<article class="slide" id="showcasing" style="background: url('img/slides/scene3/cemast3.jpg') repeat-x top center;">
            <div class="info">
				<!-- Text that shows up on scene 3 -->
                <h2>Contact us if you have any questions or comments.</h2>
            </div>
        </article>
		<!-- Change url('img/slides/scene4/picture.jpg') to change picture source -->
		<article class="slide" id="showcasing" style="background: url('img/slides/scene4/cemast4.jpg') repeat-x top center;">
            <div class="info">
				<!-- Text that shows up on scene 4 -->
                <h2>Check out our YouTube channel.</h2>
            </div>
        </article>		
    </section>

    <div id="showcase">
        <div class="container">
            <div class="section_header">
                <h3>Featured Videos</h3>
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
    <!-- starts footer -->
	<!-- To edit the footer go to footer.html -->
	<?php include("footer.html")?>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    <script type="text/javascript" src="js/index-slider.js"></script>	
</body>
</html>