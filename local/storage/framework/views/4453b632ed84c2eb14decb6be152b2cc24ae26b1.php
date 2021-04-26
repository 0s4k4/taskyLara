<!DOCTYPE html>
<html lang="en">
<head>


   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	


</head>
<body>

    

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->
    

	
	<div class="clearfix"></div>
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.page_not_found')); ?></h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12" align="center" style="font-size:20px;">
	<?php echo e(__('user.requested_page_was_not_found')); ?>

	
	</div>
	
	
	</div>
	
	</div>
	</div>
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/404.blade.php ENDPATH**/ ?>