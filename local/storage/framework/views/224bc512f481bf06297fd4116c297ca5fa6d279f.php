<!DOCTYPE html>
<html lang="es">
  <head>
    <?php echo $__env->make('admin.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php echo $__env->make('admin.sitename', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php echo $__env->make('admin.welcomeuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
          </div>
        </div>

        <?php echo $__env->make('admin.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
		 
		      <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
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
                <?php $url = URL::to("/"); ?>   
                <form class="form-horizontal form-label-left" role="form" method="POST" action="<?php echo e(route('language.update',$language->id)); ?>" >
                  <?php echo e(csrf_field()); ?>  
                  <span class="section">Edit Page</span>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="" class="form-control col-md-7 col-xs-12"  name="name" value="<?php echo e($language->name); ?> " required="required" type="text">
			              </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="symbol">Symbol <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="" class="form-control col-md-7 col-xs-12"  name="symbol" value="<?php echo e($language->symbol); ?>" required="required" type="text">
                    </div>
                  </div>
					        <input type="hidden" name="language_id" value="<?php echo e($language->id); ?>">
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <a href="" class="btn btn-primary">Cancel</a>
                      <button id="send" type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\taskyLara\local\resources\views/admin/edit-language.blade.php ENDPATH**/ ?>