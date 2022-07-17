<?php
  require("connect.inc.php");
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $flag=false;
  $nam = NULL;

  $mail = NULL;
  $father = NULL;
  $phone = NULL;
  $dpt = NULL;
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Student</title>
  <script src="https://kit.fontawesome.com/8e4025cbe6.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <link rel="stylesheet" href="./addAdmin.css">    -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"); -->
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
.searchData{
display:flex;
justify-content:center;
}
.searchData i{
  color:white;
}
.body input{
  display: block;
    margin: auto;
    width:80%;
    margin-top: 10px;
    height: 50px;
}
.body button{
  margin-top:10px;
}
i{
  color: red;
}
.searchinput{
  width:500px
}
.head i{
  color:black;
  
}
.head p{
  font-size:100px;
 
 
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


<?php
  if(isset($_POST["sid"])){
    $flag=true;
    $stid = $_POST["sid"];
    $sql = "SELECT * FROM students WHERE email='$stid'";
    $result = mysqli_query($connect,$sql);
    While($row = mysqli_fetch_assoc($result)){
      $nam = $row['name'];
      $stuid=$row['id'];
      $mail = $row['email'];
      $father = $row['father'];
      $phone = $row['phone'];
      $dpt = $row['department'];
    }

  }
?>
<div class="container searchinput ">
<form action="viewStudent.php" method="POST">
<div class="input-group mb-3 m-3 search">
 
    <input class="form-control" placeholder="Student Id" aria-label="Recipient's username" aria-describedby="button-addon2" type="email" name="sid">
  
    <button class="btn btn-outline-secondary"  type="submit" id="button-addon2"> <i class="bi bi-search"></i></button>
 
</div>
</form>

<div class="searchData">
<div class="card text-center" style="min-width: 18rem;">
  <div class="card-body">
    <?php
    if($flag==true){
      ?>
      <div class="head"><p><i class="bi bi-person-circle"></i></p></div>
    <h5 class="card-title">Name: <?php echo $nam ?></h5>
    <h5 class="card-title">Id: <?php echo $stuid ?></h5>
    <h5 class="card-title">Email: <?php echo $mail ?></h5>
    <h5 class="card-title">Father: <?php echo $father ?></h5>
    <h5 class="card-title">Phone: <?php echo $phone ?></h5>
    <h5 class="card-title">Department: <?php echo $dpt ?></h5>
    <?php
    } ?>

   

<a href="delete.php?rn=<?php echo $stuid; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>


    <!-- Vertically centered modal -->
    
    <?php
  if(isset($_POST['name'])){
      $nam = $_POST['name'];
      $father = $_POST['father'];
      $dpt = $_POST['department'];
      $mail = $_POST['email'];
      $phone = $_POST['phone'];
      $update = "UPDATE students SET name='$nam', father='$father', department='$dpt', email='$mail', phone=$phone WHERE email='$mail';";
      $connect->query($update);
      if($connect->query($update)){
        echo '<script language="javascript">';
echo 'alert("Update Successfuly")';
echo '</script>';
      }
      //echo $id;
      
  }
?> 
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="bi bi-pencil-square"></i> Update
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> ADD Student info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="body">
    <form method="post" action="viewStudent.php?id=<?php echo $stid; ?>" name="add-form" >
    <span>
      <input type="text" placeholder="Enter Student name" name="name" value="<?php echo $nam; ?>"required>
    </span>
    <span>
      <input type="text" placeholder="Enter Father`s name" name="father" value="<?php echo $father; ?>" required>
    </span>
    <span>
      <input type="text" placeholder="Enter Departmant" name="department" value="<?php echo $dpt; ?>"required>
    </span>
    <span>
      <input type="email" placeholder="Enter email" name="email" value="<?php echo $mail; ?>"required>
    </span>
    <span>
      <input type="number" placeholder="Enter Phone number" name="phone" value="<?php echo $phone; ?>"required>
    </span>
       <button type="submit" class="btn btn-primary" name="addAdmin" value="addAdmin"><i class="bi bi-save"></i> Save</button>
    </form>
  </div>
      </div>
      
    </div>
  </div>
</div>
</div>
  </div>
</div>
</div>
</body>
</html>