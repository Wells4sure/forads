<?php
require_once 'app/scripts/sessions.php';
require_once "app/search.php";
require_once 'includes/header.php';
function isValue($value)
{
	$test = $_GET['province'];
	$test2 = $_GET['category'];
	if ($test == $value || $test2 == $value) {
		return 'selected="TRUE"';
	} else {
		return "";
	}
}
?>
	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1>Search Result</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Search</li>
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
									<option value="" <?php echo isValue(''); ?>>All Categories</option>
									<option value="1"<?php echo isValue('1'); ?>>Cars & Vehicles</option>
									<option value="8"<?php echo isValue('8'); ?>>Property & Real Estate</option>
									<option value="14"<?php echo isValue('14'); ?>>Electronics </option>
									<option value="3"<?php echo isValue('3'); ?>>Jobs </option>
									<option value="5"<?php echo isValue('5'); ?>>Pets </option>

								</select>
							</li>
							<li class="form-group">
								<select name="province" class="form-control" placeholder="province">
								 <option value="" <?php echo isValue(''); ?>>All Provinces</option>
                               <option <?php echo isValue('Central'); ?>> Central</option>
                                <option <?php echo isValue('Copperbelt'); ?>>Copperbelt</option>
                                <option <?php echo isValue('Eastern'); ?>>Eastern </option>
                                <option <?php echo isValue('Luapula'); ?>>Luapula </option>
                                <option <?php echo isValue('Lusaka'); ?>>Lusaka </option>
                                <option <?php echo isValue('Muchinga'); ?>>Muchinga </option>
                                <option <?php echo isValue('Northern'); ?>>Northern </option>
                                <option <?php echo isValue('North-Western'); ?>>North-Western </option>
                                <option <?php echo isValue('Southern'); ?>>Southern </option>
                                <option <?php echo isValue('Western'); ?>>Western </option>

								</select>
							</li>
							<li class="form-group">
								<input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" class="form-control" placeholder="What are you looking for ?" autofocus >
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
								<div class="search-view">
									<div class="search-info">
										<h3><?php echo $runSearch->num_rows; ?> Results found</h3>
									</div>
									<div class="tab-view">
										<ul class="list-inline">
											<li class="grid-view-tab"><i class="fa fa-th-large" aria-hidden="true"></i></li>
											<li class="small-view-tab active"><i class="fa fa-th" aria-hidden="true"></i></li>
											<li class="list-view-tab"><i class="fa fa-th-list" aria-hidden="true"></i></li>
										</ul>
									</div>
								</div>
								<div class="category-tab">
								  	<div class="tab-content small-view-tab">
								    	<ul>
											<?php
										echo $searchOutput;
										?>

							    			
							    		</ul>
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