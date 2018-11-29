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


  
    <div class="row">
		<a href="#" class="btn btn-danger btn-sm " role="button">COMPOSE</a>
            <hr />
        <div class="col-sm-12 col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#inbox" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Inbox <span class="label label-danger"><?php echo $recieved;?></span></a></li>
                <li><a href="#sent" data-toggle="tab"><span class="glyphicon glyphicon-send"></span>
				Sent Mail <span class="badge"><?php echo $messagesSent;?></span> </a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="inbox">
                    <div class="list-group">
                        <?php
                            while($inbox=$runmessages->fetch_assoc()){
                                $senderId= $inbox['senderId'];
                                $timeDate= $inbox['date'];
                                $message= $inbox['message'];
                                $messageId= $inbox['messageId'];
                                $read= $inbox['read'];
                                //construct  all the details
                                $sender="SELECT * FROM users WHERE userId=$senderId";
                                $runSender=$db->query($sender);
                                $senderName=$runSender->fetch_assoc();
                                $fullName =$senderName['firstName'].' '.$senderName['lastName'];

                                $dateSent = strtotime($timeDate);
                                $newFormat = date('M d, h:i a', $dateSent);

                                if($read==false){
                                    $seen="read";
                                }else{
                                    $seen="";
                                }
                                
                                //construct Inbox
                                ?>
                                  <a href="#" class="list-group-item <?php echo $seen;?>">

                                    <span class="fas fa-trash" style="margin-right:50px;"></span>
                                    <span class="name" style="min-width: 120px; display: inline-block;"><?php echo $fullName;?></span>
                                    <span class="badge"><?php echo $newFormat;?></span>

                                  </a>
                                <?php
                            }
                            if($messagesReceived==0){
                                echo '<div class="list-group-item">
                                <span class="text-center">Your Inbox is empty.</span>
                            </div>';
                                
                            }
                        ?>

                    </div>
                </div>
                <div class="tab-pane fade in" id="sent">
                <div class="list-group">
                            <?php
                             while($sent=$runmessagesSent->fetch_assoc()){
                                $recieverId= $sent['recieverId'];
                                $timeDateSent= $sent['date'];
                                $messageSent= $sent['message'];
                                $messageId= $sent['messageId'];
                                $read= $sent['read'];

                                 //construct  all the details
                                 $receiver="SELECT * FROM users WHERE userId=$recieverId";
                                 $runreceiver=$db->query($receiver);
                                 $receiverName=$runreceiver->fetch_assoc();
                                 $fullName2 =$receiverName['firstName'].' '.$receiverName['lastName'];
 
                                 $dateSent2 = strtotime($timeDateSent);
                                 $newFormatsent = date('M d, h:i a', $dateSent2);
 
                                   //construct Inbox
                                   ?>
                                   <a href="#" class="list-group-item <?php echo $seen;?>">
 
                                     <span class="fas fa-trash" style="margin-right:50px;"></span>
                                     <span class="name" style="min-width: 120px; display: inline-block;"><?php echo $fullName2;?></span>
                                     <span class="badge"><?php echo $newFormatsent;?></span>
 
                                   </a>
                                 <?php

                             }
                             if($messagesSent==0){

                            
                            ?>
                

                   
                        <div class="list-group-item">
                            <span class="text-center">This tab is empty.</span>
                        </div>
                    </div>
<?php  }?>
                </div>
              
            
            </div>
           
        </div>
    </div>




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
