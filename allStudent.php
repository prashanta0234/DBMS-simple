<?php

  require("connect.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.table{
  margin-top:50px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="./home.html">DESHBORD</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto  ">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./allStudent.php">All Student</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./viewStudent.php">View Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./addStudent.php">Add Student</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./addAdmin.php">Add Admin</a>
                  </li>
                </ul>
                <!-- <span class="navbar-text">
                  Navbar text with an inline element
                </span> -->
              </div>
            </div>
          </nav>
<div class="table container">
<h2>All student Details</h2>

<table>
  <tr>
    
    <th>ID</th>
    <th>Name</th>
    <th>Father</th>
    <th>Phone</th>
    <th>Department</th>
    <th>Email</th>
  </tr>
  <?php
    $sql = "SELECT * FROM students;";
    $resuslt = mysqli_query($connect,$sql);
    while($row = mysqli_fetch_assoc($resuslt)){
      $id = $row['id'];
      $nam = $row['name'];
      $father = $row['father'];
      $phn = $row['phone'];
      $dpt = $row['department'];
      $mail = $row['email'];
  ?>
      <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $nam ?></td>
        <td><?php echo $father ?></td>
        <td><?php echo $phn ?></td>
        <td><?php echo $dpt ?></td>
        <td><?php echo $mail ?></td>
      </tr>
  <?php
    }
  ?>

  
</table>
</div>


</body>
</html>

