<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
<?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM comments WHERE conf_1=0");
$stmt->execute();
$unread = $stmt->fetch();
?>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $unread['numrows']; ?>+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Comments Center
                                </h6>
<?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM comments WHERE conf_1=0 LIMIT 6");
$stmt->execute();
foreach($stmt as $row){
if($row['page'] == 'blog'){
$badge = '
<div class="icon-circle bg-primary">
<i class="fas fa-bold text-white"></i>
</div>
';
}
else{
$badge = '
<div class="icon-circle bg-success">
<i class="fas fa-file-alt text-white"></i>
</div>
';
}
echo '
<a class="dropdown-item d-flex align-items-center" href="comment.php?pass='.$row['id'].'">
<div class="mr-3">
 '.$badge.'
 </div>
 <div>
 <div class="small text-gray-500">'.$row['date'].'</div>
'.$row['head'].'
 </div>
</a>
';
}
?>
 <a class="dropdown-item text-center small text-gray-500" href="all_comments.php">Show All Comments</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
								<?php
								$conn = $pdo->open();
								$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM message WHERE conf_1=0");
								$stmt->execute();
								$messages = $stmt->fetch();
								?>
                                <span class="badge badge-danger badge-counter"><?php echo $messages['numrows']; ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
								<?php
								$conn = $pdo->open();
								$stmt = $conn->prepare("SELECT * FROM message WHERE conf_1=0 LIMIT 6");
								$stmt->execute();
								foreach($stmt as $row){
								echo '
								<a class="dropdown-item d-flex align-items-center" href="message.php?pass='.$row['id'].'">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="includes/img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">'.$row['subject'].'</div>
                                        <div class="small text-gray-500">'.$row['firstname'].' '.$row['lastname'].' · '.$row['date'].'</div>
                                    </div>
                                </a>
								';
								}
								?>
                                
								
								
                                
                                
                                
                                <a class="dropdown-item text-center small text-gray-500" href="all_messages.php">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="includes/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" data-toggle="modal" data-target="#Profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
				
				<div class="modal fade" id="Profile">
				<div class="modal-dialog modal-lg">
				<div class="modal-content">
				<div class="modal-header">
				My Profile
				</div>
				<form method="post" action="profile.php">
				<div class="modal-body">
				<div class="row">
				<div class="col-md-6">
				<div class="form-group">
				<label>First name</label>
				<input class="form-control" name="firstname" type="text" value="<?php echo $user['firstname']; ?>" />
				</div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
				<label>Last name</label>
				<input class="form-control" name="lastname" type="text" value="<?php echo $user['lastname']; ?>" />
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-12">
				<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" />
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-12">
				<div class="form-group">
				<label>Contact</label>
				<input type="tel" class="form-control" name="contact" value="<?php echo $user['contact']; ?>" />
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-6">
				<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="password" name="password" value="<?php echo $user['password']; ?>" />
				</div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
				<label>Current password</label>
				<input type="password" name="curpass" class="form-control" />
				</div>
				</div>
				</div>
				
				
				</div>
				<div class="modal-footer">
		<div class="row">
		<button type="submit" style="margin-right:15px" class="btn btn-success" name="profile">Update</button>
		<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
		</form>
		</div>
				</div>
				</div>
				
				</div>
				
				</div>