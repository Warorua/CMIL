<main id="page" class="o-page">
    <section class="o-main-section">
	 <?php
	  $conn = $pdo->open();
	  $stmt = $conn->prepare("SELECT * FROM events");
	  $stmt->execute();
	  foreach($stmt as $row){
	  echo '
	  <article class="c-article">
      <a class="c-article__link" href="at_events.php?post='.$row['id'].'">
        <div>
          <header>
            <h3 class="c-article__heading"><i style="margin-right:10px" class="fas fa-calendar"></i>'.$row['date'].'</h3>
          
		  </header>
		
          <div class="c-article__content">
            	'.$row['head'].'
          </div>
        </div>
        <div class="c-article__img-wrapper">
          <img class="c-article__img" src="admin/includes/gallery/'.$row['photo'].'" alt="'.$row['date'].'" />
        </div>
      </a>
    </article>
	  ';
	  
	  }
	  ?>
	
	
     

    

    
  </section>
</main>