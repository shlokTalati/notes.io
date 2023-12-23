<?php 

// echo "Sent by Notes Controller"; // Debug Message to check if the controller is working

require_once(__DIR__ . '/../models/NoteServices.php');



$noteServices = new NoteServices;

//Display Notes
$noteData = $noteServices->displayNotes($_SESSION['userEmail']);

//Insert Notes
if(isset($_POST['noteTitle']) && $request_uri == '/notes/insertNote'){

    $noteServices->insertNote($_SESSION['userEmail'], $_POST['noteTitle'], $_POST['noteDescription']);

}

//Delete Notes
// Check if the URL consists of Delete request and then delete notes
else if (count($segments) > 2 && $segments[0] == 'notes' && $segments[1] == 'deleteNote' && isset($segments[2])){
    $deleteNoteId = $segments[2];
    $noteServices->deleteNote($deleteNoteId);
    
}

//Update Notes
else if(isset($_POST['updateId']) && $request_uri == '/notes/updateNote'){
    $noteServices->updateNote($_POST['updateId'], $_POST['updateTitle'], $_POST['updateDescription']);
}


// Renders the Notes View from Views Directory
// Renders the Notes View from Views Directory
require_once(__DIR__ . '/../resources/views/notesView.php');

?>
