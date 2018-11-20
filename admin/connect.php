<?php
    include 'autoload/autoload.php';

    $conn = connect('localhost', 'elearning', 'postgres', 'kien1998') or die(pg_errormessage($conn));
?>