<?php
include 'dbconnect.php';

if(isset($_POST['add'])){
    $profilepicture=$_FILES['profilepicture']['name'];
    $tmpname=$_FILES['profilepicture']['tmp_name'];
    $location= 'uploads/'.$profilepicture;
    move_uploaded_file($tmpname, $location);
    
    $name=$_POST['name'];
     $gender=$_POST['gender'];
    $address=$_POST['address'];
   $insert= mysqli_query($conn, "INSERT INTO `crud`(`profilepicture`, `name`, `gender`, `address`) VALUES ('$location','$name','$gender','$address')");
   if($insert){
      header("location:crud.php");
   }
   else{
       echo "<h1>record not added</h1>";
   }
} 
?>