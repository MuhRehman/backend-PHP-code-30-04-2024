<?php 



header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$mysqli = new mysqli("localhost", "root", "", "bazaar_db");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}else{

    echo "Successfully to connect to MySQL: " . $mysqli -> connect_error;
}

?>