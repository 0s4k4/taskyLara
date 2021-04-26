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
		
		
		
		
        <!-- /top navigation -->

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
                    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="<?php echo e(route('admin.edituser')); ?>" enctype="multipart/form-data" novalidate>
                     <?php echo e(csrf_field()); ?>  
                      <span class="section">Edit User</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="name" value="<?php echo $users[0]->name; ?>" required="required" type="text">
                         <?php if($errors->has('name')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
					   </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" value="<?php echo $users[0]->email; ?>" class="form-control col-md-7 col-xs-12">
						  <?php if($errors->has('email')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                     
<?php if($userid==1) {?>					 
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="text" name="password" value=""  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
<?php } ?>
					  
					  
					  <input type="hidden" name="savepassword" value="<?php echo $users[0]->password;?>">
					  
					  
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="phone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $users[0]->phone; ?>">
                        </div>
                      </div>
					  <input type="hidden" name="id" value="<?php echo $users[0]->id; ?>">
					  
					   <?php if($userid==1) {
						  if(!empty($books_cnt))
						  {
						 $amount = 0;
						 foreach($books as $viewbook)
						 {
							 
						$amount +=$viewbook->admin_commission;
						 }						
						  ?>
						  <div style="height:10px;"></div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Earning : 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="color:red;">
                          <?php echo $amount.' '.$settings[0]->site_currency;?>
                         
					   </div>
                      </div>
					  <div style="height:10px;"></div>
						  <?php } } ?>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Photo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12">
						  <?php if($errors->has('photo')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('photo')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
					   <?php $url = URL::to("/"); ?>
					  <?php 
					   $userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$users[0]->photo;
						if($users[0]->photo!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$path;?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } ?>
					  
					  <input type="hidden" name="currentphoto" value="<?php echo $users[0]->photo;?>">
					  
					  
					  
					  
					  
					  <?php if($users[0]->admin!=1){?>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usertype">User Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select name="usertype" required="required" class="form-control col-md-7 col-xs-12">
						<option value=""></option>
							   <option value="0" <?php if($users[0]->admin==0){?> selected="selected" <?php } ?>>Customer</option>
							   <option value="2" <?php if($users[0]->admin==2){?> selected="selected" <?php } ?>>Seller</option>
						</select>
                          
                        </div>
                      </div>
					  <?php } ?>
					  
					  
					  <?php if($users[0]->admin==1){?>
					  
					  <input type="hidden" name="usertype" value="<?php echo $users[0]->admin;?>">
					  
					  <?php } ?>
					  
					  
					  
					  <?php if($userid!=1) {?>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Wallet Balance <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="wallet" class="form-control col-md-7 col-xs-12"  name="wallet" value="<?php echo $users[0]->wallet; ?>" required="required" type="text">
                         
					   </div>
                      </div>
					  <?php } ?>
					  
					  
					 
					  
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/users" class="btn btn-primary">Cancel</a>
						  
						  
						  <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">Submit</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
						  <?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        <!-- /page content -->

      <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>

    
	
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/admin/edituser.blade.php ENDPATH**/ ?>