<?php
    $hostname = 'localhost';
    $username = 'root';
    $pas = '';
    $dbms_name = 'DBMS';
    $connect = new mysqli($hostname,$username,$pas,$dbms_name);
    if($connect->connect_errno){
        die("Connection failed:". $conn->connect_errno);
    }
?>