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

//echo "Connected successfully";
//$_POST["email"]

$sql = "INSERT INTO bieren (brouwerij, naam, land, type, alcoholpercentage, score, opmerkingen) VALUES ('Hertog Jan', 'Triple', 'NL', 'Triple', 9.1, 8.0, 'Heerlijk biertje!')";

// $sql = "INSERT INTO bieren (brouwerij, naam, land, biertype, alcoholpercentage, score, opmerkingen) VALUES ($_POST['brouwerij'], $_POST['naam'], $_POST['land'], $_POST['type'], $_POST['alcoholpercentage'], $_POST['score'], $_POST['opmerkingen')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>