<?php
require_once 'app/scripts/sessions.php';
require_once 'app/car_post.php';
require_once 'includes/header.php';

if(!empty($userId)||$userId !=""){
?>
<div class="page">
	<div id="breadcrumb-section" class="section">
		<div class="container">
			<div class="page-title text-center">
				<h1>Post a Vehicle</h1>
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
									<h3>Fill in the details for your Cars</h3>
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

									<div class="form-group">
										<label for="">Sub Category</label> <span class="pull-right required">(Required)</span>
										<select class="form-control input-lg select2" name="sCategory" id="sCategory" required>
											<option value="" selected="">Select</option>
											<?php
										$sCategory = "SELECT * FROM scategory WHERE categoryId=1";
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
										<label for="">For Sale By</label><span class="pull-right required">(Required)</span>
										<select class="form-control input-lg select2" name="saleBy" id="saleBy" required>
											<option value="" selected="">Select</option>
											<option value="owner">Owner</option>
											<option value="dealer">Dealer</option>
										</select>
									</div>

									<div class="row form-group">
										<div class="col-sm-12 col-md-6 ">
											<label for="">Make</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="make" id="make" required>
												<option value="" selected="">Select</option>
												<?php
											$make = "SELECT model_make_id, min(model_id) FROM car_models group by model_make_id";
											$runmake = $db->query($make);
											while ($makeRow = mysqli_fetch_array($runmake)) {
												echo "<option value='" . $makeRow['model_make_id'] . "'>" . ucfirst($makeRow['model_make_id']) . "</option>";
											}

											?>
											</select>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="">Model</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="model" id="model" required>
												<option value="" selected="">Select Make First</option>
											</select>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-12 col-md-6 ">
											<label for="">Kilometers</label><span class="pull-right required">(Required)</span>
											<input type="text" name="mileage" class="form-control input-lg" placeholder="Enter Kilometers" onkeypress="return isNumber(event)"
											 required />
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="">Body Type</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="bodyType" id="bodyType" required>
												<option value="" selected="">Select</option>
												<option>Truck</option>
												<option>SUV</option>
												<option>Sedan</option>
												<option>Van</option>
												<option>Coupe</option>
												<option>Wagon</option>
												<option>Convertible</option>
												<option>Sports Car</option>
												<option>Crossover</option>
												<option>Luxury car</option>
												<option>Hatchback</option>
												<option>Pick up</option>
											</select>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-12 col-md-6 ">
											<label for="">Year</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="year" id="year" required>
												<option value="" selected="">Select</option>
												<!--php code for populating the selectbox for Year -->
												<?php 
											$cDate = date('Y');
											$years = range($cDate, 1900);
											foreach ($years as $yr) {
												echo '<option value=' . $yr . '>' . $yr . '</option>';
											}
											?>
											</select>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="">Transmission</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="transmission" id="transmission" required>
												<option value="" selected="">Select</option>
												<option value="Manual">Manual</option>
												<option value="Automatic">Automatic</option>
											</select>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-12 col-md-6 ">
											<label for="">Fuel Type</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="fuelType" id="fuelType" required>
												<option value="" selected="">Select</option>
												<option value="Petrol">Petrol</option>
												<option value="Diesel">Diesel</option>
												<option value="Hybrid">Hybrid</option>
												<option value="Electric">Electric</option>
											</select>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="">Colour</label><span class="pull-right required">(Required)</span>
											<select class="form-control input-lg select2" name="color" id="color" required>
												<option value="" selected="">Select</option>
												<option value="black">Black</option>
												<option value="blue">Blue</option>
												<option value="brown">Brown</option>
												<option value="burgundy">Burgundy</option>
												<option value="gold">Gold</option>
												<option value="gray">Grey</option>
												<option value="green">Green</option>
												<option value="orange">Orange</option>
												<option value="pink">Pink</option>
												<option value="purple">Purple</option>
												<option value="red">Red</option>
												<option value="silver">Silver</option>
												<option value="tan">Tan</option>
												<option value="teal">Teal</option>
												<option value="white">White</option>
												<option value="yellow">Yellow</option>
												<option value="other">Other</option>
											</select>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="">Ad Title</label><span class="pull-right required">(Required)</span>

										<input type="text" class="form-control input-lg" id="title" maxlength="100" name="title" required>
										<span class="form-control-feedback">(<i class="charLength">100</i>)</span>

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
								<button class="btn btn-primary custom" type="submit" name="post_car">Post your ad</button>
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
    var part = [];
    $('#make').on('change', function () {
        var makeID = $(this).val();
        if (makeID) {
            $.ajax({
                type: 'POST',
                url: 'app/scripts/ajaxData.php',
                data: 'make_id=' + makeID,
                success: function (html) {
                    $('#model').html(html);
                    part[1] = capitalizeFirstLetter(makeID);
                    updateInput();
                }

            });
        }
    });

    $('#model').on('change', function () {
        var modelID = $(this).val();
        if (modelID) {
            $.ajax({
                type: 'POST',
                url: 'app/scripts/ajaxData.php',
                data: 'model_name=' + modelID,
                success: function (html) {
                    part[2] = capitalizeFirstLetter(modelID);
                    updateInput()

                }
            });
        }
    });

    $('#bodyType').on('change', function () {
        var bodyType = $(this).val();
        if (bodyType) {
            part[3] = capitalizeFirstLetter(bodyType);
            updateInput()
        }
    });


    $("#year").change(function (event) {
        var year = $('#year').val();

        if (year != null || year != "") {
            part[0] = year;
            updateInput()
        }

    });

    var text_max = 100;
    $('.charLength').html(text_max);

    $('#title').on('keyup keypress blur change', function (e) {
        var text_length = $('#title').val().length;
        var text_remaining = text_max - text_length;

        $('.charLength').html(text_remaining);
    });

    function updateInput() {
        if (!part[0]) {
            part[0] = "";
        }
        if (!part[1]) {
            part[1] = "";
        }
        if (!part[2]) {
            part[2] = "";
        }
        if (!part[3]) {
            part[3] = "";
        }
        $('#title').val(part[0] + ' ' + part[1] + ' ' + part[2] + ' ' + part[3]);
    }
    $("#tradeType").change(function (event) {
        var tradeType = $(this).val();
        if (tradeType == "FIXED") {
            $("#price").prop('disabled', false);
        } else {
            $("#price").prop('disabled', true);

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
        } // else..
		
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