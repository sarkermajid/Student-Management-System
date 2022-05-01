<div class="heading">
                    <h1><i class="fas fa-tachometer-alt"></i> DASHBOARD <small> statistics overview</small></h1>
                </div>
<?php 

    $count_student = mysqli_query($dbconnect,"SELECT * FROM `student_information`");
    $total_student = mysqli_num_rows($count_student);

    $count_users = mysqli_query($dbconnect,"SELECT * FROM `users`");
    $total_users = mysqli_num_rows($count_users);

?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-users fa-6x"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="number pull-right"><?= $total_student ?></div>
                                        <div class="clearfix"></div>
                                        <div class="sub-heading">All Student</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?page=all-student">
                                <div class="panel-footer">
                                    <span class="pull-left">All Student</span>
                                    <span class="pull-right"> <i class="fas fa-arrow-right fa-2x"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-users fa-6x"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="number pull-right"><?= $total_users ?></div>
                                        <div class="clearfix"></div>
                                        <div class="sub-heading">All Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?page=all-user">
                                <div class="panel-footer">
                                    <span class="pull-left">All Users</span>
                                    <span class="pull-right"> <i class="fas fa-arrow-right fa-2x"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="heading new-student">
                            <h1><i class="fas fa-users"></i> NEW STUDENT</h1>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="data" class="table table-dark table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Roll</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    require_once("./dbconnect.php");

                                    $db_student_info = mysqli_query($dbconnect,"SELECT * FROM `student_information`");

                                    while($student_info_row = mysqli_fetch_assoc($db_student_info)){?> 
                                    
                                <tr>
                                    <th><?php echo $student_info_row['id']; ?></th>
                                    <td><?php echo ucwords($student_info_row['s_name']); ?></td>
                                    <td><?php echo $student_info_row['s_roll']; ?></td>
                                    <td><?php echo $student_info_row['s_department']; ?></td>
                                    <td><?php echo $student_info_row['s_email']; ?></td>
                                    <td><?php echo $student_info_row['s_phone']; ?></td>
                                    <td><img width="100px" src="student-image/<?php echo $student_info_row['s_photo'] ?>" alt=""></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="index.php?page=update-student&id=<?php echo base64_encode($student_info_row['id']); ?>"><i class="fa fa-wrench"></i> Edit</a><hr>   
                                        <a class="btn btn-danger btn-sm" href="delete-student.php?id=<?php echo base64_encode($student_info_row['id']); ?>"><i class="fa fa-trash"></i> Delete</a>
                                    </td>

                                </tr>

                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                  

                </div>