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
                    <h1 class="h3 mb-2 text-gray-800">Read all comments</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Read all comments</h6>
							
                        
                        </div>
                        <div class="card-body">
						    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
										    <th>Commenter</th>
                                            <th>Head</th>
											<th>Date</th>
                                            <th>Page</th>
											<th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$conn = $pdo->open();
									$stmt = $conn->prepare("SELECT *  FROM comments");
									$stmt->execute();
									foreach($stmt as $row){
									if($row['conf_1'] == 1){
									$badge = '<h3 class="badge badge-success">Read</h3>';
									}
									else{
									$badge = '<h3 class="badge badge-danger">Unread</h3>';
									
									}
									$stmt = $conn->prepare("SELECT *  FROM users WHERE id=:id");
									$stmt->execute(['id'=>$row['user']]);
									$commenter = $stmt->fetch();
								echo '
									<tr>
									        <td>'.$commenter['firstname'].' '.$commenter['lastname'].'</td>
                                            <td>'.$row['head'].'</td>
                                            <td>'.$row['date'].'</td>
                                            <td>
											'.$row['page'].'
											</td>
											
											<td>
											'.$badge.'
											</td>
                                           
										    <td>
											<a href="comment.php?pass='.$row['id'].'" style="width:100%" class="btn btn-info">View</a>
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