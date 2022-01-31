<?php

$host = "mysqlcsis2440.cm9qjyuqifrz.us-west-2.rds.amazonaws.com";
$user = "admin";
$password = "password";   // not the real password for obvious reasons. Email me if this is a problem, gronaldo44@gmail.com
$dbname = "CSIS2440";
$con = new mysqli($host, $user, $password, $dbname)
        or die('Could not connect to the database server. ' . mysqli_connect_error($con));

function mysql_fix_string($conn, $string) {
    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    $string = htmlentities($string);
    return $conn->real_escape_string($string);
}
