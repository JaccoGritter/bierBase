
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

    echo "<table>"; // start a table tag in the HTML

    echo "<th>Brouwerij</th><th>Naam</th><th>LvH</th><th>Type</th><th>Alc%</th><th>Score</th>";

    while ($row = $result->fetch_assoc()){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['brouwerij'] . "</td><td>" . $row['naam'] . "</td><td>" . $row['land'] . "</td><td>" . $row['type'] . "</td><td>" . $row['alcoholpercentage'] . "</td><td>" . $row['score'] . "</td></tr>";
    }

    echo "</table>"; //Close the table in HTML

} else {
    echo "0 results";
}

$conn->close();
