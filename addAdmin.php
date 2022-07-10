<?php
//  session_start();
//  include('./config.php');
// require_once "./config.php";

  //  if (isset($_POST['addAdmin'])) {
  //       $email = $_POST['email'];
  //       $pass = $_POST['password'];
        
  //       $sql = "INSERT INTO admins(email,password) VALUES ('$email','$pass')";

  //       if (mysqli_query( $sql)) {
	// 	 echo "New record created successfully";
	// 	} else {
	// 	 echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	// 	} 
  //   }
  
 ?>

<?php
    session_start();
    include('config.php');
    if (isset($_POST['addAdmin'])) {
        // $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = $connection->prepare("SELECT * FROM admins WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO admins(password,email) VALUES (:password,:email)");
            // $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password", $password, PDO::PARAM_STR);
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
    }
?>



<!DOCTYPE html>
<html>
<head>
  <title>All Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="./addAdmin.css"> -->
  <link rel="stylesheet" href="./addAdmin.css">    
  <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="./login.css"> -->
<style>
/* .main{
  width:500px;
    height: auto;
    
} */

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
<div class="main container">
  
  <div class="body">
  <h5>ADD AS ADMIN</h5>
    <form method="post" action="" name="add-form" >
    <span>
      <input type="email" placeholder="Enter email" name="email" required>
    </span>
    <span>
      <input type="password" placeholder="Enter password" name="password" required>
    </span>
       <button type="submit" class="btn btn-primary" name="addAdmin" value="addAdmin"><i class="bi bi-arrow-bar-down"></i> ADD</button>
    </form>
  </div>
</div>


</body>
</html>

