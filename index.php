<?php
require_once('init.php');
$parsed_path = parse_url($_SERVER['REQUEST_URI']);
$request_uri = str_replace('/notes.io', '', $parsed_path['path']);
// echo $request_uri;
// echo "<br>";
$segment = explode('/', trim($request_uri, '/'));


?>

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

// Check if the URL consists of Delete request and then push that url to acceptable Pages Array
if (count($segment) > 2 && $segment[0] == 'notes' && $segment[1] == 'deleteNote' && isset($segment[2])) {
    $pages . array_push($pages, $request_uri);
}

if($segment[0] == 'api'){

    require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/apiController.php");

} else {
    if (in_array($request_uri, $pages)) {

        // Get AuthController to authenticate Login, Signup and Logout requests
        if ($request_uri == '/auth' || $request_uri == '/logout') {
            require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/authController.php");
        }

        //Routing if the user is already logged in
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {

            //If the User Access Notes Subpage
            if ($segment[0] === 'notes' || $segment[0] == null) {
                if ($request_uri != '/notes') {
                    header("Location: /notes.io/notes");
                }

                require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/notesController.php");
            }

            //If the User Access User Subpage
            else if ($segment[0] === 'user') {
                if ($request_uri != '/user/edit') {
                    header("Location: /notes.io/user/edit");
                }

                require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/userController.php");
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

}


?>