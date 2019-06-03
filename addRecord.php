<?php

require('connect.php');

// prepare and bind
$stmt = $conn->prepare("INSERT INTO bieren (brouwerij, naam, land, type, alcoholpercentage, score, opmerkingen) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssdds", $brouwerij, $naam, $land, $type, $alcoholpercentage, $score, $opmerkingen);

$brouwerij = $_POST['brouwerij'];
$naam = $_POST['naam'];
$land =  strtoupper($_POST['land']);
$type = $_POST['type'];
$alcoholpercentage = $_POST['alcoholpercentage'];
$score = $_POST['score'];
$opmerkingen = $_POST['opmerkingen'];

$stmt->execute();

$stmt->close();
$conn->close();


?>
<br>
<h2><?php echo $naam . " " ?> succesvol toegevoegd!</h2>
<a href="index.php">Home</a>