<div class="heading">
                    <h1><i class="fas fa-users"></i> ALL STUDENTS <small> All Students overview</small></h1>
                </div>
<div class="table-responsive">
                        <table id="data" class="table table-dark table-striped table-hover table-bordered">
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
                                    <td><img width="80px" src="student-image/<?php echo $student_info_row['s_photo'] ?>" alt=""></td>
                                    <td>
                                    <a class="btn btn-primary btn-sm" href="index.php?page=update-student&id=<?php echo base64_encode($student_info_row['id']); ?>"><i class="fa fa-wrench"></i> Edit</a><hr>                                        <a class="btn btn-danger btn-sm" href="delete-student.php?id=<?php echo base64_encode($student_info_row['id']); ?>"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>

                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>