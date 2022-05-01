<?php

    require_once("./dbconnect.php");

    session_start();

    
    if(isset($_POST["registration"])){
        $name = $_POST['full_name'];
        $username = $_POST['user_name'];
        $email = $_POST['u_email'];
        $u_password = $_POST['u_password'];
        $c_password = $_POST['c_password'];


        $photo = explode(".",$_FILES['u_photo']['name']);
        $photo = end($photo);
        $photo_name = $username.'.'.$photo;


        $input_error = array();


        if($name == null){
            $input_error['full_name'] = "The Name Field is Required";
        }

        if($username == null){
            $input_error['user_name'] = "The Username Field is Required";
        }

        if($email == null){
            $input_error['u_email'] = "The E-mail Field is Required";
        }

        if($u_password == null){
            $input_error['u_password'] = "The Password Field is Required";
        }
        if($c_password == null){
            $input_error['c_password'] = "The Confirm Password Field is Required";
        }

        if(count($input_error) == 0){
            $email_check = mysqli_query($dbconnect,"SELECT * FROM `users` WHERE `u_email` = '$email';");
            if(mysqli_num_rows($email_check) == 0){
                $username_check = mysqli_query($dbconnect,"SELECT * FROM `users` WHERE `user_name` = '$username';");
                if(mysqli_num_rows($username_check) == 0){
                    if(strlen($username) > 7){
                        if(strlen($u_password) > 7){
                            if($u_password == $c_password){
                                $u_password = md5($u_password);

                                $query = mysqli_query($dbconnect,"insert into users(full_name,user_name,u_email,u_password,c_password,u_photo,u_status) values ('$name','$username','$email','$u_password','$c_password','$photo_name','Inactive')");

                                if($query){
                                    $success = "You Have Been Registered";

                                    move_uploaded_file($_FILES['u_photo']['tmp_name'],'image/'.$photo_name);

                                }
                                
                            }else{
                                $confirm_password_error = "Confirm Password Not Match !";
                            }
                        }else{
                            $password_length_error = "Password More Than 8 Character Long";
                        }
                    }else{
                        $username_length_error = "Username More Than 8 Character Long";
                    }
                }else{
                    $username_error = "This Username Already Exist";
                }
            }else{
                $email_error = "This E-mail Already Exist";
            }
        
        }

    }

?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../style.css">

    <title>Registration Student Management System</title>
    </head>

    <body class="bg-dark animate__animated animate__fadeIn">
        <div class="bg-dark text-center">
            <h1 class="display-3 text-success">Welcome To Student Management System</h1><hr class="bg-success">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <form class="form-control py-2 mt-2" action="" method="POST" enctype="multipart/form-data">
                        <h1 class="text-dark text-center mb-4">User Registration Form</h1>
                        <div class="#success">
                            <?php
                                if(isset($success)){
                                    echo $success;
                                }                         
                            ?>
                        </div>
                        <input class="form-control" type="text" name="full_name" placeholder="Enter Your Name">
                        <div class="error">
                            <?php 
                                if(isset($input_error['full_name'])){
                                    echo $input_error['full_name'];
                                }
                            ?>
                        </div><br>
                        <input class="form-control" type="text" name="user_name" placeholder="Enter Your Username">
                        <div class="error">
                            <?php 
                                if(isset($input_error['user_name'])){
                                    echo $input_error['user_name'];
                                }
                                if(isset($username_error)){
                                    echo $username_error;
                                }
                                if(isset($username_length_error)){
                                    echo $username_length_error;
                                }
                            ?>
                        </div><br>
                        <input class="form-control" type="text" name="u_email" placeholder="Enter Your E-mail">
                        <div class="error">
                            <?php 
                                if(isset($input_error['u_email'])){
                                    echo $input_error['u_email'];
                                }
                                if(isset($email_error)){
                                    echo $email_error;
                                }
                            ?>
                        </div><br>
                        <input class="form-control" type="password" name="u_password" placeholder="Enter Your Password">
                        <div class="error">
                            <?php 
                                if(isset($input_error['u_password'])){
                                    echo $input_error['u_password'];
                                }
                                if(isset($password_length_error)){
                                    echo $password_length_error;
                                }
                            ?>
                        </div><br>
                        <input class="form-control" type="password" name="c_password" placeholder="Confirm Your Password">
                        <div class="error">
                            <?php 
                                if(isset($input_error['c_password'])){
                                    echo $input_error['c_password'];
                                }
                                if(isset($confirm_password_error)){
                                    echo $confirm_password_error;
                                }
                            ?>
                        </div><br>
                        <div class="text-center">
                            <label for="photo"><h5>Choose Photo</h5> </label>
                            <input class="form-control" id="photo" type="file" name="u_photo"><br>
                        </div>

                        <input class="btn btn-success text-center w-100" type="submit" name="registration" value="Registraion">
                        <a class="btn btn-danger text-center w-100 mt-1" href="../index.php">Back</a>
                        <h5 class="mt-4 text-center mb-2">If You have An Account ! Please <a href="login.php">Login</a></h5>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <footer class="text-center mt-4">
                <p> Copyright &copy; 2020 all rights reserved by <a href="sarkermajid.digitalsdimension.com">Sarker Majid</a></p>
            </footer>
        </div>

    <!-- Optional JavaScript -->

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>
</html>