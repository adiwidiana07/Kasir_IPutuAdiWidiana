<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_kasir";
$config = mysqli_connect($host,$user,$pass,$db);

if(!$config){
die("tak konek");
}
// else echo "konek"
?>