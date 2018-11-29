<?php
require_once 'scripts/conn.php';

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($db, test_input($_POST["username"]));
    $pass = mysqli_real_escape_string($db, test_input($_POST["password"]));

    if (empty($username) || empty($pass)) {
        $error = "Fields Can not be left Blank! ";
    } else {
        $sql = "SELECT * FROM users WHERE email='$username' OR username='$username' ";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                    //check status
                if ($row['active'] == false) {
                    header('Location:activate.html');
                } else {
                        //De-hush the password
                    $passwordSha = sha1($pass);
                    $hushedPwd = password_verify($passwordSha, $row['password']);
                    if ($hushedPwd === false) {
                        $error = "Invalid username or password";
                    } elseif ($hushedPwd === true) {
                            //success
                        $_SESSION['userId'] = $row['userId'];
                        $_SESSION['password'] = $row['password'];

                        if(!empty($_POST["remember_me"])) {
                            setcookie ("username",$username,time()+ (10 * 365 * 24 * 60 * 60));
                            setcookie ("password",$passwordSha,time()+ (10 * 365 * 24 * 60 * 60));
                        } else {
                            if(isset($_COOKIE["username"])) {
                                setcookie ("username","");
                            }
                            if(isset($_COOKIE["password"])) {
                                setcookie ("password","");
                            }
                        }

                        $userId = $row['userId'];
                          //update
                        $lastseen = "UPDATE  users SET access_date =now() WHERE userId=$userId ";
                        $db->query($lastseen);

                        header("Location:index.php");
                    }
                }

            }

        } else {
            $error = "The user doesn't exist";
        }
    }

}
?>
