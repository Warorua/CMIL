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
            <h1 class="mb-2 bread">Our Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Our Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row">

                <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM blog ORDER BY RAND()");
	  $stmt->execute();
	  foreach($stmt as $row){
	   $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	  $stmt->execute(['id'=>$row['user']]);
	  $pers = $stmt->fetch();
	  //count comments
	        $stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM comments WHERE title=:title");
				$stmt->execute(['title'=>$row['id']]);
				$comm_no = $stmt->fetch();
				$comments_no = $comm_no['numrows'];
				//replies count
				$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM reply WHERE comment=:comment");
				$stmt->execute(['comment'=>$comm_no['id']]);
				$reps_no = $stmt->fetch();
				$replies_no = $reps_no['numrows'];
				
				$total_comms = $reps_no['numrows'] + $comm_no['numrows'];
				$date = date("d");
				$month = date("M");
                $year = date("Y");
$pic = "'admin/includes/gallery/".$row['photo']."'";

	  
	  echo '
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('.$pic.');">
								<div class="meta-date text-center p-2">
                  <span class="day">'.$date.'</span>
                  <span class="mos">'.$month.'</span>
                  <span class="yr">'.$year.'</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="">'.$row['head'].'</a></h3>
                <p>'.$row['brief'].'...</p>
                <div class="d-flex align-items-center mt-4">
                <form method="post" action="context.php">
		          <input type="hidden" name="pass" value="'.$row['id'].'" />
	                <p class="mb-0"><button type="submit" name="context" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></button></p>
                    </form> 
                    <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> '.$total_comms.'</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
          ';
	  
        }
        ?>
          

        </div>
        <div class="row no-gutters my-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
              </ul>
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