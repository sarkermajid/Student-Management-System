<div class="heading">
                    <h1><i class="fas fa-wrench"></i> UPDATE STUDENT <small> Edit/Update Student</small></h1>
                </div>
<?php 

    require_once('./dbconnect.php');

    $id = base64_decode($_GET['id']);

    $db_data = mysqli_query($dbconnect,"SELECT * FROM `student_information` WHERE `id`='$id';");

    $db_data_row = mysqli_fetch_assoc($db_data);

    if(isset($_POST['update-student'])){

        $name = $_POST['s_name'];
        $roll = $_POST['s_roll'];
        $department = $_POST['s_department'];
        $s_email = $_POST['s_email'];
        $phone = $_POST['s_phone'];

        $query = "UPDATE `student_information` SET `s_name`=('$name'),`s_roll`=('$roll'),`s_department`= ('$department'),`s_phone`=('$phone'),`s_email`= ('$s_email') WHERE `id` = '$id'";
     
        $result = mysqli_query($dbconnect,$query);

        if($result){
            $success = "Data Update Successfully !";
        }

    }



?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-6">
    <form class="form-control py-2 mt-4" action="" method="POST" enctype="multipart/form-data">
                        <h1 class="text-dark text-center mb-4">Update Student</h1>
                        <div class="#success">
                            <?php
                                if(isset($success)){
                                    echo $success;
                                }                     
                            ?>
                        </div>

                        <input class="form-control" type="text" name="s_name" placeholder="Enter Student Name" value="<?= $db_data_row['s_name'] ?>" required>
                        <br>
                        <input class="form-control" type="text" name="s_roll" placeholder="Enter Roll Number" value="<?= $db_data_row['s_roll'] ?>" required>
                        <br>
                        <input class="form-control" type="text" name="s_department" placeholder="Enter Department Name" value="<?= $db_data_row['s_department'] ?>" required>
                        <br>
                        <input class="form-control" type="email" name="s_email" placeholder="Enter E-mail Address" value="<?= $db_data_row['s_email'] ?>" required>
                        <br>
                        <input class="form-control" type="number" name="s_phone" placeholder="Enter Phone Number" value="<?= $db_data_row['s_phone'] ?>" required>
                        <br>

                        <input class="btn btn-success text-center w-100" type="submit" name="update-student" value="Update Student">
                        <a class="btn btn-danger text-center w-100 mt-1" href="index.php?page=all-student">All Student</a>

    </form>
    </div>
    <div class="col-lg-4"></div>
</div>