<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';

	@sec_session_start();

// Check if all fields are filled out
if(!empty($_POST['grade']) && !empty($_POST['curriculum']) && !empty($_POST['name']) && !empty($_FILES['fileToUpload'])){
	// Create dirctory path
	$target_dir = "Videos/";
	$grade_dir = $_POST['grade'] . "/";
	$curriculum_dir = $_POST['curriculum'] . "/";
	$name_dir = $_POST['name'] . "/";
	// Create video directory if it doesn't exist
	if (!(is_dir($target_dir))) {
		mkdir($target_dir);
	}
	// Create grade directory if it doesn't exist
	if (!(is_dir($target_dir . $grade_dir))) {
		mkdir($target_dir . $grade_dir);
	}
	// Create curriculum directory if it doesn't exist
	if (!(is_dir($target_dir . $grade_dir . $curriculum_dir))) {
		mkdir($target_dir . $grade_dir . $curriculum_dir);
	}
	// Set new target directory with grade and curriculum
	$target_dir = $target_dir . $grade_dir . $curriculum_dir;	
	// Set location of file
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if file already exists
	if (file_exists($target_file)) {
		$error = "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 314572800) {
		$error = "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if(strcasecmp($videoFileType,"mov") && strcasecmp($videoFileType,"mpeg4") && strcasecmp($videoFileType,"mp4") && strcasecmp($videoFileType,"avi")
		&& strcasecmp($videoFileType,"wmv") && strcasecmp($videoFileType,"mpegps") && strcasecmp($videoFileType,"flv") && strcasecmp($videoFileType,"3gpp") && strcasecmp($videoFileType,"webm")) {
		$error = "Sorry, only MOV, MPEG4, AVI, WMV, MPEGPS, FLV, 3GPP & WebM files are allowed.";
		$uploadOk = 0;
	}
	// If everything is ok, try to upload file
	if ($uploadOk != 0) {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$success = true;
			$new_file_name = $_POST['grade'] . "_" . $_POST['curriculum'] . "_" . $_POST['name'] . "_" .  $_FILES["fileToUpload"]["name"];
			rename($target_file, $target_dir . $new_file_name);
		}
		else {
			$error = "Sorry, there was an error uploading your file.";
		}
	}
	// Reset target directory
	$target_dir = "Videos/";
	// If curriculum directory is empty then delete it
	$dir = $target_dir . $grade_dir . $curriculum_dir;
	if (is_dir_empty($dir)) {
	  rmdir($dir);
	}
	// If grade directory is empty then delete it
	$dir = $target_dir . $grade_dir;
	if (is_dir_empty($dir)) {
	  rmdir($dir);
	}
	// If video directory is empty then delete it
	$dir = $target_dir;
	if (is_dir_empty($dir)) {
	  rmdir($dir);
	}
}
// Check that all fields are filled out
else if((isset($_POST['grade']) || isset($_POST['curriculum']) ||isset($_POST['name']) || isset($_FILES['fileToUpload'])) && (empty($_POST['grade']) || empty($_POST['curriculum']) ||empty($_POST['name']) || empty($_FILES['fileToUpload']))){
	$error = "Please fill out all fields!";
}
// Function to check if directory is empty
function is_dir_empty($dir) {
  if (!is_readable($dir)) return NULL; 
  $handle = opendir($dir);
  while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
      return FALSE;
    }
  }
  return TRUE;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CeMaST || Upload</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="//iguides.illinoisstate.edu/favIcon/favicon.ico" type="image/x-icon" />
    
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/contact.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />
	<link rel="stylesheet" href="css/compiled/reset.css" type="text/css" media="screen" />

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
							echo '<li class="active"><a href="upload.php">UPLOAD VIDEO</a></li>';								
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
	<?php						 
		if (login_check($mysqli) == true) {
			//logged in
			echo '								
    <div id="contact">
        <div class="container">
            <div class="section_header">
                <h3>Upload your video</h3>
            </div>
            <div class="row contact">
                <p>Please share your videos showing off your projects! Videos must be no larger than 300 Mb and we recommend that videos be under 2.5 minutes.</p>';?>
				<?php if(isset($error)){ ?><div class="alert alert-danger" id="error"><?php  echo $error; ?></div> <?php }
				else if(isset($success)){ ?><div class="alert alert-success" id="success">Video has been uploaded!</div><?php } ?>
				<?php echo '
                <form method="post" enctype="multipart/form-data">
				<div class="row form">
                    <div class="col-sm-6 row-col">
                        <div class="box">
                            <select class="form-control" name="grade" required>
                                <option name="Choose Grade" value="" selected disabled>Choose Grade</option>
                                <option name="Kindergarten" value="Kindergarten">Kindergarten</option>
								<option name="Grade 1" value="Grade 1">Grade 1</option>
								<option name="Grade 2" value="Grade 2">Grade 2</option>
								<option name="Grade 3" value="Grade 3">Grade 3</option>
								<option name="Grade 4" value="Grade 4">Grade 4</option>
								<option name="Grade 5" value="Grade 5">Grade 5</option>
								<option name="Grade 6" value="Grade 6">Grade 6</option>
								<option name="Grade 7" value="Grade 7">Grade 7</option>
								<option name="Grade 8" value="Grade 8">Grade 8</option>
								<option name="Grade 9" value="Grade 9">Grade 9</option>
								<option name="Grade 10" value="Grade 10">Grade 10</option>
								<option name="Grade 11" value="Grade 11">Grade 11</option>
								<option name="Grade 12" value="Grade 12">Grade 12</option>
								<option name="Professional Development" value="Professional Development">Professional Development</option>
                            </select>
                            <select class="form-control" name="curriculum" required>
                                <option name="Choose Curriculum" value="" selected disabled>Choose Curriculum</option>
                                <option name="Mathematics" value="Mathematics">Mathematics</option>
                                <option name="Science" value="Science">Science</option>
                                <option name="Engineering" value="Engineering">Engineering</option>
                                <option name="Forensics" value="Forensics">Forensics</option>
                                <option name="Scientific Research" value="Scientific Research">Scientific Research</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 row-col">
                        <div class="box">
                            <input class="name form-control" name="name" type="text" placeholder="Name" required>
							<div id="fileWrapper">
								<input class="form-control" name="fileToUpload" id="fileToUpload" type="file" accept="video/*" required>
							</div>
						</div>
                    </div>
                </div>

                    <div class="row submit">
                        <div class="col-md-3 right">
                            <br />
                            <input type="submit" target="submit" name="submitVideo" id="submitVideo" value="Upload your video">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>';
		} else {
			//logged out
			echo '
	<div id="reset_pwd" class="reset_page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 box_wrapper">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="head">
								<h1 style="color:red">CeMaST: Error</h1>
                                <h4>You must be logged in to view this page.</h4>
                                <div class="line"></div>
                            </div>
                            <div class="form">
                                <p class="already">Go back to the <a href="index.php">Home</a> page or <a href="contact.php">Contact</a> us.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>';
		}
	?>

	<!-- To edit the footer go to footer.html -->
	<?php include("footer.html")?>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		function checkUpload(size)
		{
			if(size>300) {
			 var fileSize = size.toFixed(2);
				alert('Your file size is: ' + fileSize + "MB, and it is too large to upload! Please try to upload smaller file (300MB or less).");
				$("#fileToUpload").replaceWith('<input class="form-control" name="fileToUpload" id="fileToUpload" type="file" accept="video/*" required>');
			}
		}
		$('#fileWrapper').on('change', '#fileToUpload', function() {
		var fileSize = this.files[0].size/1024/1024;
			checkUpload(fileSize);
		});
	</script>
</body>
</html>