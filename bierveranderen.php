<?php require('toonbieren.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bierBase record toevoegen</title>
</head>

<body>
    <form action="updateRecord.php" method="POST">
        ID: <input type="number" name = "id" readonly size = "4" value = <?php echo $_GET["id"]?> > <br><br>
        Brouwerij:<br>
        <input type="text" name="brouwerij" required value = "<?php echo getBier($_GET["id"])["brouwerij"] ?>"> <br>
        Naam van het bier<br>
        <input type="text" name="naam" required value = "<?php echo getBier($_GET["id"])["naam"] ?>" ><br>
        Land van herkomst<br>
        <input type="text" name="land" maxlength="2" size="2" value = "<?php echo getBier($_GET["id"])["land"] ?>" required"><br>
        Type van het bier<br>
        <input type="text" name="type" value = "<?php echo getBier($_GET["id"])["type"] ?>" ><br>
        Alcoholpercentage<br>
        <input type="number" name="alcoholpercentage" value="6.0" min="0" max="15" step="0.1" value = "<?php echo getBier($_GET["id"])["alcoholpercentage"] ?>" required><br>
        Score (0-10)<br>
        <input type="number" name="score" value="6.0" min="1" max="10" step="0.5" value = "<?php echo getBier($_GET["id"])["score"] ?>" required><br>
        Opmerkingen <br>
        <textarea name="opmerkingen" style="width:20rem; height:5rem;" > <?php echo getBier($_GET["id"])["opmerkingen"] ?> </textarea><br>
        <input type="submit" value="wijzig">
    </form>
    <br>
    <a href="index.php>Home</a>
</body>

</html>