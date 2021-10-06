<?php
include('connection.php');


//Create DB
$sql = "CREATE DATABASE wocDB";
if ($conect->query($sql) !== TRUE){
    echo "Error creating DB: " . $conect->error;
}


//Create connection
$datab = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conect->connect_error){
    die("Connection failed: " . $conect->connect_error);
}


//Create Customers table
$customerstable = "CREATE TABLE customers (
    customerID INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    telephone FLOAT(10),
    address VARCHAR(30),
    account INT(30),
    debt INT(10),
    status VARCHAR(7),
    sum INT(40) UNSIGNED
    )";

if ($datab->query($customerstable) !== TRUE)
    echo "Error creating table Customers: " . $datab->error;


//Create Product table
$productstable = "CREATE TABLE products (
    productID INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    color VARCHAR(10),
    variety VARCHAR(30),
    productionDate VARCHAR(10),
    winery VARCHAR(30),
    value FLOAT(10),
    productName VARCHAR(10),
    photo VARCHAR(30)
)";

if ($datab->query($productstable) !== TRUE)
echo "Error creating table Products: " . $datab->error;


//Create Order table
$orderstable = "CREATE TABLE orders (
    orderID INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customerID INT(30) UNSIGNED ,
    productID INT(30) UNSIGNED,
    dateoo VARCHAR(10),
    amount INT(10),
    orderstate BOOLEAN DEFAULT 0,
    discount FLOAT(10),
    quantity INT(4),
    kind VARCHAR(10)
)";

if ($datab->query($orderstable) !== TRUE)
echo "Error creating table Orders: " . $datab->error;


//Initialize tables

$conect= new  mysqli($host, $username,'', $password);
mysqli_select_db($conect, $dbname );


//Initialize 2 Clients and 2 Dealers
$insertsql = "INSERT INTO customers (username, telephone, address, account , debt , status, sum)
VALUES ('John', '6911111111', 'New York','234567890','0','Client','150')";

$retval = mysqli_query($conect,$insertsql);
if(!$retval )
  die('Could not enter data: ' . mysqli_error($conect));


$insertsql = "INSERT INTO customers (username, telephone, address, account , debt , status, sum)
VALUES ('Mary', '6911111222', 'London','456789123','30','Client','300')";

$retval = mysqli_query($conect,$insertsql);
if(!$retval )
  die('Could not enter data: ' . mysqli_error($conect));
 

$insertsql = "INSERT INTO customers (username, telephone, address, account , debt , status, sum)
VALUES ('Panagiotis', '6911666666', 'Salonika','789123456','0','Dealer', '400')";
  
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
   die('Could not enter data: ' . mysqli_error($conect));
  

$insertsql = "INSERT INTO customers (username, telephone, address, account , debt , status, sum)
VALUES ('Skroutz', '6988888888', 'Vegas','987654321','100','Dealer', '200')";
 
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
   die('Could not enter data: ' . mysqli_error($conect));
  

//Initialize 15 products
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('red','syrah - kotsifali', '03/04/2007', 'Alexakis', '8', 'Kotsifali Syrah', 'C:\xampp\htdocs\Project\Photos\1.jpg' )";

$retval = mysqli_query($conect,$insertsql);
if(!$retval )
  die('Could not enter data: ' . mysqli_error($conect));


$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('red','mouverde', '01/09/2006', 'Manousakis', '9,5', 'Nostos Mourverde', 'C:\xampp\htdocs\Project\Photos\2.png' )";
  
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
  die('Could not enter data: ' . mysqli_error($conect));  


$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('red','syrah - cavignan', '05/12/2008', 'Ampelones Karavitaki', '12', 'Elia', 'C:\xampp\htdocs\Project\Photos\3.png' )";

$retval = mysqli_query($conect,$insertsql);
if(!$retval )
  die('Could not enter data: ' . mysqli_error($conect));

  
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('red','syrah', '10/06/2005', 'Douloufakis', '17', 'Alargo', 'C:\xampp\htdocs\Project\Photos\4.png' )";
  
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

    
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('red','cabernet - sauvignon', '19/08/2010', 'Michalakis', '10', 'Kotsifali Syarh', 'C:\xampp\htdocs\Project\Photos\5.jpg' )";
    
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));


$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('white','chardonnay', '25/03/2012', 'Douloufakis', '7', 'Chardonnay', 'C:\xampp\htdocs\Project\Photos\6.png' )";
      
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));


$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('white','malvasia - aromatica', '30/01/2011', 'Alexakis', '9', 'Malvasia Aromatica', 'C:\xampp\htdocs\Project\Photos\7.jpg' )";
        
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));        

          
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('white','vilana - roussanne', '15/04/2009', 'Manousakis', '11,5', '2 Mazi', 'C:\xampp\htdocs\Project\Photos\8.png' )";
          
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

            
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('white','vidiano', '18/08/2005', 'Maragkakis', '5,5', '8h Texni', 'C:\xampp\htdocs\Project\Photos\9.jpg' )";
            
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

              
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('white','dafni', '29/07/2011', 'Lyrarakis', '13', 'Psarades', 'C:\xampp\htdocs\Project\Photos\10.png' )";
              
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

                
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('rose','syrah - kotsifali', '31/06/2013', 'Douloufakis', '12', 'Enotria', 'C:\xampp\htdocs\Project\Photos\11.jpg' )";
                
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

                  
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('rose','mantilari - kotsifali', '10/10/1997', 'Michalakis', '14', 'Le Manoir', 'C:\xampp\htdocs\Project\Photos\12.jpg' )";
                  
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

                    
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('rose','syrah - mantilari', '25/09/2000', 'Diamantakis', '16,5', 'Prinos', 'C:\xampp\htdocs\Project\Photos\13.png' )";
                    
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

                
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('rose','mantilari - kotsifali', '03/11/2004', 'Mediterra', '10,5', 'Vin de Crete', 'C:\xampp\htdocs\Project\Photos\14.jpg' )";
                      
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

                        
$insertsql = "INSERT INTO products (color, variety, productionDate, winery, value, productName, photo)
VALUES ('rose','kotsifali - liatiko', '22/02/2007', 'Digenakis', '8', 'Ampelou Erga', 'C:\xampp\htdocs\Project\Photos\15.png' )";
                        
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

//Initialize Orders

$insertsql = "INSERT INTO orders (customerID, productID, dateoo, amount, orderstate, discount, quantity, kind)
VALUES ( '1','4','27/10/2017','34','1','0','2','wine')";
                        
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

$insertsql = "INSERT INTO orders (customerID, productID, dateoo, amount, orderstate, discount, quantity, kind)
VALUES ( '2','12','23/06/2017','140','0','0','10','wine')";
                            
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));

$insertsql = "INSERT INTO orders (customerID, productID, dateoo, amount, orderstate, discount, quantity, kind)
VALUES ( '3','15','07/11/2017','88','0','15','11','wine')";
                            
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
    die('Could not enter data: ' . mysqli_error($conect));
    
$insertsql = "INSERT INTO orders (customerID, productID, dateoo, amount, orderstate, discount, quantity, kind)
VALUES ( '4','8','15/01/2017','34,5','1','15','3','wine')";
                            
$retval = mysqli_query($conect,$insertsql);
if(!$retval )
        die('Could not enter data: ' . mysqli_error($conect));

$conect->close();
$datab->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>WOC Initialize DB</title>
</head>
<body bgcolor="#ff6600">
<div class="container-fluid">
    <div class="row ">
        <div class="col-xl-12 col-md-12 col-xs-12">
            <h1>Initializing DB</h1>
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

