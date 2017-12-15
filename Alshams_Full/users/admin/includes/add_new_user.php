<?php
include_once("../../common_assets/DB_Commands/userTypes.class.php");

$all_user_types = userTypes::getAlluserTypes();

?>
<!DOCTYPE html>
<html>
<head>
  <title>add new user</title>
      <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../common_assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">



</head>
<body>

<!------------------ start ------------------>
<!-- signup form -->
            <div class = "modal-dialog">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h2 class ="modal-title">Add new Account:</h2>
                    </div>

                    <div class="modal-body">
                            <form  action="../../common_assets/DB_Commands/startPoint.php" method="post" role="form" autocomplete="on" id="formsignup">

                                <div class="input-group" >
                                    <div class="form-group" >
                                        <label for="Fname">FirstName</label>
                                        <input type="text" class="form-control " name="fname" id="Fname" placeholder="First Name"  required="required"/>
                                    </div>

                                    <span class="input-group-btn" style="width:9px;" ></span>
                                    <label for="Lname">lastName</label>
                                    <input type="text" class="form-control "  id="Lname" name="lname"  placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailT">Email</label>
                                    <input type="email" class="form-control" id="emailT" name="email"  placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control" id="password" name="pswrd"  placeholder="password goes here" required >
                                    </div>
                                  <div class="form-group">
                                    <label for="ps_word2">confirm password</label>
                                    <input type="password" class="form-control" id="ps_word2"  name="repswrd" placeholder="Re-enter password">
                                </div>

                                    <div class="form-group" >
                                        <label for="us_Name">username</label>
                                        <input type="text" class="form-control " name="uname" id="us_Name" placeholder="user name"  required="required"/>
                                    </div>


            <div class ="Form-group">
                <label for="countrycode">Country code:</label>
                <input type="text" class="form-control" id="countrycode"  name="countrycode" placeholder="your country code">
            </div>

                        <div class="form-group">         
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone"  name="phone" placeholder="phone number or home line">
                                    </div>
                                </div>
                             <div class="col-md-3 col-md-offset-1">
                                <label>Gender</label>
                                <div class ="radio">
                                    <label><input type="radio" value="Male" checked name="gender">Male</label>
                                    <label><input type="radio" value="Female"  name="gender">Female</label>
                                </div>
                            </div>
                          </div>
                        </div>

                    
                        <div class="form-group">         
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="street">street</label>
                                        <input type="text" class="form-control" id="street"  name="street" placeholder="street name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="apartementnumber">Apart.no</label>
                                        <input type="number" class="form-control" id="apartementnumber" name="apartementnumber" placeholder="apartment number">
                                    </div>
                                </div>
                            
                             <div class="col-md-2">
                                <label>Country</label>
                                <select class="selectpicker" name="country">
                                      <optgroup label="E">
                                        <option value="1">Egypt</option>
                                      </optgroup>
                                </select>
                            </div>
                                 <div class="col-md-2 ">
                                    <label>City</label>
                                    <select class="selectpicker" name="city">
                                         <optgroup label="A">
                                            <option value="3">Alexandria</option>
                                          </optgroup>
                                         <optgroup label="C">
                                        <option value="2">Cairo</option>
                                      </optgroup>
                                      </select>
                                 </div>

                          </div>
                        </div>


                            <div class="row">
                            <div class="col-md-4">
                                   <div class="form-group">
                                      <label for="DOB">Date Of Birth</label>
                                        <input type="Date" class="form-control" id="DOB"  name="DateOfBirth" placeholder="Year-Month-Day">
                                  </div>
                            </div>
                            <div class="col-md-6">
                                   <label>user type</label>
                                    <select class="selectpicker" name="userType">
                                         <optgroup label="stuff">
                                <?php for($i=0;$i <count($all_user_types);$i++)
                                  {
                                    if($i ==1)
                                        { continue;}
                                       echo "<option value='" . ($i+1) . "' >" . $all_user_types[$i]->userType_name  . "</option>";

                                  } 
                                ?>
                                          </optgroup>
                                         <optgroup label="C">
                                        <option value="2">customer</option>
                                      </optgroup>
                                    </select>
                            </div>
                          </div>

                  <input type="submit" name="Admin_Register" value ="Create Account" class="col-sm-12  btn btn-success pull-right" id="formsubmit" >    
                  <br/><br/>
                </form>
        </div>
     </div>
        </div>


<!------------------ END ------------------>


</body>

<!-- jQuery 2.2.3 -->
<script src="../../common_assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../common_assets/bootstrap/js/bootstrap.min.js"></script>
</html>    