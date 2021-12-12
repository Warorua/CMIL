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
				<?php
				$_SESSION['activate_user'] = 'Set';
				?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">CMIL Visitors</h1>
                    <p class="mb-4">
					List of all the visitors to the CMIL site.
						</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CMIL Visitors</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th>ID</th>
                                            <th>IP</th>
                                            <th>Cookie Value</th>
                                            <th>Browser</th>
                                            <th>Date</th>
											<th>Device</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$conn = $pdo->open();
									$stmt = $conn->prepare("SELECT *  FROM visitor ORDER BY id ASC");
									$stmt->execute();
									foreach($stmt as $row){
								echo '
									<tr>
                                            <td>'.$row['id'].'</td>
                                            <td>'.$row['ip'].'</td>
                                            <td>'.$row['cookie_value'].'</td>
                                            <td>'.$row['browser'].'</td>
											<td>'.$row['date'].'</td>
                                            <td>'.$row['device'].'</td>
                                            
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