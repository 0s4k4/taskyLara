<div class="register-page">
<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$hidden = explode(',',$setts[0]->social_login_option);
		?>


	<div class="register-box">
        <div class="register-box-overlay">
            <div class="panel panel-default">
                
				<div class="panel-body text-center">
				<div class="login-logo text-center">
						 <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="" /></a>
					</div>
				<div class="col-xs-8 col-xs-offset-2">
					
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('register')); ?>">

                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">

                                <input id="name" type="text" class="form-control input-lg" placeholder="<?php echo e(__('user.username')); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                                <input id="email" type="email" class="form-control input-lg" placeholder="<?php echo e(__('user.email_address')); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <input id="password" type="password" class="form-control input-lg" placeholder="<?php echo e(__('user.password')); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>

                        <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="<?php echo e(__('user.confirm_password')); ?>" class="form-control input-lg" name="password_confirmation" required>
                        </div>											
						
						 <div class="form-group">
                                <input id="phoneno" type="text" class="form-control input-lg" placeholder="<?php echo e(__('user.phone_no')); ?>" name="phoneno" required>
                        </div>												
						
						<div class="form-group">
							<select name="gender" class="form-control input-lg" required>
							  
							  <option value=""><?php echo e(__('user.gender')); ?></option>
							   <option value="male"><?php echo e(__('user.male')); ?></option>
							   <option value="female"><?php echo e(__('user.female')); ?></option>
							</select>
                        </div>
						<div class="form-group">
							<select name="usertype" class="form-control input-lg" required>
							  <option value=""><?php echo e(__('user.user_type')); ?></option>
							   <option value="0"><?php echo e(__('user.customer')); ?></option>
							   <option value="2"><?php echo e(__('user.seller')); ?></option>
							</select>                              
                        </div>
                        <div class="form-group">
                            <button type="submit" class="borbtn-inverse form-control btn btn-lg">
                                <?php echo e(__('user.create_account')); ?>

                            </button>
                        </div>
                        <?php echo e(__('user.already_have_account')); ?><a class="btn-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('user.sign_in')); ?></a>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/auth/register.blade.php ENDPATH**/ ?>