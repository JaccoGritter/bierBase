<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "connect.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM bieren WHERE id = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $brouwerij = $row["brouwerij"];
                $naam = $row["naam"];
                $land = $row["land"];
                $type = $row["type"];
                $alcoholpercentage = $row["alcoholpercentage"];
                $score = $row["score"];
                $opmerkingen = $row["opmerkingen"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    $stmt->close();
    
    // Close connection
    $mysqli->close();
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bekijk Bier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Bekijk Bier</h1>
                    </div>
                    <div class="form-group">
                        <label>Brouwerij</label>
                        <p class="form-control-static"><?php echo $row["brouwerij"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Naam</label>
                        <p class="form-control-static"><?php echo $row["naam"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Land</label>
                        <p class="form-control-static"><?php echo $row["land"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <p class="form-control-static"><?php echo $row["type"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Alcoholpercentage</label>
                        <p class="form-control-static"><?php echo $row["alcoholpercentage"]."%"; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Score (1-10)</label>
                        <p class="form-control-static"><?php echo $row["score"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Opmerkingen</label>
                        <p class="form-control-static"><?php echo $row["opmerkingen"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Terug</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>