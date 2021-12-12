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
            <h1 class="mb-2 bread">Activation</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Activation <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <?php
	$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['user'])){
		$output .= '
			<div class="alert alert-danger">
                <h4><i class="icon fa fa-warning"></i> Error!</h4>
                Code to activate account not found.
            </div>
            <h4 class="jumbotron bg-success">You may <a href="signup.php">Signup</a> or go to the <a href="index.php">Homepage</a>.</h4>
		'; 
	}
	else{
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['status']){
				$output .= '
					<div class="alert alert-danger">
		                <h4><i class="icon fa fa-warning"></i> Error!</h4>
		                Account already activated.
		            </div>
		            <h4 class="jumbotron bg-success">You may <a href="signin.php">Login</a> or go to the <a href="index.php">Homepage</a>.</h4>
				';
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['id']]);
					$output .= '
						<div class="alert alert-success">
			                <h4><i class="icon fa fa-check"></i> Success!</h4>
			                Account activated - Email: <b>'.$row['email'].'</b>.
			            </div>
			            <!-- partial:index.partial.html -->

 <h1  style="margin:3px; margin-left:3px; margin-right:3px" class="page-header elegantshadow">
					
     Welcome to CMIL - Kenya!
	 <hr />
	  <a class="btn btn-primary" href="signin.php"> Login now</a>
	
   
<!-- partial -->
						
					';
				}
				catch(PDOException $e){
					$output .= '
						<div class="alert alert-danger">
			                <h4><i class="icon fa fa-warning"></i> Error!</h4>
			                '.$e->getMessage().'
			            </div>
			            <h4 class="jumbotron bg-success">You may <a href="signup.php">Signup</a> or go to the <a href="index.php">Homepage</a>.</h4>
					';
				}

			}
			
		}
		else{
			$output .= '
				<div class="alert alert-danger">
	                <h4><i class="icon fa fa-warning"></i> Error!</h4>
	                Cannot activate account. Wrong code.
	            </div>
	            <h4 class="jumbotron bg-success">You may <a href="signup.php">Signup</a> or go to the <a href="index.php">Homepage</a>.</h4>
			';
		}

		$pdo->close();
	}
?>
	
    <section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-12 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
                       
	          	<h2 class="mb-4">Activation</h2>
							<p><?php echo $output; ?></p>
                              
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