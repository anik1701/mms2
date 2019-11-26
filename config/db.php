<?php

$host = "localhost";
$username = 'root';
$password = '';
$database = "mms";

$db = new mysqli($host, $username, $password, $database);

if ($db->connect_errno){
    echo "Connect to failed. Error Number ". $db->connect_errno;
}

?>