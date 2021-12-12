<?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM contacts WHERE id=1");
$stmt->execute();
$contacts = $stmt->fetch();
?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $contacts['location']; ?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo $contacts['tel']; ?></span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo $contacts['email']; ?></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2>
     <?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM blog ORDER BY id DESC LIMIT 2");
$stmt->execute();
foreach($stmt as $row){
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
    echo '
    <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(admin/includes/gallery/'.$row['photo'].');"></a>
                <div class="text">
                  <h3 class="heading"><a href="context.php?post='.$row['id'].'">'.$row['head'].'</a></h3>
                  <div class="meta">
                    <div><a><span class="icon-calendar"></span> '.$date.' '.$month.', '.$year.'</a></div>
                    <div><a><span class="icon-person"></span> Admin</a></div>
                    <div><a><span class="icon-chat"></span> '.$total_comms.'</a></div>
                  </div>
                </div>
              </div>
    ';
}
     ?>
              

            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="who_we_are.php"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="blog.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Blog</a></li>
                <li><a href="gallery.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Gallery</a></li>
                <li><a href="contacts.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Subscribe</h2>
              <form method="post" action="subscribe.php" class="subscribe-form">
                <div class="form-group">
                <?php
						$date = date("d M, Y");
						?>
                <?php
									if(isset($user['id'])){
									echo ' 
                  <input type="email" name="email" value="'.$user['email'].'" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="hidden" name="date" value="'.$date.'" />
                  <input type="submit"  name="subscribe" value="Subscribe" class="form-control submit px-3">
                                    ';
									}
									else{
									echo '
                                    <input type="text" class="form-control mb-2 text-center" placeholder="Login to subscribe"  readonly>
                                    <input type="submit" value="Subscribe" class="form-control submit px-3"  readonly>
                                 
                                    ';
                                }
                                ?>
                  
                </div>
              </form>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="<?php echo $social['twitter']; ?>"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="<?php echo $social['facebook']; ?>"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="<?php echo $social['instagram']; ?>"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Centre for  Media & Information Literacy - Kenya
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>