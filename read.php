<h1>
    All Records:
</h1>
<table class="table">
  <thead class="table-dark">
   <tr>
      <th scope="col">SrNo.</th>
      <th scope="col">Profile Picture</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
   <?php
   include 'dbconnect.php';
   $sql=mysqli_query($conn, "SELECT * FROM `crud`");
   while($row=mysqli_fetch_array($sql)){
       echo "
       <tr>
       <td>$row[id]</td>
       <td><img src='$row[profilepicture]' style='height:7rem; width:7rem;'></td>
       <td>$row[name]</td>
       <td>$row[gender]</td>
       <td>$row[address]</td>
       <td><a href='edit.php? id=$row[id]' class='btn btn-secondary'>Edit</td>
       <td><a href='delete.php? id=$row[id]' class='btn btn-danger'>Delete</td>
       </tr>
       ";
   }
   
   ?>
  </tbody>
</table>