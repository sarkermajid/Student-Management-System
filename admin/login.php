<?php 

    require_once('./dbconnect.php');

    session_start();

    if(isset($_SESSION['log_in'])){
        header('location: index.php');
    }

    if(isset($_POST['submit'])){

        $username = $_POST['user_name'];
        $u_password = $_POST['u_password'];

        $username_check = mysqli_query($dbconnect,"SELECT * FROM `users` WHERE `user_name` = '$username';");
        if(mysqli_num_rows($username_check) > 0){
            $this_user = mysqli_fetch_assoc($username_check);
            if($this_user['u_password'] == md5($u_password)){
                if($this_user['u_status'] == 'active'){

                    $_SESSION['log_in'] = $username;
                    header('location: index.php');

                }else{
                    $status_inactive = "Your Status Inactive Please Wait For Admin Activation";
                }
            }else{
                $u_password_not_found = "This Password Doesn't Found";
            }
        }else{
            $username_not_found = "This Username Doesn't Found";
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

    <title>Login Student Management System</title>
    </head>

    <body class="bg-dark animate__animated animate__fadeIn">
        <div class="bg-dark text-center py-3">
            <h1 class="display-4 text-success">Welcome To Student Management System</h1><hr class="bg-success">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form class="form-control py-5 mt-5" action="#" method="POST">
                        <h1 class="text-dark text-center mb-4">Admin Login Form</h1>
                        <input class="form-control" type="text" name="user_name" placeholder="Enter Your Username">
                        <div class="error">
                            <?php 
                                if(isset($username_not_found)){
                                    echo $username_not_found;
                                }
                            ?>
                        </div><br>
                        <input class="form-control" type="password" name="u_password" placeholder="Enter Your Password">
                        <div class="error">
                            <?php 
                                if(isset($u_password_not_found)){
                                    echo $u_password_not_found;
                                }
                                if(isset($status_inactive)){
                                    echo $status_inactive;
                                }
                            ?>
                        </div><br>
                        <input type="submit" class="btn btn-success text-center w-100" name="submit" value="Login Admin">
                        <a class="btn btn-danger text-center w-100 mt-1" href="../index.php">Back</a>
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <footer class="text-center mt-5">
                <p> Copyright &copy; 2020 all rights reserved by <a href="sarkermajid.digitalsdimension.com">Sarker Majid</a></p>
            </footer>
        </div>

    <!-- Optional JavaScript -->

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>
</html>