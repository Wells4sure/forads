
<div class="container" style="margin-top: 20px; margin-bottom: 10px;">
	<div class="row panel">
		<div class="col-md-4 bg_blur" style=" background-image:url('<?php echo $pProfilePic; ?>');"></div>
        <div class="col-md-8  col-xs-12">
           <img src="<?php echo $pProfilePic; ?>" class="img-circle profilePic  picture hidden-xs" />
           <img src="<?php echo $pProfilePic; ?>" class="img-circle profilePic  visible-xs picture_mob" />
           <div class="header">
				<h2><?php echo $name; ?></h2>
				<button type="button" class="btn btn-default btn-lg" id="myBtn">Change Profile Picture</button>

           </div>
        </div>
    </div>   
    
	<div class="row nav profileNav">    
        <div class="col-md-4"></div>
        <div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
            <div class="col-md-4 col-xs-4 profileWell well" onclick="window.location='inbox.php'"><i class="fas fa-envelope "></i> <?php echo str_pad($messagesReceived, 2, 0, STR_PAD_LEFT); ?></div>
            <div class="col-md-4 col-xs-4 profileWell well"><i class="fas fa-heart "></i> <?php echo str_pad($likedPost, 2, 0, STR_PAD_LEFT); ?></div>
            <div class="col-md-4 col-xs-4 profileWell well"><i class="fas fa-list-alt "></i> <?php echo str_pad($numberOfPosts, 2, 0, STR_PAD_LEFT); ?></div>
        </div>
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class ="modalh4"><span class="glyphicon glyphicon-user"></span> Profile Pic</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  class="form" role="form" autocomplete="off " 	enctype="multipart/form-data" >
								<div class="form-group">
								<label class="dd"> Change Profile pic</label>
									<input type="file" name="image" size="60" class="fileInput"  id="file-input" accept=".png, .jpg, .jpeg"/>
								</div>
								<button type="submit" name="profile"  id="post_btn" class="btn btn-success btn-block">Save</button>
				</form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
      
    </div>
  </div> 
