
<?php

function getBieren($sql = "SELECT * FROM bieren")
{

    require('connect.php');

    //$sql = "SELECT * FROM bieren";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $resultArray = [];
        while ($row = $result->fetch_assoc()) {   //Creates a loop to loop through results
            $resultArray[$row['id']] = $row;
        }
    } else echo "error";

    return $resultArray;

    $conn->close();
}

function getBier($bierid)
{

    require('connect.php');

    $sql = "SELECT * FROM bieren WHERE id = " . $bierid;
    $result = $conn->query($sql);

    $resultArray = $result->fetch_assoc();    // get result as associative array

    return $resultArray;

    $conn->close();
}

function buildTable($bierArray)
{
    $myTable = "<table><th>id</th><th>brouwerij</th><th>naam</th><th>land</th><th>type</th><th>alc%</th><th>score</th><th>opmerkingen</th>";
    
    foreach ($bierArray as $key => $valueArray) {
        $myTable = $myTable . "<tr>";
        foreach ($valueArray as $key2 => $value2) {
            $myTable = $myTable . "<td>" . $value2 . "</td>";
        }
        $myTable = $myTable . '<td><a href="bierveranderen.php?q=' . $valueArray["id"] . '">edit</a></td></tr>';
    }
    $myTable = $myTable . "</table>";
    return $myTable;
}
