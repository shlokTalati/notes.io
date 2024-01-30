<?php

$pages = array(
    '/',
    '/auth',
    '/login',
    '/signup',
    '/notes',
    '/notes/insertNote',
    '/notes/deleteNote',
    '/notes/updateNote',
    '/user',
    '/user/edit',
    '/logout'
);


if (in_array($request_uri, $pages)) {

// Get AuthController to authenticate Login, Signup and Logout requests
if ($request_uri == '/auth' || $request_uri == '/logout') {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/authController.php");
}

//Routing if the user is already logged in
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {

    //If the User access Notes Subpage
    if ($segment[0] === 'notes' || $segment[0] == null) {
        if ($request_uri != '/notes') {
            header("Location: /notes.io/notes");
        }

        require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/notesController.php");
    }

    //If the User access User Details Subpage
    else if ($segment[0] === 'user') {
        if ($request_uri != '/user/edit') {
            header("Location: /notes.io/user/edit");
        }

        require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/userController.php");
    }


} else {

    if ($request_uri != '/login') {
        header("Location: /notes.io/login");
    }
    require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/loginController.php");

}
} else {
// Get the 404 View from Views Directory
$viewPath = $_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/views/404.php";
}

require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/views/templateView.php");
?>