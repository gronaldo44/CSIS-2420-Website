<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// Initialize and format variables
$Product = htmlentities($_POST['Product']);
$UserN = $_POST['UserN'];
$State = $_POST['State'];

$Product_txt = file_get_contents("text/productinfo.txt");
$Info_Arr = explode('}', $Product_txt);
$Img_Arr = array("img/product1.jpg", "img/product2.jpg", "img/product3.jpg"
    , "img/product4.jpg");
$Img = --$Product;
if ($Product >= 3){
    $Img--;
}
$ServiceArea_txt = file_get_contents("text/servicearea.txt");
$ServiceArea_Arr = explode(',', $ServiceArea_txt);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Response Page</title>
    </head>
    <body>
        <?php
        // Welcome
        print("<p class='title' style='text-align: center; font-size: 50px'>"
                . "Welcome $UserN!</p>");
        // img
        echo ("<img src='$Img_Arr[$Img]' width='500' style='float:left'>");
        // Product info
        print("<p style='text-align:left; font-size:30px'>"
                . "$Info_Arr[$Product]</p>");
        // Valid service area
        $ValidServiceArea = false;
        for ($i = 0; $i < count($ServiceArea_Arr); $i++){
            if ($State == $ServiceArea_Arr[$i]){
                $ValidServiceArea = true;
            }
        }
        print("<p style='text-align:center; font-size:15px;");
        if ($ValidServiceArea){
            print("color:blue'> We service offer service in $State!</p>");
        } else {
            print("color:red'> Sorry, we do not offer service in $State.</p>");
        }
        ?>
    </body>
</html>
