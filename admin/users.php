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
                    <h1 class="h3 mb-2 text-gray-800">CMIL Users</h1>
                    <p class="mb-4">
					CMIL self-registered users.
						</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CMIL Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
											<th>Status</th>
                                            <th>Joined</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$conn = $pdo->open();
									$stmt = $conn->prepare("SELECT *  FROM users WHERE status<>2");
									$stmt->execute();
									foreach($stmt as $row){
									if($row['status'] == 1){
									$badge = '<h3 class="badge badge-success">Active</h3>';
									}
									elseif($row['status'] == 0){
									$badge = '<a href="activate_user.php?id='.$row['id'].'"><h3 class="badge badge-warning">Inactive</h3></a>';
									}
									elseif($row['status'] == 403){
									$badge = '<a href="activate_user.php?id='.$row['id'].'"><h3 class="badge badge-danger">Banned</h3></a>';
									}
									echo '
									<tr>
                                            <td>'.$row['firstname'].'</td>
                                            <td>'.$row['lastname'].'</td>
                                            <td>'.$row['contact'].'</td>
                                            <td>'.$row['email'].'</td>
											<td>
											'.$badge.'
											</td>
                                            <td>'.$row['date'].'</td>
                                            <td>
											<form method="post" action="delete_user.php">
											<input type="hidden" value="'.$row['id'].'" name="id" />
											<button type="submit" name="delete" class="btn btn-warning">Delete</button>
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