<?php

// Renders the Notes View from Views Directory
// Renders the Notes View from Views Directory
$viewPath = $_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/views/userConsoleView.php";

if(isset($_POST['updateName']) && isset($_POST['updatePassword']) && isset($_POST['updateEmail'])){
    require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/models/UserServices.php");

    $updateName = $_POST['updateName'];
    $updateEmail = $_POST['updateEmail'];
    $updatePassword = $_POST['updatePassword'];

    $userServices = new UserServices();
    $updateStatus = $userServices->updateUser($updateName, $updateEmail, $updatePassword);
    
}

?>