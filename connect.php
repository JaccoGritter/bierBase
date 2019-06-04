<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bierbase";


// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
