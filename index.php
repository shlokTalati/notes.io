<?php
require_once('init.php');
$request_uri = str_replace('/notes.io', '', $_SERVER['REQUEST_URI']);
// echo $request_uri;
// echo "<br>";
$segments = explode('/', trim($request_uri, '/'));

// Get AuthController to authenticate application
require('controllers/authController.php');

?>

<?php

$pages = array(
    '/',
    // '/login',
    '/signup',
    '/notes',
    '/notes/insertNote',
    '/notes/deleteNote',
    '/notes/updateNote',
    '/logout',
);

// Check if the URL consists of Delete request and then push that url to acceptable Pages Array
if (count($segments) > 2 && $segments[0] == 'notes' && $segments[1] == 'deleteNote' && isset($segments[2])) {
    $pages . array_push($pages, $request_uri);
}



if(in_array($request_uri, $pages)){
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        
        if($request_uri != '/notes'){
            header("Location: /notes.io/notes");

        }

        require_once('controllers/notesController.php');

       
       

    } else {

        if($request_uri != '/login'){
            header("Location: /notes.io/login");
        }
        require_once('controllers/loginController.php');

    }
}
 else {
    require_once('resources/views/404.php');
}


?>





