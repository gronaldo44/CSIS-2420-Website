<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Check Us Out</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <form class="form-group" action="response.php" method="post">

                    <fieldset>

                        <!-- Form Name -->
                        <legend><h3>Craft Cookie Cottage</h3></legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-8 control-label" for="Product">Product or Service</label>  
                            <div class="col-md-8">
                                <input id="Product" name="Product" type="number" min ="1" max="5" placeholder="1" class="form-control input-md" name="Product">
                                <span class="help-block">Please select a product or service: 1. Cookies & Brownies, 2. Breads & Pastries, 3. Cakes & Pies, 4. Birthday Cake, 5. Party Box!</span>  
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-8 control-label" for="UserN">Username</label>  
                            <div class="col-md-8">
                                <input id="CapAge" name="UserN" type="text" placeholder="" class="form-control input-md" name="UserN">
                                <span class="help-block">This is the name you will go by</span>  
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-8 control-label" for="State">State</label>  
                            <div class="col-md-8">
                                <input id="ShipName" name="State" type="text" placeholder="UT" class="form-control input-md" name="State">
                                <span class="help-block">Which state would you like service from? (Our service is only available in: AK, AZ, CA, CO, ID, MT, NV, NM, OR, UT, WA, WY)</span>  
                            </div>
                        </div>

                        <div class="form-group">
 
                            <div class="col-md-8">
                                <input id="Submit" name="Submit" type="submit"  class="form-control input-group-btn" name="Submit">
                                 
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
