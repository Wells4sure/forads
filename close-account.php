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
						  <div class="test-column text-center">
							<h2 class="title-2"><i class="fas fa-ban "></i> Close account </h2> <hr>
							<p>You are sure you want to close your account?</p>
							

							<div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">  Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">  No
                                </label>
                            </div>



							</div>
							<br/>
							<button type="submit" class="btn btn-primary">Submit</button>

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