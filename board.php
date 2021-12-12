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
            <h1 class="mb-2 bread">Board</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-no-pb">
			<div class="container">
				<div class="row">
        <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM board");
	  $stmt->execute();
	  foreach($stmt as $row){
	  echo '
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-5.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>'.$row['name'].'</h3>
								<span class="position mb-2">'.$row['rank'].'</span>
								<div class="faded">
									<p> '.$row['Info'].'</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a ><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a ><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a ><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a ><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
          ';
	  
        }
        ?>
					

				</div>
			</div>
		</section>



    
    <?php include "includes/footer.php" ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include "includes/scripts.php" ?>
    
  </body>
</html>