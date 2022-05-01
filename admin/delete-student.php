<?php 
    require_once('./dbconnect.php');

    $id = base64_decode($_GET['id']);

    mysqli_query($dbconnect,"DELETE FROM `student_information` WHERE `id` = '$id';");

    header('location: index.php?page=dashboard');


?>