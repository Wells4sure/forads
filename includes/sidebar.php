 <div class="test-column">
	<div class="list-group">
        <a href="profile.php" class="list-group-item <?php echo htmlspecialchars(($_SERVER['PHP_SELF'] == "/forads/profile.php" ? "active" : "")); ?> ">Home</a>
        <a href="myads.php" class="list-group-item <?php echo htmlspecialchars(($_SERVER['PHP_SELF'] == "/forads/myads.php" ? "active" : "")); ?>">My Ads <span class="badge pull-right"><?php echo $numberOfPosts ?></span></a>
        <a href="myfav.php" class="list-group-item <?php echo htmlspecialchars(($_SERVER['PHP_SELF'] == "/forads/myfav.php" ? "active" : "")); ?>">Favorites <span class="badge pull-right"><?php echo $likedPost; ?></span></a>
        <a href="inbox.php" class="list-group-item <?php echo htmlspecialchars(($_SERVER['PHP_SELF'] == "/forads/inbox.php" ? "active" : "")); ?>"> Massages <span class="badge pull-right"><?php echo $messagesReceived; ?></span></a>
    </div>
    
    <div class="list-group">
        <a href="close-account.php" class="list-group-item <?php echo htmlspecialchars(($_SERVER['PHP_SELF'] == "/forads/close-account.php" ? "active" : "")); ?>">Close Account</a>
    </div>                         
</div>