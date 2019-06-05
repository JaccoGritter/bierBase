
<?php
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$brouwerij = $naam = $land = $type = $opmerkingen = $alcoholpercentage = $score = $opmerkingen = "";

$brouwerij_err = $naam_err = $land_err = $type_err = $opmerkingen_err = $alcoholpercentage_err = $score_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate brouwerij
    $input_brouwerij = trim($_POST["brouwerij"]);
    if(empty($input_brouwerij)){
        $brouwerij_err = "Voer de brouwerij in";
    } elseif(!filter_var($input_brouwerij, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $brouwerij_err = "Voer een geldige naam in";
    } else{
        $brouwerij = $input_brouwerij;
    }
    
    // Validate bier naam
    $input_naam = trim($_POST["naam"]);
    if(empty($input_naam)){
        $naam_err = "Voer de naam van het bier in";     
    } else{
        $naam = $input_naam;
    }

    // Validate land
    $input_land = trim($_POST["land"]);
    if(empty($input_land) || strlen($input_land) != 2){
        $land_err = "Voer de afkorting van het land in. Gebruik 2 letters";     
    } else{
        $land = $input_land;
    }
    
    // Validate bier type
    $input_type = trim($_POST["type"]);
    if(empty($input_type)){
        $type_err = "Voer het type van het bier in";     
    } else{
        $type = $input_type;
    }

    // Validate alcoholpercentage
    $input_alcoholpercentage = trim($_POST["alcoholpercentage"]);
    if(empty($input_alcoholpercentage)){
        $alcoholpercentage_err = "Voer het alcoholpercentage in";     
    } elseif(!is_numeric($input_alcoholpercentage)){
        $alcoholpercentage_err = "Voer een getal in";
    } else{
        $alcoholpercentage = $input_alcoholpercentage;
    }

    // Validate score
    $input_score = trim($_POST["score"]);
    if(empty($input_score)){
        $score_err = "Voer een score in";     
    } elseif(!is_numeric($input_score)){
        $score_err = "Voer een getal in";
    } else{
        $score = $input_score;
    }

    // Validate not required for opmerkingen
    $opmerkingen = trim($_POST["opmerkingen"]);

    
    // Check input errors before inserting in database
    if(empty($brouwerij_err) && empty($naam_err) && empty($land_err) && empty($type_err) && empty($alcoholpercentage_err) && empty($score_err)){
        // Prepare an insert statement
        $sql = "UPDATE bieren SET brouwerij = ?, naam = ?, land = ?, type = ?, alcoholpercentage = ?, score = ?, opmerkingen = ? WHERE id = ?";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssddsi", $brouwerij, $naam, $land, $type, $alcoholpercentage, $score, $opmerkingen, $id);
            
            // Set parameters
            // $param_name = $name;
            // $param_address = $address;
            // $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Er ging iets niet goed. Probeer het later nog eens";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM bieren WHERE id = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $id);
            
            // // Set parameters
            // $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Bier wijzigen</h2>
                    </div>
                    <p>Vul dit formulier in om kenmerken van het bier te wijzigen in de database</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Brouwerij</label>
                            <input type="text" name="brouwerij" class="form-control" value="<?php echo $brouwerij; ?>">
                            <span class="help-block"><?php echo $brouwerij_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($naam_err)) ? 'has-error' : ''; ?>">
                            <label>Naam</label>
                            <input type="text" name="naam" class="form-control" value=" <?php echo $naam; ?> ">
                            <span class="help-block"><?php echo $naam_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($land_err)) ? 'has-error' : ''; ?>">
                            <label>Land</label>
                            <input type="text" name="land" class="form-control" value="<?php echo $land; ?>">
                            <span class="help-block"><?php echo $land_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
                            <span class="help-block"><?php echo $type_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($alcoholpercentage_err)) ? 'has-error' : ''; ?>">
                            <label>Alcoholpercentage</label>
                            <input type="text" name="alcoholpercentage" class="form-control" value="<?php echo $alcoholpercentage; ?>">
                            <span class="help-block"><?php echo $alcoholpercentage_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($score_err)) ? 'has-error' : ''; ?>">
                            <label>Score</label>
                            <input type="text" name="score" class="form-control" value="<?php echo $score; ?>">
                            <span class="help-block"><?php echo $score_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Opmerkingen</label>
                            <textarea name="opmerkingen" class="form-control"><?php echo $opmerkingen; ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Wijzig">
                        <a href="index.php" class="btn btn-default">Annuleer</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>