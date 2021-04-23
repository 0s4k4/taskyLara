<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");


?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->

	<div class="video">

	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>{{ __('user.job_freelancer') }}</h1></div>
	 </div>
	<div class="clearfix"></div>
	
	<div class="container">
	<div class="col-md-12  text-left">
	
	
		
		<div class="table-responsive service_style">
	
	  <table id="mytable" class="table table-striped table-bordered table-hover datatable">
                   
                   <thead>
                   <tr>
                   
                  <th>{{ __('user.reference_id') }}</th>
                    <th>{{ __('user.orders') }} </th>
                     <th>{{ __('user.order_date') }}</th>
                     <th>{{ __('user.expiry_date') }}</th>
                       <th>{{ __('user.status') }}</th>
					   </tr>
                   </thead>
    <tbody class="pagenavigation">
    
	<?php if(!empty($gig_available_cnt)){?>
	
	<?php foreach($gig_available as $giv){
		
		
		$gig_title_count = DB::table('gigs')
		           
				   ->where('gid','=',$giv->gid)
				  
				   
				   ->count();
		
		if(!empty($gig_title_count))
		{
		
		$gig_title = DB::table('gigs')
		           
				   ->where('gid','=',$giv->gid)
				  
				   
				   ->get();
		$complete_days = '+'.$gig_title[0]->complete_days.' '.'days';		   
	    $start_date = $giv->payment_date;
		$end_date = date($start_date, strtotime($complete_days));			   
				   
		$today = date("Y-m-d");	


$date = $start_date;
$date = strtotime($date);
$new_date = strtotime($complete_days , $date);
$end_last = date('Y-m-d', $new_date);		
		if($giv->payment_level==1 or $giv->payment_level==0)
		{
			if($today >= $end_last)
			{
				$btn_cls="btn btn-danger";
			    $status_payment =  __('user.late_delivery') ;
			}
			else
			{
			$btn_cls="btn btn-warning";
			$status_payment = __('user.processing') ;
			}
		}
		if($giv->payment_level==4)
		{
			$btn_cls="btn btn-danger";
			$status_payment = __('user.cancelled');
		}
		if($giv->payment_level==2)
		{
			$btn_cls="btn btn-success";
			$status_payment = __('user.completed');
		}
		
		
		if($giv->payment_level==3)
		{
			$btn_cls="btn btn-success";
			$status_payment = __('user.delivered');
		}
		if($giv->payment_level==5)
		{
			$btn_cls="btn btn-success";
			$status_payment = __('user.closed');
		}
		
		
		 
		if($gig_title[0]->job_type=="custom"){ 
		if(Auth::user()->id==$giv->user_id){
		
		
		$temp_url = $url.'/customorder/'.$giv->gid;
		$style_css = "";
        }
		else
		{
			$temp_url = "";
			$style_css = "pointer-events: none; cursor: default; color:#000;";
		}


		}
		else { 
		
		
		
		if($gig_title[0]->job_type=="request")
		{
			$temp_url = "";
			$style_css = "pointer-events: none;cursor: default; color:#000;";
		}
		else
		{
		
		$temp_url = $url.'/service/'.$giv->gid;
		$style_css = "";
		}
		
		} 
		
		if($gig_title[0]->job_type=="request")
		{
		
		
		?>
    <tr>
	<td align="center">
	<?php if($giv->payment_level!=5){?>
	<a href="<?php echo $url;?>/seller_track/<?php echo $giv->id;?>">
	<?php } ?>
	
	#<?php echo $giv->reference_id;?>
	<?php if($giv->payment_level!=5){?>
	</a>
	<?php } ?>
	</td>
	<td align="center">
	<?php if($giv->payment_level!=5){
		
		?>
	<a href="<?php echo $temp_url;?>" style="<?php echo $style_css;?>">
	<?php }  ?>
	<?php echo $gig_title[0]->subject;?>
	<?php if($giv->payment_level!=5){ ?>
	</a>
	<?php }  ?>
	</td>
	<td align="center"><?php echo $giv->payment_date;?></td>
	<td align="center"><?php echo $end_last;?></td>
	<td align="center"><input type="button" name="status" value="<?php echo $status_payment;?>" class="<?php echo $btn_cls;?>" style="cursor:default;">
	
	
	<a href="<?php echo $url;?>/seller_track/<?php echo $giv->id;?>" class="btn btn-success">{{ __('user.track_request') }}</a>
	
	</td>
	</tr>
	<?php } ?>	
	
	<?php } ?>
	<?php } } ?>
	

	
	</body>
	
	
	</table>
	
	
	</div>
	
	
	</div>
	
	<div class="height20 clearfix"></div>
	<div>{{ __('user.note_funded_projects_display') }}</div>
	
	<?php /* ?><div class="col-md-3">
	@include('side_menu')
	
	</div><?php */?>
	
	
	
	</div>
	
	</div>
	
	
	
	
	<div class="height50 clearfix"></div>
	
	
<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
       
    });
});
</script>
	

      @include('footer')
</body>
</html>