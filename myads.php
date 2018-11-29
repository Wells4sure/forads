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
						  <div class="test-column ">
							<h2 class="title-2"><i class="fas fa-list-alt "></i> MY ADS </h2> 
							<hr>
                    <table class="table table-striped table-hover" id="myAds">
                        <thead>
                        <th>Photo</th>
                        <th>Adds Details</th>
                        <th>Price</th>
                        <th>Option</th>
                        </thead>
                        <tbody>
								<?php 

							$myads = "SELECT * FROM posts WHERE userId=$userId";
							$runMyads = $db->query($myads);
							if ($runMyads->num_rows > 0) {
								while ($myadsRow = $runMyads->fetch_assoc()) {
									$postId = $myadsRow['postId'];
									$postOwner = $myadsRow['userId'];
									$price = $myadsRow['price'];
									$tradeType = $myadsRow['tradeType'];
									if ($myadsRow['images'] != "null") {
										$carImages = unserialize($myadsRow['images']);
										$path = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
									} else {
										$path = "images/default.jpg";
									}
									if ($price == 0) {
										$trade = $tradeType;
									} else {
										$trade = "K " . number_format($price, 2, '.', ',');
									}
                                    //likes
									$likes = "SELECT * FROM likes WHERE postId=$postId";
									$runLikes = $db->query($likes);
									$likes = 0;
									if ($runLikes->num_rows > 0) {
										$likes = $runLikes->num_rows;
									}
                                    //date date("F j, Y, g:i a");
									$datePosted = strtotime($myadsRow['datePosted']);
									$datePostedformat = date('F j, Y, g:i A', $datePosted);

									echo '
                                        <tr>
                                            <td class="add-img-td" style="width:14%;"><img src="' . $path . '" class="img img-responsive img-thumbnail" alt="img"></td>
                                            <td> <h4>' . $myadsRow['adTitle'] . '</h4>
                                            <strong>Posted on: </strong> ' . $datePostedformat . '<br> 
                                            <strong>Views: </strong> ' . $myadsRow['views'] . '<br> 
                                           <strong> Likes: </strong> ' . $likes . '<br> 
                                            </td>
                                            <td><b>' . $trade . '</b></td>
                                            <td> <a href="#" class="btn btn-primary btn-sm">Edit</a> <br/> <br/> <a href="#" class="btn btn-danger btn-sm">Delete</a> </td>
                                        </tr>
                                    ';
								}

							} else {
								echo '<tr>
                                <td colspan="5">No Posts Yet</td>
                                </tr>';
							}
							?>
                        </tbody>
                    </table>

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

 $('#myAds').DataTable();
});
</script>
