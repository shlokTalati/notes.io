<?php 

require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/models/NoteServices.php");
require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/models/UserServices.php");

$noteServices = new NoteServices;
$auth = new UserServices;


//To Authenticate a User
if(isset($_GET['email'])){
    
    $loginAuthentication = $auth->login($_GET['email'], $_GET['password']);
    if($loginAuthentication != null){
        $authentication = true;
     } else {
         $authentication = false;
    }
 }

//Send Notes as Response
if(isset($authentication) && $authentication == true){
    $noteData = $noteServices->displayNotes($_GET['email']);
    echo $noteData;
}


