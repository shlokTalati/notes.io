<?php

require_once(__DIR__ . '/../models/UserServices.php');

$auth = new UserServices();

//To Login a User
if(isset($_POST['loginEmail'])){
    
    $auth->login($_POST['loginEmail'], $_POST['loginPassword']);
    
}

//To Signup a User
else if (isset($_POST['signupEmail'])) {
    
    $auth->signup($_POST['signupName'], $_POST['signupDob'], $_POST['signupContactNo'] ,$_POST['signupEmail'], $_POST['signupPass']);

}

//To logout a user
else if($request_uri == "/logout"){

    $auth->logout();

}

