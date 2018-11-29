<?php
require_once 'app/scripts/sessions.php';
require_once 'includes/header.php';
?>

	<div class="home-page">
		<div id="home-section" class="parallax-section carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active" style="background-image:url(images/bg/slide1.jpg)">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<div class="slider-content">
									<h1 data-animation="animated lightSpeedIn">Welcome</h1>
									<h2 data-animation="animated lightSpeedIn">To Forads</h2>
									<p data-animation="animated lightSpeedIn">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
										nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
									<div class="ad-btn">
										<a href="#" class="btn btn-primary" data-animation="animated lightSpeedIn">View Ads</a>
									</div>
								</div>
							</div>
						</div><!-- row -->
					</div><!-- contaioner -->
				</div><!-- item -->

				<div class="item" style="background-image:url(images/bg/slide2.jpg)">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<div class="slider-content">
									<h1 data-animation="animated lightSpeedIn">Advertise For Free</h1>
									<h2 data-animation="animated lightSpeedIn">Share Your Products with The World </h2>
									<p data-animation="animated lightSpeedIn">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
										nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
									<div class="ad-btn">
										<a href="#" class="btn btn-primary" data-animation="animated lightSpeedIn">View Ads</a>
									</div>
								</div>
							</div>
						</div><!-- row -->
					</div><!-- contaioner -->
				</div><!-- item -->
				<div class="item" style="background-image:url(images/bg/slide3.jpg)">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<div class="slider-content">
									<h1 data-animation="animated lightSpeedIn">Sale Sale!</h1>
									<h2 data-animation="animated lightSpeedIn">Maximize Possibilities</h2>
									<p data-animation="animated lightSpeedIn">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
										nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
									<div class="ad-btn">
										<a href="#" class="btn btn-primary" data-animation="animated lightSpeedIn">View Ads</a>
									</div>
								</div>
							</div>
						</div><!-- row -->
					</div><!-- contaioner -->
				</div><!-- item -->
			</div>
			<a class="left carousel-control" href="#home-section" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#home-section" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div><!-- #home-section -->

		<div id="search-section">
			<div class="container">
				 <form action="search.php" method="get">
					<div class="search-section">
						<ul>
							<li class="form-group">
								<select name="category" class="form-control" placeholder="province">
									<option value="" selected="">All Categories</option>
									<option>Cars & Vehicles</option>
									<option>Property & Real Estate</option>
									<option>Electronics </option>
									<option>Jobs </option>
									<option>Pets </option>

								</select>
							</li>
							<li class="form-group">
								<select name="province" class="form-control" placeholder="province">
									<option value="" selected="">All Provinces</option>
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
							</li>
							<li class="form-group">
								<input type="text" name="search" class="form-control" placeholder="What are you looking for ?" autofocus >
							</li>
							<li class="form-group">
								<button type="submit" name="globalSearchBtn" class="form-control btn btn-primary" value="Search">Search</button>
							</li>
						</ul>
					</div>
				</form>
			</div>
		</div>
		<!-- search-section -->


		<!-- avt-category -->
		<div id="avt-category" class="clearfix">
			<div class="container">
				<div class="section services">
					<div class="section-title">
						<div class="title-content">
							<h2>Browse Categories</h2>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="category-avt">
								<div class="category-icon">
									<a href="#"><img src="images/icon/1.png" alt="images" class="img-responsive"></a>
								</div>
								<h5><a href="categories.php?catId=1">Cars & Vehicles <span>(2056 ads)</span></a> </h5>
							</div><!-- category-avt -->
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="category-avt">
								<div class="category-icon">
									<a href="#"><img src="images/icon/2.png" alt="images" class="img-responsive"></a>
								</div>
								<h5><a href="#">Property <span>(1317 ads)</span></a> </h5>

							</div><!-- category-avt -->
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="category-avt">
								<div class="category-icon">
									<a href="#"><img src="images/icon/3.png" alt="images" class="img-responsive"></a>
								</div>
								<h5><a href="#">Electronics <span>(1094 ads)</span></a> </h5>
							</div><!-- category-avt -->
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="category-avt">
								<div class="category-icon">
									<a href="#"><img src="images/icon/4.png" alt="images" class="img-responsive"></a>
								</div>
								<h5><a href="#">Jobs <span>(794 ads)</span></a> </h5>
		
							</div><!-- category-avt -->
						</div>

					</div>
				</div><!-- services -->
			</div><!-- container -->
		</div><!-- category-avt -->

		<div id="call-to-act">
			<div class="container">
				<div class="call-to-act">
					<h1><span>Start Your Selling </span> With Us For Free</h1>
					<p>You Can advertise your Products and Services with us. Let The nation and the world at lager see what you have to offer. Get Started now by Registering to our growing Market </p>
					<a href="signup.php" class="btn btn-primary">Signup Now</a>
				</div>
			</div>
		</div><!-- #call-to-act -->




		<div class="section">
			<div class="container">
				<div class="section-title">
					<div class="title-content">
						<h2>Browse Advertisement</h2>
					</div>
				</div>
				<div class="category-adds">
					<div id="category-tab">
						<div class="tab-view">
							<ul class="list-inline">
								<li class="grid-view-tab"><i class="fas fa-th-large" aria-hidden="true"></i></li>
								<li class="small-view-tab"><i class="fas fa-th" aria-hidden="true"></i></li>
								<li class="list-view-tab active"><i class="fas fa-th-list" aria-hidden="true"></i></li>
							</ul>
						</div>
						<div class="category-tab">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent</a></li>
								<li role="presentation"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a></li>
							</ul>
							<!-- Tab panes -->

							<div class="tab-content list-view-tab">
								<div role="tabpanel" class="tab-pane active" id="recent">
									<ul>

									<?php 
									//get 10 new posts
								$posts = "SELECT * FROM `posts` ORDER BY `datePosted` DESC LIMIT 10";
								$runPosts = $db->query($posts);
								if ($runPosts->num_rows > 0) {
									$cnt = 1;
									while ($postRow = $runPosts->fetch_assoc()) {
										$postId = $postRow['postId'];
										$postOwner = $postRow['userId'];
										$views = $postRow['views'];

										//define the path
										if ($postRow['images'] != "null") {
											$carImages = unserialize($postRow['images']);
											if (count($carImages) <= 1) {
												$path = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
												$path1 = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
												$path2 = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
											} else {
												if (count($carImages) < 3) {
													$path = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
													$path1 = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[1];
													$path2 = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
												} else {
													$path = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
													$path1 = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[1];
													$path2 = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[2];
												}
											}



										} else {
											$path = "images/default.jpg";
											$path1 = "images/default.jpg";
											$path2 = "images/default.jpg";
										}
										$adTitle = $postRow['adTitle'];
										$tradeType = $postRow['tradeType'];
										$price = $postRow['price'];

										$datePosted = strtotime($postRow['datePosted']);
										$newformat = date('M d, h:i a', $datePosted);

										if ($price == 0) {
											$trade = $tradeType;
										} else {
											$trade = "K " . number_format($price, 2, '.', ',');
										}
                       
                       					//generate view link
										$link = "view.php?postId=" . $postId;
									
										//likes
										$likes = "SELECT * FROM likes WHERE postId=$postId";
										$runLikes = $db->query($likes);
										$likes = 0;
										if ($runLikes->num_rows > 0) {
											$likes = $runLikes->num_rows;
										}
										//construct the post here
										?>
										<li class="item-wrap">
											<div class="item">
												<div class="item-image-carousel-<?php echo $cnt; ?> item-image carousel slide" data-ride="carousel" data-interval="false">
													<div class="carousel-inner">
														<div class="item active">
															<a href="<?php echo $link ?>"><img src="<?php echo $path; ?>" alt="" class="img-responsive"></a>
														</div>
														<div class="item">
															<a href="<?php echo $link ?>"><img src="<?php echo $path1; ?>" alt="" class="img-responsive"></a>
														</div>
														<div class="item">
															<a href="<?php echo $link ?>"><img src="<?php echo $path2; ?>" alt="" class="img-responsive"></a>
														</div>
													</div>
													<a class="left-control" href=".item-image-carousel-<?php echo $cnt; ?>" role="button" data-slide="prev">
														<i class="fa fa-angle-left" aria-hidden="true"></i>
														<span class="sr-only">Previous</span>
													</a>
													<a class="right-control" href=".item-image-carousel-<?php echo $cnt; ?>" role="button" data-slide="next">
														<i class="fa fa-angle-right" aria-hidden="true"></i>
														<span class="sr-only">Next</span>
													</a>
													<div class="item-price">
														<span><?php echo $trade; ?></span>
													</div>
												</div>
												<div class="item-description">
													<div class="item-meta">
														<div class="item-post-date">
															<span><?php echo $newformat; ?></span>
														</div>
														<ul class="list-inline product-social">
														
															<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?&&l=<?php echo $postId ?>&&u=<?php echo $userId ?>"><i class="<?php chckLike($postId, $userId); ?> fa-heart " aria-hidden="true"  data-toggle="tooltip" title="Like This"></i> <?php echo $likes;?></a></li>
															<li><small><?php echo $views;?> Views</small></li>
												
														</ul>
													</div>
													<div class="item-title">
														<h3 id="adTitle"><a href="<?php echo $link ?>" ><?php echo $adTitle ?></a></h3>
													</div>
													<div class="item-info">
														<p><?php echo $postRow['location']; ?></p>
													</div>
												</div><!-- item-description -->
											</div><!-- item -->
										</li><!-- item-wrap -->

										<?php
									$cnt++;
								}
							}else{
								?>
						<div class="col-md-5 col-md-offset-4">
						<div class="user-form text-center text-defualt">
						<h3>No Posts Yet </h3>
							<div class="icon-object2 border-success2 text-success2">
								<a href="post.php" class="btn btn-primary btn-lg">Post For Free</a>
							</div>
							
						</div>
					</div>
								<?php
						
							}
							?>

									</ul>
								</div>
								<!--tab-pane-->

								<div role="tabpanel" class="tab-pane" id="popular">
									<ul>
								<?php 
									//get 10 new posts
									$popularPosts = "SELECT * FROM `posts` WHERE  views > 100 ORDER BY `datePosted` DESC LIMIT 10";
									$runPopularPosts =$db->query($popularPosts)or die($db->error);
								if ($runPopularPosts->num_rows > 0) {
									$popularCnt = 1;
									while ($popularPostRow = $runPopularPosts->fetch_assoc()) {
										$popularPostId = $popularPostRow['postId'];
										$popularPostOwner = $popularPostRow['userId'];
										$popularViews = $popularPostRow['views'];

										//define the path
										if ($popularPostRow['images'] != "null") {
											$carImages = unserialize($popularPostRow['images']);
											if (count($carImages) <= 1) {
												$popularPath = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[0];
												$popularPath1 = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[0];
												$popularPath2 = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[0];
											} else {
												if (count($carImages) < 3) {
													$popularPath = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[0];
													$popularPath1 = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[1];
													$popularPath2 = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[0];
												} else {
													$popularPath = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[0];
													$popularPath1 = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[1];
													$popularPath2 = "UploadFolder/" . $popularPostOwner . "/" . $popularPostId . "/" . $carImages[2];
												}
											}



										} else {
											$popularPath = "images/default.jpg";
											$popularPath1 = "images/default.jpg";
											$popularPath2 = "images/default.jpg";
										}
										$adTitle = $popularPostRow['adTitle'];
										$tradeType = $popularPostRow['tradeType'];
										$price = $popularPostRow['price'];

										$datePosted = strtotime($popularPostRow['datePosted']);
										$newformat = date('M d, h:i a', $datePosted);

										if ($price == 0) {
											$trade = $tradeType;
										} else {
											$trade = "K " . number_format($price, 2, '.', ',');
										}
                       
                       					//generate view link
										$link = "view.php?postId=" . $popularPostId;
										
	//likes
	$popularLikes = "SELECT * FROM likes WHERE postId=$popularPostId";
	$runLikes = $db->query($popularLikes);
	$popularLikes = 0;
	if ($runLikes->num_rows > 0) {
		$popularLikes = $runLikes->num_rows;
	}
										//construct the post here
										?>
										<li class="item-wrap">
											<div class="item">
												<div class="item-image-carousel-<?php echo $popularCnt; ?> item-image carousel slide" data-ride="carousel" data-interval="false">
													<div class="carousel-inner">
														<div class="item active">
															<a href="<?php echo $link ?>"><img src="<?php echo $popularPath; ?>" alt="" class="img-responsive"></a>
														</div>
														<div class="item">
															<a href="<?php echo $link ?>"><img src="<?php echo $popularPath1; ?>" alt="" class="img-responsive"></a>
														</div>
														<div class="item">
															<a href="<?php echo $link ?>"><img src="<?php echo $popularPath2; ?>" alt="" class="img-responsive"></a>
														</div>
													</div>
													<a class="left-control" href=".item-image-carousel-<?php echo $popularCnt; ?>" role="button" data-slide="prev">
														<i class="fa fa-angle-left" aria-hidden="true"></i>
														<span class="sr-only">Previous</span>
													</a>
													<a class="right-control" href=".item-image-carousel-<?php echo $popularCnt; ?>" role="button" data-slide="next">
														<i class="fa fa-angle-right" aria-hidden="true"></i>
														<span class="sr-only">Next</span>
													</a>
													<div class="item-price">
														<span><?php echo $trade; ?></span>
													</div>
												</div>
												<div class="item-description">
													<div class="item-meta">
														<div class="item-post-date">
															<span><?php echo $newformat; ?></span>
														</div>
														<ul class="list-inline product-social">
														
														<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?&&l=<?php echo $popularPostId ?>&&u=<?php echo $userId ?>"><i class="<?php chckLike($popularPostId, $userId); ?> fa-heart " aria-hidden="true"  data-toggle="tooltip" title="Like This"></i> <?php echo $popularLikes;?></a></li>
															<li><small><?php echo $popularViews;?> Views</small></li>
												
														</ul>
													</div>
													<div class="item-title">
														<h3 ><a href="<?php echo $link ?>" id="adTitle"><?php echo $adTitle ?></a></h3>
													</div>
													<div class="item-info">
														<p><?php echo $popularPostRow['location']; ?></p>
													</div>
												</div><!-- item-description -->
											</div><!-- item -->
										</li><!-- item-wrap -->

										<?php
									$popularCnt++;
								}
							}else{
								?>
								<div class="col-md-5 col-md-offset-4">
								<div class="user-form text-center text-defualt">
								<h3>No Posts Yet </h3>
									<div class="icon-object2 border-success2 text-success2">
										<a href="post.php" class="btn btn-primary btn-lg">Post For Free</a>
									</div>
									
								</div>
							</div>
										<?php
						
							}
							?>

									</ul>
								</div><!-- tab-pane -->

							
							</div>
						</div>
					</div><!-- category-tab-->
				</div>
				<div class="view-all-ads text-center">
					<a href="#" class="btn btn-primary">View All Ads</a>
				</div>
			</div>
		</div><!-- category-tab-->

		<!-- newsletter -->
		<div id="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="newsletter">
							<p>Sign up with your email to get latest updates and offers</p>
							<div class="input-email">
								<input type="email" placeholder="Enter your email address" name="email" id="email">
								<input type="submit" class="btn btn-primary" value="Subscribe Now">
							</div>
						</div>
					</div>
				</div>
			</div><!-- contaioner -->
		</div><!-- #newsletter -->

	</div><!-- .home-page -->
<?php
require_once 'includes/footer.php';
?>
