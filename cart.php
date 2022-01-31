<?php
session_start();
$loggedIn = $_SESSION['loggedIn'];
setlocale(LC_MONETARY, 'en_US');
$product_id = $_POST['Select_Product'];
$action = $_POST['action'];
$fname = $_SESSION['fname'];

switch ($action) {
    case "Add to cart":
        $_SESSION['cart'][$product_id]++;
        break;
    case "Remove from cart":
        $_SESSION['cart'][$product_id]--;
        if ($_SESSION['cart'][$product_id] <= 0) {
            unset($_SESSION['cart'][$product_id]);
        }
        break;
    case "Delete all items":
        unset($_SESSION['cart']);
        break;
}

// print_r($_SESSION);
require_once'DataBaseConnection.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Store</title>

        <script>
            function productInfo(key) {
                //creates the datafile with query string
                var data_file = "CartInfo.php?info=" + key;
                //this is making the http request
                var http_request = new XMLHttpRequest();
                try {
                    // Opera 8.0+, Firefox, Chrome, Safari
                    http_request = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        http_request = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            http_request = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
                http_request.onreadystatechange = function () {
                    if (http_request.readyState == 4)
                    {
                        var text = http_request.responseText;

                        //this is adding the elements to the HTML in the page
                        document.getElementById("productInformation").innerHTML = text;
                    }
                }
                http_request.open("GET", data_file, true);
                http_request.send();
            }
        </script>

        <?php
        include 'Header.php';
        ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div>
                    <?php
                    if ($loggedIn) {
                        echo "<a href=\"logout.php\">Sign out</a>";
                    } else {
                        echo "<a href=\"login.php\">Sign in</a>";
                    }
                    echo "<br><a href=\"HomePage.php\">Home</a>";
                    ?>
                </div></div>
            <div class="col-sm-8">
                <form action="cart.php" method="Post">
                    <div>
                        <?php
                        echo "<p><span class=\"text\">";
                        if ($loggedIn) {
                            echo "Hello $fname! ";
                        }
                        echo "Please select one of our items:</span>";
                        ?>
                        <select id="Select_Product" name="Select_Product" class="select">
                            <?php
                            $search = "SELECT ProductsName, idProducts FROM CSIS2440.Products ORDER BY ProductsName";
                            $return = $con->query($search);

                            if (!$return) {
                                $message = "Whole query: " . $search;
                                echo $message;
                                die('Invalid query: ' . mysqli_error());
                            }
                            while ($row = mysqli_fetch_array($return)) {
                                if ($row['idProducts'] == $product_id) {
                                    echo "<option value='" . $row['idProducts'] . "' selected='selected'>" . $row['ProductsName'] . "</option>\n";
                                } else {
                                    echo "<option value='" . $row['idProducts'] . "'>" . $row['ProductsName'] . "</option>\n";
                                }
                            }
                            ?>
                        </select></p>
                        <table>
                            <tr>
                                <?php
                                if ($loggedIn) {
                                    echo "<td>"
                                    . "<input id=\"button_add\" type=\"submit\" value=\"Add to cart\" name=\"action\" class=\"button\"/>"
                                    . "</td>"
                                    . "<td>"
                                    . "<input name=\"action\" type=\"submit\" class=\"button\" id=\"button_Remove\" value=\"Remove from cart\"/>"
                                    . "</td>"
                                    . "<td>"
                                    . "<input name=\"action\" type=\"submit\" class=\"button\" id=\"button_empty\" value=\"Delete all items\"/>"
                                    . "</td>";
                                }
                                ?>
                                <td>
                                    <input name="action" type="button" class="button" id="button_Info" value="Info" onclick="productInfo(document.getElementById('Select_Product').value)"/>
                                </td>
                            </tr>                    
                        </table>

                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" id="productInformation">

            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div id="Display_cart" class="col-sm-8">
                <?php
                if ($_SESSION['cart']) {
                    echo "<table border = \"1\" padding=\"3\" width=\"640px\"><tr><th>Name</th><th>Quantify<th><th>Price</th>"
                    . "<th width=\"80px\">Line Cost</th></tr>";
                    foreach ($_SESSION['cart'] as $product_id => $quantity) {
                        $sql = "SELECT ProductsName, ProductsPrice FROM CSIS2440.Products WHERE idProducts = " . $product_id;
                        $result = $con->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                            list($name, $price) = mysqli_fetch_row($result);
                            $line_cost = $price * $quantity;
                            $total = $total + $line_cost;
                            echo "<tr>";
                            echo "<td align=\"Left\" width=\"450px\">$name</td>";
                            echo "<td align=\"center\" width=\"75px\">$quantity </td>";
                            echo "<td align=\"center\" width=\"75px\">" . money_format('%(#8n', $price) . "</td>";
                            echo "<td align=\"center\">" . money_format('%(#8n', $line_cost) . "</td>";
                            echo "</tr>";
                        }
                    }
                    // show the total
                    echo "<tr>";
                    echo "<td align=\"right\">Total Weight</td><td align=\"right\">$totWeight</td><td align=\"right\">Total</td>";
                    echo "<td align=\"right\">" . money_format('%(#8n', $total) . "</td>";
                    echo "</tr>";
                    echo "</table>";
                } else {
                    // no items in cart
                    if ($loggedIn) {
                        echo "You have no items in your shopping cart.";
                    } else {
                        echo "You must be signed in to order.";
                    }
                }
                mysqli_close($con);
                ?>

            </div>
        </div>
    </div>

