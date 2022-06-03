<?php
$servername="localhost";
$hostname="root";
$password="";
$dbname="shoppingcart1";

$conn=mysqli_connect($servername, $hostname, $password, $dbname)
or die('cannot connect to database');