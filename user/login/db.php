<?php
//include ($_SERVER["DOCUMENT_ROOT"] . "/elearning/libraries/Database.php");
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$DB_HOST='localhost';
$DB_USER='postgres';
$DB_PASSWORD='yubikiri217';
$DB_DATABASE='test';
$conn_string = "host={$DB_HOST} dbname={$DB_DATABASE} user={$DB_USER} password={$DB_PASSWORD}";
$con = pg_connect($conn_string) or die(pg_errormessage($con));
// Check connection
/*if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }*/
?>