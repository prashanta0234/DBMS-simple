<?php 
   require("connect.inc.php");
   $rool=$_GET['rn'];
    $sql = "DELETE FROM students WHERE id='$rool'";

if ($connect->query($sql) == TRUE) {
     echo '<script language="javascript">';
     echo 'alert("Delete Successfuly")';
     echo '</script>'
  header('Location:viewStudent.php');
} else {

  echo "Error deleting record: " . $connect->error;
}
?>