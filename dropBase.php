
<?php
include('connection.php');
 
$dropsql="DROP DATABASE wocdb";
if ($conect->query($dropsql) !== TRUE)
    echo "Error deleting DB: " . $conect->error;
//$conn->close();
$conect->close();
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>woc Drop DB</title>
</head>
<body bgcolor="#ff6600">
<div class="container-fluid">
    <div class="row ">
        <div class="col-xl-12 col-md-12 col-xs-12">
            <h1>Deleting DB</h1>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xl-3 col-md-3 col-xs-3">
            <a href="index.php">
                <button class="btn btn-md btn-primary btn-block"  id="home" >
                    <h4>
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        Home
                    </h4>
                </button>
            </a>
        </div>
    </div>
</div>
</body>
 
