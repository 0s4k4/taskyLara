<!DOCTYPE html>
<html lang="es">
<head>

    

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	




</head>
<body>

    <?php 
	
	$url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->
    
	<div class="video">

	<div class="container">
	 <h1><?php echo e(__('user.shop')); ?></h1>
	 
	 <?php if($requestid!=""){?>
	 
	 
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
	<div class="edit-shop">
	 <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('editshop')); ?>" id="formID" enctype="multipart/form-data" autocomplete="off">
                        <?php echo e(csrf_field()); ?>

	 
	 
	 <input type="hidden" name="editid" value="<?php echo $requestid;?>">
	 	 
    <div class="row profile shop">
		<div class="col-md-6">
		
		<div class="form-group">
            <label for="name" class="col-md-12"><?php echo e(__('user.shop_name')); ?><span class="require">*</span></label>

            <div class="col-md-12">
                <input id="shop_name" type="text" class="form-control input-lg validate[required] text-input" name="shop_name" value="<?php echo $editshop[0]->shop_name;?>" autofocus autocomplete="off">                                
            </div>
        </div>
		
		<div class="form-group">
            <label for="name" class="col-md-12"><?php echo e(__('user.shop_phone_no')); ?> <span class="require">*</span></label>

            <div class="col-md-12">
                <input id="shop_phone_no" type="text" class="form-control input-lg validate[required] text-input" name="shop_phone_no" value="<?php echo $editshop[0]->shop_phone_no;?>" autocomplete="off">                
            </div>
        </div>
		
		<div class="webheight"></div>

		<div class="form-group">
            <label for="name" class="col-md-12"><?php echo e(__('user.shop_start_time')); ?><span class="require">*</span></label>

            <div class="col-md-12">
               
				<select id="shop_start_time" name="shop_start_time" class="form-control input-lg validate[required]">
				<option value=""><?php echo e(__('user.none')); ?></option>
				<?php foreach($time as $timekey => $timevalue) {?>
				<option value="<?php echo $timevalue;?>" <?php if($editshop[0]->start_time==$timevalue){?> selected="selected" <?php } ?>><?php echo $timekey;?></option>
				<?php } ?>

			</select>
                                
            </div>
        </div>
				
		<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.shop_cover_photo')); ?> </label>
                            <div class="col-md-12 littlebit"><span class="require"><?php echo e(__('user.select_image_size')); ?></span></div>
                            <div class="col-md-12">
								<div class="upload-btn-wrapper">
								 <button class="btn"><?php echo e(__('user.upload_cover_photo')); ?></button>
                                 <input type="file" id="shop_cover_photo" name="shop_cover_photo" class="form-control input-lg">
								</div>
                                <?php if($errors->has('shop_cover_photo')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('shop_cover_photo')); ?></strong>
                                    </span>
                                <?php endif; ?>                                
								
                            </div>
							<?php 
					   $shopphoto="/shop/";
						$paths ='/local/images'.$shopphoto.$editshop[0]->cover_photo;
						if($editshop[0]->cover_photo!=""){
						?>
					 <br/>
					  <div class="col-md-12">
					  <div class="image-cover">
					  <img src="<?php echo $url.$paths;?>" class="thumb" width="150">
					  </div>
					  </div>
					 
						<?php } else { ?>
					  <br/>
					  <div class="col-md-12">
					  <div class="image-cover">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="150">
					  </div>
					  </div>
					 
						<?php } ?>						
        </div>
		
		<input type="hidden" name="current_cover" value="<?php echo $editshop[0]->cover_photo;?>">

		<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.advance_booking_upto')); ?> <span class="require">*</span></label>

                            <div class="col-md-12">
                               <select id="shop_booking_upto" name="shop_booking_upto" class="form-control input-lg validate[required] text-input">
								<option value=""><?php echo e(__('user.none')); ?></option>
								<?php foreach($days as $daykey => $dayvalue) {?>
								<option value="<?php echo $dayvalue;?>" <?php if($editshop[0]->booking_opening_days==$dayvalue){?> selected="selected" <?php } ?>><?php echo $daykey;?></option>
								<?php } ?>

							</select>

                            </div>
        </div>

		<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.allowed_bookings_per_hour')); ?> <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_booking_hour" type="number" class="form-control input-lg validate[required] text-input" name="shop_booking_hour" value="<?php echo $editshop[0]->booking_per_hour;?>" autocomplete="off">
                                
                            </div>
        </div>
		
		<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.tax')); ?> <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="tax_percent" type="number" class="form-control input-lg validate[required] text-input" name="tax_percent" value="<?php echo $editshop[0]->tax_percent;?>" autocomplete="off"> 
                            </div>
        </div>

		</div>

		<div class="col-md-6 moves20">

			   <div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.shop_address')); ?>  <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="txtPlaces" type="text" class="form-control input-lg validate[required] text-input" name="shop_address" value="<?php echo $editshop[0]->address;?>" autocomplete="off">
                            </div>
              </div>

			  <div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.shop_description')); ?><span class="require">*</span></label>

                            <div class="col-md-12">
                                <textarea id="shop_desc" rows="3" class="form-control input-lg validate[required] text-input" name="shop_desc"><?php echo $editshop[0]->description;?></textarea>
                            </div>
              </div>

                <div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.shop_time')); ?><span class="require">*</span></label>

                            <div class="col-md-12">                                
								<select id="shop_end_time" name="shop_end_time" class="form-control input-lg validate[required]">
								<option value=""><?php echo e(__('user.none')); ?></option>
								<?php foreach($time as $timekey => $timevalue) {?>
								<option value="<?php echo $timevalue;?>" <?php if($editshop[0]->end_time==$timevalue){?> selected="selected" <?php } ?>><?php echo $timekey;?></option>
								<?php } ?>

							</select>  
                     </div>
               </div>				

						<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.shop_profile_photo')); ?></label>
                               <div class="col-md-12 littlebit"><span class="require"><?php echo e(__('user.please_select_image_150px')); ?></span></div>
                            <div class="col-md-12">
								<div class="upload-btn-wrapper">
								 <button class="btn"><?php echo e(__('user.upload_photo')); ?></button>
                                 <input type="file" id="shop_profile_photo" name="shop_profile_photo" class="form-control input-lg">
                                 <?php if($errors->has('shop_profile_photo')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('shop_profile_photo')); ?></strong>
                                    </span>
                                <?php endif; ?>                                
								</div>
                            </div>
							
							<?php 
					   $shopprofile="/shop/";
						$path ='/local/images'.$shopprofile.$editshop[0]->profile_photo;
						if($editshop[0]->profile_photo!=""){
						?>
					 <br/>
					  <div class="col-md-12">
					  <div class="image-cover">
					  <img src="<?php echo $url.$path;?>" class="thumb" width="150">
					  </div>
					  </div>
					 
						<?php } else { ?>
					  <br/>
					  <div class="col-md-12">
					  <div class="image-cover">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="150">
					  </div>
					  </div>
					 
						<?php } ?>

                      </div>
						
                      <input type="hidden" name="current_photo" value="<?php echo $editshop[0]->profile_photo;?>">
					  
					  
					  <div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.shop_working_days')); ?><span class="require">*</span></label>

                            <div class="col-md-12">
							<?php foreach($daytxt as $daytxtkey => $daytxtvalue){?>
								<label class="container"><?php echo $daytxtkey;?>
                                 <input type="checkbox" id="shop_working_days" name="shop_working_days[]" class="validate[required]" <?php if(in_array($daytxtvalue, $sel)) { ?> checked="checked" <?php } ?> value="<?php echo $daytxtvalue;?>"> <br/>
								 <span class="checkmark"></span>
								</label>
							<?php } ?>
                                
                            </div>
                      </div>

                        <input type="hidden" name="site_logo" value="">
						
						<input type="hidden" name="site_name" value="">
                    
                   <input type="hidden" name="status" value="<?php echo $editshop[0]->status;?>">
				<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.shop_registration_document')); ?></label>
                               <div class="col-md-12 littlebit"><span class="require"><?php echo e(__('user.please_upload_pdf_image_only')); ?></span></div>
                            <div class="col-md-12">
								<div class="upload-btn-wrapper">
								 <button class="btn"><?php echo e(__('user.upload_photo')); ?></button>
                                 <input type="file" id="the-pdf" name="the-pdf" class="form-control input-lg <?php if(empty($editshop[0]->shop_document)){?>validate[required]<?php } ?>">

                                 <?php if($errors->has('the-pdf')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('the-pdf')); ?></strong>
                                    </span>
                                <?php endif; ?> 
								</div>
                            </div>
							<?php if(!empty($editshop[0]->shop_document)){?>
							<div class="col-md-12"><a href="<?php echo $url;?>/local/images/shop/<?php echo $editshop[0]->shop_document;?>" target="_blank"><?php echo $editshop[0]->shop_document;?></a></div>
							<?php } ?>
				
                      </div>
			   
			   <input type="hidden" name="current_document" value="<?php echo $editshop[0]->shop_document;?>">

		</div>

	</div>
	</div>
	<div class="height30"></div>
    <div class="row">
	<div class="col-md-12">
		                       
		<a href="<?php echo $url;?>/shop" class="btn btn-primary radiusoff">
            <?php echo e(__('user.reset')); ?>

         </a>
		
		<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success radiusoff btndisable"><?php echo e(__('user.update')); ?></button> 
		<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
		
         <button type="submit" class="btn btn-success radiusoff">
             <?php echo e(__('user.update')); ?>

         </button>
								<?php } ?>
		</div>
	</div>

	 </form>

	 <?php } ?>

	 
	 <div class="height30"></div>
	 <div class="row">
	
	</div>
	
	</div>
	</div>
      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\taskyLara\local\resources\views/editshop.blade.php ENDPATH**/ ?>