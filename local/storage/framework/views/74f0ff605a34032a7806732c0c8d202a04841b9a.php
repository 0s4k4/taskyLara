<div class="profile clearfix">
              <div class="profile_pic">
			 <?php 
			 $url = URL::to("/");
			  $logphoto=Auth::user()->photo;
			 if($logphoto!=""){?>
                <img src="<?php echo  $url;?>/local/images/userphoto/<?php echo $logphoto;?>" alt="..." class="img-circle profile_img">
			 <?php } else { ?>
			   <img src="<?php echo e(secure_asset('local/resources/secure_assets/img/user.png')); ?>" alt="..." class="img-circle profile_img">
			 <?php } ?>
			 
			  </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo e(Auth::user()->name); ?></h2>
              </div>
            </div><?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/admin/welcomeuser.blade.php ENDPATH**/ ?>