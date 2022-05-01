<div class="heading">
                    <h1><i class="fas fa-user"></i> USER PROFILE <small> My Profile Details</small></h1>
                </div>
<?php 

    $session_user = $_SESSION['log_in'];

    $session_user_data = mysqli_query($dbconnect,"SELECT * FROM `users` WHERE `user_name` = '$session_user';");

    $session_user_row = mysqli_fetch_assoc($session_user_data);

?>
<div class="row mt-5">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">
        <table class="table table-dark table-striped table-hover table-bordered">
            <tr>
                <td>User Id</td>
                <td><?= $session_user_row['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= ucwords($session_user_row['full_name']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $session_user_row['user_name']; ?></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><?= $session_user_row['u_email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= ucwords($session_user_row['u_status']);?></td>
            </tr>

        </table>
        <a href="index.php?page=update-user&id=<?php echo base64_encode($session_user_row['id']); ?>" class="btn btn-primary w-100">Edit</a>
    </div>
    <div class="col-lg-5">
        <a href="">
            <img class="img-thumbnail" width="45%" src="image/<?= $session_user_row['u_photo'] ?>" alt="">
        </a>
        <br><br>
        <?php 
        
            if(isset($_POST['upload'])){
                $photo = explode(".",$_FILES['photo']['name']);
                $photo = end($photo);
                $photo_name = $session_user.'.'.$photo;

                $upload = mysqli_query($dbconnect,"UPDATE `users` SET `u_photo`= ('$photo_name') WHERE `user_name` = '$session_user';");
                if($upload){
                    move_uploaded_file($_FILES['photo']['tmp_name'],'image/'.$photo_name);
                }
            }

        ?>
        <form action="" method="POST" enctype="multipart/form-data" >
            <label for="photo" class="text-info"><h4>Change Profile Picture</h4></label>
            <input class="btn btn-primary w-75" name="photo" type="file" required id="photo"><br><br>
            <input class="btn btn-primary w-75" type="submit" value="Upload" name="upload">
        </form>
    </div>
</div>