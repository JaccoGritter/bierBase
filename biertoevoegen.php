<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bierBase record toevoegen</title>
</head>

<body>
    <form action="addRecord.php" method="POST">
        Bouwerij:<br>
        <input type="text" name="brouwerij" required><br>
        Naam van het bier<br>
        <input type="text" name="naam" required><br>
        Land van herkomst<br>
        <input type="text" name="land" maxlength="2" size="2" required"><br>
        Type van het bier<br>
        <input type="text" name="type"><br>
        Alcoholpercentage<br>
        <input type="number" name="alcoholpercentage" value="6.0" min="0" max="15" step="0.1" required><br>
        Score (0-10)<br>
        <input type="number" name="score" value="6.0" min="1" max="10" step="0.5" required><br>
        Opmerkingen <br>
        <textarea name="opmerkingen" style="width:20rem; height:5rem;"></textarea><br>
        <input type="submit" value="voeg toe">
    </form>
    <br>
    <a href="index.php">Home</a>
</body>

</html>