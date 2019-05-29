<?php require('toonbieren.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bierBase</title>
</head>

<body>
    <h2>Maak een keuze:</h2>
    <a href="biertoevoegen.php">Voeg een bier toe</a><br>
    <p>Laat de bieren zien</p>

    <?php $bierArray = getBieren();
    echo buildTable($bierArray);
    ?>


</body>

</html>