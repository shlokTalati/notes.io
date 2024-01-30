<?php
require('init.php');
$parsed_path = parse_url($_SERVER['REQUEST_URI']);
$request_uri = str_replace('/notes.io', '', $parsed_path['path']); // Remove the /notes.io from the URL
$segment = explode('/', trim($request_uri, '/')); // Get the URL segments


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


//Checks if the request is an API request. If yes, then route it to the API Controller
if($segment[0] == 'api'){

    require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/controllers/apiController.php");

}
else {
    require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/routes/web.php");
}
?>