<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bierbase";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bieren";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row['brouwerij'] . " - " . $row['naam'] . " - " . $row['land'] . " - " . $row['type'] . " - " . $row['alcoholpercentage'] . "% - " . $row['score'] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
