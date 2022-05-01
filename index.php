<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>Student Management System</title>
    </head>

    <body class="main animate__animated animate__fadeInDown">
        <div class="bg-dark text-center py-2">
            <h1 class="display-4 text-success">Welcome To Student Management System</h1>
        </div>
        <div class="text-center mb-5 mt-3">
            <a class="btn btn-outline-success btn-lg text-center" href="admin/login.php">Login Admin</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="#" method="POST">
                        <table class="table table-dark table-bordered mt-1">
                            <tr class="text-center">
                                <td colspan="2"><label>Student Information</label></td>
                            </tr>
                            <tr>
                                <td><label for="choose">Choose Department</label></td>
                                <td>
                                    <select class="form-control" name="choose" id="choose">
                                        <option value="">Select</option>
                                        <option value="CSE">CSE</option>
                                        <option value="BBA">BBA</option>
                                        <option value="EEE">EEE</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="roll">Roll Number</label></td>
                                <td> <input class="form-control" type="text" name="roll" id="roll"></td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2"> <input class="btn btn-success" type="submit" name="show_info" value="Show Info"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-lg-4"></div>
                <br><br>

                <?php 

                    require_once('admin/dbconnect.php');
                    
                    if(isset($_POST['show_info'])){

                        $search_department = $_POST['choose'];
                        $search_roll = $_POST['roll'];

                        $result = mysqli_query($dbconnect,"SELECT * FROM `student_information` WHERE `s_department` = ('$search_department') AND `s_roll` = ('$search_roll');");

                        if(mysqli_num_rows($result) == 1){
                            
                            $result_row = mysqli_fetch_assoc($result);

                            ?>
                        <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <table class="table table-dark table-striped table-hover table-bordered">
                                <tr>
                                    <td>Id</td>
                                    <td>1</td>
                                    <td rowspan="6">
                                    <a href="">
                                        <img class="img-thumbnail" width="150px" src="admin/student-image/<?= $result_row['s_photo'] ?>" alt="">
                                    </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><?= ucwords($result_row['s_name'])?></td>
                                </tr>
                                <tr>
                                    <td>Roll</td>
                                    <td><?= $result_row['s_roll'] ?></td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td><?= ucwords($result_row['s_department']) ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td><?= $result_row['s_email'] ?>m</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?= $result_row['s_phone'] ?></td>
                                </tr>
                            </table>
                            <div class="col-lg-3"></div>
                        </div>
                        <?php
                        }else{
                            $error = "Data No Found";
                        }
                    }
                        ?>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
            <div class="error text-center py-2">
                    <?php 
                        if(isset($error)){
                            echo  "<h3>".$error."</h3>";
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>

                


            <footer class="text-center mt-2">
                <p> Copyright &copy; 2020 all rights reserved by <a href="sarkermajid.digitalsdimension.com">Sarker Majid</a></p>
            </footer>
        </div>

    <!-- Optional JavaScript -->

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>
</html>