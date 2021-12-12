<?php include "includes/header.php" ?>
  <body>
  <?php include "includes/topbar.php" ?>
    <?php include "includes/menu.php" ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/8.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Who We Are</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">Who we are</h2>
						<p>
                        The Centre for Media & Information Literacy in Kenya (CMILKenya) is a not-for-profit organization registered in Kenya in May 2013 to spearhead media and information literacy among various citizen groups and promote good governance through civic engagement initiatives in the country.
                        </p>
						<div class="row mt-5">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
									<div class="text">
                                    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM who_we_are WHERE id=:id");
	  $stmt->execute(['id'=>4]);
	  $background = $stmt->fetch();
	  ?>
										<h3><?php echo $background['head']; ?></h3>
										<p><?php echo $background['content']; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
									<div class="text">
                                    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM who_we_are WHERE id=:id");
	  $stmt->execute(['id'=>5]);
	  $mandate = $stmt->fetch();
	  ?>
										<h3><?php echo $mandate['head']; ?></h3>
										<p> <?php echo $mandate['content']; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
									<div class="text">
                                    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM who_we_are WHERE id=:id");
	  $stmt->execute(['id'=>1]);
	  $mission = $stmt->fetch();
	  ?>
										<h3><?php echo $mission['head']; ?></h3>
										<p><?php echo $mission['content']; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="fas fa-award"></span></div>
									<div class="text">
                                    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM who_we_are WHERE id=:id");
	  $stmt->execute(['id'=>2]);
	  $vision = $stmt->fetch();
	  ?>
										<h3><?php echo $vision['head']; ?></h3>
										<p><?php echo $vision['content']; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
									<div class="text">
                                    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM who_we_are WHERE id=:id");
	  $stmt->execute(['id'=>4]);
	  $values = $stmt->fetch();
	  ?>
										<h3><?php echo $values['head']; ?></h3>
										<p> <?php echo $values['content']; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
									<div class="text">
										<h3>Sports Facilities</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
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