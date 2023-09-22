<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'dbconnect.php';
$username= $_POST["username"];
$password= $_POST["password"];   
$exist=false;
$existsql="SELECT * from login WHERE username= '$username'";
$result= mysqli_query($conn, $existsql);
$numrowsexist= mysqli_num_rows($result);
    if($numrowsexist >0){
        $exist=true;
        $showerroexist="User already exist";
    }
    else{
     $exist=false;
     echo '<script>alert("You have successfully signed up, Login now!")</script>';
            }


if($exist==false){
    $hash=password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO login (username, password) VALUES ('$username', ' $hash')";
$result=mysqli_query($conn, $sql);
}
   
 else {
     echo '<script>alert("User already exists!!")</script>';
    }
}

?>    
<!DOCTYPE html>
<html>
<head>
    <title>PHP project</title>


    <style>
      
        #formdiv {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            height: 90vh;
            margin: 0;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }
        
    </style>
</head>
<body>
   <?php include 'header.php'; ?>
    <div id="formdiv">
    <h2>Signup Form</h2>
    <form method="post" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Signup">
    </form>
    <h3>
        Already have an account! <a href="login.php">Sign in</a>
    </h3>
</div>
<?php include 'footer.php'; ?>

</body>
</html>






