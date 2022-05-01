<div class="heading">
                    <h1><i class="fas fa-wrench"></i> UPDATE USER <small> Edit/Update User</small></h1>
                </div>
<?php 

    require_once('./dbconnect.php');

    $id = base64_decode($_GET['id']);

    $db_data = mysqli_query($dbconnect,"SELECT * FROM `users` WHERE `id`='$id';");

    $db_data_row = mysqli_fetch_assoc($db_data);

    if(isset($_POST['update-user'])){

        $name = $_POST['full_name'];
        $u_email = $_POST['u_email'];

        $query = "UPDATE `users` SET `full_name`=('$name'), `u_email`= ('$u_email') WHERE `id` = '$id'";
     
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
                        <h1 class="text-dark text-center mb-4">Update User</h1>
                        <div class="#success">
                            <?php
                                if(isset($success)){
                                    echo $success;
                                }                     
                            ?>
                        </div>

                        <input class="form-control" type="text" name="full_name" placeholder="Enter Your Name" value="<?= $db_data_row['full_name'] ?>" required>
                        <br>
                        <input class="form-control" type="email" name="u_email" placeholder="Enter E-mail Address" value="<?= $db_data_row['u_email'] ?>" required>
                        <br>

                        <input class="btn btn-success text-center w-100" type="submit" name="update-user" value="Update User">
                        <a class="btn btn-info text-center w-100 mt-1" href="index.php?page=user-profile">Profile</a>

    </form>
    </div>
    <div class="col-lg-4"></div>
</div>