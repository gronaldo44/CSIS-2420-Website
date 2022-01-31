<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Client Form Page</title>
        <script>
            /**
             * Gets the element by id
             * 
             * @param {type} x
             * @returns {String}    document.getElementById(x)
             */
            $ = function (x) {
                return document.getElementById(x);
            };

            /**
             * Formats the argued str for an alert message
             * 
             * @param {type} str
             * @returns {String} Please enter your str!\n
             */
            alertf = function (str) {
                return "Please enter your " + str + "\n";
            };

            /**
             * Checks if form inputs are filled out
             * 
             * @returns {Boolean}  
             */
            function filledInputs() {
                console.log("Checking all inputs are filled");
                var alertStr = "";
                var error = false;

                if ($("fname").value === "") {
                    alertStr += alertf("First Name");
                    error = true;
                }
                if ($("lname").value === "") {
                    alertStr += alertf("Last Name");
                    error = true;
                }
                if ($("email").value === "") {
                    alertStr += alertf("Email");
                    error = true;
                }
                if ($("pword").value === "") {
                    alertStr += alertf("Password");
                    error = true;
                }
                if ($("phone").value === "") {
                    alertStr += alertf("Phone Number");
                    error = true;
                }
                if ($("address").value === "") {
                    alertStr += alertf("Street Address");
                    error = true;
                }
                if ($("city").value === "") {
                    alertStr += alertf("City");
                    error = true;
                }
                if ($("state").value === "") {
                    alertStr += alertf("State");
                    error = true;
                }
                if ($("zip").value === "") {
                    alertStr += alertf("Zip Code");
                    error = true;
                }
                if ($("bday").value === "") {
                    alertStr += alertf("Date of Birth");
                    error = true;
                }
                if (error) {
                    alert(alertStr);
                    return false;
                }
                return true;
            }

            /**
             * Checks if form inputs are valid
             * 
             * @returns {Boolean}
             */
            function validInputs() {
                console.log("Validating inputs");
                var error = false;
                var alertStr = "";
                var letterName = /^[a-zA-Z]+$/;
                var emailExpression = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                var passwordExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[_!@#\$%\^&\*])(?=.{8,})/;
                var phoneExpression = /^[2-9]\d{2}-\d{3}-\d{4}$/;

                if (!letterName.test($("fname").value)) {
                    console.log("Invalid First Name");
                    alertStr += "First Name entry can only be letters\n";
                    $("fname").classList.add("is-invalid");
                    error = true;
                }
                if (!letterName.test($("lname").value)) {
                    console.log("Invalid Last Name");
                    alertStr += "Last Name entry can only be letters\n";
                    $("lname").classList.add("is-invalid");
                    error = true;
                }
                if (!emailExpression.test($("email").value)) {
                    console.log("Invalid email");
                    alertStr += "Email entry must be formated \"someone@site.org\"\n";
                    $("email").classList.add("is-invalid");
                    error = true;
                }
                if (!passwordExpression.test($("pword").value)) {
                    console.log("Invalid password");
                    alertStr += "Password must be at least 8 characters & contain: \n" +
                            "\tAt least 1 uppercase letter (A-Z)\n" +
                            "\tAt least 1 lowercase letter (a-z)\n" +
                            "\tAt least 1 number (0-9)\n" +
                            "\tAt least 1 special character (_!@#$%^&*)\n";
                    $("pword").classList.add("is-invalid");
                    error = true;
                }
                if (!phoneExpression.test($("phone").value)) {
                    console.log("Invalid phone number");
                    alertStr += "Phone number must be formated \"###-###-####\"";
                    $("phone").classList.add("is-invalid");
                    error = true;
                }
                if (error) {
                    alert(alertStr);
                    return false;
                }
                return true;
            }

            /**
             * Checks if form is valid
             * 
             * @returns {Boolean}
             */
            function validateForm() {
                console.log("Validating form");
                return filledInputs() && validInputs();
            }
        </script>
        <?php
        include 'Header.php';
        ?>
        <noscript>You need to enable JavaScript</noscript>
    <div class="container-fluid">
        <div class=""row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <form id="form_11683" class="form-horizontal col-sm-8"  method="post" onsubmit="return(validateForm())" action="completed.php">
                    <fieldset>

                        <legend>New Client</legend>
                        <p>Sign up for our services</p>

                        <div class="form-group">
                            <label class="col-md-6 control-label" for="fname">First Name
                            </label>
                            <div class="col-md-6">
                                <input id="fname" name="fname" class="form-control input-md" type="text" maxlength="150" value=""/> 
                            </div> 
                        </div>		
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="lname">Last Name
                            </label>
                            <div class="col-md-6">
                                <input id="lname" name="lname" class="form-control input-md" type="text" maxlength="150" value=""/> 
                            </div> 
                        </div>		
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="email">E-mail
                            </label>
                            <div class="col-md-6">
                                <input id="email" name="email" class="form-control input-md" type="text" placeholder="someone@site.org" maxlength="255" value=""/> 
                            </div> 
                        </div>		
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="pword">Password</label>
                            <div class="col-md-6">
                                <input id="pword" name="pword" type="password" class="form-control input-md" placeholder="*********" /> 
                                <span class="help-block">
                                    At least 1 upper & lower case letter.<br>
                                    At least 1 number & special character (_!@#$%^&*).<br>
                                    8 characters or longer.<br></span>
                            </div> 
                        </div>	
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="phone">Phone </label>
                            <div class="col-md-6">
                                <input id="phone" name="phone" type="tel" class="form-control input-md" placeholder="###-###-####">
                                <span class="help-block">
                                    Format: ###-###-####<br>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="description" for="address">Street Address</label>
                            <div>
                                <input id="address" name="address" class="element text medium" type="text" maxlength="255" value=""/> 
                            </div> 
                        </div>		
                        <div class="form-group">
                            <label class="description" for="city">City</label>
                            <div>
                                <input id="city" name="city" class="element text medium" type="text" maxlength="255" value=""/> 
                            </div> 
                        </div>		
                        <div class="form-group">
                            <label class="description" for="state">State </label>
                            <div>
                                <select class="element select medium" id="state" name="state"> 
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="OR">Oregon</option>
                                    <option value="UT">Utah</option>
                                    <option value="WA">Washington</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div> 
                        </div>		
                        <div class="form-group">
                            <label class="description" for="zip">Zip Code</label>
                            <div>
                                <input id="zip" name="zip" class="element text medium" type="text" maxlength="255" value=""/> 
                            </div> 
                        </div>		
                        <div class="form-group">
                            <label class="description" for="bday">Birthday</label>
                            <div>
                                <input id="bday" name="bday" class="control-label" type="date" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit"/>
                        </div>
                    </fieldset>
                </form>	
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
</body>
</html>
