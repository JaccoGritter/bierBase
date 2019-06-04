
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bierBase</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">bierBase&trade;</h2>
                        <a href="biertoevoegen.php" class="btn btn-success pull-right">Bier toevoegen</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "connect.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM bieren";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Brouwerij</th>";
                                        echo "<th>Naam</th>";
                                        echo "<th>Land</th>";
                                        echo "<th>Type</th>";
                                        echo "<th>AlcPerc</th>";
                                        echo "<th>Score</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['brouwerij'] . "</td>";
                                        echo "<td>" . $row['naam'] . "</td>";
                                        echo "<td>" . $row['land'] . "</td>";
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>" . $row['alcoholpercentage'] . "</td>";
                                        echo "<td>" . $row['score'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='toonbier.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='bierveranderen.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set (geheugen vrij geven)
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>Geen records gevonden.</em></p>";
                        }
                    } else{
                        echo "ERROR: Unable to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>