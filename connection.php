<?php
$host="localhost";  // Host name
$username="root";  // Mysql username
$password="";  // Mysql password
$dbname="wocDB";   // Database name

$conect=new mysqli($host, $username,'', $password);
if(! $conect)
{
    die('Connection Failed'.mysql_error());
}

mysqli_select_db($conect, $dbname);
?>
