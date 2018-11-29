<?php
require_once 'app/scripts/sessions.php';
require_once 'includes/header.php';
?>

	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1>Post an Ad</h1>
					<ol class="breadcrumb">
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->

		<div class="ad-post-wrapper section">
			<div class="container">
				<div class="error-page">
					<div class="test-column">
						<h3>Post An Ad</h3>
						<h4>What are you posting an ad for?</h4>
						<div class="row ">
						
						<div class="col-lg-3 col-xs-6">
							<a href="car_post.php">
								<div class="small-box">
									
									<div class="icon">
										<img src="images/icon/1.png" alt="images" class="img-inline img-responsive">
									</div>
									<div class="inner">
										<h4> Cars & Vehicles  </h4>
									</div>
								</div>
							</a>
						</div>
						
						<div class="col-lg-3 col-xs-6">
							<a href="property_post.php">
								<div class="small-box">
									
									<div class="icon">
										<img src="images/icon/2.png" alt="images" class="img-inline img-responsive">
									</div>
									<div class="inner">
										<h4>Property</h4>
									</div>
								</div>
							</a>
						</div>
						
						<div class="col-lg-3 col-xs-6">
							<a href="electronic_post.php">
								<div class="small-box">
									
									<div class="icon">
										<img src="images/icon/3.png" alt="images" class="img-inline img-responsive">
									</div>
									<div class="inner">
										<h4>Electronics</h4>
									</div>
								</div>
							</a>
						</div>
						
						<div class="col-lg-3 col-xs-6">
							<a href="car_post.php">
								<div class="small-box">
									
									<div class="icon">
										<img src="images/icon/4.png" alt="images" class="img-inline img-responsive">
									</div>
									<div class="inner">
										<h4> Jobs </h4>
									</div>
								</div>
							</a>
						</div>

						</div>
					</div>
				</div>
			</div>
		</div> <!-- ad-post -->
	</div>	<!-- page -->
		
	
<?php
require_once 'includes/footer.php';
?>
