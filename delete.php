<?php
include 'dbconnect.php';
$id=$_GET['id'];
$del=mysqli_query($conn, "DELETE FROM `crud` WHERE id=$id");
if($del){
   header("location:crud.php");
}
else{
    echo 'record not deleted';
}

?>