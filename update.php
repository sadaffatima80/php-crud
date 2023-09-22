<?php
include 'dbconnect.php';

if(isset($_POST['edit'])){
    $profilepicture=$_FILES['profilepicture']['name'];
    $tmpname=$_FILES['profilepicture']['tmp_name'];
    $location= 'uploads/'.$profilepicture;
    
     
    $id=$_POST['id'];
    $name=$_POST['name'];
     $gender=$_POST['gender'];
    $address=$_POST['address'];
    
    if (!empty($profilepicture)){
    move_uploaded_file($tmpname, $location);
   $update= mysqli_query($conn, "UPDATE `crud` SET `profilepicture`='$location',`name`='$name',`gender`='$gender',`address`='$address' WHERE id=$id");
    }
    else{
          $update= mysqli_query($conn, "UPDATE `crud` SET `name`='$name',`gender`='$gender',`address`='$address' WHERE id=$id");
    }
   if($update){
      header("location:crud.php");
   }
   else{
       echo "<h1>record not added</h1>";
   }
} 
?>