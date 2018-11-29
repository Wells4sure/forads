<?php
require_once "scripts/conn.php";

$s_name = htmlspecialchars($_SERVER['SERVER_NAME']);

if (isset($_POST['signup'])) {
    $firstName = mysqli_real_escape_string($db, test_input($_POST["firstName"]));
    $lastName = mysqli_real_escape_string($db, test_input($_POST["lastName"]));
    $email = mysqli_real_escape_string($db, test_input($_POST["email"]));
    $password = mysqli_real_escape_string($db, test_input($_POST["password"]));
    $password2 = mysqli_real_escape_string($db, test_input($_POST["confirm_password"]));

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($password2)) {
        $error = "All fields are required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            @'here';
            $error = "Invalid format and please re-enter valid email";
        } else {
              //check for duplicated email
            $sql = "SELECT * fROM users WHERE email='$email'";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                $error = "Email already exists";
            } else {
                if (strlen($password) < 6) {
                    $error = "Password too Short";
                } else {
                    if ($password != $password2) {
                        $error = 'Password Fields Do not Match';
                    } else {
                        //create secure check
                        $gen = "WCALP";
                        $rand = rand(1, 9999) + 1;
                        $activeCode = $gen . $rand;
                        $token = md5($activeCode);

                        //hash the password
                        $passwordSha = sha1($password);
                        $hashedPwd = password_hash($passwordSha, PASSWORD_DEFAULT);

                        
                        //insert the data
                        $signup = "INSERT INTO users (firstName, lastName, email, password, profilePic, location,phone,username,registeredDate, activationCode, active,access_date) VALUES ('$firstName', '$lastName', '$email', '$hashedPwd', '', '','','',now(), '$token', false,now())";

                        if ($db->query($signup) === true) {

                            $last_id = $db->insert_id;


                            $to = $email;
                            $message = "
                                Hello, $firstName $lastName\n <br/>
                                <br/>
                                To verify your email address ($email), please click the following <a href='$s_name/confirm.php?u=$last_id&&k=$activeCode' >Link</a>.\n<br/>
                                \n<br/>
                                If you believe you received this email in error, please contact us at support@forads.com.\n<br/>
                                \n<br/>
                                Thank you,\n<br/>
                                The Forads Team\n ";
                            $from = "Forads";
                            $headers = "From:" . $from . "\r\n";
                            $headers .= "Content-type:  text/html; charset=UTF-8" . "\r\n";
                            $subject = "Forads - please verify your email address";

                            if (@mail($to, $subject, $message, $headers)) {
                                $_SESSION['successMsg'] = "Your Account Has been Successfully Created Check your Email to Verify";
                                header('Location:success.php');
                            }
                        } else {
                            $error = "Oops Something Went wrong Try again letter";
                            echo $db->error;
                        }
                    }
                }
            }

        }
    }
}
?>