<?php

include('conn.php');

if (!empty($_POST["make_id"])) {
    $make_id = $_POST["make_id"];
        //Fetch all make data
    $query = $db->query("SELECT model_name, min(model_id) FROM car_models WHERE model_make_id='$make_id' group by model_name");
         //Count total number of rows
    $rowCount = $query->num_rows;
    
    //make option list
    if ($rowCount > 0) {
        echo '<option  selected disabled>Select Model</option>';
        while ($row = $query->fetch_assoc()) {
            if (!$row['model_name']) {
                continue;
            }
            echo '<option value="' . $row['model_name'] . '">' . $row['model_name'] . '</option>';

        }
    } else {
        echo '<option  selected disabled>Model not available for </option>';
    }
}
if (!empty($_POST["model_name"])) {
    $model_name = $_POST["model_name"];
        //Fetch all make data
    $query = $db->query("SELECT model_trim, min(model_id) FROM car_models WHERE model_name='$model_name' group by model_trim");
        //Count total number of rows
    $rowCount = $query->num_rows;

    //make option list
    if ($rowCount > 0) {
        echo '<option  selected disabled>Select Trim</option>';
        while ($row = $query->fetch_assoc()) {
            if (!$row['model_trim']) {
                continue;
            }
            echo '<option value="' . $row['model_trim'] . '">' . $row['model_trim'] . '</option>';

        }
    } else {
        echo '<option  selected disabled>Model not available for </option>';
    }
}


?>