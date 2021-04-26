<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");


?>
<!DOCTYPE html>
<html lang="es">
<head>

    

   @include('style')
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    
	
	<div class="video">

	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>{{ __('user.my_applied_job') }}</h1></div>
	 </div>
	<div class="height30"></div>
	 
	
	
	
	<div class="col-md-12 ashborder service_style">
	
	<div class="table-responsive">
	
	  <table id="mytable" class="table table-striped table-bordered table-hover datatable">
                   
                   <thead>
                   <tr>
                   
                 <th>{{ __('user.bidding_date') }}</th>
                    <th>{{ __('user.job_name') }}</th>
                     <th>{{ __('user.bidding_amount') }}</th>
                       <th>{{ __('user.estimated_time_complete_c') }}</th>
					   <th>{{ __('user.message_client') }}</th>
					   <th>{{ __('user.award_status') }}</th>
					   <th>{{ __('user.client_fund_status') }}</th>
					   
					   </tr>
                   </thead>
            <tbody class="pagenavigation">
			
			
			<?php 
			
			$logged = Auth::user()->id;
			
			$sql_request = DB::table('request_proposal')
		        
				->where('prop_user_id','=',$logged)
                ->get();
				
		    $sql_request_count = DB::table('request_proposal')
		        
				->where('prop_user_id','=',$logged)
                
                ->count();
				
				if(!empty($sql_request_count))
				{
			
			foreach($sql_request as $request){
				
				
				$sql_request = DB::table('gigs')
		        ->where('status','=',1)
				->where('gid','=',$request->gid)
                ->orderBy('gid','desc')
                ->get();
				
				$sql_request_count = DB::table('gigs')
		        ->where('status','=',1)
				->where('gid','=',$request->gid)
                ->orderBy('gid','desc')
                ->count();
				
				if(!empty($sql_request_count))
				{
				
				
				
				
				
				
				?>
				
				<?php if($sql_request[0]->budget_type=="fixed"){ 
						   $bud_txt =__('user.fixed_price'); 
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
						   $bud_txt =  __('user.hourly_price'); 
						   
						   if($sql_request[0]->hour_price=="custom_budget")
							 {
								$estim = $sql_request[0]->minimum_budget.' - '.$sql_request[0]->maximum_budget;
							 }
							 else
							 {
								 $estim = $sql_request[0]->hour_price;
							 }
						   
						   
						   } 
						   
						   
						   if($request->proposal_estimate==0 or $request->proposal_estimate==1)
						   {
							   $tday =  __('user.day');
						   }
						   else
						   {
							     $tday =  __('user.days');
						   }
						   
						   
						   
						   ?>
				
			<tr>
			<td align="center"><?php echo $sql_request[0]->submit_date;?></td>
			
			<td align="center"><a href="<?php echo $url;?>/request/<?php echo $sql_request[0]->gid;?>/<?php echo $sql_request[0]->request_slug;?>"><?php echo $sql_request[0]->subject;?></a></td>
			
			<?php /* ?><td><?php echo $sql_request[0]->complete_days;?> days</td><?php */?>
			
			<td align="center"><?php echo $request->bid_price;?> <?php echo $site_setting[0]->site_currency;?></td>
	        <td align="center"><?php if(!empty($request->proposal_estimate)){?> <?php echo $request->proposal_estimate;?> <?php echo $tday;?><?php } else { ?> - <?php } ?><?php //echo $estim;?></td>
			
			<td align="center">
			<?php if($request->award==1){
				
				
				
				?>
			<a href="<?php echo $url;?>/chat/<?php echo $sql_request[0]->user_id;?>" class="btn btn-success">
			{{ __('user.message') }}
			</a> 
			<?php } else { ?>
			{{ __('user.not_available') }}
			<?php } ?>
			</td>
			
			<td align="center">
			<?php 
				
				
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
				
				if($award_check[0]->prop_user_id==Auth::user()->id)
			   {
			?>	   
			<span>{{ __('user.job_awarded_you') }}</span>
			   <?php } else if($award_check[0]->prop_user_id!=Auth::user()->id) { ?>	
			<span>{{ __('user.awarded_other') }}</span>
			   <?php } ?>
			
			<?php } else { ?>
			<span>{{ __('user.not_yet_awarded') }}</span>
			<?php } ?>
			</td>
			
			
			<td align="center">
			<?php 
			if($request->award==1){
			
			if($sql_request[0]->request_status==2){
				
				$fin_amt = $request->bid_price;
				?>
			
			<span style="color:#5CB85C; font-weight:bold;">funded <?php echo $fin_amt;?> <?php echo $site_setting[0]->site_currency;?> </span>
			
			<?php } } else { ?>
			{{ __('user.not_available') }}
			<?php } ?>
			</td>
			
			
			<?php /* ?>
			<td>
			
			
			
			
			<a href="<?php echo $url;?>/my_request/delete/<?php echo $sql_request[0]->rid;?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
			</td><?php */?>
			</tr>
				<?php } } }  ?>
			</tbody>
			
		</table>
    </div>		
	
	
	</div>

	
	</div>
	
	
	<div class="height100"></div>

      <div class="clearfix"></div>
	<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
       
    });
});
</script>
	

      @include('footer')
</body>
</html>