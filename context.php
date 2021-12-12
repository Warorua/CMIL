<?php include "includes/header.php" ?>
  <body>
  <?php include "includes/topbar.php" ?>
    <?php include "includes/menu.php" ?>
    <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM gallery ORDER BY RAND() LIMIT 1");
	  $stmt->execute();
	  $dp = $stmt->fetch();
	  ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('admin/includes/gallery/<?php echo $dp['photo']; ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">About Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <?php
		   //from recents posts
	 if(isset($_GET['post'])){
		   $conn = $pdo->open();
		   $stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM blog WHERE id=:id");
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
		   //for comments and from blog page
		   if(isset($_POST['context'])){
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
    <section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-12 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
                        <?php
			  $conn = $pdo->open();
			  $stmt = $conn->prepare("SELECT * FROM blog WHERE id=:id");
			  $stmt->execute(['id'=>$id]);
			  $blog = $stmt->fetch();
			  //user fetcher
			   $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	          $stmt->execute(['id'=>$blog['name']]);
	         $person = $stmt->fetch();
			  ?>
	          	<h2 class="mb-4"><?php echo $blog['head']; ?></h2>
                  <p>
                  <div class="col-lg-6">
<img src="admin/includes/gallery/<?php echo $blog['photo']; ?>" width="100%" />
</div>
                  </p>
				<p><?php echo $blog['content']; ?></p>
                            
						</div>
					</div>
        	</div>
		</section>


        <section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-12 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
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
 <input type="hidden" name="page" value="blog" />
 <input type="hidden" name="title" value="<?php echo $blog['id']; ?>" />
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
$stmt->execute(['title'=>$blog['id'], 'page'=>'blog']);
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
<form method="post" action="comment_delete_blog.php">
<input type="hidden" name="id" value="'.$row['id'].'" />
<input type="hidden" name="blog" value="'.$blog['id'].'" />

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
            <form method="POST" action="reply_blog.php" class="reply-form d-none" id="comment-'.$row['id'].'-reply-form">
			   '.$input_1.'
			    <input type="hidden" name="comment" value="'.$row['id'].'" />
				<input type="hidden" name="commenter" value="'.$row['user'].'" />
				<input type="hidden" name="blog" value="'.$blog['id'].'" />
				
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
<form method="post" action="reply_delete_blog.php">
<input type="hidden" name="id" value="'.$row1['id'].'" />
<input type="hidden" name="blog" value="'.$blog['id'].'" />

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
        	</div>
		</section>
    
    <?php include "includes/footer.php" ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include "includes/scripts.php" ?>
    
  </body>
</html>