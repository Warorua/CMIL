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

                <!-- Begin Page Content -->
                <div class="container-fluid">
				<?php
				if(isset($_GET['type'])){
				$status = $_GET['type'];
				}
				else{
				$status = 'Edit the Board members';
				}
				
				if(isset($_POST['edit'])){
				$edit = $_POST['id'];
				$conn = $pdo->open();
				$stmt = $conn->prepare("SELECT * FROM board WHERE id=:id");
				$stmt->execute(['id'=>$edit]);
				$board = $stmt->fetch();
				}
				?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $status; ?></h1>
					<form id="example-form" action="update_board.php" method="post" enctype="multipart/form-data" class="mt-5">
                            <div>
                        
                                <section>
                                    <label for="name">Name *</label>
                                    <input id="name" name="name" type="text" value="<?php echo $board['name'];?>" class="required form-control" required="required">
                                    <label for="name">Rank *</label>
                                    <input id="name" name="rank" type="text" value="<?php echo $board['rank'];?>" class="required form-control" required="required">
                                    
									<label for="info">Details *</label>
                                    <textarea id="editor1" style="width:100%; height:250px" value="" name="info" type="text" class="form-control" required="required"><?php echo $board['Info'];?></textarea>
                                    <label for="address">Photo</label>
                                    <input name="id" type="hidden" value="<?php echo $board['id'];?>">
                                    <p>(*) Mandatory</p>
                                </section>
                                <section>
								<br />
									<button type="submit" name="board" class="btn btn-primary">Update</button>
																
                                </section>
                            </div>
                        </form>

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
                        <span aria-hidden="true">??</span>
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