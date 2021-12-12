<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/styles.php'; ?>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
        <?php include 'includes/topbar.php'; ?>
	 
      <!-- End Navbar -->
	  
       <div style="margin-top:0px; padding-top:25px" class="content">
        <div class="row">
          <div class="col-lg-12">
		   <?php include 'includes/badges.php'; ?>
		   
		   <?php
		   //from recents posts
	 if(isset($_GET['post'])){
		   $conn = $pdo->open();
		   $stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM kenmil WHERE id=:id");
		   $stmt->execute(['id'=>$_GET['post']]);
		   $auth = $stmt->fetch();
		         if($auth['numrows'] > 0){
				 $id = $_GET['post'];
				 }
				 else{
				 header('location:index.php');
				 die();
				 }
		 }
	 else{
		   //for comments and from kenmil page
		   if(isset($_POST['kenmil'])){
		   $id = $_POST['pass'];
		   }
		   elseif(isset($_SESSION['comment'])){
		   $id = $_SESSION['comment'];
		   
		   unset($_SESSION['comment']);
		   }
		   else{
		   header('location:index.php');
		   }
	 }
		   ?>
<div class="card ">
              <style>
			  .tyu{
			  width:50%;
			 }
			 .tuo{
			 padding-left:20px;
			  }
			  .tuoi{
			  font-size:15px;
			  align-items:center;
			   }
			  </style>
			  <?php
			  $conn = $pdo->open();
			  $stmt = $conn->prepare("SELECT * FROM kenmil WHERE id=:id");
			  $stmt->execute(['id'=>$id]);
			  $kenmil = $stmt->fetch();
			  //user fetcher
			   $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	          $stmt->execute(['id'=>$kenmil['name']]);
	         $person = $stmt->fetch();
			  ?>
		   <div class="card-header">
                <h2 class="card-title">
				<div class="row">
				<div class="tyu">
				<i class="tim-icons icon-calendar-60 tuo"></i>
				<span class="tuoi"><?php echo $kenmil['date']; ?></span>
				</div>
				
				<div class="tyu">
				<i class="tim-icons icon-badge tuo"></i>
				<span class="tuoi"><?php echo $person['firstname']; ?> <?php echo $person['lastname']; ?></span>
				</div>
				
				
				
				</div>
				 </h2>
              </div>
           
			</div>
</div>
 </div>
 <div class="row">
 <div class="col-lg-12">
 <div class="card">
 <div class="card-body">

<h3 class="mb-0 contm"><?php echo $kenmil['head']; ?></h3>
<hr />
<div class="col-lg-6">
<img src="admin/includes/gallery/<?php echo $kenmil['photo']; ?>" width="100%" />
</div>

<div class="containop">
<p>
<?php echo $kenmil['content']; ?>
</p>
</div>




 </div>
 </div>
 </div> 
  
  
</div>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">

<h2 class="card-title">Comments</h2>
<b>Leave your comment below here:</b>
<hr style="width:100%" />
</div>
<div class="card-body">

 <form method="post" action="comments.php">
 <div class="row">
<div class="col-md-12">
 <div class="form-group">
 <label><h4>Heading</h4></label>
 <input name="head" type="text" class="form-control" placeholder="Place your heading here" required="required">
</div>
</div>
 </div>
 <input type="hidden" name="page" value="kenmil" />
 <input type="hidden" name="title" value="<?php echo $kenmil['id']; ?>" />
<input type="hidden" name="site" value="<?php echo $_SERVER['PHP_SELF']; ?>" />
<input type="hidden" name="user" value="<?php echo $user['id']; ?>" />
 <div class="row">
 <div class="col-lg-12">
<div class="form-group">
 <label><h4>Comment</h4></label>
<textarea rows="4" cols="80" class="form-control" name="content" placeholder="place your comment here." required="required"></textarea>
 </div>
</div>
</div>
<?php
if(isset($user['id'])){
echo '
<button type="submit" name="comment" class="form-group btn btn-info">Post comment</button>
';
}
else{
echo '
<a href="signin.php" class="form-group btn btn-info">Login to comment</a>
';
}
?>
 </form>	
 
  
<hr style="width:100%" />

