<?php 
require_once 'app/login.php';
//check if session is set
isLoggedIn();
require_once 'includes/header.php';
?>

	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1>Error Page</h1>
					<ol class="breadcrumb">
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->

		<div class="ad-post-wrapper section">
			<div class="container">
				<div class="error-page">
					<div class="error-page-content">
						<h2>404 <span>error</span></h2>
						<p>Invalid Page or Broken link to the page you have requested!</p>
						<a href="index.php" class="btn btn-primary">Back To Home</a>
					</div>
				</div>
			</div>
		</div> <!-- ad-post -->
	</div>	<!-- page -->
		
	
	<?php
require_once 'includes/footer.php';
?>