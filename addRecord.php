
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

$brouwerij = $_POST['brouwerij'];
$naam = $_POST['naam'];
$land =  $_POST['land'];
$type = $_POST['type'];
$alcoholpercentage = $_POST['alcoholpercentage'];
$score = $_POST['score'];
$opmerkingen = $_POST['opmerkingen'];

$sql = "INSERT INTO bieren (brouwerij, naam, land, type, alcoholpercentage, score, opmerkingen) VALUES ('$brouwerij', '$naam', '$land', '$type', $alcoholpercentage, $score, '$opmerkingen')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
<br>
<a href="index.php">Home</a>