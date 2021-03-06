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
                    <h2>Shop</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
				 
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sno</th>
						  <th>Username</th>
						  <th>Email</th>
						  <th>Shop Name</th>
                          <!--<th>Address</th>-->
                          <th>Shop Phone No</th>
						  <th>Featured</th>
						  <th>Status</th>
						  <!--<th>Total Balance</th>-->
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $i=1;
					  foreach ($shop as $viewshop) { 
					 
					  
					  $user_details_cnt = DB::table('users')
							  ->where('id','=',$viewshop->user_id)
							  ->count();
					  
					  if(!empty($user_details_cnt))
					  {
					  $user_details = DB::table('users')
							  ->where('id','=',$viewshop->user_id)
							  ->get();
					   $username = $user_details[0]->name;
                       $useremail = $user_details[0]->email;					   
							  
					  }
					  else
					  {
						  $username = "";
						  $useremail = "";
					  }
					  ?>
    
						
                        <tr>
						 <td><?php echo $i;?></td>
						 
						 <td><?php echo $username;?></td>
						 
						 <td><?php echo $useremail;?></td>
						 
                          <td><?php echo $viewshop->shop_name;?></td>
                          
						  <?php /* ?><td><?php echo substr($viewshop->address,0,150).'...';?></td><?php */?>
						  
						   <td><?php echo $viewshop->shop_phone_no;?></td>
						   
						   <td><?php echo $viewshop->featured;?></td>
						   
						   <?php if($viewshop->status=="approved")
						   { $apt_txt = "Approved"; $ccl = "green"; } else { $apt_txt = "Disapproved"; $ccl = "red"; } ?>
						   
						   <td style="color:<?php echo $ccl;?>"><?php echo $apt_txt;?></td>
						   
						   <!--<td> - </td>-->
						  
						  <td>
						  
						  			  
			<?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Approve</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>			  
						  <a href="<?php echo $url;?>/admin/shop/<?php echo e($viewshop->id); ?>/approved" class="btn btn-success">Approve</a>
						  <?php } ?>
						  
				<?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Disapprove</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>			  
						  <a href="<?php echo $url;?>/admin/shop/<?php echo e($viewshop->id); ?>/unapproved" class="btn btn-success">Disapprove</a>
						  <?php } ?>		  
						  
						  
						  
			<?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>			  
						  <a href="<?php echo $url;?>/admin/edit-shop/<?php echo e($viewshop->id); ?>" class="btn btn-success">Edit</a>
						  <?php } ?>
				  <?php /* <?php if(config('global.demosite')=="yes"){?>
				   <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						 <a href="<?php echo $url;?>/admin/shop/{{ $viewshop->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
				  <?php } ?> */?>
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
<?php /**PATH C:\xampp\htdocs\taskyLara\local\resources\views/admin/shop.blade.php ENDPATH**/ ?>