<?php
require_once 'app/scripts/sessions.php';
checkPage(true);
if (!$_REQUEST['messageId']) {
	header('location:inbox.php');
} else {
	$messageId = $_REQUEST['messageId'];
}
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
							<a href="inbox.php" class="list-group-item active"> Inbox <span class="badge pull-right"><?php echo $messagesReceived; ?></span></a>
							
						</div>

					  	<div class="list-group">
							<a href="close-account.php" class="list-group-item ">Close Account</a>
						</div>
							
						  </div>
						</div>
					  <div class="col-xs-12 col-sm-8">
						  <div class="test-column ">
							<h2 class="title-2"><i class="fas fa-envelope-open-text  "></i> Message  </h2> <h4><a href="inbox.php" class="btn btn-danger"><i class="fas fa-long-arrow-alt-left fa-2x"></i></a></h4>
							<hr>
<?php 
if ($error != "") {
	?>
			  	<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fas fa-ban fa-lg"></i></strong> <?php echo $error; ?>
				</div>
<?php 
} ?>
<?php 
if ($success != "") {
	?>
			  	<div class="alert alert-success alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fas fa-check fa-lg"></i></strong> <?php echo $success; ?>
				</div>
<?php 
} ?>



							<?php
						$msg = "SELECT * FROM messages WHERE messageId=$messageId";
						$runMsg = $db->query($msg);
						while ($msgResults = $runMsg->fetch_assoc()) {;

							$sender = $msgResults['senderId'];
							$receiverId = $msgResults['recieverId'];
						//make sure the receiver matches the session

							if ($userId == $receiverId) {
							//get the details
								$users = "SELECT * FROM users WHERE userId=$sender";
								$runUsers = $db->query($users);
								$getUser = $runUsers->fetch_assoc();
								$sendersName = $getUser['firstName'] . ' ' . $getUser['lastName'];

								$profilePic = $getUser['profilePic'];

								if (!empty($profilePic)) {
									$path = $profilePic;
								} else {
									$path = "images/user.jpg";
								}

								$msgdate = strtotime($msgResults['date']);
								$datePostedformat = date('g:i A | F j,', $msgdate);

								//mark as read
								$mark = "UPDATE messages SET `read`=true WHERE messageId=$messageId";
								$db->query($mark) or die($db->error);


								?>
							<div class="messaging">
								<div class="inbox_msg">
									<div class="mesgs">
									<div class="msg_history">
										<div class="incoming_msg">
										<div class="incoming_msg_img"> <img src="<?php echo $path ?>" alt="sunil"> </div>
										<div class="received_msg">
											<div class="received_withd_msg">
											<p><?php echo $msgResults['message']; ?></p>
											<span class="time_date"> <?php echo $datePostedformat; ?></span></div>
										</div>
										</div>
									<?php
									//replay
								$reply = "SELECT * FROM messages WHERE senderId=$userId";
								$runReply = $db->query($reply);
								$getReply = $runReply->fetch_assoc();
								if ($getReply) {

									$read = $getReply['read'];
									if ($read == true) {
										$seen = '<i class="fas fa-eye"></i>';
									} else {
										$seen = '';
									}
									$replyTime = strtotime($getReply['date']);
									$dateReply = date('g:i A | F j,', $replyTime);


									?>
										<div class="outgoing_msg">
										<div class="sent_msg">
											<p><?php echo $getReply['message'] ?></p><?php echo $seen; ?>
											<span class="time_date"><?php echo $dateReply; ?></span> </div>
										</div>
							<?php 

					} ?>
									</div>
									<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?messageId=<?php echo $messageId ?>" method="post"  class="form" role="form"  >
									<div class="type_msg">
										<div class="input_msg_write">
										<input type="text" class="write_msg" name="reply" placeholder="Reply...." />
										<input type="hidden" class="write_msg" name="replyto" value="<?php echo $sender; ?>" readonly/>
										<input type="hidden" class="write_msg" name="messageId" value="<?php echo $messageId; ?>"readonly />
										<button class="msg_send_btn" type="submit" name="replyBtn"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
										</div>
									</div>
									</form>
									</div>
								</div>
                   

				   <?php

					}
				}
				?>
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

 
});
</script>
