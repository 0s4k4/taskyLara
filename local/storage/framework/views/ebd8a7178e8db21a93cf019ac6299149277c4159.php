<div class="login-page">
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
	
	
	 <?php if(Session::has('success')): ?>

	    <div class="alert alert-success">

	      <?php echo e(Session::get('success')); ?>


	    </div>

	<?php endif; ?>

	
	
	<?php if(Session::has('resenderr')): ?>
		
<?php 

$gett = Session::get('resenderr');

$ery = 'Please confirm email verfication to login <a href="'.$url.'/index/'.$gett.'" style="font-weight:bold; text-decoration:underline;">Resend Email</a>'; ?>
	    <div class="alert alert-danger">

	      <?php echo $ery;?>

	    </div>

	<?php endif; ?>
	
	
	
        <div class="login-box">
        <div class="login-box-overlay">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
						<div class="login-logo text-center">
						 <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="" /></a>
						</div>
						<div class="col-sm-12">
						<div class="col-sm-8 col-sm-offset-2 text-center">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <input id="username" type="text" class="form-control input-lg" placeholder="<?php echo e(__('user.username')); ?>" name="username" value="<?php echo e(old('email')); ?>" required autofocus>

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
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('user.remember_me')); ?>

                                    </label>
                                </div>
                        </div>						

                        <div class="form-group">
                                <button type="submit" class="borbtn-inverse form-control btn-lg">
                                    <?php echo e(__('user.login')); ?>

                                </button>
                        </div>
                        	<?php if(Session::has('error')): ?>

	    <div class="alert alert-danger">

	      <?php echo e(Session::get('error')); ?>


	    </div>

	<?php endif; ?>
						<div class="form-group">
                                <a class="btn-link" href="<?php echo e(route('forgot')); ?>">
                                     <?php echo e(__('user.forgot_your_password')); ?>

                                </a><br>
                                <?php echo e(__('user.not_registered')); ?> <a class="btn-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('user.create_an_account')); ?> </a>
                        </div>
						</div>
						</div>
						
						<div class="col-sm-12 text-center">
						<?php  if (in_array('Facebook', $hidden)){?>
							<div class="form-group"><a href="<?php echo e(url('/login/facebook')); ?>"><img src="<?php echo $url;?>/local/images/button1.png" border="0"></a></div>
						<?php } ?>		
						<?php  if (in_array('Twitter', $hidden)){?>
							<div class="form-group"><a href="<?php echo e(url('/login/twitter')); ?>"><img src="<?php echo $url;?>/local/images/button2.png" border="0"></a></div>
						<?php } ?>	
							<?php  if (in_array('GPlus', $hidden)){?>
							<div class="form-group"><a href="<?php echo e(url('/login/google')); ?>"><img src="<?php echo $url;?>/local/images/button3.png" border="0"></a></div>
						<?php } ?>
					</div>
						
						
                    </form>
                </div>
            </div>
        </div>
        </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/auth/login.blade.php ENDPATH**/ ?>