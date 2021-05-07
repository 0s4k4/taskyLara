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

	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.shop')); ?></h1></div>
	 </div>
	<div class="">
	 
	 
	 <?php if($shopcount==1){?>
	 <div class="profile shop">
		
		
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
        <img align="left" class="fb-image-profile thumbnail" src="<?php echo $url.$paths;?>" alt="Profile Photo" style="width:150px; height:150px;"/>
						<?php } else { ?>
						<img align="left" class="fb-image-profile thumbnail customwidth" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="Profile Photo" style="width:150px; height:150px;"/>
						<?php } ?>
        <div class="fb-profile-text">
            <h1><?php echo $shop[0]->shop_name;?></h1>
			
            <p><?php echo $shop[0]->address;?></p>
			
        </div>
				
    </div>
		
		<div class="container">
	<div class="row">
		
        <div class="col-md-12">
                
				
				<div class="clearfix"></div>
    
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#inbox" data-toggle="tab"><span class="lnr lnr-user blok"></span> <?php echo e(__('user.profile')); ?></a></li>
      <li><a href="#sent" data-toggle="tab"><span class="lnr lnr-cog blok"></span> <?php echo e(__('user.services')); ?></a></li>
      <li><a href="#assignment" data-toggle="tab"><span class="lnr lnr-star blok"></span> <?php echo e(__('user.reviews')); ?></a></li>
      
    </ul>
    
    <div class="tab-content">
	
	
	<div class="tab-pane active" id="inbox">
       <div class="clearfix"></div>
	   <div class="col-md-12">
		<div class="col-md-6">
			<h3><?php echo e(__('user.description')); ?></h3>
			<p><?php echo $shop[0]->description;?></p><br/>
		</div>	
		<div class="col-md-6 contact_address">
			<h3><?php echo e(__('user.contact_address')); ?></h3>
				<p><span class="lnr lnr-map-marker"></span> <?php echo  ' '.$shop[0]->address;?>
				</p>
								<p> <span class="lnr lnr-clock"></span> <?php echo $stime;?> - <?php echo $etime;?></p> 
			</div>
				</div>
				
				<div class="col-md-12">
				<div class="col-md-6 working_day">
								<h3>Shop Working Days</h3>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="0") echo  __('user.sunday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="1") echo  __('user.monday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="2") echo  __('user.tuesday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="3") echo  __('user.wednesday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="4") echo  __('user.thursday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="5") echo __('user.friday'); }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="6") echo  __('user.saturday'); }?></p>
					
				</div>
			
			<div class="col-md-6">
				<h3><?php echo e(__('user.shop_status')); ?></h3>
				<p><?php echo $shop[0]->status;?></p>
			</div>
			</div>
	   
      </div>
     
      <div class="tab-pane" id="sent">
           <div class="clearfix"></div>
		   
		    <div class="col-md-12">
			
			<?php foreach($viewservice as $sellerservice){?>
			
			<div class="col-md-3">
			<div class="services">
				<h4><?php echo $sellerservice->subname;?></h4>
				<h5><span class="icon_info" aria-hidden="true"></span>
					<?php echo $sellerservice->price;?> &nbsp; <?php echo $setting[0]->site_currency;?> | <?php echo $sellerservice->time;?> hour(s)</h5>
			</div>
			</div>
			<?php } ?>
			
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
     
    </div>
	
	<div class="clearfix"></div>
	
	<div class="form-group">
		<div class="row">
		<div class="col-md-12">
			<div>
					<a href="<?php echo $url;?>/editshop/<?php echo $shop[0]->id;?>" class="btn btn-success btn-md radiusoff"><?php echo e(__('user.edit_shop')); ?></a>
					<a href="<?php echo $url;?>/services" class="btn btn-danger btn-md radiusoff"><?php echo e(__('user.edit_services')); ?></a>					
				</div>
			</div>	
				
		</div>
	</div>

     </div>
	</div>
    
</div>
	
	</div>	
	
	 <?php } ?>
	 
	</div>
	</div>
	   
      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\taskyLara\local\resources\views/shop.blade.php ENDPATH**/ ?>