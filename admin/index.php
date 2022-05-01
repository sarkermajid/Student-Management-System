<?php

require_once('./dbconnect.php');

session_start();

if (!isset($_SESSION['log_in'])) {
    header('location: login.php');
}

?>

<?php 

    $welcome_session_user = $_SESSION['log_in'];
    $welcome_user = mysqli_query($dbconnect,"SELECT * FROM `users` WHERE `user_name`= '$welcome_session_user'");
    $welcome_user_row = mysqli_fetch_assoc($welcome_user);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <title>Admin Panel</title>
</head>

<body class="admin">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container py-2">
            <h5><a class="navbar-brand" href="index.php">STUDENT MANAGEMENT SYSTEM</a></h5>


            <a class="btn btn-success" href="index.php?page=user-profile"> <i class="fas fa-door-open"></i> Welcome <?= $welcome_user_row['full_name'] ?></a>
            <a class="btn btn-primary" href="registration.php"><i class="fas fa-user-plus"></i> Add User</a>
            <a class="btn btn-info" href="index.php?page=user-profile"> <i class="fas fa-user"></i> Profile</a>
            <a class="btn btn-danger" href="logout.php"><i class="fas fa-power-off "></i> Logout</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 mt-2">
                <ul class="list-group">
                        <a class="list-group-item" href="index.php?page=dashboard"><i class="fas fa-user-plus"></i> DASHBOARD</a>
                    <div class="items">
                        <a class="list-group-item" href="index.php?page=add-student"><i class="fas fa-user-plus"></i>  Add Student</a>
                        <a class="list-group-item" href="index.php?page=all-student"><i class="fas fa-users"></i>  All Student</a>
                        <a class="list-group-item" href="index.php?page=all-user"><i class="fas fa-users"></i>  All User</a>

                    </div>
                </ul>
            </div>
            <div class="col-lg-9">
                <?php 

                    if(isset($_GET['page'])){
                        $page = $_GET['page'].".php";
                    }else{
                        $page = "dashboard.php";
                    }

                    if(file_exists($page)){
                        require_once("$page");
                    }else{
                        require_once('404.php');
                    }

                ?>
            </div>

        </div>
    </div>

    <footer class="footer-area">
        <p> Copyright &copy; 2020 all rights reserved by <a href="https://www.facebook.com/sarkermajid21/">Sarker Majid</a></p>
    </footer>

    <!-- Optional JavaScript -->

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/script.js"></script>

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>