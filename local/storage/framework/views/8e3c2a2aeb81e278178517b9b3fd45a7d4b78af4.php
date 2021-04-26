<!DOCTYPE html>
<html lang="es">
<head>

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->

	<div class="video">
	
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.dashboard')); ?></h1></div>
	 </div>
	 <div class="clearfix"></div>
	<div class="container">

    <div class="row profile">
		<div class="col-md-3 ">
			<div class="profile-sidebar">
				
				<div class="profile-userpic">
				<?php 
				$url = URL::to("/");
				$userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$editprofile[0]->photo;
						if($editprofile[0]->photo!=""){?>
					<img src="<?php echo $url.$path;?>" class="img-responsive" alt="">
						<?php } else { ?>
						<img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-responsive" alt="">
						<?php } ?>
				</div>
				
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $editprofile[0]->name;?> 
					</div>
					<?php $sta=$editprofile[0]->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; } else {$viewst="";}?>
					<div class="profile-usertitle-job">
						<?php echo e(__('user.user_type')); ?><?php echo $viewst;?>
					</div>
				</div>
				
				<div class="profile-userbuttons">
					<a href="<?php echo $url;?>/my_bookings" class="borbtn btn-success btn-sm"><?php echo e(__('user.my_bookings')); ?></a>
					<?php /* ?><a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Sign Out</a><?php */?>
					
				</div>
				
				<div class="profile-usermenu">
					<ul class="nav">
						<!--<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>-->
						<li>
							<a href="<?php echo $url;?>/dashboard">
							<i class="fa fa-user" aria-hidden="true"></i>

							<?php echo e(__('user.account_settings')); ?> </a>
						</li>
						<?php /*<?php if($sta!=1){?>
						<li>
						<?php if(config('global.demosite')=="yes"){?>
						<a href="#" class="btndisable"> <i class="fa fa-trash-o" aria-hidden="true"></i>
							Delete Account <span class="disabletxt" style="font-size:13px;">( <?php echo config('global.demotxt');?> )</span>
							</a> 
						<?php } else { ?>
						
							<a href="<?php echo $url;?>/delete-account" onclick="return confirm('Are you sure you want to delete your account?');">
							
							<i class="fa fa-trash-o" aria-hidden="true"></i>
							Delete Account
							</a>
						<?php } ?>
						</li>
						<?php } ?> */?>
						
						<li>
							<a href="<?php echo $url;?>/logout">
							<i class="fa fa-sign-out" aria-hidden="true"></i>

							<?php echo e(__('user.log_out')); ?>  </a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
		<div class="col-md-9 moves20">
            <div class="profile-content">
			   
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
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('dashboard')); ?>" id="formID" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">

                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="name" type="text" placeholder="<?php echo e(__('user.username')); ?>" class="form-control validate[required] text-input" name="name" value="<?php echo $editprofile[0]->name;?>" autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="email" type="text" placeholder="<?php echo e(__('user.email_address')); ?>" class="form-control validate[required,custom[email]] text-input" name="email" value="<?php echo $editprofile[0]->email;?>">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="password" type="password" placeholder="<?php echo e(__('user.password')); ?>" class="form-control"  name="password" value="">                                
                            </div>
                        </div>
                        
						<input type="hidden" name="savepassword" value="<?php echo $editprofile[0]->password;?>">
						
						<input type="hidden" name="id" value="<?php echo $editprofile[0]->id; ?>">
						
						<div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input id="phone" type="text" placeholder="<?php echo e(__('user.phone_no')); ?>" class="form-control validate[required] text-input" value="<?php echo $editprofile[0]->phone;?>" name="phone">
                            </div>
                        </div>
																	
						<div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
							<select name="gender" class="form-control validate[required] text-input">							  
							  <option value=""><?php echo e(__('user.gender')); ?></option>
							   <option value="male" <?php if($editprofile[0]->gender=='male'){?> selected="selected" <?php } ?>><?php echo e(__('user.male')); ?></option>
							   <option value="female" <?php if($editprofile[0]->gender=='female'){?> selected="selected" <?php } ?>><?php echo e(__('user.female')); ?></option>
							</select>
                               
                            </div>
                        </div>
																								
						<div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
							<div class="upload-btn-wrapper">
								<button class="btn"><?php echo e(__('user.upload_photo')); ?></button>
                                <input type="file" id="photo" name="photo" class="form-control">
								<?php if($errors->has('photo')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('photo')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div>
						
						
						<input type="hidden" name="currentphoto" value="<?php echo $editprofile[0]->photo;?>">
						
						<input type="hidden" name="usertype" value="<?php echo $editprofile[0]->admin;?>">
						

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary btndisable"><?php echo e(__('user.update')); ?> </button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="btn-lg form-control borbtn-inverse">
                                    <?php echo e(__('user.update')); ?> 
                                </button>
							<?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
			   
            </div>
		</div>
	</div>

	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	</div>
	
	</div>
	</div>
	
      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/dashboard.blade.php ENDPATH**/ ?>