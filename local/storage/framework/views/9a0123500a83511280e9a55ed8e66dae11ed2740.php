<!DOCTYPE html>
<html lang="en">
<head>

   <?php 
	
	$url = URL::to("/"); ?> 

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	


<script src="<?php echo $url;?>/js/jquery-ui.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>

   

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->
    
	<div class="video">
	<div class="container">

	
	 <div class="row profile shop">
		
		
		<div class="container">
	<div class="row">
		
		
        <div class="col-md-12">
                
				
				
    <div class="fb-profile">
	<?php 
					   $shopheader="/shop/";
						$path ='/local/images'.$shopheader.$shop[0]->cover_photo;
						if($shop[0]->cover_photo!=""){
						?>
        <img align="left" class="fb-image-lg" src="<?php echo $url.$path;?>" alt="cover banner"/>
						<?php } else { ?>
						<img align="left" class="fb-image-lg" src="<?php echo $url.'/local/images/no-image-big.jpg';?>" alt="cover banner"/>
						<?php } ?>
		
		<?php $shopphoto="/shop/";
						$paths ='/local/images'.$shopphoto.$shop[0]->profile_photo;
						if($shop[0]->profile_photo!=""){?>
        <img align="left" class="fb-image-profile thumbnail" src="<?php echo $url.$paths;?>" alt="Profile Photo"/>
						<?php } else { ?>
						<img align="left" class="fb-image-profile thumbnail customwidth" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="Profile Photo"/>
						<?php } ?>
        <div class="fb-profile-text">
            <h1><?php echo $shop[0]->shop_name;?></h1>
            <p><?php echo $shop[0]->address;?></p>
        </div>
    </div>

	
	
	<form class="" name="admin_s" id="formID" method="post" enctype="multipart/form-data" action="<?php echo e(route('booking')); ?>">
	
	<?php echo csrf_field(); ?>

	
	<div class="container booking-main">
<div class="col-md-4">
<h5><strong><?php echo e(__('user.choose_service')); ?> <span class="require">*</span></strong></h5>
<?php 
foreach($seller_services as $viewservices)
{
	
?>
	<div class="col-md-6">
	<div class="booking list">
  
	<input type="checkbox" id="services[]" name="services[]" value="<?php echo $viewservices->subid; ?>" <?php if($subservice[0]->subid==$viewservices->subid) echo "checked"; ?> class="validate[required]">
	
		<label><?php echo $viewservices->subname; ?></label>
    </div>	
	</div>
	
<?php } ?>

</div>



<div class="col-md-8">

<div class="col-md-12">


<div class="col-md-4">
<input type="hidden" id="booking_per_hour" name="booking_per_hour" value="<?php echo $booking_per_hour; ?>">
<input type="hidden" id="start_time" name="start_time" value="<?php echo $start_time; ?>">
<input type="hidden" id="end_time" name="end_time" value="<?php echo $end_time; ?>">


<input type="hidden" id="shop_id" name="shop_id" value="<?php echo $shop_id; ?>">



<input type="hidden" id="services_id" name="services_id" value="<?php echo $subservice[0]->subid; ?>">


<h5><strong><?php echo e(__('user.select_date')); ?><span class="require">*</span></strong></h5>
<script type="text/javascript">
  $(function() {

 $('#datepicker').datepicker({

changeMonth: true,
changeYear: true,
minDate: 0,
beforeShowDay: function (date) {
     var day = date.getDay();
	return [(<?php echo $days; ?>)];
    }
	
});

var date = new Date('<?php echo $exp_date; ?>');

var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();
$("#datepicker").datepicker( "option", "maxDate", new Date(currentYear, currentMonth, currentDate));
});   

 </script>
 
 
    
<input type="text" class="form-control validate[required]" id="datepicker" name="datepicker" > 
<br/>
<h5><strong><?php echo e(__('user.address')); ?> <span class="require">*</span></strong></h5>
<input type="text" class="form-control validate[required]" id="book_address" name="book_address" > 

</div>



<div class="col-md-4">

<h5><strong><?php echo e(__('user.select_time')); ?> <span class="require">*</span></strong></h5>

<select id="time" name="time" class="form-control time validate[required]">

<option value=""><?php echo e(__('user.none')); ?></option>
<?php 
for($i=$start_time;$i<=$end_time;$i++)
{
	if($i>12)
	{
		$d=$i-12;
		$ss=$d."PM";
	}
	else
	{
		$ss=$i."AM";
	}
	?>
	<option value="<?php echo $i; ?>"> <?php echo $ss; ?></option>
	<?php
		$i+1;
}
?>

