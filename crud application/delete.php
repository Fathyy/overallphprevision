<?php
include_once 'db_connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    
    $sql = "DELETE FROM persons WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    if($result){
        header('Location: display.php');
    }
    else{
        die(mysqli_error($connection));
    }
}