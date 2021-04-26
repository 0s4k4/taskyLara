<!DOCTYPE html>
<html lang="es">
<head>

   <?php 
	
	$url = URL::to("/"); ?> 

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	

<script src="<?php echo $url;?>/js/lightbox-plus-jquery.min.js"></script>
</head>
<body>


    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->
    
	
	
	<div class="video">
	<div class="">
	 
	 
	 <?php if($shopcount==1){?>
	 <div class="profile shop">
		<div class="fb-profile">
	<?php 
					   $shopheader="/shop/";
						$path ='/local/images'.$shopheader.$shop[0]->cover_photo;
						if($shop[0]->cover_photo!=""){
						?>
        <img align="left" class="fb-image-lg" src="<?php echo $url.$path;?>" alt="<?php echo e(__('user.cover_banner')); ?>"/>
						<?php } else { ?>
						<img align="left" class="fb-image-lg" src="<?php echo $url.'/local/images/no-image-big.jpg';?>" alt="<?php echo e(__('user.cover_banner')); ?>"/>
						<?php } ?>
		<div>
		<?php if($shop[0]->featured=="yes"){?><div class="ribbon_new"><span><?php echo e(__('user.featured')); ?></span></div><?php } ?>
		<?php $shopphoto="/shop/";
						$paths ='/local/images'.$shopphoto.$shop[0]->profile_photo;
						if($shop[0]->profile_photo!=""){?>
        <img align="left" class="fb-image-profile thumbnail" src="<?php echo $url.$paths;?>" alt="<?php echo e(__('user.profile_hoto')); ?>"/>
						<?php } else { ?>
						<img align="left" class="fb-image-profile thumbnail customwidth" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="<?php echo e(__('user.profile_hoto')); ?>"/>
						<?php } ?>
			</div>			
						
        <div class="fb-profile-text">
            <h1><?php echo $shop[0]->shop_name;?> 
			
			
			
		<?php if(Auth::check()) {?>
		<?php if(Auth::user()->id!=$shop[0]->user_id){?>
		<a href="<?php echo $url;?>/send-message/<?php echo Auth::user()->id;?>/<?php echo $shop[0]->user_id;?>" class="btn btn-primary btn-md radiusoff" style="margin-top:-5px;"><?php echo e(__('user.send_message')); ?></a>
		<?php } } else { ?>
		<a href="javascript:void(0);" class="btn btn-primary btn-md radiusoff" onclick="alert('login user only');" style="margin-top:-5px;"><?php echo e(__('user.send_message')); ?></a>
		<?php } ?>
		
		
			
			</h1>
            <p><?php echo $shop[0]->address;?></p>
        </div>
		
		
		
		<?php /* ?><div class="container">
		<div class="col-md-1"></div>
		<div class="col-md-10 text-left">
		
		<p>
		<?php if(Auth::check()) {?>
		<?php if(Auth::user()->id!=$shop[0]->user_id){?>
		<a href="<?php echo $url;?>/send-message/<?php echo Auth::user()->id;?>/<?php echo $shop[0]->user_id;?>" class="btn btn-primary btn-md radiusoff">Send Message</a>
		<?php } } else { ?>
		<a href="javascript:void(0);" class="btn btn-primary btn-md radiusoff" onclick="alert('login user only');">Send Message</a>
		<?php } ?>
		
		</p>
		</div>
		<div class="col-md-1"></div>
		</div><?php */?>
		
    </div>
		
		<div class="col-md-12">
			
    <div class="clearfix"></div>

				
				
				
    <ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#sent" data-toggle="tab"><span class="lnr lnr-cog blok"></span><?php echo e(__('user.services')); ?> </a></li>
        <li><a href="#inbox" data-toggle="tab"><span class="lnr lnr-user blok"></span> <?php echo e(__('user.profile')); ?></a></li>
      
      <li><a href="#assignment" data-toggle="tab"><span class="lnr lnr-star blok"></span> <?php echo e(__('user.reviews')); ?> </a></li>
	  
	  <li><a href="#gallery" data-toggle="tab"><span class="lnr lnr-picture blok"></span> <?php echo e(__('user.gallery')); ?> </a></li>
	  
	   <li><a href="#contact" data-toggle="tab"><span class="lnr lnr-phone-handset blok"></span> <?php echo e(__('user.contact_vendor')); ?> </a></li>
      
    </ul>
    
    <div class="tab-content">
	
	
	<div class="tab-pane active" id="sent">
           
		   <div class="clearfix"></div>
		    <div class="col-md-12">
			
			<?php foreach($viewservice as $sellerservice){?>
			
						
			
			<div class="col-md-3 col-sm-3">
			<div class="services">
			<div class="col-md-6">
			<?php 
					   $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$sellerservice->subimage;
						if($sellerservice->subimage!=""){
						?>
			<img src="<?php echo $url.$path;?>" border="0" class="img-responsive imgradius" alt="">
						<?php } else { ?>
						<img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive imgradius" alt="">
						<?php } ?>
			</div>
			
			
				<div class="col-md-6 nopadding">
				<h4 class="customh4"><?php echo $sellerservice->subname;?></h4>
				
					<h5 class="customh5"><i class="fa fa-info-circle yellows" aria-hidden="true"></i> <?php echo $sellerservice->price;?> <?php echo $setting[0]->site_currency;?> | <?php echo $sellerservice->time . " hr"; ?></h5>
					<!-- <div style="clear: both;"></div> -->
								<button type="button" class="vendor-description " data-toggle="modal" data-target="#description_<?php echo e($sellerservice->id); ?>">
								  <?php echo e(__('user.description')); ?>

								</button>		
					
				</div>
					<div class="modal fade" id="description_<?php echo e($sellerservice->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="modalLabel"><?php echo e($sellerservice->subname); ?></h4>
									<i class="fa fa-info-circle yellows" aria-hidden="true"></i> <?php echo $sellerservice->price;?> <?php echo $setting[0]->site_currency;?> | <?php echo $sellerservice->time . " hr"; ?>
									
								</div>
								<div class="modal-body">
									<p>Description</p>
									<p>	<?php echo e($sellerservice->description); ?> </p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary modal-footer-close" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>		
					<div style="clear: both;"></div>


				<?php if(Auth::check()) {?>
		<?php if(Auth::user()->id!=$shop[0]->user_id){?>
					<div class="col-md-12">
					<a href="<?php echo $url;?>/booking/<?php echo $vendor;?>/<?php echo $sellerservice->subid;?>/<?php echo $userid;?>" class="radiusoff">
					<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="booknow radiusoff" value="<?php echo e(__('user.book_now')); ?>"></a>
				    </div>
				<?php } } else { ?>
					<div class="col-md-12">
					<a href="<?php echo $url;?>/booking/<?php echo $vendor;?>/<?php echo $sellerservice->subid;?>/<?php echo $userid;?>" class="radiusoff">
					<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="booknow radiusoff" value="<?php echo e(__('user.book_now')); ?>"></a>
				    </div>
					
				<?php } ?>
					
			</div>
		</div>
			
			
			
			
			<?php } ?>
			
			</div>
		   
		   
      </div>
	
	
	
	<div class="tab-pane" id="inbox">
       <div class="clearfix"></div>
	   <div class="col-md-12">
		<div class="col-md-6">
			<h3><?php echo e(__('user.description')); ?></h3>
			<p><?php echo $shop[0]->description;?></p><br/>
		</div>	
		<div class="col-md-6 contact_address">
			<h3><?php echo e(__('user.contact_address')); ?></h3>
				<p><span class="lnr lnr-map-marker"></span> <?php echo  ' '.$shop[0]->address;?></p>
								<p> <span class="lnr lnr-clock"></span> <?php echo $stime;?> - <?php echo $etime;?></p> 
			</div>
				</div>
				
				<div class="col-md-12">
				<div class="col-md-6 working_day">
								<h3>Shop Working Days</h3>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="0") echo __('user.sunday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="1") echo  __('user.monday');  }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="2") echo  __('user.tuesday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="3") echo __('user.wednesday');}?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="4") echo  __('user.thursday');  }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="5") echo __('user.friday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="6") echo __('user.saturday'); }?></p>
					
				</div>
			
			<div class="col-md-6">
				
			</div>
			</div>

	   
	   
      </div>
     
	 
	 
	  
      
     <div class="tab-pane" id="assignment">
	 <div class="clearfix"></div>
	 
	 <?php if($rating_count==0) {?>
	 <div class="row">
	 <div class="col-md-12">
	 <div class="rating">
	  <?php echo e(__('user.no_reviews')); ?>

	 </div>
       
		</div>
	</div>	
	 <?php } else { ?>
	 
	 <div class="row">
	 <div class="col-md-12">
	 <?php foreach($rating as $newrating){?>
	 <div class="rating">
		 <?php
		if($newrating->rating=="")
		{
			$starpath = '/local/images/nostar.png';
		}
		else {
		$starpath = '/local/images/'.$newrating->rating.'star.png';
		}
		?>
		<img src="<?php echo $url.$starpath;?>" class="star_rates" alt="rated <?php if($newrating->rating==""){ echo "0"; } else { echo $newrating->rating; }?> stars" title="rated <?php if($newrating->rating==""){ echo "0"; } else { echo $newrating->rating; }?> stars" />  - &nbsp; <?php  echo $newrating->name;?>
		<h4> <?php echo $newrating->comment; ?></h4>
		<?php
		
		?>
		  
		</div>
	 <?php } ?>
	 
	 </div>
	 </div>
	 
	 <?php } ?>
	 
	 
		
		
     </div>
	 
	 
	 
	 
	  <div class="tab-pane" id="gallery">
	 <div class="clearfix"></div>
	 <div class="row">
	 <div class="col-md-12">
	 
	 <?php foreach($viewgallery as $newgal){?>
	  
	 
        <div class="col-md-3">
		<?php 
		$galleryimg="/gallery/";
		$path ='/local/images'.$galleryimg.$newgal->image;
		if($newgal->image!=""){
	  ?>
	  
	  <a href="<?php echo $url.$path;?>" data-lightbox="image-1" ><img src="<?php echo $url.$path;?>" class="img-responsive" ></a>
		<?php } else {?>
		 <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive" >
		<?php } ?>
		</div>
		
	 <?php }?>
		</div>
	</div>	
		
     </div>
	 
	 
	 
	 <div class="tab-pane" id="contact">
	 <div class="clearfix"></div>
	 <div class="row">
	 <div class="col-md-12">
        
		<form class="" name="admin" id="formID" method="post" enctype="multipart/form-data" action="<?php echo e(route('vendor')); ?>">
		
		<?php echo e(csrf_field()); ?>

		<input type="hidden" id="vendor_id" name="vendor_id" value="<?php echo $shop_id; ?>">
		<input type="hidden" id="vendor_email" name="vendor_email" value="<?php echo $vendor_email;?>">
		
		<input type="hidden" id="admin_email" name="admin_email" value="<?php echo $admin_email;?>">
		
			<div class="col-md-6">
		<?php
        if(Auth::check()) {		
		$logemail = Auth::user()->email;
		$logname = Auth::user()->name;
		$logphone =  Auth::user()->phone;
		}
		else
		{
			$logemail = "";
		$logname = "";
		$logphone =  "";
		}
		?>
		<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.your_name')); ?>  <span class="require">*</span></label>

                            <div class="col-md-12">
                     <input id="name" type="text" class="form-control validate[required] text-input" name="name" value="<?php echo $logname;?>" required autofocus>

                                
                            </div>
        </div>
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.your_email')); ?> <span class="require">*</span></label>

                            <div class="col-md-12">
                     <input id="email" type="email" class="form-control validate[required,custom[email]] text-input" name="email" value="<?php echo $logemail;?>" required>

                                
                            </div>
        </div>
		
		</div>
			
			
			
			<div class="col-md-6">
		
		<div class="form-group">
                            <label for="phone_no" class="col-md-12"><?php echo e(__('user.your_phone_no')); ?> <span class="require">*</span></label>

                            <div class="col-md-12">
                     <input id="phone_no" type="text" class="form-control validate[required] text-input" name="phone_no" value="<?php echo $logphone;?>" required>

                                
                            </div>
        </div>
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12"><?php echo e(__('user.your_message')); ?> <span class="require">*</span></label>

                            <div class="col-md-12">
                     <textarea id="message" type="text" class="form-control validate[required] text-input" name="message" required></textarea>

                                
                            </div>
        </div>
		
		
		
		<?php if(!empty($site_setting[0]->site_logo)){
							 
							?>
						
						<input type="hidden" name="site_logo" value="<?php echo $url.'/local/images/settings/'.$site_setting[0]->site_logo;?>">
					
						<?php } else { ?>
						
						<input type="hidden" name="site_logo" value="">
						
						<?php } ?>
						
						
						<input type="hidden" name="site_name" value="<?php echo $site_setting[0]->site_name;?>">
		
		
		
		</div>
		
		
		<div class="col-md-6">
		                       
							   <?php if(Auth::check()) { ?>
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
							   <?php } else { ?>
                           <button type="button" class="btn btn-success" onclick="alert('Login user only');">
                                    Submit
                                </button>
							   <?php } ?>
		</div>
		<div class="col-md-6">
		</div>
		 
		
		</form>
		
		
		
		</div>
	</div>	
		
     </div>
     
     
    
    
        
    </div>
	
	
    
</div>

		
	</div>	
	
	
	 <?php } ?>
	 

	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	  <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/vendor.blade.php ENDPATH**/ ?>