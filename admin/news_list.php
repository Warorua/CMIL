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
                    <h1 class="h3 mb-2 text-gray-800">Latest News</h1>
                    <p class="mb-4">
					Panel to add Latest news to the main sites' pages.
					</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Latest News</h6>
							<hr />
							<a href="new_news.php" class="btn btn-warning">Add new</a>
                        
                        </div>
                        <div class="card-body">
						    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
										    <th>.</th>
                                            <th>Head</th>
											<th>Content</th>
                                            <th>Date</th>
											<th>Edit Photo</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$conn = $pdo->open();
									$stmt = $conn->prepare("SELECT *  FROM news");
									$stmt->execute();
									foreach($stmt as $row){
								echo '
									<tr>
									        <td><img src="includes/gallery/'.$row['photo'].'" width="150px" /></td>
                                            <td>'.$row['head'].'</td>
                                            <td>'.$row['content'].'</td>
                                            <td>'.$row['date'].'-'.$row['month'].'-'.$row['year'].'</td>
                                            <td>
											<form method="post" action="edit_news_pic.php">
											<input type="hidden" value="'.$row['id'].'" name="id" />
											<button style="width:100%" type="submit" name="edit" class="btn btn-info">Edit Photo</button>
											</form>
											</td>
											
											<td>
											<form method="post" action="edit_news.php">
											<input type="hidden" value="'.$row['id'].'" name="id" />
											<button style="width:100%" type="submit" name="edit" class="btn btn-success">Edit</button>
											</form>
											</td>
                                           
										    <td>
											<form method="post" action="delete_news.php">
											<input type="hidden" value="'.$row['id'].'" name="id" />
											<button style="width:100%" type="submit" name="delete" class="btn btn-warning">Delete</button>
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