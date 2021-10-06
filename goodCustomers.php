
<!DOCTYPE html>
<html>
<head>
    <title>State of Good Customers</title>
</head>
<body bgcolor="#ff6600">
<div class="container-fluid">
    <div class="row ">
        <div class="col-xl-12 col-md-12 col-xs-12">
            <h1>State of Good Customers</h1>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-xs-12">
            <table class="table table-striped">
                <tr class="active">
                    <td>customerID</td>
                    <td>Name</td>
                    <td>Telephone</td>
                    <td>Address</td>
                    <td>Account</td>
                    <td>Debt</td>
                    <td>Status</td>
                </tr>
                <?php
 
 include('connection.php');
 
 
               $getCustomersql = "SELECT * FROM customers WHERE debt=0 ORDER BY sum";

                $result = mysqli_query($conect,$getCustomersql);
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo("<tr>");
                        $IDD = $row["customerID"];
                        $getNamesql = "SELECT username FROM customers  WHERE customerID='$IDD'";
                        $nameresult=mysqli_query($conect,$getNamesql);
                        $nametable=mysqli_fetch_array($nameresult);
                        echo("<td>" . $row["customerID"] . "</td>");
                        echo("<td>" . $nametable[0] . "</td>");
                        echo("<td>" . $row["telephone"] . "</td>");
                        echo("<td>" . $row["address"] . "</td>");
                        echo("<td>" . $row["account"] . "</td>");
                        echo("<td>" . $row["debt"] . "</td>");
                        echo("<td>" . $row["status"] . "</td>");
                        echo("</tr>");
                    }
                }else
                {
                    echo("<tr>");
                    echo("<td>0 results</td>");
                    echo("<td>0 results</td>");
                    echo("<td>0 results</td>");
                    echo("<td>0 results</td>");
                    echo("<td>0 results</td>");
                    echo("</tr>");
                }
 
                ?>
 
            </table>
        </div>
    </div>
 
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
 