<?php
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM comments WHERE title=:title and page=:page");
$stmt->execute(['title'=>$kenmil['id'], 'page'=>'kenmil']);
foreach($stmt as $row){
$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$row['user']]);
$commenter = $stmt->fetch();
//timer
$timer_a = strtotime($row['date']);
$timer_b = strtotime(date("d M Y"));
$timer = ($timer_b - $timer_a)/60/60/24;
//delete comment
if(isset($user['id'])){
$input_1 = '<input type="hidden" name="user" value="'.$user['id'].'" />';
if($commenter['id'] == $user['id']){
$delete = '
<form method="post" action="comment_delete_kenmil.php">
<input type="hidden" name="id" value="'.$row['id'].'" />
<input type="hidden" name="blog" value="'.$kenmil['id'].'" />

<button type="submit" class="comm1" name="comment_del">Delete comment</button>
</form>
';
}
if(isset($user['id'])){
$rep1 = '
<button class="comm1" type="button" data-toggle="reply-form" data-target="comment-'.$row['id'].'-reply-form">Reply</button>
<button class="comm1" type="button">Flag</button>
';
}
else{
$rep1 = '
<button class="comm1" type="button" disabled="disabled">Reply</button>
<button class="comm1" type="button" disabled="disabled">Flag</button>
';
}
}
else{
$delete = '&bull;';
$rep1 = '
<button class="comm1" type="button" disabled="disabled">Reply</button>
<button class="comm1" type="button" disabled="disabled">Flag</button>
';
$input_1 = '<input type="hidden" name="user" value="" />';
}
echo '
<div class="comment-thread">
    <!-- Comment 1 start -->
    <details open class="comment" id="comment-'.$row['id'].'">
        <a href="#comment-'.$row['id'].'" class="comment-border-link">
            <span class="sr-only">Jump to comment-1</span>
        </a>
        <summary>
            <div class="comment-heading">
                <div class="comment-voting">
                    <button class="comm1" type="button">
                        <span aria-hidden="true">&#9650;</span>
                        <span class="sr-only">Vote up</span>
                    </button>
                    <button class="comm1" type="button">
                        <span aria-hidden="true">&#9660;</span>
                        <span class="sr-only">Vote down</span>
                    </button>
                </div>
                <div class="comment-info">
				'.$delete.'
                    <a style="color: #FF9C91;" class="comment-author">'.$commenter['firstname'].' '.$commenter['lastname'].'</a>
					
					<br />
                    <p class="m-0">
                        '.$commenter['points'].' points &bull; '.$timer.' days ago
                    </p>
                </div>
            </div>
        </summary>
		<br />

        <div class="comment-body">
		<b style="text-decoration:underline; text-transform:uppercase;">'.$row['head'].'  </b>
            <p>
              '.$row['content'].'  
			</p>
			
            '.$rep1.'
            <!-- Reply form start -->
            <form method="POST" action="reply_kenmil.php" class="reply-form d-none" id="comment-'.$row['id'].'-reply-form">
			   '.$input_1.'
			    <input type="hidden" name="comment" value="'.$row['id'].'" />
				<input type="hidden" name="commenter" value="'.$row['user'].'" />
				<input type="hidden" name="blog" value="'.$kenmil['id'].'" />
				
                <textarea name="content" placeholder="Reply to comment" rows="4"></textarea>
                <button class="comm1" type="submit" name="reply">Submit</button>
                <button class="comm1" type="button" data-toggle="reply-form" data-target="comment-'.$row['id'].'-reply-form">Cancel</button>
            </form>
            <!-- Reply form end -->
        </div>
		';

      //replies to comments
$stmt1 = $conn->prepare("SELECT * FROM reply WHERE comment=:comment");
$stmt1->execute(['comment'=>$row['id']]);
$reply = $stmt1->fetch(PDO::FETCH_ASSOC);

foreach($stmt1 as $row1){
$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$row1['user']]);
$replier = $stmt->fetch();
//timer2
$timer_aa = strtotime($row1['date']);
$timer_bb = strtotime(date("d M Y"));
$timerr = ($timer_bb - $timer_aa)/60/60/24;

if(isset($user['id'])){
if($replier['id'] == $user['id']){
$delet = '
<form method="post" action="reply_delete_kenmil.php">
<input type="hidden" name="id" value="'.$row1['id'].'" />
<input type="hidden" name="blog" value="'.$kenmil['id'].'" />

<button type="submit" class="comm1" name="reply_del">Delete reply</button>
</form>
';
}
else{
$delet = '&bull;';
}
}
else{
$delet = '&bull;';
}

if($replier['id'] == $commenter['id']){
$badge = '<label style="color:#498FFF">(Commenter)</label>';
}
elseif($replier['status'] = 2){
    $badge = '<label style="color:#00D423">(Author)</label>';
}
else{
$badge = '&bull;';
}

echo '
<div class="replies">
            <!-- Comment 2 start -->
            <details open class="comment" id="comment-2">
                <a href="#comment-2" class="comment-border-link">
                    <span class="sr-only">Jump to comment-2</span>
                </a>
                <summary>
                    <div class="comment-heading">
                        <div class="comment-voting">
                            <button class="comm1" type="button">
                                <span aria-hidden="true">&#9650;</span>
                                <span class="sr-only">Vote up</span>
                            </button>
                            <button class="comm1" type="button">
                                <span aria-hidden="true">&#9660;</span>
                                <span class="sr-only">Vote down</span>
                            </button>
                        </div>
                        <div class="comment-info">
                            <a style="color: #FF9C91;" class="comment-author">'.$replier['firstname'].' '.$replier['lastname'].' '.$badge.'</a>
							'.$delet.'
                            <p class="m-0">
                                '.$replier['points'].' points &bull; '.$timerr.' days ago &bull; 
								
                            </p>
                        </div>
                    </div>
                </summary>
				<br />

                <div class="comment-body">
                    <p>
                        '.$row1['content'].'
                    </p>
                    <kbd>Reply to: <b style="color:#91FFFA">'.$commenter['firstname'].' '.$commenter['lastname'].'</b></kbd>

                </div>
            </details>
            <!-- Comment 2 end -->

        </div>
';
}

	  echo '
	   </details>
   </div>
    ';

}
?>
<!-------------====================================================================================--------------------->


<!-------------=========================NEW REPLY===========================================================--------------------->
       	
</div>
</div>
</div>
</div>
<!----------timeline ----------------->
<div class="row">
<div class="col-lg-8">
<div class="card">
<div class="card-body">
<?php include 'includes/timeline.php'; ?>
</div>

</div>
</div>
<!-----news------>
<div class="col-lg-4">
<div class="card">
<div class="card-header">
<div class="card-title">
RECENT POSTS
</div>
</div>
<div class="card-body">
<?php include 'includes/recent_posts.php'; ?>

</div>

</div>
</div>
<!-------posts------------>
	
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<div class="card-title">Latest News</div>
</div>
<?php include 'includes/latest_n.php'; ?>

</div>
</div>

	
</div>	
          
       
       </div>
      <?php include 'includes/footer.php'; ?>
    </div>
  </div>
   <?php include 'includes/settings.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>

</html>