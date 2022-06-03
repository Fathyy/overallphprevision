<?php
// we are going to connect to the database in a object oriented mysqli way
require 'db.php';

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $location=$_POST['location'];

    $mysqli->query("INSERT INTO data (name, location) 
    VALUES('$name', '$location')") or die($mysqli->error);
}
