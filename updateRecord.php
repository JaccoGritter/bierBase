<?php

require('connect.php');

$id = $_POST['id'];
$brouwerij = $_POST['brouwerij'];
$naam = $_POST['naam'];
$land =  strtoupper($_POST['land']);
$type = $_POST['type'];
$alcoholpercentage = $_POST['alcoholpercentage'];
$score = $_POST['score'];
$opmerkingen = $_POST['opmerkingen'];

// prepare and bind
$stmt = $conn->prepare("UPDATE bieren SET brouwerij = ?, naam = ?, land = ?, type = ?, alcoholpercentage = ?, score= ?, opmerkingen = ? WHERE id = ? ");
$stmt->bind_param("ssssdisi", $brouwerij, $naam, $land, $type, $alcoholpercentage, $score, $opmerkingen, $id);

$stmt->execute();
$stmt->close();

$conn->close();

?>
<b>Record is gewijzigd!</b>
<br>
<a href="index.php">Home</a>