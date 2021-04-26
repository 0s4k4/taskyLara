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
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.send_message')); ?></h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	
	
	<?php if(Session::has('success')): ?>

	    <div class="alert alert-success">

	      <?php echo e(Session::get('success')); ?>


	    </div>

	<?php endif; ?>

	
 	<?php if(Session::has('error')): ?>

	    <div class="alert alert-danger">

	      <?php echo e(Session::get('error')); ?>


	    </div>

	<?php endif; ?>
			   
			   <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('send-message')); ?>" id="formID" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

						
						
						
						 <div class="form-group">
                            <label for="name" class="col-md-4 control-label"><?php echo e(__('user.to')); ?> </label>

                            <div class="col-md-6">
                                <?php echo $receive_user[0]->name;?>

                                
                            </div>
                        </div>
						
						<div class="clearfix height20"></div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"><?php echo e(__('user.your_message')); ?> </label>

                            <div class="col-md-6">
                                <textarea class="form-control validate[required]" style="min-height:200px;" name="message_txt" autofocus></textarea>

                                
                            </div>
                        </div>
						
						<input type="hidden" name="sender" value="<?php echo $sender;?>">
						<input type="hidden" name="receiver" value="<?php echo $receiver;?>">
						
						<?php if($receive_user[0]->admin==0) { $typer = "customer"; } else if($receive_user[0]->admin==2){ $typer = "seller"; } else if($receive_user[0]->admin==1){ $typer = "admin"; } ?>
						<input type="hidden" name="send_by" value="<?php echo $typer;?>">
						
						<div class="clearfix height20"></div>
						
						
						 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary btndisable"><?php echo e(__('user.update')); ?> </button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('user.send')); ?>

                                </button>
							<?php } ?>
                            </div>
                        </div>
						
	
	</form>
	</div>
	          
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/send-message.blade.php ENDPATH**/ ?>