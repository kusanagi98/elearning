<?php
    include 'connect.php';
    $get_id = $_GET['id'];
    $table = '"Teacher"';
    $query_str = "DELETE FROM $table WHERE teacher_id = $get_id";
    pg_query($query_str) or die();
    header('location: teacher.php');
?>