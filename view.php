<?php
require_once 'app/scripts/sessions.php';

if ($_REQUEST['postId']) {

	$postId = $_REQUEST['postId'];
	$post = "SELECT * FROM posts where postId=$postId";
	$runPost = $db->query($post);
	$rowPost = $runPost->fetch_assoc();

	$postOwner = $rowPost['userId'];

	$postBy = "SELECT * FROM users WHERE userId='$postOwner'";
	$runPostBy = $db->query($postBy);
	$rowPostBy = $runPostBy->fetch_assoc();

	$pPic = $rowPostBy['profilePic'];
	if (!$pPic) {
		$pPic = "images/user.jpg";
	}
	$postType = $rowPost['postType'];
	$postTypeId = $rowPost['postTypeId'];
	$phone = $rowPost['phone'];

	if (!$phone) {
		$phone = "Contact Owner";
	} else {
		$phone = chunk_split($phone, 3);
	}

	if ($rowPost['images'] != "null") {
		$carImages = unserialize($rowPost['images']);
		$path = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
	} else {
		$path = "images/default.jpg";
	}

	$tradeType = $rowPost['tradeType'];

	$price = $rowPost['price'];

	$datePosted = strtotime($rowPost['datePosted']);
	$newformat = date('M d, h:i a', $datePosted);

	if ($price == 0) {
		$trade = $tradeType;
	} else {
		$trade = "K " . number_format($price, 2, '.', ',');
	}

	//get the details
	$detailId = $postType . "Id";
	$dtl = "SELECT * FROM  $postType WHERE $detailId =$postTypeId";

	$runDtl = $db->query($dtl);
	if ($runDtl->num_rows > 0) {
		$resDtl = $runDtl->fetch_assoc();

		$description = $resDtl['description'];
		$saleRent = $resDtl['saleRent'];

		if ($postType == "automobile") {
			$make = $resDtl['make'];
			$model = $resDtl['model'];
			$mileage = $resDtl['mileage'];
			$bodyType = $resDtl['bodyType'];
			$year = $resDtl['year'];
			$transmission = $resDtl['transmission'];
			$fuelType = $resDtl['fuelType'];
			$color = $resDtl['color'];
			$description = $resDtl['description'];
		}
	}
	if ($postOwner != $userId) {
		
		//update the views
		$getcurrent = "SELECT MAX(views) FROM posts WHERE postId=$postId";
		$result = $db->query($getcurrent);

		$lastnum = $result->fetch_array();

		$value = $lastnum['MAX(views)'];

		if (!$value) {
            //set value
			$value = 1;

		} else {
            //increase by 1
			$value++;

		}
		$views = "UPDATE posts SET views='$value' WHERE  postId=$postId";
		$db->query($views) or die($db->error);

	}



} else {
	header('Location:index.php');
}

