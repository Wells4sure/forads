<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Wellington Chanda">
	<meta name="description" content="Classifieds Ads in Zambia ">

	<title>ForAds | Classifieds </title>

	<!-- CSS -->
	<link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="vendors/fontawesome/css/all.css">
	 <!-- select2 CSS -->
    <link href="vendors/select2/css/select2.css" rel="stylesheet" />
    <!-- Datatables CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/DataTables/datatables.min.css"/>



	<!-- font -->


	<!-- favicon icon -->
	<!-- <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico"> -->

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
								<?php
							if (isset($name)) {
								?>

								<li><a href="profile.php"><i class="far fa-user " aria-hidden="true"></i> Hi <?php echo $name; ?></a></li> ·  
								<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?logout=True"> <i class="fas fa-sign-out-alt " aria-hidden="true"></i> Logout</a></li>

								<?php

						} else {
							?>
									<li><a href="login.php"><i class="fas fa-sign-in-alt " aria-hidden="true"></i> Sign In </a></li>
									<li><a href="signup.php"><i class="fas fa-user" aria-hidden="true"></i> Register</a></li>
								
									<?php

							}
							?>
							</ul>
								<a href="post.php" class="btn btn-primary">Post Free Ad</a>
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
							<li class="active"><a href="index.php">Home</a></li>
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
									<li><a href="post.php">Ad post</a></li>
									<li><a href="signup.php">Sign Up</a></li>
									<li><a href="signin.php">Sign In</a></li>
									<li><a href="error-page.php">Error Page</a></li>
									<li><a href="blank-page.php">Blank Page</a></li>
									<li><a href="contact.php">Contact Us</a></li>
									<li><a href="search.php">Search Result</a></li>
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
							<li><a href="contact.php">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->
