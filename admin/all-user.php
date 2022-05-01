<div class="heading">
                    <h1><i class="fas fa-users"></i> ALL USERS <small> All Users overview</small></h1>
                </div>
<div class="table-responsive">
                        <table id="data" class="table table-dark table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Photo</th>             
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    require_once("./dbconnect.php");

                                    $db_user_info = mysqli_query($dbconnect,"SELECT * FROM `users`");

                                    while($user_info_row = mysqli_fetch_assoc($db_user_info)){?> 
                                    
                                <tr>
                                    
                                    <td><?php echo ucwords($user_info_row['full_name']); ?></td>
                                    <td><?php echo $user_info_row['user_name']; ?></td>
                                    <td><?php echo $user_info_row['u_email']; ?></td>
                                    <td><img width="50px" src="image/<?php echo $user_info_row['u_photo'] ?>" alt=""></td>
                                </tr>

                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>