<?php

require(__DIR__ . '/../models/UserServices.php');

$auth = new UserServices();

//To Login a User
if(isset($_POST['loginEmail'])){
    
    $loginResult = $auth->login($_POST['loginEmail'], $_POST['loginPassword']);

    if($loginResult != null){
        $_SESSION['loggedIn'] = true;
        $_SESSION['userName'] = $loginResult['name']; 
        $_SESSION['userEmail'] = $loginResult['email'];
        header("Location: /notes.io/notes");

    } else {
        header("Location: /notes.io/login");
    }
    
}

//To Signup a User
else if (isset($_POST['signupEmail'])) {
    
    $auth->signup($_POST['signupName'], $_POST['signupDob'], $_POST['signupContactNo'] ,$_POST['signupEmail'], $_POST['signupPass']);

}

//To logout a user
else if($request_uri == "/logout"){

    $auth->logout();

}

