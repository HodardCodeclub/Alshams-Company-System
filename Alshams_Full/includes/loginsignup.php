
<div class="container">
    	<div class="row">
			<div class="col-md-9">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body Reappear">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="users/common_assets/DB_Commands/startPoint.php" method="post" role="form" style="display: block;">
									      <div class="form-group">
				                              <div class="form-group">
				                                <label for="Uname">username</label>
				                                <input type="text" class="form-control" id="Uname" name="Uname" placeholder="@username">
				                            </div>
										              <label for="pass">password </label><a class="pull-right" href="#">forget Password</a>
				                                <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
				                            </div>
				                           <div class="checkbox">
				                            <label>  <input type="checkbox" name="remember" > Remember me.! (not recommended on public or shared computers)</label>
				                        </div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
					
								</form>

								<form id="register-form" action="users/common_assets/DB_Commands/startPoint.php" method="post" role="form" style="display: none;">
					 <div class="input-group" >
                                    <div class="form-group" >
                                        <label for="Fname">FirstName</label>
                                        <input type="text" class="form-control " name="fname" id="Fname" placeholder="First Name"  required="required"/>
                                    </div>

                                    <span class="input-group-btn" style="width:9px;" ></span>
                                    <label for="Lname">lastName</label>
                                    <input type="text" class="form-control " id="Lname" name="lname"  placeholder="Last Name" required>
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
                                    <div class="form-group" >
                                        <label for="us_Name">username</label>
                                        <input type="text" class="form-control " name="uname" id="us_Name" placeholder="user name"  required="required"/>
                                    </div>


                  <div class ="Form-group">
                     <div class="row">
                     <div class="col-md-3"> 
                        <label for="countrycode">Country code:</label>
                        <input type="text" class="form-control" id="countrycode"  name="countrycode" placeholder="ex: +20 ">
                     </div>
                     <div class="col-md-4">
                               <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone"  name="phone" placeholder="contact no.">
                                    </div>
                     </div>

                      <div class="col-md-3 col-md-offset-1">
                                <label>Gender</label>
                                <div class ="radio">
                                    <label><input type="radio" value="Male" checked name="gender">Male</label><br/>
                                    <label><input type="radio" value="Female"  name="gender">Female</label>
                                </div>
                            </div>
                    </div>
                  </div> <!-- end of phone sector-->


                        <div class="form-group">         
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="street">street</label>
                                        <input type="text" class="form-control" id="street"  name="street" placeholder="street">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="apartementnumber">Apart.no</label>
                                        <input type="number" class="form-control" id="apartementnumber"  name="apartementnumber" placeholder="apt no.">
                                    </div>
                                </div>
                            
                             <div class="col-md-2">
                                <label>Country</label>
                                <select class="selectpicker" name="country">
                                      <optgroup label="E">
                                        <option value="2">Egypt</option>
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
                            <div class="col-md-5">
                                  <div class="form-group">
                                      <label for="DOB">Date Of Birth</label>
                                        <input type="Date" class="form-control" id="DOB"  name="DateOfBirth" placeholder="Year-Month-Day">
                                  </div>
                            </div>
                            </div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="Register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
</body>
</html>
