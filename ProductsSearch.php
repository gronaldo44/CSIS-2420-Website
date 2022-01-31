<?php
//write the search statment
$search = "SELECT * FROM CSIS2440.Products WHERE ProductsName LIKE '%$name%' "
        . "ORDER BY ProductsName";
$return = $con->query($search);

if (!$return) {
    $message = "Whole query " . $search;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}
echo "<table><th>Name</th><th width='10%'>Price</th><th>Description"
. "</th><th>Image</th>";
while ($row = $return->fetch_assoc()) {
    echo "<tr><td>" . $row['ProductsName']
            ."</td><td>$" . $row['ProductsPrice']
            ." — </td><td>" . $row['ProductsDesc']
            ."</td><td>" . $row['ProductsImage'] . "</td></tr>";
}
echo "</table><br>";