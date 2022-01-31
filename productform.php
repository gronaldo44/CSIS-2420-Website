<!DOCTYPE html>
<?php
//get post and connect to DB
require_once "DataBaseConnection.php";
// print_r($_POST);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product Form</title>
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
                    <form method = "post" action = "results.php" class="form-horizontal">
                        <div class="form-group">
                            <?php
                                print <<<HTML
<fieldset>

<!-- Form Name -->
<legend>Product Form</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ProductName">Product Name</label>  
  <div class="col-md-4">
  <input id="ProductName" name="ProductName" type="text" placeholder="Enter a name" class="form-control input-md" required="">
  <span class="help-block">Name of the products need to be unique</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Price">Product Price</label>  
  <div class="col-md-4">
  <input id="Price" name="Price" type="text" placeholder="$0.00" class="form-control input-md" required="">
  <span class="help-block">Leave as 0.00 to not update (Do not include $)</span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Desc">Product Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="Desc" name="Desc">No description yet made</textarea>
  </div>
</div>
                                
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ProductImg">Product Image</label>  
  <div class="col-md-4">
  <input id="ProductImg" name="ProductImg" type="text" placeholder="default.png" class="form-control input-md" required="">
  <span class="help-block">Filename or image URL</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Action">Select One</label>
  <div class="col-md-4">
    <select id="Action" name="Action" class="form-control">
      <option value="Search">Search</option>
      <option value="Insert">Create</option>
      <option value="Update">Update</option>
    </select>
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit">Submit</label>
  <div class="col-md-4">
    <input id="submit" name="Submit" class="btn btn-primary" type="submit"></input>
  </div>
</div>                                
<input type="hidden" value=1 name="sneaky"></input>
</fieldset>
HTML;
                            ?>
                        </div>
                    </form>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
        
            <!-- Bootstrap core JavaScript -->
            <script src="../../../vendor/jquery/jquery.min.js" type="text/javascript"></script>
            <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

            <!-- Plugin JavaScript -->
            <script src="../../../vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

            <!-- Contact Form JavaScript -->
            <script src="../../../js/jqBootstrapValidation.min.js" type="text/javascript"></script>
            <script src="../../../js/contact_me.min.js" type="text/javascript"></script>

            <!-- Custom scripts for this template -->
            <script src="../../../js/freelancer.min.js" type="text/javascript"></script>
    </body>
</html>
