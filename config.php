<?php
    require_once "Facebook/autoload.php";

    $FB =new \Facebook\Facebook([
        'app_id' =>'292158124766807',
        'app_secret' =>'f2d6e93c76bdd5c25bdb1ce5899b352f',
        'default_graph_version' =>'v2.10'
    ]);
    $helper = $FB->getRedirectLoginHelper();
?>