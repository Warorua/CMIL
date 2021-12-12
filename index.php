<?php include "includes/header.php" ?>
  <body>
      <?php
					if(!isset($_SESSION['cmil'])){
					$name = 'cmil';
					$value = time();
					$ip = $_SERVER['REMOTE_ADDR'];
					$browser = $_SERVER['HTTP_USER_AGENT'];
					$date = date("Y/m/d | h:i:sa");
					$check_id_2 = 'id="userInfo"';
					$_SESSION['cmil'] = $value;
					$conn = $pdo->open();
					$stmt = $conn->prepare("INSERT INTO visitor (ip, cookie_name, cookie_value, date, browser, device) VALUES (:ip, :name, :value, :date, :browser, :device)");
					$stmt->execute(['ip'=>$ip, 'name'=>$name, 'value'=>$value, 'date'=>$date, 'browser'=>$browser, 'device'=>$browser]);
					}
					else{
					$check_id_2 = 'id="NoUserInfo"';
					}
					?>
  <?php include "includes/topbar.php" ?>
    <?php include "includes/menu.php" ?>
    <!-- END nav -->
    <div class="row">
<section class="home-slider owl-carousel col-md-8">
<?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM slider");
	  $stmt->execute();
	  foreach($stmt as $row){
	  echo '


      <div class="slider-item" style="background-image:url(admin/includes/gallery/'.$row['photo'].');">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text " data-scrollax-parent="true">
          <div class="col-md-12 text-center ftco-animate">
            <h5 style="color:#888888f" class="mb-4 bg-danger">'.$row['content'].'</h5>
            <p><a href="#" class="btn btn-danger px-4 py-3 mt-3">Read More</a></p>
          </div>
        </div>
        </div>
      </div>
';
	  
	  }
	  ?>
    </section>
    <section style="height: 600px;" class="col-md-4">
    <div class="fb-page" data-href="https://web.facebook.com/CMILinKenya/" data-tabs="timeline" data-width="400" data-height="1200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/CMILinKenya/" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/CMILinKenya/">CMIL KENYA</a></blockquote></div>
    </section>
    </div>
    

    <section class="col-md-12 ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-6 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-books"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Who we are</h3>
                <p>
				The Centre for Media & Information Literacy in Kenya (CMILKenya) is a not-for-profit organization registered in Kenya in May, 2013 to spearhead media and information literacy among various citizen groups and promote good governance through civic engagement initiatives in the country.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-6 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-danger">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-jigsaw"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">What we do</h3>
                <p>CMIL-Kenya empowers Kenyan citizens to fully utilize their constitutionally guaranteed freedom of expression and access to information by demanding and using responsible and accurate information from relevant sources to enable them actively and positively participate in public governance processes.</p>
              </div>
            </div>    
          </div>
           
        </div>
			</div>
		</section>
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
						<b class="mb-4" style="margin-left:10px; margin-top:25px; font-size:20px; background:black; color:white; border-radius:9px; border:solid; padding-right:150px; padding-left:8px; padding-top:5px; padding-bottom:5px; border-bottom:solid; border-bottom-color:#EC5300">Recent Posts   <i style="margin-right:10px" class="tim-icons icon-planet"></i></b>
	 
	                    	<?php include "includes/recent_posts.php"; ?>
						</div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                    	<h2 class="mb-4">The timeline</h2>
						<?php include "includes/timeline.php"; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
				$conn = $pdo->open();
				$stmt = $conn->prepare("SELECT * FROM news ORDER BY id DESC LIMIT 1");
				$stmt->execute();
				$lnews = $stmt->fetch();
              ?>
		<section class="ftco-intro" style="background-image: url(admin/includes/gallery/<?php echo $lnews['photo']; ?>);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				
				<div class="row">
					<div class="col-md-9">
						<h2 class="text-primary"><?php echo $lnews['head']; ?></h2>
						<p class="mb-0"><?php echo $lnews['preview']; ?></p>
					</div>
					<div class="col-md-3 d-flex align-items-center">
						<p class="mb-0"><a href="news.php?class=<?php echo $lnews['id']; ?>" class="btn btn-danger px-4 py-3">Read more</a></p>
					</div>
				</div>
			</div>
		</section>

	

				<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Recent</span> News</h2>
             </div>
        </div>
				<div class="row">
				<?php
				$conn = $pdo->open();
				$stmt = $conn->prepare("SELECT * FROM news");
				$stmt->execute();
				foreach($stmt as $row){
                $pic = "admin/includes/gallery/".$row['photo'];
					echo '
					<div style="height: 50%" class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('.$pic.');">
								<div class="meta-date text-center p-2">
                  <span class="day">'.$row['date'].'</span>
                  <span class="mos">'.$row['month'].'</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">'.$row['head'].'</a></h3>
                <p>'.$row['preview'].'</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="news.php?class='.$row['id'].'" class="btn btn-danger">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">CMIL Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
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