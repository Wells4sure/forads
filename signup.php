<?php
require_once 'app/register.php';
isLoggedIn();
require_once 'includes/header.php';

?>

	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1>User Ragistration</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Ragister</li>
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->

		<div class="ad-post-wrapper section">
			
			<div class="container">
				<?php 
			if ($error != "") {
				?>
			  	<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fas fa-ban fa-lg"></i></strong> <?php echo $error; ?>
				</div>
<?php 
} ?>
				<div class="row">
					<div class="col-md-5 col-md-offset-4">
						<div class="user-form">
							<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  class="form" role="form" autocomplete="off" >
								<div class="form-group">
									<input type="text"  required="required" name="firstName" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" class="form-control input-lg" placeholder="* First Name">
								</div>
								<div class="form-group">
									<input type="text"  required="required" name="lastName" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" class="form-control input-lg" placeholder="* Last Name" >
								</div>
								<div class="form-group">
									<input type="email" required="required" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control input-lg" placeholder="* Your Email">
								</div>
								<div class="form-group">
									<input type="password" id="pass"  required="required" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" class="form-control input-lg" placeholder="* Password" >
									<span id="passstrength" class="label pull-right"></span>
								</div>
								<div class="form-group">
									<input type="password"  required="required" name="confirm_password" value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>" class="form-control input-lg" placeholder="* Confirm Password" >
								</div>
								 <br />
                    			<span class="help-block">By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
								<button type="submit" name="signup" class="btn btn-primary" id="subBtn">Sign Up</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- ad-post -->
	</div> <!-- page -->

<?php
require_once 'includes/footer.php';
?>

<script>
$(document).ready(function(){
	$('#pass').keyup(function(e) {
		var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
		var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
		var enoughRegex = new RegExp("(?=.{6,}).*", "g");
		if (false == enoughRegex.test($(this).val())) {
				$('#passstrength').html('Too Short');
		} else if (strongRegex.test($(this).val())) {
				$('#passstrength').className = 'Success';
				$('#passstrength').html('Strong!');
				$('#passstrength').css("color", "green");
		} else if (mediumRegex.test($(this).val())) {
				$('#passstrength').className = 'warning';
				$('#passstrength').html('Medium!');
				$('#passstrength').css("color", "orange");
		} else {
				$('#passstrength').className = 'error';
				$('#passstrength').html('Weak!');
		}
		return true;
	});

});
$('#subBtn').click(function(){
	
	window.onload = function() {
		$('#subBtn').html('Loading...');
		$( "#subBtn" ).prop( "disabled", true );	
	};
});



</script>