<!DOCTYPE html>
<html>
<head>
    
    <title>Close Account</title>
</head>
<body bgcolor="#ff6600">
<div>
            <h1>Account Cancellation</h1>
    <div>
        <form class="form-inline" action="closeAccount.php" method="POST"  role="form">
 
            <div class="form-group">
                <label for="inputname">Name</label>
                <input type="text" class="form-control" id="cname" name="cname" placeholder="Name">
            </div>
            <button type="submit" name="submit" id="submit" >Cancel Account</button>
        </form>
    </div>
    <?php
        include('connection.php');
        if(isset( $_POST["submit"])) {
            if ($_REQUEST['cname'] == null) {
                echo("<h3>Please enter a name</h3>");
            }else{
                $name=$_POST['cname'];                                                  //We have the name.
                //We search for ID, if exists
                $getidsql="SELECT customerID FROM customers WHERE username='$name'";
                $result=mysqli_query($conect,$getidsql);
                if(mysqli_num_rows($result) == 0)                                     //There is nobody with this name
                    echo("<h3>Error: There is not a client with this name!</h3>");
                else{
                    $cID = mysqli_fetch_array($result);                               //We have and the acountID
                    $getdebt="SELECT debt FROM customers WHERE customerID='$cID[0]'";
                    $result=mysqli_query($conect,$getdebt);
                    $debt = mysqli_fetch_array($result);
                    if ($debt[0] != 0) {                                                        //error cant delete! has a debt
                        echo("<h3>Error: Customer has a debt!</h3>");
                    } else {                                                                   //we are ok to delete
                        $deletefromorder = "DELETE FROM orders WHERE customerID='$cID[0]'";
                        $result = mysqli_query($conect,$deletefromorder);
                        if (!$result)
                            die('Error: Could not delete customer from customers table: ' . mysqli_error($conect));
                        $deletefromcustomers = "DELETE FROM customers WHERE customerID='$cID[0]'";
                        $result = mysqli_query($conect,$deletefromcustomers);
                        if (!$result)
                            die('Error: Could not delete customer from customers table: ' . mysqli_error($conect));
                        echo("<h3>Success: Customer deleted from database</h3>");
                        }
                    }
                        
                }
        }
                
    ?> 
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
</body>
</html>
 
