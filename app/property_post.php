<?php
require_once "scripts/conn.php";

if (isset($_POST['post_property'])) {

    $title = mysqli_real_escape_string($db, test_input($_POST["title"]));
    $sCategoryId = mysqli_real_escape_string($db, test_input($_POST["sCategory"]));
    $saleRent = mysqli_real_escape_string($db, test_input($_POST["saleBy"]));
   
    if($sCategoryId==8 ||$sCategoryId==9){
        $dwellingType = mysqli_real_escape_string($db, test_input($_POST["dwellingType"]));
        $bedrooms = mysqli_real_escape_string($db, test_input($_POST["bedrooms"]));
        $bathrooms = mysqli_real_escape_string($db, test_input($_POST["bathrooms"]));
        $parking = mysqli_real_escape_string($db, test_input($_POST["parking"]));
    }

    $size = mysqli_real_escape_string($db, test_input($_POST["size"]));
    $location = mysqli_real_escape_string($db, test_input($_POST["location"]));
    $description = mysqli_real_escape_string($db, test_input($_POST["description"]));
    $tradeType = mysqli_real_escape_string($db, test_input($_POST["tradeType"]));

    if ($tradeType == "FIXED") {
        $price = mysqli_real_escape_string($db, test_input($_POST["price"]));
    } else {
        $price = 0.00;
    }

    $phoneNumber = mysqli_real_escape_string($db, test_input($_POST["phoneNumber"]));

    if (empty($sCategoryId) || empty($saleRent)||empty($title)) {
        $error = "All Required Fields must be filled";
    } else {

                $carryOn = true;

                if ($tradeType == "FIXED") {
                    if (!is_numeric($price)) {
                        $error = "Invalid Price please try again";
                        $carryOn = false;
                    }
                }
                if (!empty($phoneNumber)) {
                    if ((strlen($phoneNumber) <= 9) || (strlen($phoneNumber) >= 14)) {
                        $error = "Invalid Phone Number";
                        $carryOn = false;
                    }
                }
                if ($carryOn == true) {

                 //count how many posts you have
                    $countPost = "SELECT * FROM posts";
                    $runCountPost = $db->query($countPost);
                    $getCount = $runCountPost->num_rows;


                    $folderName = $getCount + 1;
                //dealing with images
                    $errors = array();
                    $uploadedFiles = array();
                    $ser_uploadedFiles = "null";
                    $extension = array("jpeg", "jpg", "png", "gif");
                    $totalBytes = 2097152; //======== 2MB
                    $UploadFolder = "UploadFolder/" . $userId . "/" . $folderName;

                    $imgCounter = 0;

                    foreach ($_FILES['upload']['tmp_name'] as $key => $tmp_name) {

                        $temp = $_FILES["upload"]["tmp_name"][$key];
                        $fileName = $_FILES["upload"]["name"][$key];

                        $file_ext = explode('.', $fileName);
                        $file_ext = strtolower(end($file_ext));

                        $file_name_new = uniqid('', true) . '.' . $file_ext;

                        if (empty($temp)) {
                            break;
                        }

                        $imgCounter++;

                //test the uploads
                        $UploadOk = true;

                        if ($_FILES["upload"]["size"][$key] > $totalBytes) {
                            $UploadOk = false;
                            array_push($errors, " file size is larger than the 2 MB.");
                        }
                        $ext = pathinfo($file_name_new, PATHINFO_EXTENSION);
                        if (in_array($ext, $extension) == false) {
                            $UploadOk = false;
                            array_push($errors, "file type is invalid.");
                        }
                        if (file_exists($UploadFolder . "/" . $file_name_new) == true) {
                            $UploadOk = false;
                            array_push($errors, " file is already exist.");
                        }
                //if o is good
                        if ($UploadOk == true) {

                            if (!file_exists($UploadFolder)) {
                                mkdir($UploadFolder, 0777, true);
                            }

                            move_uploaded_file($temp, $UploadFolder . "/" . $file_name_new);

                            array_push($uploadedFiles, $file_name_new);
                        }

                        if ($imgCounter > 0) {

                            if (count($errors) > 0) {
                                $errorMsg = $error;
                            }
                        }
                        if (count($uploadedFiles) > 0) {
                     //serialize
                            $ser_uploadedFiles = serialize($uploadedFiles);
                        } else {
                            $ser_uploadedFiles = "null";
                        }

                    }//end of images 

                    try {

                        $datePosted = date('Y-m-d H:i:s');

                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("INSERT INTO property(saleRent, dwellingType, bedrooms, bathrooms, parking, size, description)VALUES(:saleRent, :dwellingType, :bedrooms, :bathrooms, :parking, :size, :description)");

                        $stmt->bindParam(':saleRent', $q_saleRent);
                        $stmt->bindParam(':dwellingType', $q_dwellingType);
                        $stmt->bindParam(':bedrooms', $q_bedrooms);
                        $stmt->bindParam(':bathrooms', $q_bathrooms);
                        $stmt->bindParam(':parking', $q_parking);
                        $stmt->bindParam(':size', $q_size);
                        $stmt->bindParam(':description', $q_description);

                        $q_saleRent = $saleRent;
                        $q_dwellingType = $dwellingType;
                        $q_bedrooms = $bedrooms;
                        $q_bathrooms = $bathrooms;
                        $q_parking = $parking;
                        $q_size = $size;
                        $q_description = $description;

                        if ($stmt->execute() === true) {
                            $datePosted = date('Y-m-d H:i:s');
                            $postTypeId = $conn->lastInsertId();
                //create Post
                            $stmt2 = $conn->prepare("INSERT INTO posts (userId, sCategoryId, adTitle, location, images, tradeType, price, phone,datePosted,postType, postTypeId,views) VALUES (:userId, :sCategoryId, :adTitle, :location, :images, :tradeType, :price, :phone, :datePosted ,:postType, :postTypeId,:views)");

                            $stmt2->bindParam(':userId', $q_userId);
                            $stmt2->bindParam(':sCategoryId', $q_sCategoryId);
                            $stmt2->bindParam(':adTitle', $q_adTitle);
                            $stmt2->bindParam(':location', $q_location);
                            $stmt2->bindParam(':images', $q_images);
                            $stmt2->bindParam(':tradeType', $q_tradeType);
                            $stmt2->bindParam(':price', $q_price);
                            $stmt2->bindParam(':phone', $q_phone);
                            $stmt2->bindParam(':datePosted', $q_datePosted);
                            $stmt2->bindParam(':postType', $q_postType);
                            $stmt2->bindParam(':postTypeId', $q_postTypeId);
                            $stmt2->bindParam(':views', $q_views);

                            $q_userId = $userId;
                            $q_sCategoryId = $sCategoryId;
                            $q_adTitle = $title;
                            $q_location = $location;
                            $q_images = $ser_uploadedFiles;
                            $q_tradeType = $tradeType;
                            $q_price = $price;
                            $q_phone = $phoneNumber;
                            $q_datePosted = $datePosted;
                            $q_postType = "property";
                            $q_postTypeId = $postTypeId;
                            $q_views = 0;

                            if ($stmt2->execute() === true) {
                                $_SESSION['successMsg'] = "Your Ad Has been Successfully Posted";
                                header('Location:success.php');
                            } else {
                                $error = "Oops something went wrong";
                            }

                        } else {
                            $error = "Something Went wrong";
                        }


                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
            }

}
?>