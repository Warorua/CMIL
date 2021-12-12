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
    <?php
		  if(isset($_GET['class'])){
		  $conn = $pdo->open();
		  $stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM news WHERE id=:id");
		  $stmt->execute(['id'=>$_GET['class']]);
		  $auth = $stmt->fetch();
		        if($auth['numrows'] > 0){
				$id = $_GET['class'];
				
				}else{
				header('location:index.php');
				}
		  
		  }else{
		  header('location:index.php');
		  }
		  
		  $conn = $pdo->open();
		  $stmt = $conn->prepare("SELECT * FROM news WHERE id=:id");
		  $stmt->execute(['id'=>$id]);
		  $news = $stmt->fetch();
		  ?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('admin/includes/gallery/<?php echo $dp['photo']; ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread"> <?php echo $news['head']; ?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>News <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-12 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
                        
	          	<h2 class="mb-4"><?php echo $news['head']; ?></h2>
                  <kbd><?php echo $news['date']; ?> /<?php echo $news['month']; ?>/ <?php echo $news['year']; ?></kbd>
			<br/>
                  <img class="mb-4" src="admin/includes/gallery/<?php echo $news['photo']; ?>" width="50%"/>
                  <p><?php echo $news['content']; ?></p>
                             
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