<?php
include_once "app/scripts/conn.php";
$failed = false;

if (isset($_REQUEST['u']) && isset($_REQUEST['k'])) {
	$u = $_REQUEST['u'];
	$k = $_REQUEST['k'];
	$token = md5($k);
	$sql = "SELECT * FROM users WHERE userId=$u AND activationCode='$token'";
	$run = $db->query($sql);
	if ($run->num_rows > 0) {
		//user found
		$activateUser = $run->fetch_assoc();
		if ($activateUser['active'] == true) {
			header('Location:login.php') or die();
		} else {
			//update
			$update = "UPDATE users SET active=TRUE WHERE userId=$u AND activationCode='$token'";
			$db->query($update);

		}

	} else {
		$failed = true;
	}

} else {
	$failed = true;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Wellington Chanda">
	<meta name="description" content="Classifieds Ads in Zambia ">

	<title>ForAds | Sign Up - Success</title>

	<!-- CSS -->
	<link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="vendors/fontawesome/css/all.css">



	<!-- font -->


	<!-- favicon icon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<header id="header" class="clearfix">
		<nav class="navbar navbar-default ">
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<ul class="list-inline">
								<li><span><i class="fas fa-envelope"></i></span> <a href="#"> info@wcalpcafe.com</a></li>
								<li><span><i class="fa fa-phone"></i></span> +260 978 999 359</li>
								<li>
									<ul class="list-inline top-social">
										<li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
										<li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a class="google" href="#"><i class="fab fa-google-plus"></i></a></li>
										<li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="col-sm-6">
							<div class="user-section">
								<ul class="list-line">
									<li><a href="signin.php"><i class="fas fa-sign-in-alt " aria-hidden="true"></i> Sign In </a></li>
								</ul>
								<a href="ad-post.php" class="btn btn-primary">Post Free Ad</a>
							</div><!-- user-section -->
						</div>
					</div>
				</div>
			</div><!-- topbar -->

			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/logo.png" alt="4Ads"></a>
				</div><!-- /navbar-header -->

				<div class="navbar-right">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Category <span
									 class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="category-list.php">Main Category</a></li>
									<li><a href="categories.php">All Category</a></li>
									<li><a href="sub-categories.php">Sub Category</a></li>
									<li><a href="details.php">Ad Details</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Pages <span
									 class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="faq.php">FAQ</a></li>
									<li><a href="ad-post.php">Ad post</a></li>
									<li><a href="signup.php">Sign Up</a></li>
									<li><a href="signin.php">Sign In</a></li>
									<li><a href="error-page.php">Error Page</a></li>
									<li><a href="blank-page.php">Blank Page</a></li>
									<li><a href="contact.html">Contact Us</a></li>
									<li><a href="search.html">Search Result</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Blog <span
									 class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="blog.html">Blog Default</a></li>
									<li><a href="blog-two.html">Blog With Sidebar</a></li>
									<li><a href="blog-detail.html">Blog Details</a></li>
									<li><a href="blog-detail-two.html">Blog Details With Sidebar</a></li>
								</ul>
							</li>
							<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->


	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">Register</li>
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->

		<div class="ad-post-wrapper section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-offset-4">
						<?php
					if ($failed === false) {
						?>
						<div class="user-form text-center text-success">
							<div class="icon-object2 border-success text-success"><i class="far fa-check-circle fa-5x"></i></div>
							<h3>Account Validation Complete</h3>
							<h4><a href="login.php">Login</a></h4>
						</div>
						<?php

				} else {
					?>
				<div class="user-form text-center text-danger">
							<div class="icon-object2 border-danger text-danger"><i class="far fa-times-circle fa-5x"></i></div>
							<h3>Account Validation Failed</h3>
							<p>Contact <a href="#">Support</a> for help</p>
						</div>

						<?php

				}
				?>
					</div>
				</div>
			</div>
		</div> <!-- ad-post -->
	</div> <!-- page -->


<?php
require_once 'includes/footer.php';
?>