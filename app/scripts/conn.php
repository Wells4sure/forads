<?php
$error = "";
$success = "";
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$database = "forads";

// Create connection
$db = new mysqli($servername, $username, $password, $database);

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



    // our global Functions
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
//logout function
function logout()
{

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header("Location:index.php");
    //unset cookies;
    unset($_COOKIE["username"]);
    unset($_COOKIE["password"]);
    setcookie ("username","");
    setcookie ("password","");
    exit();
}

if (isset($_REQUEST['logout'])) {
    logout();
}
function isLoggedIn()
{
    if ((!empty($_SESSION['userId'])) || (!empty($_SESSION['password'])) ) {
        header('Location:index.php');

    }
}
?>