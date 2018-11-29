<?php
    require_once 'config.php';

    try{
        $accessToken =$heloer->getAccessToken();
    }catch(\Facebook\Exceptions\FacebookResponseException $e){
        echo "Response Exception: ".$e->getMessage(); 
        exit();

    }catch(\Facebook\Exceptions\FacebookSDKException $e){
        echo "SDK Exception: ".$e->getMessage(); 
        exit();

    }
    if(! $accessToken){
        header('Location: login.php');
        exit();
    }

    $oAuth2Client =$FB->getOAuth2Client();
    if(!$accessToken->isLongLived())
        $accessToken =$oAuth2Client->getLongLivedAccessToken($accessToken);

        $response = $FB->get("/me?fields=id, first_name, last_name, email,picture.type(large)",$accessToken);
        $userData =$response->getGraphNod()->asArray();
        echo "<pre>";
        var_dumo($userData);
?>