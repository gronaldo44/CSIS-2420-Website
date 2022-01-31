<?php

session_start();
unset($_SESSION['badPass']);
// username and password sent from form
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
// Connect to server and select database
require_once 'DataBaseConnection.php';
//// To protect MySQL injection
$myusername = mysql_fix_string($con, $myusername);
$mypassword = mysql_fix_string($con, $mypassword);
//hashing
$Hashed = hash("ripemd128", $mypassword);

$sql = "SELECT fname FROM CSIS2440.Clients WHERE email = '$myusername' AND thepassword = '$Hashed'";
$result = $con->query($sql);

if (!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die('Invalid query: ' .mysqli_error());
}
//Mysql_num_row is counting table row
$count = $result->num_rows;

// If result matched $myusername and $mypassword table row must be 1 row
if ($count == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['user'] = $myusername;
    $_SESSION['password'] = $mypassword;
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['loggedIn'] = true;
    // Register $myusername, $mypassword, and redirect to file "cart.php"
    header("Location:cart.php");
} else {
    header("Location:login.php");
    $_SESSION['badPass'] ++;
}
