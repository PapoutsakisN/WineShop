<!DOCTYPE html>
<html>
<head>
    <title>Account Registration</title>

</head>
<body bgcolor="#ff6600">
<div class="container-fluid">
    <div class="row ">
        <div class="col-xl-12 col-md-12 col-xs-12">
            <h1>Account Registration</h1>
        </div>
    </div>
    <div class="row">
        <form action="registerAccount.php" method="POST" class="form-horizontal my-form" role="form">
            <div class="form-group">
                    <input type="radio" name="stat" value="dealer"> Dealer
                    <input type="radio" name="stat" value="client"> Client<br><br>
            </div>
            <div class="form-group">
                <label class="col-xl-3 col-md-3 col-xs-3 control-label">Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="Name" placeholder="Name">
                </div><!-- /col-sm-9 -->
            </div><!-- /form-group -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Telephone</label>
                <div class="col-sm-3">
                    <input type="tel" class="form-control" name="Telephone" placeholder="Telephone">
                </div><!-- /col-sm-9 -->
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="Address" placeholder="Address">
                </div><!-- /col-sm-9 -->
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Account</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="Account" placeholder="Account">
                </div><!-- /col-sm-9 -->
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Debt</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="Debt" value="0" readonly>
                </div><!-- /col-sm-9 -->
            </div>

<br><br>

<div class="row">
            <div class="col-xl-6 col-md-6 col-xs-6">
                <button class="btn btn-md btn-success btn-block"  name="Register" id="Register" >
                    <h4>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Register
                    </h4>
                </button>
            </div>
        </div>
    </form>   
    <br>
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
</div>
</body>
</html>

<?php
include('connection.php');

if(isset( $_POST["Register"])) {
    //first check for inputs
    if ($_POST["stat"] == "dealer") {    
        $insertsql = "INSERT INTO customers (username, telephone, address, account , debt , status)
        VALUES ('$_POST[Name]', '$_POST[Telephone]','$_POST[Address]','$_POST[Account]','0','Dealer')";
        $retval = mysqli_query($conect,$insertsql);
        if(!$retval ){
            die('Could not enter data: ' . mysqli_error($conect));
        }
    }else{
            $insertsql = "INSERT INTO customers (username, telephone, address, account , debt , status)
            VALUES ('$_POST[Name]', '$_POST[Telephone]','$_POST[Address]','$_POST[Account]','0','Client')";
            $retval = mysqli_query($conect,$insertsql);
            if(!$retval ){
                die('Could not enter data: ' . mysqli_error($conect));
            }
        }
}
    
?>


