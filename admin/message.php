<!DOCTYPE html>
<html lang="en">

<?php include 'includes/session.php'; ?>
<?php include 'includes/styles.php'; ?>
<?php
if(!isset($_SESSION['admin'])){
header('location:../index.php');
}

?>
<body id="page-top">
<?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM message WHERE id=:id");
$stmt->execute(['id'=>$_GET['pass']]);
$auth = $stmt->fetch();
if($auth['numrows'] > 0){
$id = $_GET['pass'];
}
else{
$_SESSION['error'] = 'Invalid message selected!';
header('location:index.php');
}
$stmt = $conn->prepare("UPDATE message SET conf_1=1 WHERE id=:id");
$stmt->execute(['id'=>$_GET['pass']]);

$_SESSION['reply'] = 'Set';
?>
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
				$conn = $pdo->open();
				$stmt = $conn->prepare("SELECT * FROM message WHERE id=:id");
				$stmt->execute(['id'=>$id]);
				$message = $stmt->fetch();
				?>
				<!-- Begin Page Content -->
                <div class="container-fluid">
				
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
				<!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Message</h1>
							<h2 class="h5 mb-2 text-gray-800"><b>Email:</b> <?php echo $message['email']; ?></h2>
							<h2 class="h5 mb-2 text-gray-800"><b>From:</b> <?php echo $message['firstname']; ?> <?php echo $message['lastname']; ?></h2>
				<div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardAction" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardAction">
                                    <h6 class="m-0 font-weight-bold text-primary">Message Content</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardAction">
							  <div class="card-header">
								<b class="card-title"><?php echo $message['subject']; ?></b>
								</div>
                                    <div class="card-body">
									<p>
									<?php echo $message['message']; ?>
									</p>
									
									<hr />
									<form method="post" action="message_processor.php">
									<input type="hidden" name="message" value="<?php echo $message['id']; ?>" />
								 
								 <input type="hidden" name="pass" value="<?php echo $id; ?>" />
								
                                        <div class="row">
									<div class="col-md-12"><button style="width:100%" type="submit" name="delbl" value="3" class="btn btn-danger"><i style="margin-right:10px" class="fa fa-trash"></i>Delete message</button></div>
										</div>
									</form>
                                    </div>
                                </div>
                            </div>
							
							
							
							<div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardAction" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardAction">
                                    <h6 class="m-0 font-weight-bold text-primary">Send response</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardAction">
							  
                                    <div class="card-body">
									<form method="post" action="message_response.php">
									<div class="form-group">
									<label>Title</label>
									<input type="text" class="form-control" name="title" placeholder="Place the response title here" />
									</div>
									<div class="form-group">
									<label>Message body</label>
									<textarea class="form-control" style="width:100%; height:200px" name="body"></textarea>
									</div>
									
									<input type="hidden" name="email" value="<?php echo $message['email']; ?>" />
									<input type="hidden" name="message" value="<?php echo $message['id']; ?>" />
								   <input type="hidden" name="pass" value="<?php echo $id; ?>" />
								   <hr />
								   <div class="row">
								   
									<div class="col-md-6"><button style="width:100%" type="submit" name="response" value="3" class="btn btn-success"><i style="margin-right:10px" class="fa fa-paper-plane"></i>Send response</button></div>
										</div>
									</form>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php'; ?>

</body>

</html>