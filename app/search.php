<?php
require_once 'scripts/conn.php';
$searchOutput = "";
if (isset($_GET['globalSearchBtn'])) {

    $sCategoryId = mysqli_real_escape_string($db, test_input($_GET["category"]));
    $province = mysqli_real_escape_string($db, test_input($_GET["province"]));
    $search = mysqli_real_escape_string($db, test_input($_GET["search"]));

    if (empty($sCategoryId)) {
        $sCategoryId = "";
    }
    if (empty($province)) {
        $province = "";
    }
    if (empty($search)) {
        $search = "";
    }
    $searchSql = "SELECT * FROM posts WHERE adTitle LIKE '%" . $search . "%' OR location LIKE '%" . $province . "%'  OR sCategoryId='$sCategoryId' ORDER BY `datePosted` DESC LIMIT 10";
    $runSearch = $db->query($searchSql);
    if ($runSearch->num_rows > 0) {
        while ($searchRow = $runSearch->fetch_assoc()) {
            $postId = $searchRow['postId'];
            $adTitle = $searchRow['adTitle'];
            $location = $searchRow['location'];
            $postType = $searchRow['postType'];
            $postOwner = $searchRow['userId'];

            if ($searchRow['images'] != "null") {
                $carImages = unserialize($searchRow['images']);
                $path = "UploadFolder/" . $postOwner . "/" . $postId . "/" . $carImages[0];
                $imgCount = count($carImages);
            } else {
                $path = "images/default.jpg";
            }

            $tradeType = $searchRow['tradeType'];

            $price = $searchRow['price'];
            $datePosted = strtotime($searchRow['datePosted']);
            $newformat = date('M d, h:i a', $datePosted);

            if ($price == 0) {
                $trade = $tradeType;
            } else {
                $trade = "K " . number_format($price, 2, '.', ',');
            }
            if ($postOwner == $userId) {
                $link = "editPost.php?postId=" . $postId;
            } else {
                $link = "view.php?postId=" . $postId;
            }

            $searchOutput .= '
                   			<li class="item-wrap">
							   <div class="item">
							    <div class="item-image">
									<a href="' . $link . '"><img src="' . $path . '" alt="" class="img-responsive"></a>
										<div class="item-price">
											<span>' . $trade . ' </span>
										</div> 
								</div>
										<div class="item-description">
										    <div class="item-meta">
												    <div class="item-post-date">
														<span>' . $newformat . '</span>
															</div>
															<ul class="list-inline product-social">
																<li><a href="#"><i class="fas fa-bookmark" aria-hidden="true"></i></a></li>
																<li><a href="#"><i class="far fa-heart" aria-hidden="true"></i></a></li>
																<li><a href="#"><i class="fas fa-share-alt" aria-hidden="true"></i></a></li>
															</ul>
														</div>
														<div class="item-title">
															<h3><a href="#">' . $adTitle . '</a></h3>
														</div>
										<div class="item-info">
											<p>' . $location . '</p>
										</div>
									</div><!-- item-description -->
							    </div><!-- item -->
							</li> <!-- item-wrap -->
            ';
        }

    } else {
        $searchOutput = "";
    }
}
?>