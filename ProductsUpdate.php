<?php
$descUpdated = $desc != "No description yet made";
$priceUpdated = $price != 0.00;

// update statement
$update = "UPDATE `CSIS2440` . `Products` SET `ProductsName` = '$name'";
if ($priceUpdated) {
    $update .= ", `ProductsPrice` = '$price' ";
}
if ($descUpdated) {
    $update .= ", `ProductsDesc` = '$desc' ";
}
$update .= "WHERE (`ProductsName` = '" . $name . "')";
$success = $con->query($update);
if ($success == FALSE) {
    $failness = "Whole query " . $update . "<br>";
    echo $failness;
    die('Invalid query: ' . mysqli_error($con));
} else {
    echo $name . " ";
    if ($descUpdated && $priceUpdated){
        echo " price has been set to $" . $price .", and its description has "
                . "been changed to:<br>" . $desc;
    } else if ($descUpdated){
        echo " description has been updated to:<br>" . $desc;
    } else if ($priceUpdated){
        echo " price has been set to $" . $price;
    }
    echo "<br><br>";
}
