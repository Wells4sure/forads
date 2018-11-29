<?php
require_once 'app/scripts/sessions.php';
require_once 'includes/header.php';
?>
	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1>All Categories Ad Post</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">All Ads</li>
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->
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


		<div class="all-categories section">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="sidebar">
							<div class="filter-list">
								<h4 class="list-title"><a href="categories.html">Categories</a></h4>
								<ul class="list-group">
									<li><a href="sub-categories.html">Cars & Vehicles <span>(2056)</span></a> </li>
									<li><a href="#">Property <span>(1317)</span></a></li>
									<li><a href="#">Electronics <span>(1094)</span></a></li>
									<li><a href="#">Sports & Games <span>(1632)</span></a></li>
									<li><a href="#">Books & Megazine <span>(109)</span></a></li>
									<li><a href="#">Real Estate <span>(109)</span></a></li>
									<li><a href="#">Household <span>(121)</span></a></li>
									<li><a href="#">Accessories <span>(542)</span></a></li>
									<li><a href="#">Others <span>(42)</span></a></li>
								</ul>
							</div><!-- filter-list -->

							<div class="filter-list">
								<h4 class="list-title">Location</h4>
								<ul class="list-group">
									<li><a href="#">Australia <span>(56)</span></a> </li>
									<li><a href="#">Argentina <span>(17)</span></a></li>
									<li><a href="#">Brazil <span>(109)</span></a></li>
									<li><a href="#">Canada <span>(219)</span></a></li>
									<li><a href="#">China <span>(21)</span></a></li>
									<li><a href="#">India <span>(632)</span></a></li>
									<li><a href="#">Japan <span>(42)</span></a></li>
									<li><a href="#">United Kingdom <span>(441)</span></a></li>
									<li><a href="#">United States <span>(52)</span></a></li>
								</ul>
							</div><!-- filter-list -->

							<div class="filter-list brand-list">
								<h4 class="list-title">Brands</h4>
								<ul class="list-group checkbox">
									<li><label for="samsung"><input type="checkbox" name="samsung" id="samsung"> Samsung</label></li>
									<li><label for="apple"><input type="checkbox" name="apple" id="apple"> Apple</label></li>
									<li><label for="lg"><input type="checkbox" name="lg" id="lg"> LG</label></li>
									<li><label for="xiaomi"><input type="checkbox" name="xiaomi" id="xiaomi"> Xiaomi</label></li>
									<li><label for="nokia"><input type="checkbox" name="nokia" id="nokia"> Nokia</label></li>
									<li><label for="huawei"><input type="checkbox" name="huawei" id="huawei"> Huawei</label></li>
									<li><label for="alcatel"><input type="checkbox" name="alcatel" id="alcatel"> Alcatel</label></li>
								</ul>
							</div><!-- filter-list -->

							
							<div class="filter-list">
								<div id="advanced-filter">
									<div class="filter-heading">
										<a data-toggle="collapse" data-parent="#advanced-filter" href="#advanced">
											<h4 class="list-title">Advanced Filter<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
										</a>
									</div><!-- filter-heading -->

									<div id="advanced" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											<h5>Conditions</h5>
											<ul class="list-group checkbox">
												<li><label for="new"><input type="checkbox" name="new" id="new">New</label></li>
												<li><label for="likeNew"><input type="checkbox" name="likeNew" id="likeNew"> Like New</label></li>
												<li><label for="used"><input type="checkbox" name="used" id="used"> Used</label></li>
												<li><label for="excellent"><input type="checkbox" name="excellent" id="excellent"> Excellent</label></li>
												<li><label for="good"><input type="checkbox" name="good" id="good"> Good</label></li>
												<li><label for="fair"><input type="checkbox" name="fair" id="fair"> Fair</label></li>
											</ul>
											<h5>Price Range</h5>
											<div class="price-range">
												<label for="min"><input type="text" id="min" title="minimum price" placeholder="min" value=""></label>
												<label for="max"><input type="text" id="max" title="maximum price" placeholder="max" value=""></label>
												<button type="submit" class="btn btn-primary">Update Search</button>
											</div>
										</div><!-- panel-body -->
									</div>
								 </div><!-- advanced-filter -->
							</div><!-- filter-list -->
						</div><!-- sidebar -->
					</div><!-- col-sm-4 -->

					<div class="col-md-9 col-sm-8">
						<div class="category-adds">
							<div id="category-tab">
								<div class="tab-view">
									<ul class="list-inline">
										<li class="grid-view-tab"><i class="fa fa-th-large" aria-hidden="true"></i></li>
										<li class="small-view-tab active"><i class="fa fa-th" aria-hidden="true"></i></li>
										<li class="list-view-tab"><i class="fa fa-th-list" aria-hidden="true"></i></li>
									</ul>
								</div>
								<div class="category-tab">
									<ul class="nav nav-tabs" role="tablist">
									   <li role="presentation" class="active"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent</a></li>
									   <li role="presentation"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a></li>
									   <li role="presentation"><a href="#Random" aria-controls="Random" role="tab" data-toggle="tab">Random</a></li>
									</ul>
									<!-- Tab panes -->

								  	<div class="tab-content small-view-tab">
								    	<div role="tabpanel" class="tab-pane active" id="recent">
								    		<ul>
								    			<li class="item-wrap">
								    				<div class="item">
								    					<div class="item-image">
															<a href="details.html"><img src="images/item/1.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Dial Metal Wrist Watch</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
								    				</div><!-- item -->
								    			</li> <!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
								    					<div class="item-image">
															<a href="details.html"><img src="images/item/2.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$649</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Dec 29, 10:39 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Nikon 24.2MP Digital SLR</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
								    				</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
								    					<div class="item-image">
															<a href="details.html"><img src="images/item/3.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$399</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Dec 28, 14:54 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">CompBook 1.6-inch Laptop</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
								    				</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
								    					<div class="item-image">
															<a href="details.html"><img src="images/item/4.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$19</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Dec 21, 09:23 am</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Disital Multi Headphone</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
								    				</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/5.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$3950</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Dec 31, 12:59 am</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Diecast Model Motorcycle</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/6.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$545</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Dec 29, 11:32 am</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Lenovo Ideapad Laptop</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/13.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/15.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->
								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/7.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->
								    		</ul>
								    	</div> <!--tab-pane-->

								    	<div role="tabpanel" class="tab-pane" id="popular">
								    		<ul>
								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/7.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/8.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->	

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/9.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
								    					<div class="item-image">
															<a href="details.html"><img src="images/item/10.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/11.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->
								    		</ul>
								    	</div><!-- tab-pane -->	

								    	<div role="tabpanel" class="tab-pane" id="Random">
								    		<ul>
								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/12.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/13.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/14.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->

								    			<li class="item-wrap">
								    				<div class="item">
														<div class="item-image">
															<a href="details.html"><img src="images/item/15.jpg" alt="" class="img-responsive"></a>
															<div class="item-price">
																<span>$45</span>
															</div> 
														</div>
														<div class="item-description">
															<div class="item-meta">
																<div class="item-post-date">
																	<span>Today, 12:29 pm</span>
																</div>
																<ul class="list-inline product-social">
																	<li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="item-title">
																<h3><a href="#">Product Title Goes Here</a></h3>
															</div>
															<div class="item-info">
																<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit.</p>
															</div>
														</div><!-- item-description -->
													</div><!-- item -->
								    			</li><!-- item-wrap -->
								    		</ul>
								    	</div><!-- tab-pane-->	
								  	</div>
								</div>
							</div><!-- category-tab-->	
						</div>
						<div class="pager-section">
							<ul class="pagination ">
								<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li class="active"><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">6</a></li>
								<li><a href="#">7</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div><!-- pager-section -->
					</div>
				</div>
			</div>
		</div> <!-- all-categories -->
	</div>	<!-- page -->
		
	
<?php
require_once 'includes/footer.php';
?>