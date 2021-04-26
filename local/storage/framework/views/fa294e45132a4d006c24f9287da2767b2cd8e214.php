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

	        	<!-- top navigation -->
	       		<?php echo $__env->make('admin.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php $url = URL::to("/"); ?>
	        	<!-- /top navigation -->

	        	<!-- page content -->
		        <div class="right_col" role="main">
		           	<div class="col-md-12 col-sm-12 col-xs-12">
		                <div class="x_panel">
		                  	<div class="x_title">
			                    <h2>Languages</h2>
			                    <ul class="nav navbar-right panel_toolbox">
			                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			                    </ul>
			                    <div class="clearfix"></div>
			                </div>
			                <div class="row">
			                	<div class="col-md-2"></div>
				              	<div class="col-md-8 col-sm-12 col-xs-12">
					                <div class="x_panel" >
					                  	<div class="x_content" style="margin-top: 6%;">
					                   		<form class="form-horizontal"  role="form" method="POST" action="<?php echo e(route('language.store')); ?>">
					                     		<?php echo e(csrf_field()); ?>  
						                      	<div class="item form-group">
							                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Language Name:
							                        </label>
							                        <div class="col-md-6 col-sm-6 col-xs-12">
							                          	<input id="name" class="form-control col-md-7 col-xs-12"  name="name" value="" required="required" type="text">
												   	</div>
						                      	</div>
						                      	<div class="item form-group">
							                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="symbol">Language Symbol: 
							                        </label>
							                        <div class="col-md-6 col-sm-6 col-xs-12">
							                          <input type="text" id="symbol" name="symbol" required="required" value="" class="form-control col-md-7 col-xs-12">
							                        </div>
						                      	</div>
						                     
						                      	<div class="form-group">
							                        <div class="col-md-6 col-md-offset-3">
													 <?php if(config('global.demosite')=="yes"){?>
													 <a href="#" class="btn btn-success btndisable">Submit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
							                          <button type="submit" class="btn btn-success">Submit</button>
				  <?php } ?>
													  
							                        </div>
						                      	</div>
					                    	</form>
					                  	</div>
					                </div>
	            			</div>
	              		</div>
	              	</div>
	              	<table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	                    <thead>
	                        <tr>
	                          	<th>Sno</th>
	                          	<th>Name</th>
	                          	<th>Language code</th>
	                          	<th>Edit</th>
	                          	<th>Delete</th>
	                        </tr>
	                    </thead>
	                    <tbody>
						  	<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        <tr>
								 	<td><?php echo e($language->id); ?></td>
		                          	<td><?php echo e($language->name); ?></td>
		                          	<td><?php echo e($language->symbol); ?></td>
								  	<td> 
									<?php if(config('global.demosite')=="yes"){?>
													 <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				  
				  <a href="<?php echo e(route('language.edit',['id'=>$language->id])); ?>" class="btn btn-success">Edit</a></td>
				  <?php } ?>
								  	
								  		<!-- <a href="<?php echo e(route('language.destroy',['id'=>$language->id])); ?>" >
						                  <button class="btn btn-danger" type="submit">Delete</button>
						                </a> -->

						            <td>
									<?php if(config('global.demosite')=="yes"){?>
													 <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				  
						                <form method="POST" action="<?php echo e(route('language.destroy',['id'=>$language->id])); ?>">
										    <?php echo e(csrf_field()); ?>

										    <?php echo e(method_field('DELETE')); ?>

										    <button class="btn btn-danger" type="submit">Delete</button>
										</form>
										<?php } ?>
								  	</td>
		                        </tr>
	                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </tbody>
	                </table>
	       		</div>
    		</div>
    	</div>
		<?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  	</body>
</html>
<?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/admin/language.blade.php ENDPATH**/ ?>