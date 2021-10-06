<!DOCTYPE html>
<html>
<body bgcolor="#ff6600">
<div class="container-fluid">
    <div class="row ">
        <div class="col-xl-12 col-md-12 col-xs-12">
            <h1>Return Product Procedure</h1>
        </div>
    </div>
    <br><br>
    <div class="row">
        <form class="form-inline" action="return.php" method="POST"  role="form">
            <div class="form-group">
                <label for="inputname">Enter the Customer's name</label>
                <input type="text" class="form-control" id="cname" name="cname" placeholder="" required>
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-danger">Validate</button>
        </form>
    </div>
    <br><br>
    <?php
    include('connection.php');
    if(isset( $_POST["submit"])) {
        if ($_REQUEST["cname"] == null) {
            echo("<h3>Please enter a name</h3>");
        }else{
            $name=$_POST["cname"];                                                  //We have the name.
            //We search for ID, if exists
            $getid="SELECT customerID FROM customers WHERE username='$name'";
            $result=mysqli_query($conect,$getid);
            if(mysqli_num_rows($result) == 0)                                     //There is nobody with this name
                echo("<h3>Error: There is not a client with this name!</h3>");
            else{
                $cID = mysqli_fetch_array($result);  //we have the customer id
                $getorder="SELECT * FROM orders WHERE customerID='$cID[0]'";
                $result=mysqli_query($conect,$getorder);
                if(mysqli_num_rows($result) == 0){
                    echo("<h3>Sorry! There are not any orders with this customer!</h3>");
                }
                else{
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo("<tr>");
                        $orderID = $row["orderID"];
                        $getorder = "SELECT orderID FROM orders  WHERE orderID='$orderID'";
                        $orderresult=mysqli_query($conect,$getorder);
                        $ordertable=mysqli_fetch_array($orderresult);
                        echo("<td>OrderID:" . $ordertable[0] . "&nbsp&nbsp</td>");
                        echo("<td>CustomerID:" . $row["customerID"] . "&nbsp&nbsp</td>");
                        echo("<td>ProductID:" . $row["productID"] . "&nbsp&nbsp</td>");
                        echo("<td>Date:" . $row["dateoo"] . "&nbsp&nbsp</td>");
                        echo("<td>Amount:" . $row["amount"] . "&nbsp&nbsp</td>");
                        echo("<td>Order State:" . $row["orderstate"] . "&nbsp&nbsp</td>");
                        echo("<td>Quantity:" . $row["quantity"] . "&nbsp&nbsp</td>");
                        echo("<td>Kind:" . $row["kind"] . "&nbsp&nbsp</td>");
                       // echo("<td>" . $row["amount"] . "&nbsp</td>");
                        echo("</tr>");
                    }
                }
 
            }
        }
    }
    ?>
    <div>
        <form class="form-inline" action="return.php" method="POST"  role="form">
 
            <div class="form-group">
                <label for="inputname">OrderID</label>
                <input type="text" class="form-control" id="oid" name="oid" placeholder="Order ID">
            </div>
            <button type="submit1" name="submit1" id="submit1" >Return Order</button>
        </form>
    </div>
<?php
        include('connection.php');
        if(isset( $_POST["submit1"])) {
            if ($_POST["oid"] == null) {
                echo("<h3>Please enter an order ID</h3>");
            }else{
                $oid=$_POST["oid"];                                                  //We have the order.
                //We search for ID, if exists
                $getid="SELECT orderID FROM orders WHERE orderID='$oid'";
                $result=mysqli_query($conect,$getid);
                if(mysqli_num_rows($result) == 0)                                     //There is no order with this id
                    echo("<h3>Error: There is not an order with this ID!</h3>");
                else{
                    $oID = mysqli_fetch_array($result);                               //We have the order
                    $deletefromorders = "DELETE FROM orders WHERE orderID='$oID[0]'";
                    $result = mysqli_query($conect,$deletefromorders);
                    if (!$result)
                        die('Error: Could not return order : ' . mysql_error());
                    
                    echo("<h3>Success: Order returned </h3>");
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

