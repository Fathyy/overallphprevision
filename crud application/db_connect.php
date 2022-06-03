<?php
$hostname="localhost";
$username="root";
$password="";
$db_name="overallphprevision";
$connection = mysqli_connect("$hostname", "$username", "$password", "$db_name");
if($connection){
    echo "successful connection";
}
else{
    echo "failed to connect".mysqli_connect_error();
}
