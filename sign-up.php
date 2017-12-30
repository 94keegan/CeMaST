<?php
	include_once 'includes/register.inc.php';
	include_once 'includes/functions.php';
	
	@sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CeMaST || Sign Up</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="//iguides.illinoisstate.edu/favIcon/favicon.ico" type="image/x-icon" />
	
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/sign-up.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/compiled/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />

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
							echo '<li class="active"><a href="sign-up.php">Sign up</a></li>
								<li><a href="sign-in.php">Sign in</a></li>';
						}
					?>
				</ul>
            </div>
        </div>
    </div>

    <div id="reset_pwd" class="reset_page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 box_wrapper">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="head">
							<h1>Create your account</h1>
								<?php
									if (!empty($error_msg)) {
										echo $error_msg;
									}
								?>
                                <h4>Enter your username, email address, password, and access code to create your account.</h4>
                                <div class="line"></div>
                            </div>
                            <div class="form">
                                <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" 
									method="post" 
									name="registration_form">
                                    <input type="text" name="username" id="username" placeholder="Username" class="control-form" required />
									<input type="text" name="email" id="email" placeholder="Email" class="control-form" required />
									<input type="password" name="password" id="password" placeholder="Password" class="control-form" required />
									<input type="password" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password" class="control-form" required />
									<input type="text" name="accessCode" id="accessCode" placeholder="Access Code" class="control-form" required />
									<input type="submit" value="Sign Up"
										   onclick="return regformhash(this.form,
														   this.form.username,
														   this.form.email,
														   this.form.password,
														   this.form.confirmpwd,
														   this.form.accessCode);" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="already">Already have an account? <a href="sign-in.php"> Sign in</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- To edit the footer go to footer.html -->
	<?php include("footer.html")?>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
</body>
</html>