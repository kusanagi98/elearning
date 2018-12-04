<?php
    include 'connect.php';
    $get_id = $_GET['id'];
    $table = '"Student"';
    $query_str = "DELETE FROM $table WHERE student_id = $get_id";
    pg_query($query_str) or die();
    header('location: student.php');
?>