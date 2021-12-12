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
            <h1 class="mb-2 bread">Kenya MIL Alliance</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Kenya MIL Alliance <i class="ion-ios-arrow-forward"></i></span></p>
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
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM kenmil ORDER BY id DESC");
	  $stmt->execute();
	  foreach($stmt as $row){
	  echo '

   <div class="blog-slider">
  <div class="blog-slider__wrp swiper-wrapper">
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        
        <img src="admin/includes/gallery/'.$row['photo'].'" alt="">
      </div>
      <div class="blog-slider__content">
        <span class="blog-slider__code">'.$row['date'].'</span>
        <div class="blog-slider__title">'.$row['head'].'</div>
        <div class="blog-slider__text">
		'.$row['brief'].'
		</div>
		<form method="post" action="at_kenmil.php">
		<input type="hidden" name="pass" value="'.$row['id'].'" />
		<button type="submit" name="kenmil" class="blog-slider__button">READ MORE</button>
		</form>
       
      </div>
    </div>
   </div>
  <div class="blog-slider__pagination"></div>
</div>

	  ';
	  
	  }
	  ?>
                
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