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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Who we are</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CMIL - Who we are</h6>
							
                        </div>
                        <div class="card-body">
						    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
										   <th>.</th>
                                            <th>Title</th>
                                            <th>Content</th>
											<th>Edit</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$conn = $pdo->open();
									$stmt = $conn->prepare("SELECT *  FROM who_we_are");
									$stmt->execute();
									foreach($stmt as $row){
								echo '
									<tr>
									        <td>'.$row['id'].'</td>
                                            <td>'.$row['head'].'</td>
                                            <td>'.$row['content'].'</td>
                                            <td>
											<form method="post" action="edit_who_we_are.php">
											<input type="hidden" value="'.$row['id'].'" name="id" />
											<button style="width:100%" type="submit" name="edit" class="btn btn-success">Edit</button>
											</form>
											</td>
                                            </tr>
									';
									}
									?>
                                    
                                     
                                    </tbody>
                                </table>
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