</select>



<br/>
<h5><strong><?php echo e(__('user.city')); ?> <span class="require">*</span></strong></h5>
<input type="text" class="form-control validate[required]" id="book_city" name="book_city" > 

</div>

<div class="col-md-4">
<h5><strong><?php echo e(__('user.payment_mode')); ?> <span class="require">*</span></strong></h5>
<select id="payment_mode" name="payment_mode" class="form-control validate[required]">
	<option value=""><?php echo e(__('user.none')); ?></option>
	
	
	<?php 
					$set_id=1;
		$payssetting = DB::table('settings')->where('id', $set_id)->get();
        if(Auth::check()) {
        $current_user = DB::table('users')->where('id','=',Auth::user()->id)->get();
		
		$wallet_balance = $current_user[0]->wallet;
		}
		
						foreach($payssetting as $row)
						{
							$catid=$row->payment_option;
							$sel= explode(",",$catid); 
							$lev= count($sel);
							for($i=0;$i<$lev;$i++)
							{
								 $ad_cat= $sel[$i];
								 
							
						?>
						<option value="<?php echo $ad_cat; ?>" ><?php echo $ad_cat; ?></option>
						<?php 
							 } }
                         if(Auth::check()) {
							 if($wallet_balance > 0){
						?> 
	                   <option value="wallet" >wallet [<?php echo $wallet_balance.' '.$payssetting[0]->site_currency;?>] </option>
					   
							 <?php } } ?>
	
</select>

<br/>
<h5><strong><?php echo e(__('user.pincode')); ?> <span class="require">*</span></strong></h5>
<input type="number" class="form-control validate[required]" id="book_pincode" name="book_pincode" > 

</div>
<div class="clearfix"></div>


<div class="col-md-12">
<h5><strong><?php echo e(__('user.note')); ?> </strong></h5>
<textarea name="book_note" id="book_note" class="form-control"></textarea>
</div>

<?php if(Session::has('error')): ?>

	    <div class="alert alert-danger">

	      <?php echo e(Session::get('error')); ?>


	    </div>

	<?php endif; ?>
	
	
	</div>
	
	</div>
	
	

</div>


<?php if (Auth::guest()) {?>

<div class="container">
<h3 class="left"><?php echo e(__('user.create_new_account')); ?></h3>
<br/>
<div class="form-group col-md-3">
<label><?php echo e(__('user.username')); ?> <span class="require">*</span></label>
<input type="text" id="name" name="name" class="form-control validate[required]">
<?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
</div>

<div class="form-group col-md-3">
<label><?php echo e(__('user.email')); ?> <span class="require">*</span></label>
<input type="email" id="email" name="email" class="form-control validate[required,custom[email]]">
<?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
<?php endif; ?>
</div>


<div class="form-group col-md-3">
<label><?php echo e(__('user.phone_no')); ?><span class="require">*</span></label>
 <input id="phoneno" type="text" class="form-control validate[required]" name="phoneno">
</div>

<div class="form-group col-md-3">
<label><?php echo e(__('user.password')); ?> <span class="require">*</span></label>
<input id="password" type="password" class="form-control validate[required]" name="password">
</div>



<div class="form-group col-md-3">
<label><?php echo e(__('user.gender')); ?> <span class="require">*</span></label>
<select name="gender" class="form-control validate[required]">
							  
							  <option value=""></option>
							   <option value="male"><?php echo e(__('user.male')); ?></option>
							   <option value="female"><?php echo e(__('user.female')); ?></option>
							</select>
</div>

<div class="form-group col-md-3">
<label><?php echo e(__('user.user_type')); ?> <span class="require">*</span></label>
<select name="usertype" class="form-control validate[required]">
							  
							  <option value=""></option>
							   <option value="0"><?php echo e(__('user.customer')); ?></option>
							   <option value="2"><?php echo e(__('user.seller')); ?></option>
							</select>
</div>
<?php } ?>
</div>

<div class="container">
<div class="col-md-2">
<input type="submit"  value="<?php echo e(__('user.submit')); ?>" name="submit" class="booknow right">
</div>
</div>
</form>

	

	
	<div class="form-group">
		<div class="row">
		<div class="col-md-12">
			
			</div>	
				
		</div>
	</div>
	

	

     </div>
	</div>
    
    
</div>

	
		
	</div>	
	
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	</div>
	
	</div>
	</div>
	


      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	  <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
	 
	 
</body>
</html>
<?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/booking.blade.php ENDPATH**/ ?>