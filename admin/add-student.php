<div class="heading">
                    <h1><i class="fas fa-user-plus"></i> ADD STUDENT <small> Add New Student</small></h1>
                </div>

<?php

    require_once('./dbconnect.php');

    if(isset($_POST['add-student'])){
        $name = $_POST['s_name'];
        $roll = $_POST['s_roll'];
        $department = $_POST['s_department'];
        $s_email = $_POST['s_email'];
        $phone = $_POST['s_phone'];

        $s_photo = explode(".",$_FILES['s_photo']['name']);
        $s_photo = end($s_photo);
        $s_photo_name = $roll.".".$s_photo;

        $query = "INSERT INTO `student_information`(`s_name`, `s_roll`, `s_department`, `s_phone`, `s_photo`,`s_email`) VALUES ('$name','$roll','$department','$phone','$s_photo_name','$s_email');";

        $result = mysqli_query($dbconnect,$query);

        if($result){
            $success = "Data Insert Successfully !";
            move_uploaded_file($_FILES['s_photo']['tmp_name'],'student-image/'.$s_photo_name);
        }else{
            $error = "Data Doesn't Exist";
        }

        

    }


?>



<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-6">
    <form class="form-control py-2 mt-4" action="" method="POST" enctype="multipart/form-data">
                        <h1 class="text-dark text-center mb-4">Add Student</h1>
                        <div class="#success">
                            <?php
                                if(isset($success)){
                                    echo $success;
                                }                     
                            ?>
                        </div>

                        <input class="form-control" type="text" name="s_name" placeholder="Enter Student Name" required>
                        <br>
                        <input class="form-control" type="text" name="s_roll" placeholder="Enter Roll Number" required>
                        <br>
                        <input class="form-control" type="text" name="s_department" placeholder="Enter Department Name" required>
                        <br>
                        <input class="form-control" type="email" name="s_email" placeholder="Enter E-mail Address" required>
                        <br>
                        <input class="form-control" type="number" name="s_phone" placeholder="Enter Phone Number" required>
                        <br>

                        <div class="text-center">
                            <label for="photo"><h5>Choose Photo</h5> </label>
                            <input class="form-control" id="photo" type="file" name="s_photo"><br>
                        </div>

                        <input class="btn btn-success text-center w-100" type="submit" name="add-student" value="Add Student">
                        <a class="btn btn-danger text-center w-100 mt-1" href="index.php?page=dashboard">Back</a>

    </form>
    </div>
    <div class="col-lg-4"></div>
</div>