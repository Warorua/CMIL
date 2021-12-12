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
$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM comments WHERE id=:id");
$stmt->execute(['id'=>$_GET['pass']]);
$auth = $stmt->fetch();
if($auth['numrows'] > 0){
$id = $_GET['pass'];
}
else{
$_SESSION['error'] = 'Invalid comment selected!';
header('location:index.php');
}
$stmt = $conn->prepare("UPDATE comments SET conf_1=1 WHERE id=:id");
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
				$stmt = $conn->prepare("SELECT * FROM comments WHERE id=:id");
				$stmt->execute(['id'=>$id]);
				$comment = $stmt->fetch();
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
                    <h1 class="h3 mb-4 text-gray-800">Commented in <b><?php echo $comment['page']; ?></b></h1>
				<?php
				$conn = $pdo->open();
				if($comment['page'] == 'blog'){
				$stmt = $conn->prepare("SELECT * FROM blog WHERE id=:id");
				$stmt->execute(['id'=>$comment['title']]);
				$poste = $stmt->fetch();
				//poster
				$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
				$stmt->execute(['id'=>$poste['user']]);
				$author = $stmt->fetch();
				}
				else{
				$stmt = $conn->prepare("SELECT * FROM events WHERE id=:id");
				$stmt->execute(['id'=>$comment['title']]);
				$poste = $stmt->fetch();
				//poster
				$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
				$stmt->execute(['id'=>$poste['name']]);
				$author = $stmt->fetch();
	            }
				
				?>
					<!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Commented to page:</h6>
									<?php
									$conn = $pdo->open();
									$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM reply WHERE user=:user AND comment=:comment");
									$stmt->execute(['user'=>$user['id'], 'comment'=>$id]);
									$me_rep = $stmt->fetch();
									?>
									<b class="m-0 font-weight-bold text-success">You replied <?php echo $me_rep['numrows']; ?> time(s) to this comment.</b>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
								<div class="card-header">
								<div class="card-title">
								<?php echo $poste['head']; ?>
								<b class="text-danger" style="font-style:italic;">By: <?php echo $author['firstname']; ?> <?php echo $author['lastname']; ?></b>
								</div>
								</div>
                                    <div class="card-body">
                                        <?php echo $poste['brief']; ?>
                                    </div>
                                </div>
                            </div>
							
							
							
							
					<div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardComment" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardComment">
                                    <h6 class="m-0 font-weight-bold text-primary">Comment:</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardComment">
                                    <div class="card-body">
									<h5 class="mb-4 text-gray-800"><b><?php echo $comment['head']; ?></b></h5>
                                        <?php echo $comment['content']; ?>
									<hr />
									<?php
				$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
				$stmt->execute(['id'=>$comment['user']]);
				$commenter = $stmt->fetch();
									?>
								<b>By: </b><?php echo $commenter['firstname']; ?> <?php echo $commenter['lastname']; ?> <span style=" font-style:italic;">(<?php echo $commenter['points']; ?> Points)</span>
								<br />
								<b>On: </b><?php echo $comment['date']; ?>
								<hr />
								<h5 class="mb-4 text-gray-800">Give reply:</b></h5>
                                 <form method="post" action="reply.php">
								 <input type="hidden" name="comment" value="<?php echo $comment['id']; ?>" />
								 <input type="hidden" name="admin" value="<?php echo $user['id']; ?>" />
								 <input type="hidden" name="commenter" value="<?php echo $comment['user']; ?>" />
								 <input type="hidden" name="pass" value="<?php echo $id; ?>" />
								 <textarea class="form-control" style="width:100%; height:200px" name="content"></textarea>
								 <br />
								 <button type="submit" name="reply" class="btn btn-primary">Reply</button>
								 </form>  
                                    </div>
                                </div>
                            </div>
							
							
							
				<div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardAction" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardAction">
                                    <h6 class="m-0 font-weight-bold text-primary">Action</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardAction">
                                    <div class="card-body">
									<div class="row">
									<div class="col-md-12">
									<button class="btn btn-info" style="width:100%" data-toggle="modal" data-target="#Reply">Read Replies</button>
									</div>
									</div>
									<hr />
									<form method="post" action="comment_processor.php">
									<input type="hidden" name="comment" value="<?php echo $comment['id']; ?>" />
								 <input type="hidden" name="admin" value="<?php echo $user['id']; ?>" />
								 <input type="hidden" name="commenter" value="<?php echo $comment['user']; ?>" />
								 <input type="hidden" name="pass" value="<?php echo $id; ?>" />
								
                                        <div class="row">
									<?php
									if($comment['upraise'] == 1){
									$upra = '
									<div class="col-md-4"><button style="width:100%" disabled="disabled" class="btn btn-dark"><i style="margin-right:10px" class="fa fa-magic"></i>Upraised</button></div>
									';
									}
									else{
									$upra = '
									<div class="col-md-4"><button style="width:100%" type="submit" name="upraise" value="1" class="btn btn-success"><i style="margin-right:10px" class="fa fa-magic"></i>Upraise</button></div>
									';
									}
									?>
										<?php echo $upra; ?>
										<div class="col-md-4"><button style="width:100%" type="submit" name="delete" value="2" class="btn btn-warning"><i style="margin-right:10px" class="fa fa-trash"></i>Delete</button></div>
										<div class="col-md-4"><button style="width:100%" type="submit" name="delbl" value="3" class="btn btn-danger"><i style="margin-right:10px" class="fa fa-ban"></i>Delete & block</button></div>
										</div>
									</form>
                                    </div>
                                </div>
                            </div>

                </div>
                <!-- /.container-fluid -->

				<div class="modal fade" id="Reply">
				<div class="modal-dialog modal-lg modal-dialog-scrollable">
				<div class="modal-content">
				<div class="modal-header">
				<div class="modal-title">Replies</div>
				</div>
				
				<div class="modal-body">
				<div class="row">
				<div class="col-md-12">
				<?php
				$conn = $pdo->open();
				$stmt = $conn->prepare("SELECT * FROM reply WHERE comment=:comment");
				$stmt->execute(['comment'=>$comment['id']]);
				
				foreach($stmt as $row){
				$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
				$stmt->execute(['id'=>$row['user']]);
				$replier = $stmt->fetch();
				echo '
				<div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">'.$replier['firstname'].' '.$replier['lastname'].'</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Action:</div>
                                            <a class="dropdown-item">Flag</a>
                                            <a class="dropdown-item" href="delete_reply.php?id='.$row['id'].'&pass='.$comment['id'].'">Delete</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" >Replied on: '.$row['date'].'</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                   '.$row['content'].'
                                </div>
                            </div>
				';
				
				}
				?>
				
				
				
				</div>
				</div>
				</div>
				
				<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
				</div>
				</div>
				</div>
				
				
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