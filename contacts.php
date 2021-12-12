<?php include "includes/header.php" ?>
  <body>
  <?php include "includes/topbar.php" ?>
    <?php include "includes/menu.php" ?>
    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM gallery ORDER BY RAND() LIMIT 1");
	  $stmt->execute();
	  $dp = $stmt->fetch();
	  ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('admin/includes/gallery/<?php echo $dp['photo']; ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    
    
    
    
     
    
    <?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM contacts WHERE id=1");
$stmt->execute();
$contacts = $stmt->fetch();
?>



<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-12 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate row">
                        <?php
if(!isset($user['firstname'])){
  echo '
  <li class="col-md-6"><a style="padding-top:10px; padding-bottom:10px; margin-top:25px; margin-right:25px" href="signup.php" class="nav-link btn btn-info">Sign Up</a></li>
 <li class="col-md-6"><a style="padding-top:10px; padding-bottom:10px; margin-top:25px; margin-right:25px" href="signin.php" class="nav-link btn btn-warning">Login</a></li>
  ';
}
else{
  echo '
  <li class="nav-item dropdown"><a id="dropdownMenu5" class="nav-link dropdown-toggle" data-bs-toggle="modal" data-bs-target="#Profile">Hello, '.$user['firstname'].'</a>
  <ul class="dropdown-menu dropdown-menu-end"  aria-labelledby="dropdownMenu5">
                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#Profile">Edit profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="logout.php" class="dropdown-item" type="button">Logout</a></li>
                
            </ul>
  </li>
  ';
}
         ?>
    
                           
						</div>
					</div>
        	</div>
		</section>



<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-12 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
                           <?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        			<div class='alert alert-danger'>
		                <h4><i class='icon fa fa-warning'></i> Error!</h4>

	        						".$_SESSION['error']."
	        					 </div>
                            
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
		        	<div class='alert alert-info'>
		                <h4><i class='icon fa fa-check-square-o'></i> Success!</h4>
	        						".$_SESSION['success']."
	        					</div>
								 
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
                    <p class="h3"> We Open from: 08:30-17:00 to take your call.</p>
				<p class="">
				We would be more than delighted to answer any inquiry you might have, just use the form below or choose one of the alternative methods of communication. We’re available from Monday to Friday,
				 </p>
						</div>
					</div>
        	</div>
		</section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Address</h3>
	            <p><?php echo $contacts['location']; ?></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://1234567920"><?php echo $contacts['tel']; ?></a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:info@yoursite.com"><?php echo $contacts['email']; ?></a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">medialiteracy-kenya.info</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
						<form method="post" action="message.php">
              <div class="form-group">
                <input type="text" class="form-control" name="firstname" required="required" placeholder="First Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="lastname" required="required" placeholder="Last Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" required="required" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" required="required" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="7" class="form-control"  name="message" required="required" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" name="send" class="btn btn-primary py-3 px-5">
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
						<div>
                        <?php echo $contacts['geo']; ?>
                        </div>
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