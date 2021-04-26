<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>
<!DOCTYPE html>
<html lang="es">
<head>

    

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
	
	
	
	<div class="video projectpage">
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.job_details')); ?></h1></div>
	 </div>
	
	
	
	
	
	<div class="container">

	 <div class="height30"></div>
	 <div class="row">
	 
	 <div class="col-md-12">
	
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
	
	
	<?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <strong><?php echo e(__('user.whoops')); ?></strong><?php echo e(__('user.some_problems_with_your_input')); ?><br><br>
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>
	
	</div>
	 
	 
	 
	 <?php if(!empty($sql_request_count)){?>
	 
	 <?php
						   
						   
						   $files = $sql_request[0]->token;
						   
						   
						   $count_file = DB::table('request_file')
									->where('token_key', '=', $files)
									->count();
									if(!empty($count_file))
									{
									$view_file = DB::table('request_file')
									             ->where('token_key', '=', $files)
									             ->get();
										$pathfile = "";
                                        $secondfile = "";										
										foreach($view_file as $files)
										{
											$pathfile .=$files->file_name."<br/>";
											$secondfile .="<a href=".$url."/local/images/request/".$files->file_name." download>".$files->file_name."</a><br/>";
										}
									
									}
									else
									{
										$pathfile = "";
										$secondfile = "";
									}
						   
						   
						   
						   
						   $tag = $sql_request[0]->request_skills;
								$viewtag = explode(',', $tag);
								$par = "";
								foreach($viewtag as $tags)
								{
									$count_cnt = DB::table('skills')
									->where('id', '=', $tags)
									->count();
									if(!empty($count_cnt))
									{
									$view_key = DB::table('skills')
									->where('id', '=', $tags)
									->get();
							        
									$par .=$view_key[0]->skill.', ';
									}
									else
									{
										$par .= "";
									}
									
								}
                             $topar = rtrim($par,', ');								
						   
						   
						   
						   
						   
						   
						   if(!empty($sql_request[0]->category_type))
						  {
						  if($sql_request[0]->category_type=="subcat")
						  { 
						  
						  $category = DB::table('subservices')
									->where('subid', '=', $sql_request[0]->category)
									->get();
							$category_cnt = DB::table('subservices')
									->where('subid', '=', $sql_request[0]->category)
									->count();	
									if(!empty($category_cnt))
									{
									$catname = $category[0]->subname;
									}
									else
									{
										$catname="";
									}
									
						  }
						  if($sql_request[0]->category_type=="cat")
						  { 
						  
						  $category = DB::table('services')
									->where('id', '=', $sql_request[0]->category)
									->get();
							$category_cnt = DB::table('services')
									->where('id', '=', $sql_request[0]->category)
									->count();		
									if(!empty($category_cnt))
									{
									$catname = $category[0]->name;
									}
									else
									{
										$catname ="";
									}
						  }
						  }
						  else
						  {
							  $catname ="";
						  }
						  
						  
						  
						  
						  if(!empty($sql_request[0]->subcategory))
				{
					$view_category = DB::table('subservices')
										->where('subid', '=', $sql_request[0]->subcategory)
										->get();
					if(!empty($view_category[0]->subname)){
						$namesub = $view_category[0]->subname;
					}					
				}
				else
				{
					$namesub = "";
				}
						
						 
						   ?>
						   
						   
						   <?php if($sql_request[0]->budget_type=="fixed")
						   { 
						     $bud_txt =  __('user.fixed_price'); 
						     if($sql_request[0]->fixed_price=="custom_budget")
							 {
								$estim = 'Custom Budget ('.$sql_request[0]->minimum_budget.' - '.$sql_request[0]->maximum_budget.' '.$site_setting[0]->site_currency.')';
							 }
							 else
							 {
								 $estim = $sql_request[0]->fixed_price;
							 }
						   } 
						   else if($sql_request[0]->budget_type=="hour"){ 
						   $bud_txt =  __('user.Hourly Price'); 
						   
						   if($sql_request[0]->hour_price=="custom_budget")
							 {
								$estim = $sql_request[0]->minimum_budget.' - '.$sql_request[0]->maximum_budget;
							 }
							 else
							 {
								 $estim = $sql_request[0]->hour_price;
							 }
						   
						   
						   } 
						   
						   if($sql_request[0]->complete_days==1)
						   {
							   $day_txt = __('user.day');
						   }
						   else if($sql_request[0]->complete_days > 1)
						   {
							   $day_txt = __('user.days');
						   }
						   else
						   {
							   $day_txt = "";
						   }
						   
						   
						   
						   
						   if($sql_request[0]->request_status==0)
						   {
							   $r_status = "Waiting for freelancer";
							   $r_clr = "#FA4153";
						   }
						   else if($sql_request[0]->request_status!=0 && $sql_request[0]->bid_status!=1)
						   {
							   $r_status = "In Progress";
							   $r_clr = "#F77D0E";
						   }
						   else if($sql_request[0]->bid_status==1)
						   {
							   $r_status = "Completed";
							   $r_clr = "#5DC26A";
						   }
						   ?>
						   
						   
						   
						   
	<div class="col-md-12">
		
	  <div class="row">
	 
    <div class="col-md-8 sv_request_form ashborder">
	<?php if($sql_request[0]->featured==1){?><div class="new_ribbon"><span><?php echo e(__('user.featured')); ?></span></div><?php } ?>
	
      <div class="sv_my_req"><h2 class="fleft"><?php echo $sql_request[0]->subject;?> </h2> </div>
	  <span class="clearfix"></span>
	  
	  
	  
	  <span class="clearfix"></span>
	  
	  
	  
	  <?php 
         $newDate = date("M d Y", strtotime($sql_request[0]->submit_date)); ?>
		<p class="uppercase fleft font15"><?php echo e(__('user.created_c')); ?><span class=""> <?php echo $newDate;?></span>, in <?php echo $catname;?><?php if(!empty($namesub)){?>, <?php echo $namesub;?><?php } ?></p>
	  <span class="clearfix"></span>
	  <div class="inline-share">
    <span class="share"></span>
	</div>
	
	
	
	
	  <h3 class="fleft violet_text"><span class="fontsize21"><?php echo e(__('user.budget')); ?> </span> <?php echo $estim;?></h3>
	  
	  
	  <span class="height20 clearfix"></span>
	
	<div>
	  <?php if(!empty($sql_request[0]->featured_image)){?>
	  <img src="<?php echo $url;?>/local/images/request/<?php echo $sql_request[0]->featured_image;?>" class="img-responsive">
	  <?php } ?>
	  
	  </div>
	  
	  <span class="height20 clearfix"></span>
	  
	  <p class="clearfix height20"></p>
	  <p class="col-sm-12 sv_project"><?php echo nl2br($sql_request[0]->description);?></p>
	  <p class="clearfix height10"></p>
      <p class="sv_project col-md-3"><strong><?php echo e(__('user.skills')); ?>:</strong></p><p class="col-md-9"> <?php echo $topar;?></p>
      <div style="clear:both;"></div>	 
	 
	  <p class="sv_project col-md-3"><strong><?php echo e(__('user.category')); ?>:</strong></p><p class="col-md-9"> <?php echo $catname;?><?php if(!empty($namesub)){?>,<?php echo $namesub;?><?php } ?></p>
	 <div style="clear:both;"></div>
	  <?php if(!empty($sql_request[0]->preferred_location)){?>
	
	  <p class="col-sm-3 sv_project"><strong><?php echo e(__('user.preferred_location')); ?>:</strong> </p><p class="col-sm-9"> <?php echo $sql_request[0]->preferred_location;?></p>
	  <?php } ?>
 <div style="clear:both;"></div>
	  <p class="col-sm-3 sv_project"><strong><?php echo e(__('user.file_attachment')); ?>:</strong> </p><p class="col-sm-9"> 
	  <?php if (Auth::guest()) {?>
	 <a href="javascript:void();" onclick="alert('login user only');"><?php echo $pathfile;?></a>
	  <?php } else { ?>
	<?php echo $secondfile;?>
	  <?php } ?>
	  
	  
	  </p>
	  
	  <div style="clear:both;"></div>
	  <p class="col-sm-3 sv_project"><strong><?php echo e(__('user.estimate_delivery')); ?>:</strong></p><p class="col-sm-9"> <?php if(!empty($sql_request[0]->complete_days)){?> <?php echo $sql_request[0]->complete_days;?> <?php echo $day_txt;?> <?php } ?></p>
	 <div style="clear:both;"></div>
	 
	  <p class="col-sm-3 sv_project"><strong><?php echo e(__('user.status')); ?>:</strong></p><p class="col-sm-9">  <span style="color:<?php echo $r_clr;?>;"><?php echo $r_status;?></span></p>
	  	<div class="height20 clearfix"></div>
	  
	  <?php if (Auth::guest()) {?>
	  <p class="ash_border"></p>
	  
	  
	  <h3><?php echo e(__('user.offer_work_job_bid')); ?></h3>
	  
	  <div class="row ">
        <div class="col-md-4">
		    <label>Y<?php echo e(__('user.bid_job')); ?></label>
            <input type="number" placeholder="Price" class="form-control testBox">
         </div>
        <div class="col-md-4">
		<label><?php echo e(__('user.your_email_address')); ?></label>
            <input type="email" placeholder="Email" class="form-control testBox">
        </div>
        <div class="col-md-4">
		<label></label>
            <a href="javascript:void(0);" class="btn btn-success btn-block bid_btn" onclick="alert('login user only');"><?php echo e(__('user.submit')); ?></a>
        </div>
	</div>
	
	<div class="height40"></div>
	  <?php } else {
		  
		  
		  
		  if(Auth::user()->id!=$sql_request[0]->user_id)
	  {
		  
	  $award_check = DB::table('request_proposal')
		               ->where('gid','=',$sql_request[0]->gid)
				       ->where('award','=',1)
				       ->count();	  
		  
	  $check_proposal = DB::table('request_proposal')
		               ->where('gid','=',$sql_request[0]->gid)
				       ->where('prop_user_id','=',Auth::user()->id)
				       ->count();
		if(!empty($check_proposal))
		{
			$view_proposal = DB::table('request_proposal')
		                     ->where('gid','=',$sql_request[0]->gid)
				             ->where('prop_user_id','=',Auth::user()->id)
							 ->get();
			$pprice = $view_proposal[0]->bid_price;
            $pproposal = $view_proposal[0]->desc_proposal;
            $btn_txt = "Update";
            $pestimate = $view_proposal[0]->proposal_estimate;			
		}
        else
		{
			$pprice = "";
			$pproposal = "";
			$btn_txt = "Submit";
			$pestimate = "";
			
		}			
		
      if(!empty($award_check))
	  {		  
	  ?>
	  
	 
	  
	  
	  <?php /* ?><h3>Great your selected on this job.</h3><?php */?>
	  
	  
	  
	  
	  <?php } 
	  
	  
	  if(empty($award_check)) { ?>
	  
	  <p class="ash_border"></p>
	  
	  
	  <h3><?php echo e(__('user.offer_work_job_bid')); ?></h3>
	  <a name="goto"></a>
	  <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('project')); ?>" id="formID" enctype="multipart/form-data">
       <?php echo e(csrf_field()); ?>

	  <div class="row">
        <div class="col-md-6">
		    <label><?php echo e(__('user.bid_job')); ?> (<?php echo $site_setting[0]->site_currency;?>)</label>
            <input type="number" name="bid_price" placeholder="Price" class="form-control validate[required] testBox" value="<?php echo $pprice;?>">
         </div>
        <div class="col-md-6">
		<label><?php echo e(__('user.your_email_address')); ?></label>
            <input type="email" name="bid_email" placeholder="Email" class="form-control validate[required] testBox readonly" value="<?php echo Auth::user()->email;?>" readonly>
        </div>
		<div class="clearfix height10"></div>
		
		<div class="col-md-12">
		<label><?php echo e(__('user.describe_your_proposal')); ?></label>
            <textarea name="proposal" placeholder="What makes you the best candidate for this project?" class="form-control validate[required] testBox"><?php echo $pproposal;?></textarea>
        </div>
		
		
		<div class="col-md-12">
		<label><?php echo e(__('user.estimated_time_complete')); ?></label>
            <input type="number" name="proposal_estimate" placeholder="" value="<?php echo $pestimate;?>" class="form-control validate[required] testBox">
			<span>(days)</span>
        </div>
		
		
		<input type="hidden" name="prop_user_id" value="<?php echo Auth::user()->id;?>">
		
		<input type="hidden" name="req_user_id" value="<?php echo $sql_request[0]->user_id;?>">
		
		<input type="hidden" name="gid" value="<?php echo $sql_request[0]->gid;?>">
		
        <div class="col-md-4">
		<label></label>
		<?php if(Auth::user()->confirmation==0){?>
		<a href="javascript:void(0);" onclick="alert('Your e-mail address must be confirmed before you can buy the request');" class="btn btn-success btn-block bid_btn"><?php echo $btn_txt;?></a>
		<?php } else { ?>
		
		
            <input type="submit" class="btn btn-success btn-block bid_btn" value="<?php echo $btn_txt;?>">
        <?php } ?>
		
		</div>
	</div>
	</form>
	<div class="height40"></div>
	  
	  
	  
	  <?php }  } 
		  
		  
		  
		  

      /*if(Auth::user()->id==$sql_request[0]->user_id)
	  {*/
		  
		  if(!empty($total_bids))
		  {
		 ?>
		 <p class="ash_border"></p>
		 <h3><?php echo $total_bids;?> <?php echo e(__('user.freelancers_bidding_job')); ?></h3>
        <a name="gotonew"></a>
		<div class="height10"></div>
		<div class="pagenavigation sv_job_details">
		
		<?php
        foreach($get_bids as $bid)
		{		
		$user_id = $bid->prop_user_id; 
		
		$userr = DB::table('users')
				->where('id', '=', $user_id)
				->get();
				$userr_cnt = DB::table('users')
				->where('id', '=', $user_id)
				->count();
				
				
		$now = time(); // or your date as well
		$your_date = strtotime($bid->bid_date);
		$datediff = $now - $your_date;

		$fin_date = round($datediff / (60 * 60 * 24));
        if(empty($fin_date))
		{
			$txt_days= "Today";
		}
		else if($fin_date==1)
		{
			$txt_days= __('user.day');
		}
        else
        {
			$txt_days=__('user.days');
		}

        if($bid->proposal_estimate==0 or $bid->proposal_estimate==1)
		{
			$txtt_days = __('user.day');
		}
        else
		{
			$txtt_days =__('user.days');
		}			
		?>
		<div>
		
		<div class="row">
		
		
		<div class="col-md-2">
		<?php if(!empty($userr_cnt)){
			
			$useid = $userr[0]->id;
			$check_shop = DB::table('shop')
							->where('user_id', '=', $useid)
							->count();

        if($userr[0]->admin==2)
		{
			if(!empty($check_shop))
			{
				//print_r("expression");exit();
			$pather = $url."/vendor/".$userr[0]->name;
			$class="";
			}
			else
			{
				$pather="#";
				$class="hideclass";
			}
		}
        else
		{
			$pather ="#";
			$class="";
		}
		
		
		?>
		<a href="<?php echo $pather;?>" class="<?php echo $class;?>">
	<?php 
	
	if(!empty($userr[0]->photo)){?>
				 <img src="<?php echo $url;?>/local/images/userphoto/<?php echo $userr[0]->photo;?>" width="90" class="round">
				 <?php } else { ?>
				 <img src="<?php echo $url;?>/local/images/nophoto.jpg" alt="" width="90" class="round">
				 <?php }  ?>
				 </a>
		<?php } ?>
		</div>
		
		<div class="col-md-7">
		<div class="font22"><a href="<?php if(!empty($pather)) echo $pather; ?>" class="<?php if(!empty($class)) echo $class; ?>"><?php if(!empty($userr[0]->name)) echo $userr[0]->name;?></a></div>
		<p class="black ccount more" data-ccount="200"><?php echo nl2br($bid->desc_proposal);?></p>
		
		</div>
		
		
		<div class="col-md-3 text-center" style="margin-top:10px;">
		<div class="font16 black bold"><?php echo $bid->bid_price.' '.$site_setting[0]->site_currency;?></div>
		<p class="black"><?php if(!empty($fin_date)){ echo $fin_date; }?> <?php echo $txt_days;?></p>
		<p class="black"><strong><?php echo e(__('user.estimate')); ?></strong> : <?php if(!empty($bid->proposal_estimate)) {?><?php echo $bid->proposal_estimate;?> <?php echo $txtt_days;?> <?php } ?></p>
		<?php if($bid->award==1){?>
		<span class="btn award_apply"><?php echo e(__('user.awarded')); ?></span>
		<?php } 
		
		if(Auth::user()->id==$sql_request[0]->user_id)
	    {
		if($bid->award==0){

         if($sql_request[0]->request_status==1 or $sql_request[0]->request_status==2 ){ } else if($sql_request[0]->request_status==0){
		?>
		<a href="<?php echo $url;?>/request/<?php echo $userr[0]->id;?>/<?php echo $sql_request[0]->gid;?>/<?php echo $bid->prp_id;?>" class="btn award_apply" onclick="return confirm('Are you sure you want do this?');">Award</a>
		<?php } } } ?>
		</div>
		
		
		</div>
		
		<div class="height10"></div>
		
		<p class="ash_border"></p>
		
		
		</div>
		
	     <?php
		}
		?>
		</div>
		<div class="pagee"></div>
		 
		<?php  }
		  ?>
		  <div class="height30"></div>
		  <?php
		 
	  /*} */
	  
	  ?>
	  
	  
	  
	  
	  
	  <?php } ?>
	  
	  
    </div>
	
	
	
	<div class="col-md-4">
	
	<div class="sv_seller_sidebar"> 
	<?php if (Auth::guest()) {?>
	<a href="javascript:void(0);" class="btn bit_apply btn-large" onclick="alert('Login user only');"> <?php echo e(__('user.apply_for_job')); ?></a>
	
	<?php } else { ?>
	
    <?php if(Auth::user()->id!=$sql_request[0]->user_id){ 
	
	
	$award_check_cnt = DB::table('request_proposal')
		               ->where('gid','=',$sql_request[0]->gid)
				       ->where('award','=',1)
				       ->count();
	if(!empty($award_check_cnt))
	{
	$award_check = DB::table('request_proposal')
		               ->where('gid','=',$sql_request[0]->gid)
				       ->where('award','=',1)
				       ->get();
	
	if($award_check[0]->prop_user_id==Auth::user()->id){
	?> 
	
	<a href="<?php echo $url;?>/request/<?php echo $sql_request[0]->gid;?>/<?php echo $sql_request[0]->request_slug;?>" class="btn bit_apply btn-large"><?php echo e(__('user.awarded_you')); ?></a>
	
	<?php } else if($award_check[0]->prop_user_id!=Auth::user()->id) { ?>
	
	<a href="<?php echo $url;?>/request/<?php echo $sql_request[0]->gid;?>/<?php echo $sql_request[0]->request_slug;?>#goto" class="btn bit_apply btn-large"><?php echo e(__('user.awarded_other')); ?></a>
	
	
	<?php } ?>
	
	<?php } else { ?>
	
	<a href="<?php echo $url;?>/request/<?php echo $sql_request[0]->gid;?>/<?php echo $sql_request[0]->request_slug;?>#goto" class="btn bit_apply btn-large"><?php echo e(__('user.apply_for_job')); ?></a>
	<?php } ?>
	
	
	
	<?php } ?>
	
	
	<?php if(Auth::user()->id==$sql_request[0]->user_id){ 
	
	$award_check_cnt = DB::table('request_proposal')
		               ->where('gid','=',$sql_request[0]->gid)
				       ->where('award','=',1)
				       ->count();
	if(!empty($award_check_cnt)){
	?> 
	
	<a href="<?php echo $url;?>/request/<?php echo $sql_request[0]->gid;?>/<?php echo $sql_request[0]->request_slug;?>#gotonew" class="btn award_apply btn-large"><?php echo e(__('user.awarded')); ?></a>
	<?php } else {?>
	
	<a href="<?php echo $url;?>/request/<?php echo $sql_request[0]->gid;?>/<?php echo $sql_request[0]->request_slug;?>#gotonew" class="btn award_apply btn-large"><?php echo e(__('user.awarded')); ?></a>
	
	<?php } ?>
	
	
	
	<?php } ?>
	
	
	<?php } ?>
	
	
	
	
	<?php if(!empty($min_price_count) && !empty($max_price_count)){?>
	<div class="clearfix height30"></div>
	
	<div class="row">
	
	<div class="col-md-6 text-center">
	<strong class="font24"><?php echo $price_min;?> <?php echo $site_setting[0]->site_currency;?></strong><br/>
	<span class="font18"><?php echo e(__('user.min_bid_price')); ?></span>
	
	</div>
	
	
	<div class="col-md-6 text-center">
	<strong class="font24"><?php echo $price_max;?> <?php echo $site_setting[0]->site_currency;?></strong><br/>
	<span class="font18"><?php echo e(__('user.max_bid_price')); ?></span>
	</div>
	
	
	</div>
	
	<div class="clearfix ash_border height20"></div>
	
	<div class="row">
	<div class="col-md-12 text-center">
	<strong class="font24"><?php echo $total_bids;?></strong><br/>
	<span class="font18"><?php echo e(__('user.total_bids')); ?></span>
	</div>
	
	</div>
	<div class="clearfix ash_border height20"></div>
	
	<?php } ?>
	
	
	</div>
	
	
	
	</div>
	
</div><!-- /.row -->
	
		
	</div>
	
	
	   <?php } ?>
	
	
	
	
	
	
	</div>
	
	</div>
	
	
	
	</div>
	

      <div class="height100 clearfix"></div>
	   <div class="clearfix"></div>

	

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/project.blade.php ENDPATH**/ ?>