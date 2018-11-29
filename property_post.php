<?php
require_once 'app/scripts/sessions.php';
require_once 'app/property_post.php';
require_once 'includes/header.php';

if(!empty($userId)||$userId !=""){
?>
<div class="page">
	<div id="breadcrumb-section" class="section">
		<div class="container">
			<div class="page-title text-center">
				<h1>Post a Property</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Post Ad</li>
				</ol>
			</div>
		</div>
	</div><!-- breadcrumb-section -->

	<div class="avt-post-wrapper section">
		<div class="container">
			<div class="avt-post">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form"	enctype="multipart/form-data">
					<fieldset>
						<div class="product-section avtpost-fields">
							<div class="row">
								<div class="col-xs-12">
									<h3>Fill in the details for your Property</h3>
									<?php
									if($error!="" || !empty($error)){
										?>
										<div class="alert alert-danger">
											<strong>Oops! - </strong> <?php echo $error;?>
										</div>
										<?php
									}
									?>
								</div>

							<div class="form-group has-feedback">
								<label for="">Ad Title</label><span class="pull-right required">(Required)</span>
								<input type="text" class="form-control input-lg" id="title" maxlength="100" name="title" required>
								<span class="form-control-feedback">(<i class="charLength">100</i>)</span>

							</div>
									<div class="form-group">
										<label for="">Sub Category</label> <span class="pull-right required">(Required)</span>
										<select class="form-control input-lg select2" name="sCategory" id="sCategory" required>
											<option value="" selected="">Select</option>
											<?php
										$sCategory = "SELECT * FROM scategory WHERE categoryId=2";
										$runScategory = $db->query($sCategory);
										if ($runScategory->num_rows > 0) {
											while ($getRow = $runScategory->fetch_array()) {
												echo "<option value='" . $getRow['sCategoryId'] . "'>" . ucfirst($getRow['name']) . "</option>";
											}
										} else {
											echo "<option disabled>Error Reload page</option>";
										}
										?>
										</select>
									</div>
									<div class="form-group">
										<label for="">For <span id="saleRentBy">Sale</span> By</label><span class="pull-right required">(Required)</span>
										<select class="form-control input-lg select2" name="saleBy" id="saleBy" required>
											<option value="" selected="">Select</option>
											<option value="owner">Owner</option>
											<option value="agency">Agency</option>
										</select>
									</div>
									<div id="hideThis">
									<div class="row form-group">
										<div class="col-sm-12 col-md-6 ">
											<label for="">Dwelling Type</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="dwellingType"  required>
												<option value="" selected="">Select</option>
												<option value="apt">Apartment</option>
												<option value="house">House</option>
												<option value="thsevilla">Townhouse-villa</option>
												<option value="farm">Farm</option>
												<option value="other">Other</option>
											</select>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="">Bedrooms</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="bedrooms"  required>
											<option value="" selected="">Select</option>
											<option value="10">Studio or Bachelor Pad</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6+</option>
											</select>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-12 col-md-6 ">
											<label for="">Bathrooms</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="bathrooms"  required>
											<option value="" selected="">Select</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4+</option>
											</select>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="">Parking</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="parking" id="parking" required>
												<option value="" selected="">Select</option>
												<option>Garage</option>
												<option>Covered</option>
												<option>Street</option>
												<option>None</option>
											</select>
										</div>
									</div>
									</div>
									<div class="form-group">
										
											<label for="">Size</label><span class="pull-right required">(Optional)</span>
											<input type="text" class="form-control input-lg" placeholder="size (Sqm)"  onkeypress="return isNumber(event)"  name="size" >
										
									</div>


									<div class="form-group">
										<label for="">Location</label><span class="pull-right required">(Required)</span>
										<select class="form-control input-lg select2" name="location" id="location" required>
											<option value="" selected="">Select</option>
											<option> Central</option>
											<option>Copperbelt</option>
											<option>Eastern </option>
											<option>Luapula </option>
											<option>Lusaka </option>
											<option>Muchinga </option>
											<option>Northern </option>
											<option>North-Western </option>
											<option>Southern </option>
											<option>Western </option>
										</select>
									</div>

									<div class="form-group">
										<label for="">Description</label><span class="pull-right required">(Required)</span>
										<textarea class="form-control input-lg" row="4" placeholder="Enter Description Here" name="description" id="description"
										 required></textarea>
									</div>

								

							</div>
						</div><!-- product-section -->

						<div class="seller-section avtpost-fields">
							<div class="row">
								<div class="col-xs-12">
									<h3>More Information</h3>
								</div>
								
					                <div class="form-group">
										<label for="">Pictures </label><span class="pull-right opt">(optional)</span>
										<div class="form-group">
											<input type="file" name="upload[]"  class="fileInput"  id="file-input" multiple="multiple" max-uploads = 10 accept=".png, .jpg, .jpeg"/>
										</div>
										<div id="preview"></div>

									</div>

									<div class="row form-group ">
										<div class="col-xs-12 col-md-12 ">
											<label for="">Price</label><span class="pull-right opt">(optional)</span>
										</div>
										<div class="col-sm-12 col-md-6 form-group ">
											<select class="form-control input-lg select2" name="tradeType" id="tradeType">
												<option value="FIXED" selected="">Amount</option>
												<option value="MAKE OFFER">Negotiable</option>
												<option value="FREE">Free</option>
												<option value="SWAP / TRADE">Swap/Trade</option>
												<option value="CONTACT ME">Contact for Price</option>
											</select>
										</div>
										<div class="col-sm-12 col-md-6 form-group has-feedback">
											<input type="text" class="form-control input-lg" placeholder="Amount" onkeypress="return isNumber(event)" id="price"
											 name="price" />
											<span class="form-control-feedback" id="priceFeedback">(ZMK)</span>
										</div>
									</div>

									<div class="form-group ">
										<label for="">Phone Number </label><span class="pull-right opt">(optional)</span>
										<input type="text" class="form-control input-lg" name="phoneNumber" id="phoneNumber">
									</div>


							</div>
						</div><!-- seller-section -->

						<div class="seller-option avtpost-fields">
							<div class="row">
								<div class="col-md-12">
									<h3>Make Your Ad Featured <span><a href="#">What is featured ad ?</a></span></h3>
								</div>
								<div class="col-md-6">
									<div class="post-inner">
										<div class="form-group">
											<span>Premium Ad Options: </span>
											<div class="premium-avts">
												<ul>
													<li class="premium-avt">
														<input type="radio" name="premiumAvt" value="option-one" id="option-one">
														<label for="option-one">Regular Ad</label>
														<span>ZMW 00.00</span>
													</li>
													<li class="premium-avt">
														<input type="radio" name="premiumAvt" value="option-two" id="option-two">
														<label for="option-two">Top Featured Ads</label>
														<span>ZMW 50.00</span>
													</li>
													<li class="premium-avt">
														<input type="radio" name="premiumAvt" value="option-three" id="option-three">
														<label for="option-three">Urgent Ads</label>
														<span>ZMW 100.00</span>
													</li>
												</ul>
											</div>
										</div>
									</div><!-- post-inner -->
								</div>
								<div class="col-md-6">
									<div class="post-inner">
										<div class="form-group">
											<span>Please select the preferred payment method: </span>
											<div class="payment-options">
												<ul>
													<li class="payment-option">
														<input type="radio" name="payment-option" value="payment-one">
														<label for="payment-one">Direct Bank Transfer</label>
													</li>
													<li class="payment-option">
														<input type="radio" name="payment-option" value="payment-two">
														<label for="payment-two">Cheque Payment</label>
													</li>
													<li class="payment-option">
														<input type="radio" name="payment-option" value="payment-three">
														<label for="payment-three">Credit Card</label>
													</li>
												</ul>
											</div>
										</div>
									</div><!-- post-inner -->
								</div>
							</div>
						</div><!-- seller-option -->
						<div class="submit-section">
							<div class="ad-condition checkbox">
								<label for="submit-post">
									<input type="checkbox" name="submit-post" id="submit-post">
									By click you must agree with <a href="#">our Terms &amp; Condition</a> and
									<a href="#">Posting Rules</a>.
								</label>
							</div>
							<div class="submit-button">
								<button class="btn btn-primary custom" type="submit" name="post_property">Post your ad</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div> <!-- avt-post -->
</div> <!-- page -->


<?php
}else{?>
<div class="page">
<div class="avt-post-wrapper section">
		<div class="container">
			<div class="avt-post">
			<div class="col-md-5 col-md-offset-4">
								<div class="user-form text-center text-defualt">
								<h3>Login First To Post an Ad </h3>
								<hr>
									<div class="row">
										<a href="signup.php" class="btn btn-info">Create Account</a>
										<a href="login.php" class="btn btn-success ">Login</a>
									</div>
									
								</div>
								</div>
</div>
</div>
</div>
<?php
}
require_once 'includes/footer.php';
?>
<script>
	$(document).ready(function () {


    //select2
	$('.select2').select2();
	
    //my custom jQuery
    

    var text_max = 100;
    $('.charLength').html(text_max);

    $('#title').on('keyup keypress blur change', function (e) {
        var text_length = $('#title').val().length;
        var text_remaining = text_max - text_length;

        $('.charLength').html(text_remaining);
    });


    $("#tradeType").change(function (event) {
        var tradeType = $(this).val();
        if (tradeType == "FIXED") {
            $("#price").prop('disabled', false);
        } else {
            $("#price").prop('disabled', true);

        }
    });
	
	$('#sCategory').change(function (event){
		var sCategoryId = $(this).val();
		if(sCategoryId==8 ||sCategoryId==11 ||sCategoryId==12){
			$('#saleRentBy').html('Rent');
		
		}
		if(sCategoryId==9 ||sCategoryId==10){
			$('#saleRentBy').html('Sale');
		}

		if(sCategoryId==8 ||sCategoryId==9){
			$("#hideThis").show(1000);
		}else{
			$("#hideThis").hide(1000);
		}
		

		
	});
	

});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
//JAVA SCRIPT

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


function previewImages() {

    var $preview = $('#preview').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {

        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
			$('#file-input').reset();
        } // else...
		
        var reader = new FileReader();

        $(reader).on("load", function () {

            $preview.append($('<img/>', {
                src: this.result,
                height: 100,
                width: 110
            }));
        });

        reader.readAsDataURL(file);

    }

}

$('#file-input').on("change", previewImages);
</script>