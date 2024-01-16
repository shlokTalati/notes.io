<!-- To get notes of a particular user, use localhost/notes.io/api path with query parameters "email" and "password". The snippet below shows the code for the same.
Eg. http://localhost/notes.io/api?email=saritatalati@gmail.com&password=shlok12345 
If the user exists, the API will return the notes of the user in JSON format. If the user does not exist, the API will return the message "Incomplete Credentials or User does not exist". -->

<?php 

require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/models/NoteServices.php");
require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/models/UserServices.php");

$noteServices = new NoteServices;
$auth = new UserServices;


//To Authenticate a User
if(isset($_GET['email']) && isset($_GET['password'])){
    
    $loginAuthentication = $auth->login($_GET['email'], $_GET['password']);
    if($loginAuthentication != null){
        $authentication = true;
    } else {
        $authentication = false;
        echo "Incomplete Credentials or User does not exist";
    }
    
}

//Send Notes as Response
if(isset($authentication) && $authentication == true){
    $noteData = $noteServices->displayNotes($_GET['email']);
    
    $array_result = array();

    if($noteData == null){
        echo "User Exists but has no notes";
    } else {
        
        while ($note = mysqli_fetch_assoc($noteData)) {
            $array_result[] = array('id' => $note['id'], 'title' => $note['title'], 'description' => $note['description']);
        }

        $json_result = json_encode($array_result);
        $note_result = str_replace('[', '', $json_result);
        $note_result = str_replace(']', '', $note_result);
        echo $note_result;
        header('Content-Type: application/json');
    }
}


