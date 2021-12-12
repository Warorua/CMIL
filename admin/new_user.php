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
                    <h1 class="h3 mb-4 text-gray-800">Add a New CMIL Member</h1>
<div class="row">
                    <div class="d-none d-lg-block"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add New CMIL Member</h1>
								
                            </div>
                            <form method="post" action="signup_2.php" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstname" class="form-control" id="exampleFirstName"
                                            placeholder="First Name" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastname" class="form-control" id="exampleLastName"
                                            placeholder="Last Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                        placeholder="Email Address" required="required">
                                </div>
								<div class="form-group">
								<select class="form-control" name="rank" required="required">
								<option class="form-control" value="1" active>User</option>
								<option value="2">Author</option>
								</select>
                                    
                                </div>
								<div class="form-group">
                                    <input type="number" name="contact" class="form-control" id="exampleInputEmail"
                                        placeholder="Phone Number" required="required">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"  name="password" class="form-control"
                                            id="exampleInputPassword" placeholder="Password" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repassword" class="form-control"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required="required">
                                    </div>
                                </div>
								<div class="form-group">
                                <button type="submit" name="register" class="btn btn-primary btn-block">
										Register
										</button>
                                </div>
                               
                            </form>
                            <hr>
                           
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