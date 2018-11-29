<?php
require_once 'scripts/conn.php';

$profile = "SELECT * FROM users WHERE userId=$userId";
$runProfile = $db->query($profile);
if ($runProfile->num_rows > 0) {
    
    //get all the results

    $profileResults = $runProfile->fetch_assoc();

    $pFname = $profileResults['firstName'];
    $pLname = $profileResults['lastName'];
    $pEmail = $profileResults['email'];
    $pUsername = $profileResults['username'];
    $pProfilePic = $profileResults['profilePic'];
    $pAddress = $profileResults['location'];
    $pPhone = $profileResults['phone'];
    $lastSeen = $profileResults['access_date'];


    if (!empty($pProfilePic)) {
        $pProfilePic = $pProfilePic;
    } else {
        $pProfilePic = "images/user.jpg";
    }
                                    //date 
}

$posts = "SELECT * FROM posts WHERE userId=$userId";
$runPosts = $db->query($posts);
$numberOfPosts = 0;
if ($runPosts->num_rows > 0) {
    //get all details
    $numberOfPosts = $runPosts->num_rows;

}

$likes = "SELECT * FROM likes WHERE userId=$userId";
$runlikes = $db->query($likes);
$likedPost = 0;
if ($runlikes->num_rows > 0) {
    //get all details
    $likedPost = $runlikes->num_rows;


}

$messages = "SELECT * FROM messages WHERE recieverId=$userId";
$runmessages = $db->query($messages);
$messagesReceived = 0;
if ($runmessages->num_rows > 0) {
    //get all details
    $messagesReceived = $runmessages->num_rows;

}

$messagesSent = "SELECT * FROM messages WHERE senderId=$userId";
$runmessagesSent = $db->query($messagesSent) ;
$messagesSent = 0;
if ($runmessagesSent->num_rows > 0) {
    //get all details
    $messagesSent = $runmessagesSent->num_rows;

}
$unread = "SELECT COUNT(*) FROM messages WHERE `read`=false AND recieverId=$userId";
$runUnread = $db->query($unread) or die($db->error);
$getUnread = $runUnread->fetch_assoc();

$recieved = $getUnread['COUNT(*)'];

if (isset($_POST['profile'])) {
    $carryOn = true;
    if (isset($_FILES['image']) || !empty($_FILES['image'])) {

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        if ($file_name) {

            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));

            $UploadFolder = "profile_pics/profile/" . $userId . "/";
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                $error = "extension not allowed, please choose a JPEG or PNG file.";
                $carryOn = False;
            }
            if ($file_size > 2097152) {
                $error = 'File size must be exactly 2 MB';
                $carryOn = False;
            }

            if ($error == "") {
                $file_name_new = uniqid('', true) . '.' . $file_ext;

 

                // move_uploaded_file($file_tmp, $UploadFolder . $file_name_new);
                // $profile_pic = $UploadFolder . $file_name_new;

            }

        } else {
            $error = "No Image selected for upload";
            $carryOn = False;
        };

    }
    
    if ($carryOn == true) {

        if (!file_exists(@$UploadFolder)) {
            @mkdir(@$UploadFolder, 0777, true);
        }
        //delete 
        deleteFiles(@$UploadFolder);

        move_uploaded_file(@$file_tmp, @$UploadFolder . @$file_name_new);
        @$profile_pic = @$UploadFolder . @$file_name_new;

        $updateSql = "UPDATE users SET profilePic ='$profile_pic'  WHERE userId=$userId";
        if ($db->query($updateSql) === true) {


            $success = "Profile Pic has been updated";
            header("refresh:5;url=profile.php");
        } else {
            die($db->error);
        }

    }


}

