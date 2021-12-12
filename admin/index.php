
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/session.php'; ?>
<?php
if(!isset($_SESSION['admin'])){
header('location:../index.php');
}
?>
<?php include 'includes/styles.php'; ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'includes/topbar.php'; ?>
                <!-- End of Topbar -->
        <?php
		$date = date("d M, Y");
		?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
					
					

							
							<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div style=' background:#FFDFA6' class='card mb-4 py-3 border-bottom-danger'>
                                <div style='color:#FF0D40;' class='card-body'>

	        						".$_SESSION['error']."
	        					 </div>
                            </div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
		        					<div style=' background:#A6E3FF' class='card mb-4 py-3 border-bottom-primary'>
                                <div style='color:#0D9BFF;' class='card-body'>
	        						".$_SESSION['success']."
	        					</div>
								 </div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
                    <!-- Content Row -->
                    <div class="row">
					
					
<?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT DISTINCT(ip),COUNT(*) AS numrows FROM visitor");
$stmt->execute();
$visitor = $stmt->fetch();
?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                New Visitors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $visitor['numrows']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
			<?php
			$conn = $pdo->open();
			$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM users WHERE status=1");
			$stmt->execute();
			$reg_users = $stmt->fetch();
			?>
                     <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Registered users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $reg_users['numrows']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
	$conn = $pdo->open();
	$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM users WHERE status=2");
	$stmt->execute();
	$reg_authors = $stmt->fetch();
?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Authors
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $reg_authors['numrows']; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
$conn = $pdo->open();
 $stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM comments");
				$stmt->execute();
				$comm_no = $stmt->fetch();
				$comments_no = $comm_no['numrows'];
				//replies count
				
				$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM reply");
				$stmt->execute();
				$reps_no = $stmt->fetch();
				$replies_no = $reps_no['numrows'];
				
				$total_comms = $reps_no['numrows'] + $comm_no['numrows'];
?>
   
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Comments</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_comms; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
						<?php
						$conn = $pdo->open();
						$stmt = $conn->prepare("SELECT * FROM home");
						$stmt->execute();
						foreach($stmt as $row){
						echo'
						<div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">'.$row['head'].'</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">'.$row['head'].':</div>
											<a class="dropdown-item" data-toggle="modal" data-target="#whos'.$row['id'].'">Edit</a>
                                            
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">'.$date.'</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <p>
									'.$row['content'].'
									</p>
                                </div>
                            </div>
                        </div>
<div class="modal fade" id="whos'.$row['id'].'">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form method="post" action="edit_home.php">
	 <div class="modal-header">
        <h4 class="modal-title">'.$row['head'].'</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <label for="head">Title</label>
	   <input type="hidden" name="auth" value="'.$row['id'].'" />
	   <input class="form-control" type="text" name="head" value="'.$row['head'].'" />
	   <label for="content">Content</label>
	  <textarea class="form-control" name="content" style="width:100%; height:150px">'.$row['content'].'</textarea>
      </div>

     <div class="modal-footer">
	 <div class="row">
	 <input type="submit" style="margin-right:15px" name="whos" class="btn btn-success" value="Save">
	 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	 </div>
        </form>
      </div>

    </div>
  </div>
</div>
						';
						}
						?>
                      <!-- whos modal -->
            <!-- The Modal -->

						
						
						
						
						
                    </div>
