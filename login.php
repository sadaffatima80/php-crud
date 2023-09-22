<?php
$login=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'dbconnect.php';
$username= $_POST["username"];
$password= $_POST["password"];   
$hash=password_hash($password, PASSWORD_DEFAULT);
    $sql = "Select * from login where username='$username'";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $hash)){
                $login=true;
               session_start();
               $_SESSION['loggedin']=true;
               $_SESSION['username']=$username;
             header("location: crud.php");
            }
           else{
          echo '<script>alert("Invalid Password!")</script>';
    }
        }
        
        
    }
    else{
          echo '<script>alert("Invalid credentials!")</script>';
    }

}

?>   
<!DOCTYPE html>
<html>
<head>
    <title>PHP project</title>
<script>
function abc()
{
n=document.forms["xyz"]["uname"].value
if(n=="");
{alert("Please enter name");}
return false
}
</script>
<?php
include 'dbconnect.php';
?>

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
    <h2>Login Form</h2>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login" onclick="return(abc())">
    </form>
    <h3>
        Don't have an account! <a href="signup.php">Sign up</a>
    </h3>
</div>
<?php include 'footer.php'; ?>
   
</body>
</html>






