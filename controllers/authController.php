<?php

require_once(__DIR__ . '/../models/UserServices.php');

$auth = new UserServices();

//To Login a User
if(isset($_GET['loginEmail'])){
    
    $auth->login($_GET['loginEmail'], $_GET['loginPassword']);
    
}


//To logout a user
else if($request_uri == "/logout"){

    $auth->logout();

}


//To check if a user is already LoggedIn
else if (isset($_SESSION['userName'])){

    // echo "User is already LoggedIn. Sent by Auth Controller";
    // echo "<br>";

}



//To Signup a User
else if (isset($_GET['signupEmail'])) {
    
    $auth->signup($_GET['signupName'], $_GET['signupEmail'], $_GET['signupPass']);

}


