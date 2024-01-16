<?php 

// echo "Sent by Notes Controller"; // Debug Message to check if the controller is working
require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/models/NoteServices.php");

// Get the Notes View from Views Directory
$viewPath = $_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/views/notesView.php";
 


$noteServices = new NoteServices;

//Display Notes
$noteData = $noteServices->displayNotes($_SESSION['userEmail']);

//Insert Notes
if(isset($_POST['noteTitle']) && $request_uri == '/notes/insertNote'){

    $noteServices->insertNote($_SESSION['userEmail'], $_POST['noteTitle'], $_POST['noteDescription']);

}

//Delete Notes
// Check if the URL consists of Delete request and then delete notes
else if (count($segment) > 2 && $segment[0] == 'notes' && $segment[1] == 'deleteNote' && isset($segment[2])){
    $deleteNoteId = $segment[2];
    $noteServices->deleteNote($deleteNoteId);
    
}

//Update Notes
else if(isset($_POST['updateId']) && $request_uri == '/notes/updateNote'){
    $noteServices->updateNote($_POST['updateId'], $_POST['updateTitle'], $_POST['updateDescription']);
}
?>
