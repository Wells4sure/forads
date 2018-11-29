<?php
require_once 'app/scripts/sessions.php';
checkPage(true);

require_once "app/profile.php";
require_once 'includes/header.php';



?>

	<div class="page">
		<div id="breadcrumb-section" class="section">
			<div class="container">
				<div class="page-title text-center">
					<h1> My Profile</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">Profile</li>
					</ol>
				</div>
			</div>
		</div><!-- breadcrumb-section -->

		<div class="ad-post-wrapper section">
			<div class="container">
				<div class="blank-page">

					
					<div class="row">
					  <div class="col-xs-12 col-sm-4">
						  <div class="test-column">
							  
					  	<div class="list-group">
							<a href="profile.php" class="list-group-item ">Home</a>
							<a href="myads.php" class="list-group-item">My Ads <span class="badge pull-right"><?php echo $numberOfPosts ?></span></a>
							<a href="myfav.php" class="list-group-item ">Favorites <span class="badge pull-right"><?php echo $likedPost; ?></span></a>
							<a href="inbox.php" class="list-group-item "> Inbox <span class="badge pull-right"><?php echo $messagesReceived; ?></span></a>
							<a href="sent.php" class="list-group-item active"> Sent <span class="badge pull-right"><?php echo $messagesReceived; ?></span></a>
							
						</div>

					  	<div class="list-group">
							<a href="close-account.php" class="list-group-item ">Close Account</a>
						</div>
							
						  </div>
						</div>
					  <div class="col-xs-12 col-sm-8">
						  <div class="test-column ">
							<h2 class="title-2"><i class="fas fa-paper-plane "></i> SENT  </h2> <h4><span class="label label-danger"><?php echo $recieved; ?></span>  Unread</h4>
							<hr>
                    <table class="table table-striped table-hover" id="myAds">
                        <thead>
                        <th></th>
                        <th>To</th>
                        <th>Date</th>
                        <th>Option</th>
                        </thead>
                        <tbody>
								<?php


							$msg = "SELECT * FROM messages WHERE senderId=$userId ORDER BY `date` DESC";
							$runMsg = $db->query($msg);
							if ($runMsg->num_rows > 0) {
								while ($myMsgRow = $runMsg->fetch_assoc()) {
									$messageId = $myMsgRow['messageId'];
									$recieverId = $myMsgRow['recieverId'];

									//senderinfo
									$reciver = "SELECT * FROM users where userId=$recieverId";
									$runSeunder = $db->query($reciver);
									$senderResults = $runSeunder->fetch_assoc();
									$profilePic = $senderResults['profilePic'];

									if (!empty($profilePic)) {
										$profilePic = $profilePic;
									} else {
										$profilePic = "images/user.jpg";
									}
                                    //date date("F j, Y, g:i a");
									$msgdate = strtotime($myMsgRow['date']);
									$datePostedformat = date('F j, Y, g:i A', $msgdate);

	
									//check if it has a reply
									$checkSql = "SELECT * FROM reply WHERE messageId=$messageId AND reply_to=$userId";
									$runCheckSql = $db->query($checkSql) or die($db->error);
									$getCheck = $runCheckSql->fetch_assoc();

									$replyed = $getCheck['read'];

									if ($replyed == false) {
										$status = "success";
									} else {
										$status = "";
									}

									echo '
                                        <tr class="' . $status . ' clickable-row" data-href="sentMsg.php?messageId=' . $messageId . '">
                                            <td class="add-img-td" style="width:14%;"><img src="' . $profilePic . '" class="img img-responsive img-thumbnail" alt="img"></td>
                                            <td> <h4>' . $senderResults['firstName'] . ' ' . $senderResults['lastName'] . '</h4> </td>
                                            <td><b>' . $datePostedformat . '</b></td>
                                            <td> <a href="" class="btn btn-danger btn-sm">Delete</a> </td>
                                        </tr>
                                    ';
								}

							} else {
								echo '<tr>
                                <td colspan="5">No Messages Yet</td>
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

   $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
