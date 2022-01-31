<!DOCTYPE html>
<?php
session_start();
$loggedIn = $_SESSION['loggedIn'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Craft Cookie Cottage</title>
    </head>
    <body>
        <?php
        print <<<HTML
        <h1 style ='font:tahoma; color:blue; text-align:center; font-size:'50px'>Craft Cookie Cottage</h1>
        <table style='float:left'>
            <tr>
                <td>
HTML;
        if ($loggedIn) {
            echo "<a href=\"logout.php\">Sign out</a>";
        } else {
            echo "<a href=\"login.php\">Sign in</a>";
        }
        print <<<HTML
                </td>
                <td>
                    <img src='img/product4.jpg' width='100'>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="cart.php">Products</a>
                </td>
                <td>
                    <img src='img/product1.jpg' width='100'>
                </td>
            </tr>   
        </table>
        <p style='font:tahoma; text-align:center; font-size:20px'>
            Welcome to our website. We offer a variety of sweets which you can
            order straight to your door. To view our catalog of delicious treats
            , open the Products link on the left. There, we offer descriptions
            of our products and purchasing options. No matter what event you are
            planning (birthdays, weddings, anniversary, sweets-sunday, etc...)
            we have the delicious option you are looking for. You can also visit
            us in store at any of our locations. Thank you for your patronage!
        </p><br><br><br><br><br><br><br><br>
        <p style='font:tahoma; text-align:center; font-size:25px'>
            Contact: <strong>801-111-1111</strong> or <strong>CraftCookieCottage@CCookieC.inc</strong>
        </p>
HTML;
        ?>
    </body>
</html>
