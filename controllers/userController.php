<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/models/UserServices.php");
$userServices = new UserServices();

if(isset($_POST['updateName']) && isset($_POST['updatePassword']) && isset($_POST['updateEmail'])){
    
    $updateName = $_POST['updateName'];
    $updateDob = $_POST['updateDob'];
    $updateContactNo = $_POST['updateContactNo'];
    $updateEmail = $_POST['updateEmail'];
    $updatePassword = $_POST['updatePassword'];
    
    $updateStatus = $userServices->updateUser($updateName, $updateDob , $updateContactNo , $updateEmail, $updatePassword);
    
}

$userDetails = $userServices->getUserDetails($_SESSION['userEmail']);


// Renders the Notes View from Views Directory
// Renders the Notes View from Views Directory
$viewPath = $_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/views/userConsoleView.php";
?>