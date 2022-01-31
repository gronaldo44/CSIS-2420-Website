<?php
//get post and connect to DB
require_once "DataBaseConnection.php";
// print_r($_POST);
$sneaky = $_POST['sneaky'];
$name = $_POST['ProductName'];
$price = $_POST['Price'];
$img = $_POST['ProductImg'];
$desc = $_POST['Desc'];
$action = $_POST['Action'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Results</title>
        <!-- Custom fonts for this theme -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Theme CSS -->

        <link href="../../../css/freelancer.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8"><header class="h2">Make a New Product</header></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    Products currently in DB
                    <?php
                    //this should work if the database is connedted properly
                    $search = "SELECT ProductsName FROM CSIS2440.Products Order By ProductsName";

                    $return = $con->query($search);

                    if (!$return) {
                        $message = "Whole query " . $search;
                        echo $message;
                        die('Invalid query: ' . mysqli_error($con));
                    }
                    echo "<table><th>Name</th>";
                    while ($row = $return->fetch_assoc()) {
                        echo "<tr><td>" . $row['ProductsName'] . "</td></tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
                <div class="col-sm-8">
                    <form method = "post" action = "productform.php" class="form-horizontal">
                        <div class="form-group">
                <?php
                if (isset($_POST['Submit']) || $sneaky == 1) {
                    //do the task we need to do using a switch
                    print("<fieldset>");
                    switch ($action) {
                        case "Insert":
                            include 'ProductsAdd.php';
                            break;
                        case"Update":
                            include 'ProductsUpdate.php';
                            break;
                        case"Search":
                            include 'ProductsSearch.php';
                            break;
                        default: print("Something is wrong");
                    }
                    $_POST = array();
                    print<<<HTML
                                <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="UnSubmit">Return</label>
  <div class="col-md-4">
    <input id="submit" name="UnSubmit" class="btn btn-primary" type="submit"></input>
  </div>
</div>
    <input type='hidden' value=0 name='sneaky'></input></fieldset>
HTML;
                }
                