<div class="row">
              <div class="col-lg-6 mb-4">
                     <div style="height:1160px" class="card shadow mb-4">
					 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Contact Info</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Contact Info:</div>
											<a class="dropdown-item" data-toggle="modal" data-target="#Contact">Edit</a>
                                            
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"><?php echo $date; ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
								$conn = $pdo->open();
								$stmt = $conn->prepare("SELECT * FROM contacts");
								$stmt->execute();
								$contacts = $stmt->fetch();
								?>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="includes/gallery/contact.png" alt="...">
                                    </div>
                                    <p>
									<div class="card">
									<div class="card-header">
									<div class="card-title">Email</div>
									</div>
									<div class="card-body">
									<?php echo $contacts['email']; ?>
									</div>
									</div>
									
									<div class="card">
									<div class="card-header">
									<div class="card-title">Location Address</div>
									</div>
									<div class="card-body">
									<?php echo $contacts['location']; ?>
									</div>
									</div>
									
									<div class="card">
									<div class="card-header">
									<div class="card-title">Contact</div>
									</div>
									<div class="card-body">
									<?php echo $contacts['tel']; ?>
									</div>
									</div>
										</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>
							</div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Social links</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Social links:</div>
											<a class="dropdown-item" data-toggle="modal" data-target="#Social">Edit</a>
                                            
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"><?php echo $date; ?></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="includes/gallery/social.png" alt="...">
                                    </div>
                                    <p>
									 <?php
								$conn = $pdo->open();
								$stmt = $conn->prepare("SELECT * FROM social");
								$stmt->execute();
								$social = $stmt->fetch();
								?>
									<div class="card">
									<div class="card-header">
									<div class="card-title">
									<a class="btn btn-primary btn-circle btn-md"><i class="fab fa-facebook-f"></i>
									</a>
									</div>
									</div>
									<div class="card-body">
									<?php echo $social['facebook']; ?>
									</div>
									</div>
									
									<div class="card">
									<div class="card-header">
									<div class="card-title">
									<a class="btn btn-info btn-circle btn-md"><i class="fab fa-twitter"></i>
									</a>
									</div>
									</div>
									<div class="card-body">
									<?php echo $social['twitter']; ?>
									</div>
									</div>
									
									<div class="card">
									<div class="card-header">
									<div class="card-title">
									<a class="btn btn-warning btn-circle btn-md"><i class="fab fa-instagram"></i>
									</a>
									</div>
									</div>
									<div class="card-body">
									<?php echo $social['instagram']; ?>
									</div>
									</div>
									
									<div class="card">
									<div class="card-header">
									<div class="card-title">
									<a class="btn btn-success btn-circle btn-md"><i class="fab fa-whatsapp"></i>
									</a>
									</div>
									</div>
									<div class="card-body">
									<?php echo $social['whatsapp']; ?>
									</div>
									</div>
									
									<div class="card">
									<div class="card-header">
									<div class="card-title">
									<a class="btn btn-info btn-circle btn-md"><i class="fab fa-linkedin"></i>
									</a>
									</div>
									</div>
									<div class="card-body">
									<?php echo $social['linkedln']; ?>
									</div>
									</div>
									
									</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>
                          </div>
                    </div>
					
					
                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-lg-12 mb-4">
                       <div class="card shadow mb-4">
                                <div class="card-header">
								<div class="card-title">Geo-location</div>
								</div>
                                <div class="card-body">
                                    
                                  <?php echo $contacts['geo']; ?>   
                                </div>
                            </div>
                           </div>
                    </div>
					
	<!--------------------------modals ------------------------->
	<div class="modal fade" id="Contact">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	 <div class="modal-header">
        <h4 class="modal-title">Contact Infomation </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  <form method="post" action="contact_update.php">
      <div class="modal-body">
       <label for="content">Location Address</label>
	  <textarea class="form-control" name="location" style="width:100%; height:50px"><?php echo $contacts['location']; ?></textarea>
     
	  <label for="content">Contact</label>
	  <textarea class="form-control" name="contact" style="width:100%; height:50px"><?php echo $contacts['tel']; ?></textarea>
	  
       <label for="content">Email</label>
	  <textarea class="form-control" name="email" style="width:100%; height:50px"><?php echo $contacts['email']; ?></textarea>
     
	 <label for="content">Geo Location (-Iframe link-)</label>
	  <textarea class="form-control" name="geo" style="width:100%; height:50px"><?php echo $contacts['geo']; ?></textarea>
     <hr />
	 <button type="submit" name="tel" class="btn btn-info">Update contacts</button>
	  </div>
</form>
     <div class="modal-footer">
	 <div class="row">
	
	 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	 </div>
       
      </div>

    </div>
  </div>
</div>				
		
<!--------------------------modals ------------------------->
	<div class="modal fade" id="Social">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
   
	 <div class="modal-header">
        <h4 class="modal-title">Social Links (-Paste links-)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  <form method="post" action="social_update.php">
      <div class="modal-body">
       <label for="content">Facebook</label>
	  <textarea class="form-control" name="facebook" style="width:100%; height:50px"><?php echo $social['facebook']; ?></textarea>
     
	  <label for="content">Whatsapp</label>
	  <textarea class="form-control" name="whatsapp" style="width:100%; height:50px"><?php echo $social['whatsapp']; ?></textarea>
	  
       <label for="content">Twitter</label>
	  <textarea class="form-control" name="twitter" style="width:100%; height:50px"><?php echo $social['twitter']; ?></textarea>
     
	  <label for="content">Instagram</label>
	  <textarea class="form-control" name="instagram" style="width:100%; height:50px"><?php echo $social['instagram']; ?></textarea>
     
	<label for="content">Linkedln</label>
	<textarea class="form-control" name="linkedln" style="width:100%; height:50px"><?php echo $social['linkedln']; ?></textarea>
      <hr />
	 <button type="submit" name="social" class="btn btn-info">Update links</button>
	 
	  </div>
</form>
     <div class="modal-footer">
	 <div class="row">
	
	 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	 </div>
       
      </div>

    </div>
  </div>
</div>		

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'includes/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'includes/logout_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>

</body>

</html>