<div class="container-fluid">
    <div class="row example-basic">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline">
			<?php
			  $year = date('Y');
			?>
			<li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h2 class="timeline-title">2015 - <?php echo $year; ?></h2>
                    </div>
                </li>
			<?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM timeline ORDER BY date DESC");
	  $stmt->execute();
	  foreach($stmt as $row){
	  echo '
	  <li class="timeline-item">
                    <div class="timeline-info">
                        <span>'.$row['date'].'</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <a href="sweden-cmil.php?class='.$row['id'].'"><h3 style="text-align:justify;" class="timeline-title">
						'.$row['head'].'
						</h3></a>
						<img src="admin/includes/gallery/'.$row['photo'].'" width="100%" />
                        <p>
						'.$row['content'].'
						</p>
                    </div>
                </li>
	   ';
	  
	  }
	  ?>
			
			
			
			
				
				
				
				
				
			
				
				
				
                
                
                
                
                
            </ul>
        </div>
    </div>
    
    
</div>