require_once 'includes/header.php';
?>

	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1>Ad Details</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Ads</li>
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->

		<div class="all-categories section">
			<div class="container">
				<div class="ad-details">
					<div class="row">
						<div class="col-md-8 col-sm-7">
							<div class="item">
		    					<div class="detail-item-image item-image carousel slide" data-ride="carousel">
		    						<div class="carousel-inner">
										<?php

									if ($rowPost['images'] != "null") {
										foreach ($carImages as $x => $imageName) {

											$imgSrc = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $imageName;

											if ($x == 0) {
												$active = "active";
											} else {
												$active = "";
											}

											?>
										<div class="item <?php echo $active; ?>">
		    								<img src="<?php echo $imgSrc; ?>" alt="" class="img-responsive">
		    							</div>
										<?php

								}
							} else { ?>
                        <div class="item active">
		    				<img src="<?php echo $path; ?>" alt="" class="img-responsive">
		    			</div>
                       
                        <?php

																						}
																						?>

		    							


		    						</div>
		    						<a class="left-control" href=".detail-item-image" role="button" data-slide="prev">
									    <i class="fa fa-angle-left" aria-hidden="true"></i>
									    <span class="sr-only">Previous</span>
								  	</a>
									  	<a class="right-control" href=".detail-item-image" role="button" data-slide="next">
									    <i class="fa fa-angle-right" aria-hidden="true"></i>
									    <span class="sr-only">Next</span>
								  	</a>
								  	<div class="item-price">
										<span><?php echo $trade; ?></span>
									</div>
								</div>
								<div class="details-description">
									<div class="item-info item-meta">
										<div class="item-post-date">
											<span><i class="fa fa-clock-o"></i><?php echo $newformat; ?></span>
										</div>
										<div class="ad-title">
											<h3><?php echo $rowPost['adTitle']; ?></h3>
										</div>
										<ul class="list-inline product-social">
											
											<li><a href="view.php?postId=<?php echo $postId ?>&&l=<?php echo $postId ?>&&u=<?php echo $userId ?>"><i class="<?php chckLike($postId, $userId); ?> fa-heart fa-lg" aria-hidden="true"  data-toggle="tooltip" title="Like"></i></a></li>
										
										</ul> 
									</div><!-- item-info -->
									<div class="item-info">
										<h4>Description</h4>
										<p><?php echo $description; ?></p>
									</div><!-- item-info -->
									<div class="item-info key-features">
										<h4>SPECIFICATION</h4>
										
										<?php
									if ($postType == "automobile") { ?>
										 <div class="media">

                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo ucfirst($make); ?></span>
                                            <span class="data-type">Make</span>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo $model; ?></span>
                                            <span class="data-type">Model</span>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo $year; ?></span>
                                            <span class="data-type">Year</span>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo $mileage; ?> Km</span>
                                            <span class="data-type">Mileage</span>
                                        </div>
                                    </div>
										 <div class="media">

                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo ucfirst($transmission); ?></span>
                                            <span class="data-type">Transmission</span>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo $fuelType; ?></span>
                                            <span class="data-type">Fuel</span>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo ucfirst($color); ?></span>
                                            <span class="data-type">Color</span>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading"> <?php echo ucfirst($saleRent); ?></span>
                                            <span class="data-type">Sale By</span>
                                        </div>
                                    </div>

									<?php

							}
							?>
										
										
									</div><!-- item-info -->
								</div>
		    				</div><!-- item -->
		    				<div class="location-map">
		    					<h4>Seller Location</h4>
		    					<div id="gmap"> Maps Comming Soon </div>
		    				</div><!-- location-map -->
						</div>


						<div class="col-sm-5 col-md-4">
							<div class="side-bar">
								<div class="item-author widget">
									<h4>Seller Info</h4>
									<div class="row">
										<div class="col-md-4">
											<div class="seller-image">
												<img class="img-responsive" src="<?php echo $pPic; ?>" alt="seller">
											</div>
										</div>
										<div class="col-md-8">
											<div class="seller-info">
												<p><span>Seller:</span> <a href="#"><?php echo $rowPostBy['firstName'] . " " . $rowPostBy['lastName'] ?> </a> <br />( <?php echo $saleRent; ?>)</p>
												<address>
													<span>Address:</span> <?php echo $rowPostBy['location'] ?>
												</address>
												<p><span>Phone :</span> <?php echo $rowPostBy['phone'] ?> </p>
												<p><a href="#">View other items of this seller</a></p>
											</div>
										</div>
									</div>
								</div>
								<div class="contact-seller widget">
									<h4>Contact Seller</h4>
									<?php echo '<h3> <a href="tel:' . $phone . '">' . $phone . '</a></h3>'; ?>
										<button type="submit" class="btn btn-primary">Send Message</button>
								</div>
																
								<div class="widget item-tag">
									<h4>Advert Space</h4>
									
								</div>
								
							</div><!-- side-bar -->
						</div>
					</div>
				</div>
			</div>
		</div> <!-- all-categories -->
	</div>	<!-- page -->
		
	
	<!-- footer -->
	<footer id="footer">
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="footer-widget about-widget">
							<h3>About Advert</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim</p>
							<br> <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="footer-widget link-widget">
							<h3>Useful Links</h3>
							<ul>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Support & Help</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Affiliate Program</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Knowledge Base</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Career With Us</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Contact</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> How It Works</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Advertise Policy</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Terms Of Service</a></li>
								<li><a href="#"> <i class="fa fa-angle-double-right"></i> Support</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="footer-widget contact-widget">
							<h3>Contact Us</h3>
							<ul>
								 <li><span><i class="fa fa-map-marker"></i> Address :</span> 123 Street, Your City, United States</li>
						         <li><span><i class="fa fa-phone"></i> Phone number :</span> (123) 456-7890</li>
						         <li><span><i class="fa fa-envelope"></i> E-mail :</span> <a href="mailto:#">yourmail@example.com</a></li>
						         <li>
						         	<ul class="list-inline social">
										<li><a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a></li>
										<li><a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a></li>
										<li><a class="google" href="#"><i class="fa fa-google-plus-square"></i></a></li>
										<li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
										<li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
									</ul>
						         </li>
					        </ul>
						</div>
					</div>
				</div>
			</div><!-- container -->
		</div><!-- footer-top -->
		

		<div class="footer-bottom clearfix">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<p>&copy; 2017 Advert. Design & Developed by <a href="http://gridbootstrap.com/">GridBootstrap</a></p>
					</div>
					<div class="col-sm-6">
						<div class="payment-opt-icons">
							<span>Payments </span>
							<ul>
	                            <li><img src="images/others/1.png" alt="" class="img-responsive"></li>
	                            <li><img src="images/others/2.png" alt="" class="img-responsive"></li>
	                            <li><img src="images/others/3.png" alt="" class="img-responsive"></li>
	                            <li><img src="images/others/4.png" alt="" class="img-responsive"></li>
	                            <li><img src="images/others/5.png" alt="" class="img-responsive"></li>
	                        </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!-- footer-bottom -->
	</footer><!-- footer -->

 	
	
     <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/map.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>