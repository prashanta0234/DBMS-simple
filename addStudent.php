<?php
    session_start();
    include('config.php');
    if (isset($_POST['addAdmin'])) {
        $name = $_POST['name'];
        $father = $_POST['father'];
        $department = $_POST['department'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        
        $query = $connection->prepare("INSERT INTO students(name,father,phone,department,email) VALUES (:name,:father,:phone,:department,:email)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("father", $father, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);$query->bindParam("department", $department, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
         
            echo '<script language="javascript">';
    echo 'alert("Added successfull")';
    echo '</script>';
          
              
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
        
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./addAdmin.css">      
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
              </div>
            </div>
          </nav>

<div class="main container ">
<div class="body">
  <h5>ADD Student info</h5>
    <form method="post" action="" name="add-form" >
    <span>
      <input type="text" placeholder="Enter Student name" name="name" required>
    </span>
    <span>
      <input type="text" placeholder="Enter Father`s name" name="father" required>
    </span>
    <span>
      <input type="text" placeholder="Enter Departmant" name="department" required>
    </span>
    <span>
      <input type="email" placeholder="Enter email" name="email" required>
    </span>
    <span>
      <input type="number" placeholder="Enter Phone number" name="phone" required>
    </span>
       <button type="submit" class="btn btn-primary" name="addAdmin" value="addAdmin">Submit</button>
    </form>
  </div>
</div>



</body>
</html>

