<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true){
    header("location:login.php");
    exit;
}
include 'dbconnect.php';
$id=$_GET['id'];
$record= mysqli_query($conn, "SELECT * FROM `crud` WHERE id=$id");
$data= mysqli_fetch_array($record);

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP project</title>
    <link rel="stylesheet" href="crud.css">
    <style>
    html{
        font-size:80%;
    }
    #container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        #form-container {
            background-color: #ffffff;
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
            max-width: 70vw;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight:bold;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 3px solid #ccc;
            border-radius: 10px;
            text-align:center;
        }

        input[type="submit"] {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: gray;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
 <header>
          <h1>Hey <?php echo $_SESSION['username'] ?> ! Welcome to my PHP project!</h1>
                <ul class="menu">
    
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
    </header>
<section id="container">
<div id="form-container">
<h1>Update Record</h1>
 <img src="<?php echo $data['profilepicture'] ?>" style="height:15rem; width:15rem; margin-left:30%" >
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?php echo $data['id'] ?>">
        <label for="profilepicture">Profile Picture:</label>
     <input type="file" id="profilepicture" name="profilepicture" accept="image/*" value="<?php echo $data['profilepicture'] ?> required><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>" required><br><br>

       <label for="gender">Gender:</label>
                <select id="gender" name="gender" value="<?php echo $data['gender'] ?> required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select><br><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"  rows="4" cols="50" value="<?php echo $data['address'] ?>" required></input><br><br>

        <input type="submit" name="edit" value="Update Record">
    </form>
    <a href="crud.php" class="btn btn-secondary" >Go back</a>
</div>

</section>
       

<?php include 'footer.php'; ?>
  <script>
 
  </script>
</body>
</html>
