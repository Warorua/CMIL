<!DOCTYPE html>
<html lang="en">

<?php include 'includes/styles.php'; ?>

<body class="bg-gradient-primary">

    <div class="container">
<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='card mb-4 py-3 border-left-primary'>
                                <div class='card-body'>
	        						".$_SESSION['error']."
	        					</div></div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		  if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='card mb-4 py-3 border-left-primary'>
                                <div class='card-body'>
	        						".$_SESSION['success']."
	        					</div></div>
	        				";
	        				unset($_SESSION['success']);
	        			}
					?>
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
								
                            </div>
                            <form method="post" action="signup.php" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastname" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" required="required">
                                </div>
								<div class="form-group">
                                    <input type="number" name="contact" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Phone Number" required="required">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"  name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required="required">
                                    </div>
                                </div>
								<div class="form-group">
                                <button type="submit" name="register" class="form-control form-control-user btn btn-primary">
										Register
										</button>
                                </div>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   <?php include 'includes/scripts.php'; ?>
</body>

</html>