if (isset($_POST['updateP'])) {


    $firstName = mysqli_real_escape_string($db, test_input($_POST["firstName"]));
    $lastName = mysqli_real_escape_string($db, test_input($_POST["lastName"]));
    $email = mysqli_real_escape_string($db, test_input($_POST["email"]));
    $username = mysqli_real_escape_string($db, test_input($_POST["username"]));
    $address = mysqli_real_escape_string($db, test_input($_POST["address"]));
    $phone = mysqli_real_escape_string($db, test_input($_POST["phone"]));

    $carryOn = true;

    if (empty($firstName) || empty($lastName)) {
        $error = "First Name or Last Name Can not be Blank";
        $carryOn = false;
    } else {
        if (empty($email)) {
            $error = "Email Address Can not be Blank";
        } else {
            
            if (!empty($phone)) {
                if ((strlen($phone) <= 9) || (strlen($phone) >= 14)) {
                    $error = "Invalid Phone Number";
                    $carryOn = false;
                }
            }
            if (!empty($username)) {

                $check = "SELECT * FROM users WHERE username='$username'";
                $runCheck = $db->query($check) or die($db->error);
                if ($runCheck->num_rows > 0) {
                    //check if its yours
                    $check2 = "SELECT * FROM users WHERE userId='$userId'";
                    $runCheck2 = $db->query($check2) or die($db->error);

                    if ($runCheck2->num_rows > 0) {
                        $getResults = $runCheck2->fetch_assoc();
                         //Check if Change occurred
                        if ($getResults['username'] == $username) {
                            //code...
                        }
                    } else {
                        $error = "Username already exists";
                        $carryOn = false;
                    }


                }

            }

        }
    }
    if ($carryOn == true) {
        $updateSql = "UPDATE users SET firstName='$firstName', lastName='$lastName', email='$email', username='$username', location='$address', phone='$phone'  WHERE userId=$userId";
        if ($db->query($updateSql) === true) {
            $success="Profile Updated Successfuly";
        }
    }

}

if (isset($_POST['updatePass'])) {
    $pass1 = mysqli_real_escape_string($db, test_input($_POST["pass1"]));
    $pass2 = mysqli_real_escape_string($db, test_input($_POST["pass2"]));

    if (empty($pass1) || empty($pass2)) {
        $error = "Password fields Can not be left Blank! ";
    } else {
        if (strlen($pass2) < 6) {
            $error = "Password too short ";
        } else {
            $sql = "SELECT * FROM users WHERE userId=$userId ";
            $result = $db->query($sql);
            $pRow = $result->fetch_assoc();
                //De-hush the password
            $passwordSha1 = sha1($pass1);
            $hushedPwd1 = password_verify($passwordSha1, $pRow['password']);

            $passwordSha2 = sha1($pass2);
            $hushedPwd2 = password_verify($passwordSha2, $pRow['password']);

            if ($hushedPwd1 === false) {
                $error = "Invalid Old password";
            } else {
                if ($hushedPwd1 == $hushedPwd2) {
                    $error = "Your Old Password can not be the same as the new password";
                } elseif ($hushedPwd1 === true) {

                    $passwordSha = sha1($pass2);
                    $updatePSW = password_hash($passwordSha, PASSWORD_DEFAULT);
                    $upDate = "UPDATE users SET password ='$updatePSW' WHERE userId=$userId ";
                    if ($db->query($upDate) === true) {
                        $success = "Password updated Successfully. ";
                    } else {
                        $error = "Something went Wrong";
                    }

                }
            }

        }
    }
    //header("refresh:5;url=profile.php");
}

if (isset($_POST['replyBtn'])) {

    $reply = mysqli_real_escape_string($db, test_input($_POST["reply"]));
    $replyto = mysqli_real_escape_string($db, test_input($_POST["replyto"]));
    $messageId = mysqli_real_escape_string($db, test_input($_POST["messageId"]));

    if (empty($reply)) {
        $error = "Please write a message to be sent ";
    } else {
        if (empty($replyto) || empty($messageId)) {
            $error = "Something Is not working Try again Later";
        } else {
            //send the Reply
            $replySql = "INSERT INTO reply (messageId,reply_from, reply_to,reply, `read`,replyTime)VALUES('$messageId','$userId', '$replyto','$reply', false,now())";
            $runReplySql = $db->query($replySql) or die($db->error);
            $success = "Reply Sent";

        }
    }


}

function deleteFiles($dir)
{
    // loop through the files one by one
    foreach (glob($dir . '/*') as $file) {
        // check if is a file and not sub-directory
        if (is_file($file)) {
            // delete file
            unlink($file);
        }
    }
}
?>