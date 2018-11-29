<?php
require_once 'app/scripts/sessions.php';
checkPage(true);

require_once "app/profile.php";
require_once 'includes/header.php';

?>
	<div class="page">


<?php
	require_once "includes/profile.php";
?>

		<div class="ad-post-wrapper section">
			<div class="container">
				<div class="blank-page">

					
					<div class="row">
			

					  <div class="col-xs-12 col-sm-4">
							<?php
								require_once "includes/sidebar.php";
							?>
						</div>

					  <div class="col-xs-12 col-sm-8">
						  <div class="test-column">
						<div class="welcome-msg">
							<span class="page-sub-header-sub small">You last logged in at: 
								 <?php 
								$datePosted = strtotime($lastSeen);
								$datePostedformat = date('F j, Y, g:i A', $datePosted);
								echo $datePostedformat; ?></span>
						</div>
<?php 
if ($error != "") {
	?>
			  	<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fas fa-ban fa-lg"></i></strong> <?php echo $error; ?>
				</div>
<?php 
} ?>
<?php 
if ($success != "") {
	?>
			  	<div class="alert alert-success alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fas fa-check fa-lg"></i></strong> <?php echo $success; ?>
				</div>
<?php 
} ?>
						
								<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
										MY DETAILS</a>
									</h4>
									</div>
									<div id="collapse1" class="panel-collapse collapse in">
									<div class="panel-body">
										        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  class="form" role="form" autocomplete="off " 	enctype="multipart/form-data" >
												<div class="form-group">
													<label>First Name</label>
													<input type="text" name="firstName" value="<?php echo $pFname ?>"  class="form-control input-lg" placeholder="Edit First Name" />
												</div>
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" name="lastName" value="<?php echo $pLname ?>"  class="form-control input-lg" placeholder="Edit Last Name" />
												</div>
												<div class="form-group">
													<label>Username</label>
													<input type="text" name="username" value="<?php echo $pUsername ?>"  class="form-control input-lg" placeholder="Edit username" />
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" value="<?php echo $pEmail ?>"  class="form-control input-lg" placeholder="Edit Email" />
												</div>
												<div class="form-group">
													<label>Address</label>
													<input type="text" name="address" value="<?php echo $pAddress ?>"   class="form-control input-lg" placeholder="Edit Address" />
												</div>
												<div class="form-group">
													<label>Phone</label>
													<input type="text" name="phone" value="<?php echo $pPhone ?>"  class="form-control input-lg" placeholder="Edit Phone #" />
												</div>
												<div class="form-group text-center">
													<button type="submit" name="updateP"  id="post_btn" class="btn btn-lg btn-primary">Save</button>
												</div>
											</form>
									</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
										SETTINGS </a>
									</h4>
									</div>
									<div id="collapse2" class="panel-collapse collapse">
									<div class="panel-body">
										   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  class="form" role="form" autocomplete="off" >
											<div class="form-group">
												<label>Old Password</label>
												<input type="password" name="pass1"  class="form-control input-lg" placeholder="Old Password" />
											</div>
											<div class="form-group">
												<label>New Password</label>
												<input type="password" id="pass" class="form-control input-lg" name="pass2"  placeholder="New Password"  required>
												<span id="passstrength" class="pull-right"></span>
											</div>
											<div class="form-group text-center">
												<button type="submit" name="updatePass"  id="post_btn" class="btn btn-lg btn-primary">Save</button>
											</div>
										</form>
									</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">PREFERENCES </a>
									</h4>
									</div>
									<div id="collapse3" class="panel-collapse collapse">
									<div class="panel-body">
										<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  class="form" role="form" autocomplete="off" >
       
										<div class="form-group">
											<div class="checkbox">
												<label><input type="checkbox" name="news">I want to receive newsletter.</label>
											</div>
										</div>
										<div class="form-group">
											<div class="checkbox">
												<label><input type="checkbox" name="advice" > I want to receive advice on buying and selling.</label>
											</div>
										</div>
											<div class="form-group text-center">
												<button type="submit" name="pref"  id="post_btn" class="btn btn-lg btn-primary">Save</button>
											</div>
										</form>
									</div>
									</div>
								</div>
								</div> 

						  </div> <!--test-column-->
						 
						</div>
						
					</div> <!--Row End-->

				</div>
			</div>
		</div> <!-- ad-post -->
	</div>	<!-- page -->

	
	
<?php
require_once 'includes/footer.php'
?>
