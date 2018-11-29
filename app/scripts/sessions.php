<?php
include_once "conn.php";

if ((!empty($_SESSION['userId'])) || (!empty($_SESSION['password']))) {
    //   do nothing first

    $userId = $_SESSION['userId'];

    //get user

    $sql = "SELECT * FROM users WHERE userId='$userId'";
    $run = $db->query($sql);

    $row = $run->fetch_assoc();

    $name = $row['firstName'] . " " . $row['lastName'];


} else {
    $userId = "";
}



function checkPage($page)
{
    if ((empty($_SESSION['userId'])) || (empty($_SESSION['password']))) {
        if ($page == true) {
            header('Location:error-page.php');
        }
    }
}

// Like Button

function chckLike($pstId, $userId)
{
    if ($userId) {
        global $db;
        $likedChk = "SELECT * FROM likes WHERE userid=$userId AND postId=$pstId";
        $runLikedChk = $db->query($likedChk) or die($db->error);
        if ($runLikedChk->num_rows > 0) {
            $class = "fas";

        } else {
            $class = "far";

        }
    } else {
        $class = "far";

    }
    echo $class;
}

if (isset($_REQUEST['l']) && isset($_REQUEST['u'])) {
    if ($userId) {
        $pst = $_REQUEST['l'];
        $use = $_REQUEST['u'];
		//check if you alread liked
        $liked = "SELECT * FROM likes WHERE userid=$userId AND postId=$pst";
        $runLiked = $db->query($liked);
        if ($runLiked->num_rows > 0) {
				//dislike
            $rst = $runLiked->fetch_assoc();
            $likeId = $rst['likeId'];

            $del = "DELETE FROM likes WHERE likeId=$likeId";
            $db->query($del) or die($db->error);

        } else {
				//like
            $like = "INSERT INTO likes (postId,userId,dateTime) VALUES('$pst','$userId',now())";
            $db->query($like) or die($db->error);

        }

    } else {
        echo "<script>alert('You Have to Login to Like Post')</script>";
    }
}
?>