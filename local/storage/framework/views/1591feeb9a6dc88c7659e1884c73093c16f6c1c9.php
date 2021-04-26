<!DOCTYPE html>
<html lang="en">
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
			
			
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       <?php echo $__env->make('admin.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<?php $url = URL::to("/"); ?>
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sub Services</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
				  <div align="right">
				   <?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add Sub Service</a> 
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/addsubservice" class="btn btn-primary">Add Sub Service</a>
				  <?php } ?>
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sno</th>
						  <th>Image</th>
						  <th>Service</th>
                          <th>Name</th>
                         
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $i=1;
					  foreach ($subservices as $subservice) { ?>
    
						
                        <tr>
						 <td><?php echo $i;?></td>
						 <?php 
					   $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$subservice->subimage;
						if($subservice->subimage!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="70"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="70"></td>
						 <?php } ?>
                         
                          
						  <td><?php echo $subservice->name;?></td>
						   <td><?php echo $subservice->subname;?></td>
						  <td>
						  <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/editsubservice/<?php echo e($subservice->subid); ?>" class="btn btn-success">Edit</a>
						   <?php } ?>
				   <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   
						 <a href="<?php echo $url;?>/admin/subservices/<?php echo e($subservice->subid); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
						   <?php } ?>
						  </td>
                        </tr>
                        <?php $i++;} ?>
                       
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
			  
			  
			  
		 
		  
		  
		  
        </div>
        <!-- /page content -->

      <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>

    
	
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\taskyLara\local\resources\views/admin/subservices.blade.php ENDPATH**/ ?>