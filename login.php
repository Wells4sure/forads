<?php 
require_once 'app/login.php';
//check if session is set
isLoggedIn();
require_once 'includes/header.php';

require_once "config.php";

$redirectURL = "https://b9852b22.ngrok.io/fb-callback.php";
$permissions =['email'];
$loginURL = $helper->getLoginURL($redirectURL, $permissions);

?>
	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1>User Login</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Signin</li>
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->

		<div class="ad-post-wrapper section">
			<div class="container">
								<?php 
							if ($error != "") {
								?>
			  	<div class="alert alert-danger alert-dismissible fade in" id="errorEffects">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fas fa-ban fa-lg"></i></strong> <?php echo $error; ?>
				</div>
<?php 
} ?>
<div class="row">
	<div class="col-md-5 col-md-offset-4">
		<div class="user-form">
			<div class="main">

			<h3 class="loginH3">Please Log In, or <a href="signup.php">Sign Up</a></h3>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
				<button onclick="window.location ='<?php echo $loginURL ;?>' " class="btn btn-lg btn-primary btn-block facebookBtn">Facebook <i class="fab fa-facebook"></i></button>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
				<a href="#" class="btn btn-lg btn-info btn-block googleBtn">Google <i class="fab fa-google"></i></a>
				</div>
			</div>
			<div class="login-or">
				<hr class="hr-or">
				<span class="span-or">or</span>
			</div>

			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  class="form" role="form"  >
				<div class="form-group">
				<label for="inputUsernameEmail">Username or email</label>
				<input type="text"  required="required" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" class="form-control input-lg" placeholder="Email / Username">
				</div>
				<div class="form-group">
				<a class="pull-right" href="#">Forgot password?</a>
				<label for="inputPassword">Password</label>
				<input type="password" class="form-control input-lg" name="password"  required="required" placeholder="Password">
				</div>
				<div class="checkbox pull-right">
				<label>
					<input type="checkbox" name="remember_me"  <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?>>
					Remember me </label>
				</div>
				<button type="submit" name="login" class="btn btn-primary">Log In</button>
			</form>

			</div>
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
  window.fbAsyncInit = function() {
    FB.init({
      appId            : 'your-app-id',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>