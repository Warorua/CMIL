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
            <h1 class="mb-2 bread">Media & Information Literacy</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Media & Information Literacy <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-8 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
                        <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM mil");
	  $stmt->execute();
	  foreach($stmt as $row){
	  echo '
	          	<h2 class="mb-4">'.$row['head'].'</h2>
							<p>'.$row['content'].'</p>
                            ';
	  
                        }
                        ?>
                        <p><a href="mil2.php" class="btn btn-secondary px-4 py-3">Read More</a></p>
                            
							</div>
					</div>


					<div class="col-md-4 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">Media & Information Literacy</h2>
						<div class="row mt-5">
							<div class="col-lg-12">
								
								<?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM mil");
	  $stmt->execute();
	  foreach($stmt as $row){
	  echo '
      <div class="row">
      <div class="col-md-12">
       <img src="admin/includes/gallery/'.$row['p1'].'" width="100%" style="margin-top:25px; border-radius:7px" alt="center for Media & Information Literacy " />
      </div>
      </div>
	  
	';
	  
	  }
	  ?>	
							
							
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