<?php
require('init.php');
$parsed_path = parse_url($_SERVER['REQUEST_URI']);
$request_uri = str_replace('/notes.io', '', $parsed_path['path']); // Remove the /notes.io from the URL
$segment = explode('/', trim($request_uri, '/')); // Get the URL segments

?>

<?php

//Checks if the request is an API request. If yes, then route it to the API Controller
if($segment[0] == 'api'){
    require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/routes/api.php");
}
//If not, then route it to the Web Controller
else {
    require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/routes/web.php");
}
?>