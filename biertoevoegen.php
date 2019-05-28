<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bierBase record toevoegen</title>
</head>
<body>
    <form action = "addRecord.php">
    Bouwerij:<br>
    <input type="text" name="brouwerij"><br>
    Naam van het bier<br>
    <input type="text" name="biernaam"><br>
    Land van herkomst<br>
    <input type = "text" name = "lvh" maxlength="2"><br>
    Alcoholpercentage<br>
    <input type = "number" name = "alcperc" min = "0" max = "15" step = "0.1"><br>
    Score (0-10)<br>
    <input type = "number" name = "score" min = "0" max = "10" step = "0.5"><br>
    Opmerkingen <br>
    <textarea name="message" style="width:20rem; height:5rem;"></textarea><br>
    <input type="submit" value = "verzend">
    </form>
</body>
</html>