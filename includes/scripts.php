<div class="prof modal fade" id="Profile">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title">
<h3>Profile Edit</h3> <span>Joined on: <b><?php echo $user['date']; ?></b></span>
</div>
</div>
<div class="modal-body">
<form method="post" action="profile.php">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" placeholder="Firstname" name="firstname" value="<?php echo $user['firstname']; ?>" required="required">
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" placeholder="Lastname" name="lastname" value="<?php echo $user['lastname']; ?>" required="required">
                      </div>
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Contact</label>
                        <input type="tel" class="form-control" placeholder="Email" value="<?php echo $user['contact']; ?>" name="contact" required="required">
                      </div>
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" name="email" readonly>
                      </div>
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="Password" class="form-control" value="<?php echo $user['password']; ?>" name="password" required="required">
						<input type="hidden" name="pass" value="<?php echo $user['id']; ?>" />
                      </div>
                    </div>
                    
                  </div>
				  </div>
              
<div class="modal-footer">
<button type="submit" class="btn btn-fill btn-primary" name="profile">Save</button>
	 </form>		
<button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>

<script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script><script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <!-- blog script -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js'></script>
<!----========google recaptcha============---------->

<script src='https://www.google.com/recaptcha/api.js'></script>
  <script>
  var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });
  </script>
  <!-- Comment replies  -->
<script>
document.addEventListener(
    "click",
    function(event) {
        var target = event.target;
        var replyForm;
        if (target.matches("[data-toggle='reply-form']")) {
            replyForm = document.getElementById(target.getAttribute("data-target"));
            replyForm.classList.toggle("d-none");
        }
    },
    false
);
</script>