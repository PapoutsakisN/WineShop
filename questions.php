<!DOCTYPE html>
<html>  
    <head>  
        <title>Search  Contacts</title>  
    </head>  
        <body bgcolor="#ff6600">  
            <h3>Search  Contacts Details</h3>  
            <p>You  may search either by color , variety or winery</p>  
            <form  method="post" action="questions.php"  id="searchform">
                <div class="form-group">
                <label for="inputname">Enter the desired color </label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Color" required>
            </div>
            <button type="submit" name="submit" id="submit" >Search by Color</button>
            </form> 
            <form  method="post" action="questions.php"  id="searchform">
                <div class="form-group">
                <label for="inputname">Enter the desired variety </label>
                <input type="text" class="form-control" id="var" name="var" placeholder="Variety" required>
            </div>
            <button type="submit" name="submit1" id="submit1" >Search by variety</button>
            </form>
            <form  method="post" action="questions.php"  id="searchform">
                <div class="form-group">
                <label for="inputname">Enter the desired winery </label>
                <input type="text" class="form-control" id="winery" name="winery" placeholder="Winery" required>
            </div>
            <button type="submit" name="submit2" id="submit2" >Search by Winery</button>
            </form> 
        </body>  
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
</html> 
 <?php
        include('connection.php');
        if(isset( $_POST["submit"])) {
            if ($_REQUEST['color'] == null) {
                echo("<h3>Please enter a color</h3>");
            }else{
                $color=$_POST['color'];                                                  
                $getcolor="SELECT * FROM products WHERE color='$color'";
                $result=mysqli_query($conect,$getcolor);
                if(mysqli_num_rows($result) == 0)                                     
                    echo("<h3>Error: There is no such color!</h3>"); 
                }
                while ($row = mysqli_fetch_assoc($result))
                    {
                        echo("<tr>");
                        echo("<td>" . $row["productID"] . "&nbsp</td>");
                        echo("<td>" . $row["color"] . "&nbsp</td>");
                        echo("<td>" . $row["variety"] . "&nbsp</td>");
                        echo("<td>" . $row["productionDate"] . "&nbsp</td>");
                        echo("<td>" . $row["winery"] . "&nbsp</td>");
                        echo("<td>" . $row["value"] . "&nbsp</td>");
                        echo("<td>" . $row["productName"] . "&nbsp</td>");
                        echo("<td>" . $row["photo"] . "</td>");
                        echo("<br>");
                        echo("</tr>");
                    }
        }
        else if(isset( $_POST["submit1"])) {
            if ($_REQUEST['var'] == null) {
                echo("<h3>Please enter a variety</h3>");
            }else{
                $variety=$_POST['var'];                                                  
                $getvariety="SELECT * FROM products WHERE variety='$variety'";
                $result=mysqli_query($conect,$getvariety);
                if(mysqli_num_rows($result) == 0)                                     
                    echo("<h3>Error: There is no such variety!</h3>");         
                }
                while ($row = mysqli_fetch_assoc($result))
                    {
                        echo("<tr>");
                        echo("<td>" . $row["productID"] . "&nbsp</td>");
                        echo("<td>" . $row["color"] . "&nbsp</td>");
                        echo("<td>" . $row["variety"] . "&nbsp</td>");
                        echo("<td>" . $row["productionDate"] . "&nbsp</td>");
                        echo("<td>" . $row["winery"] . "&nbsp</td>");
                        echo("<td>" . $row["value"] . "&nbsp</td>");
                        echo("<td>" . $row["productName"] . "&nbsp</td>");
                        echo("<td>" . $row["photo"] . "</td>");
                        echo("<br>");
                        echo("</tr>");
                    }
        }
        else if(isset( $_POST["submit2"])) {
            if ($_REQUEST['winery'] == null) {
                echo("<h3>Please enter a winery</h3>");
            }else{
                $winery=$_POST['winery'];                                                  
                $getwinery="SELECT * FROM products WHERE winery='$winery'";
                $result=mysqli_query($conect,$getwinery);
                if(mysqli_num_rows($result) == 0)                                     
                    echo("<h3>Error: There is no such winery!</h3>");                        
                }
                while ($row = mysqli_fetch_assoc($result))
                    {
                        echo("<tr>");
                        echo("<td>" . $row["productID"] . "&nbsp</td>");
                        echo("<td>" . $row["color"] . "&nbsp</td>");
                        echo("<td>" . $row["variety"] . "&nbsp</td>");
                        echo("<td>" . $row["productionDate"] . "&nbsp</td>");
                        echo("<td>" . $row["winery"] . "&nbsp</td>");
                        echo("<td>" . $row["value"] . "&nbsp</td>");
                        echo("<td>" . $row["productName"] . "&nbsp</td>");
                        echo("<td>" . $row["photo"] . "</td>");
                        echo("<br>");
                        echo("</tr>");
                    }
        }
                
    ?>
