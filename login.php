<?php
    session_start();
    include('config.php');
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM admins WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        // echo("<script>console.log('PHP: " . $query . "');</script>");
        // echo "<script>console.log('.json_encoded($result). ');</script>";
        echo "<script>console.log('" . json_encode($result['password']) . "');</script>";

        if (!$result) {
            echo '<p class="error">Username password combination is wrong line!</p>';
        } else {
            if ($password==$result['password']) {
                // $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                header('Location:home.html');
            } else {
                echo '<p class="error">Username password combination is wrong !</p>';
            }
        }
    }
    ?>


<!DOCTYPE html>
<html>
    <head>
        <title>DBMS</title>
        <!-- CSS only -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="./login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="login mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>login</h4>

                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <lebel for="email">Email</lebel>
                                        <input type="email" name="email" required class="form-control" id="username">
                                    </div>
                                    <div class="form-group mt-2">
                                        <lebel for="password">password</lebel>
                                        <input type="password" required name="password" class="form-control" id="password">
                                    </div>
                                   <div class="button  mt-4">
                                    <button type="submit" >Login</button>
                                   </div>
                                        
                                    
                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>