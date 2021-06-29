<?php
require_once('vendor/autoload.php');

// Creating new google client instance
$Goo_client = new Google_Client();

// Enter your Client ID
$Goo_client->setClientId('226546804682-vm99ed6v46v0rr1f9pl887284akovj44.apps.googleusercontent.com');

// Enter your Client Secrect
$Goo_client->setClientSecret('whJrURa6Uy0uHsAqEOaRUCfS');

// Enter the Redirect URL
$Goo_client->setRedirectUri('http://localhost/my%20projects/www.roomforrent.com/');

// Adding those scopes which we want to get (email & profile Information)
$Goo_client->addScope("email");
$Goo_client->addScope("profile");
//$Goo_client->addScope("mobile");

//session start here
session_start();

//$login_button=true;
//echo($_GET['code']);
if(isset($_GET['code'])){

    $token = $Goo_client->fetchAccessTokenWithAuthCode($_GET['code']);

    // getting profile information
    if(!isset($token['error'])){
        $Goo_client->setAccessToken($token['access_token']);
        $_SESSION['access_token']=$token['access_token'];

        $Goo_service = new Google_Service_Oauth2($Goo_client);
        $Goo_userinfo = $Goo_service->userinfo->get();
        //print_r($Goo_userinfo);
        $_SESSION['user_email_address']=$Goo_userinfo['email'];
        $_SESSION['user_first_name']=$Goo_userinfo['given_name'];
        $_SESSION['user_last_name']=$Goo_userinfo['family_name'];
        $_SESSION['user_image']=$Goo_userinfo['picture'];
        $_SESSION['login_btn']=true;
        
        
        //data insertion
            $full_name= $_SESSION['user_first_name']." ".$_SESSION['user_last_name'];
            $mail=$_SESSION['user_email_address'];

           $insert = "INSERT INTO user_info (name, mobile, email, password)
            VALUES ('$full_name', '1234567890', '$mail', '1234567890')";
            $conn->query($insert);
            /*if ($conn->query($insert) === TRUE){
            echo "New record created successfully";
            } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
            }*/

            $conn->close();
	}
    $login_btn=$_SESSION['login_btn'];
}

?>