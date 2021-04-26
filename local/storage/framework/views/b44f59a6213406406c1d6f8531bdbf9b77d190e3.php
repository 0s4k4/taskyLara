<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");


?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	


</head>
<body>

    

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->

	<div class="video">

	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.my_posted_job')); ?></h1></div>
	 </div>
	<div class="container">
	<div class="height30"></div>
	 
	
	
	
	
	
	<div class="col-md-12 ashborder service_style">
	
	<div class="table-responsive">
	
	  <table id="mytable" class="table table-striped table-bordered table-hover datatable">
                   
                   <thead>
                   <tr>
                   <th> <?php echo e(__('user.date')); ?></th>
                    <th><?php echo e(__('user.job_name')); ?></th>
                     
                     <th><?php echo e(__('user.delivery')); ?></th>
                      
                       <th><?php echo e(__('user.estimated')); ?></th>
					   <th><?php echo e(__('user.action')); ?></th>
					   
					   <th><?php echo e(__('user.feature_job_c')); ?> </th>
					   
					   <th><?php echo e(__('user.message_freelancer')); ?> </th>
					   
					   <th><?php echo e(__('user.fund_status')); ?></th>
					   </tr>
                   </thead>
            <tbody class="pagenavigation">
			
			
			<?php foreach($sql_request as $request){
				
				$userlog = DB::table('users')
                ->where('id', '=', $request->user_id)
                ->get();
				
				
				$offer_count = DB::table('request_proposal')
                ->where('gid', '=', $request->gid)
                ->count();
				
				
				$req_proposal_count = DB::table('request_proposal')
						->where('gid', '=', $request->gid)
						->where('req_user_id','=',Auth::user()->id)
						->where('award','=',1)
						->count();
				
				if(!empty($req_proposal_count))
				{
				$req_proposal_count = DB::table('request_proposal')
						->where('gid', '=', $request->gid)
						->where('req_user_id','=',Auth::user()->id)
						->where('award','=',1)
						->get();
				$bidding_price = $req_proposal_count[0]->bid_price;	
                  $bider_user = $req_proposal_count[0]->prop_user_id;				
				}
				else
				{
					$bidding_price = 0;
					$bider_user = "";
				}
				?>
				
				<?php if($request->budget_type=="fixed"){ 
						   $bud_txt = "Fixed Price"; 
						     if($request->fixed_price=="custom_budget")
							 {
								$estim = 'Custom Budget ('.$request->minimum_budget.' - '.$request->maximum_budget.' '.$site_setting[0]->site_currency.')';
							 }
							 else
							 {
								 $estim = $request->fixed_price;
							 }
						   } 
						   else if($request->budget_type=="hour"){ 
						   $bud_txt = "Hourly Price"; 
						   
						   if($request->hour_price=="custom_budget")
							 {
								$estim = $request->minimum_budget.' - '.$request->maximum_budget;
							 }
							 else
							 {
								 $estim = $request->hour_price;
							 }
						   
						   
						   } ?>
				
			<tr>
			<td><?php echo $request->submit_date;?></td>
			
			<td><a href="<?php echo $url;?>/request/<?php echo $request->gid;?>/<?php echo $request->request_slug;?>"><?php echo $request->subject;?></a></td>
			
			<td><?php echo $request->complete_days;?> days</td>
	        <td><?php echo $estim;?></td>
			<td>
			
			<a <?php if(!empty($offer_count)){?>href="<?php echo $url;?>/request/<?php echo $request->gid;?>/<?php echo $request->request_slug;?>"<?php } else{?>href="javascript:void(0);"<?php } ?> class="btn btn-success sv_track_btn">
			<?php echo $offer_count;?> <?php echo e(__('user.bids')); ?>

			</a>
			
			<?php if($request->request_status==0){?>
			<a href="<?php echo $url;?>/my_request/delete/<?php echo $request->gid;?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><?php echo e(__('user.delete')); ?></a>
			<?php } ?>
			
			</td>
			
			<td>
			
			<?php if($request->featured==2 && $request->status==1){?>
	<span class="btn btn-warning" style="cursor:default; border-radius:none;"><?php echo e(__('user.featured_progress')); ?></a>
	<?php } else if($request->featured==1 && $request->status==1){ ?>
	<span class="btn btn-success" style="cursor:default; border-radius:none;"><?php echo e(__('user.featured_c')); ?></a>
	<?php } else if($request->featured==0 && $request->status==1){?>
	
	<a href="<?php echo $url;?>/feature/<?php echo $request->gid;?>" class="btn btn-primary"><?php echo e(__('user.make_feature')); ?></a></td>
    <?php } else { ?>
	<?php } ?>
			</td>
			
			<td>
			<?php if($request->request_status!=0){?>
			<a href="<?php echo $url;?>/chat/<?php echo $bider_user;?>" class="btn btn-success">
			<?php echo e(__('user.message')); ?>

			</a>
			<?php } else if($request->request_status==0){ ?>
			<?php echo e(__('user.not_available')); ?>

			<?php } ?>
			</td>
			
			
			<td>
			<?php if(!empty($request->request_status)){?>
			<?php if($request->request_status==1){?>
			<a href="<?php echo $url;?>/pay_request/<?php echo $request->gid;?>" class="btn btn-success">
			<?php echo e(__('user.fund_now')); ?>

			</a>
			<?php } ?>
			
			<?php if($request->request_status==2){
				
				$fin_amt = $bidding_price;
				?>
			
			<span >funded <?php echo $fin_amt;?> <?php echo $site_setting[0]->site_currency;?> </span>
			
			<?php } ?>
			<?php } else { ?>
			<?php echo e(__('user.not_available')); ?>

			<?php } ?>
			</td>
			
			</tr>
			<?php } ?>
			</tbody>
			
		</table>
    </div>		
	<div class="pagee"></div>
	
	</div>
	
	<?php /* ?><div class="col-md-3">
	@include('side_menu')
	
	</div><?php */?>
	
	
	</div>
	</div>
	
	
	<div class="height100"></div>

      <div class="clearfix"></div>
	   <div class="clearfix"></div>
    
	<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
       
    });
});
</script>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/my_request.blade.php ENDPATH**/ ?>