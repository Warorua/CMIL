<?php include "includes/header.php" ?>
<?php
if(isset($user['firstname'])){
    header("location: index.php");
}
?>
  <body>
  <?php include "includes/topbar.php" ?>
    <?php include "includes/menu.php" ?>
    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM gallery ORDER BY RAND() LIMIT 1");
	  $stmt->execute();
	  $dp = $stmt->fetch();
	  ?>

<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div style=' background:#FFDFA6' class='card mb-4 py-3 border-bottom-danger'>
                                <div style='color:#FF0D40;' class='card-body'>

	        						".$_SESSION['error']."
	        					 </div>
                            </div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
		        					<div style=' background:#A6E3FF' class='card mb-4 py-3 border-bottom-primary'>
                                <div style='color:#0D9BFF;' class='card-body'>
	        						".$_SESSION['success']."
	        					</div>
								 </div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>


    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(gal1.jpg); background-size:100%" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-end">
    			<div class="col-md-6 py-5 px-md-5 bg-primary">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	            <h2 class="mb-4">Sign up</h2>
	            </div>
	          <form  method="post" action="register.php" class="appointment-form ftco-animate">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" name="firstname" required="required" placeholder="First Name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" name="lastname" required="required" placeholder="Last Name">
		    				</div>
	    				</div>
                        <div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="email" class="form-control" name="email" required="required" placeholder="Email">
		    				</div>
		    			</div>
                        <div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="tel" class="form-control" name="contact" pattern="[0-9]{9}" required="required" placeholder="Phone number">
                                <small>Format: <b>740295282</b>. Do not include the zero.</small><br><br>
                            </div>
		    			</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
                            <input type="password" class="form-control" name="password" required="required" placeholder="Password">
		    				</div>
	    					<div class="form-group ml-md-4">
		    					<input type="password" class="form-control" name="repassword" required="required" placeholder="RePassword">
		    				</div>
	    				</div>
                        
	    				<div class="d-md-flex">
	    				

                        <?php
            if(!isset($_SESSION['captcha'])){
              echo '
                <div class="form-group" style="width:100%; margin-left:3%">
                  <div class="g-recaptcha" data-sitekey="6LeRDMgbAAAAAJWZLOlThJ7GIp9VxfrRBclHvqPn"></div>
                </div>
              ';
            }
          ?>
                   
		            <div class="form-group ml-md-4">
		              <input type="submit" name="signup" value="Sign up" class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
    			</div>
        </div>
    	</div>
    </section>






    
    <?php include "includes/footer.php" ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include "includes/scripts.php" ?>
    
  </body>
</html>