<?php
// insert statement
$insert = "INSERT INTO `CSIS2440` . `Products` (`ProductsName`, `ProductsPrice`"
        . ", `ProductsDesc`, `ProductsImage`) VALUES ('$name', '$price', "
        . "'$desc', '$img')";
//echo $insert;
$success = $con->query($insert);

if ($success == FALSE) {
    $failnes = "Whole query" . $insert . "<br>";
    echo $failness;
    print('Invalid query: ' . mysqli_error($con) . "<br>");
} else {
    echo $name . " was added!<br><br>";
}
