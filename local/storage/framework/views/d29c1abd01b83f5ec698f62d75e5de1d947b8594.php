<!DOCTYPE html>
<html lang="en">
<head>

    

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->
    

		
	
	<div class="video">
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php if(!empty($about[0]->page_title)){ echo $about[0]->page_title; }?></h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	
	
	
	
	<?php 
	if(!empty($about[0]->page_desc)){
	
	echo str_replace("'","",$about[0]->page_desc);
	
	}
	?>
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/about.blade.php ENDPATH**/ ?>