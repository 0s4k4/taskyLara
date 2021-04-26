<?php
/*if (Auth::check())
{
	
}
else
{
	//redirect()->route('login');
	
	echo Redirect::to('login');
}*/
?>   
<!DOCTYPE html>
<html lang="es">
<head>

    

   @include('style')
	


</head>
<body>
<?php $url = URL::to("/"); ?>
    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    
			
	<div class="video">
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>{{ __('user.my_orders') }}</h1></div>
	 </div>
	
	 <div class="height30"></div>
	
	
	<?php 
	
	if(empty($count)){?>
	 <div class="err-msg" align="center">{{ __('user.no_order_found') }}</div>
	<?php }  else { ?>
	<div class="col-md-12 service_style">
	 <div class="table-responsive">
	  <table class="table table-striped table-bordered table-hover datatable" data-page-length='5'>
            <thead>
                <tr>
                   <th>{{ __('user.order_id') }}</th>
					<!--<th>Shop Name</th>-->
					 <th>{{ __('user.services_name') }}</th>
					 <th>{{ __('user.booking_date') }}</th>
					 <th>{{ __('user.booking_time') }}</th>
					 <th>{{ __('user.booking_note') }}</th>					 
					 <th>{{ __('user.username') }}</th>
					 <th>{{ __('user.user_email') }}</th>
					 <th>{{ __('user.phone_no') }}</th>
					 <th>{{ __('user.total_amount') }}</th>
					 <th>{{ __('user.status') }}</th>
					 <th>{{ __('user.reject') }}</th>
					 <th>{{ __('user.service_complete') }}</th>	
					 
					 <?php /* ?><th>Action</th><?php */?>
					 
                </tr>
            </thead>
			<tbody>	
           
	       <?php 
					  $sno=0;
					  foreach ($booking as $viewbook) {
						  $sno++;
					$booking_time=$viewbook->booking_time;
							if($booking_time>12)
							{
								$final_time=$booking_time-12;
								$final_time=$final_time."PM";
							}
							else
							{
								$final_time=$booking_time."AM";
							}

   
					$ser_id=$viewbook->services_id;
			$sel=explode("," , $ser_id);
			$lev=count($sel);
			$ser_name="";
			$sum="";
			$price="";		
		for($i=0;$i<$lev;$i++)
			{
				$id=$sel[$i];	
                
				
				
				$fet1 = DB::table('subservices')
								 ->where('subid', '=', $id)
								 ->get();
				$ser_name.=$fet1[0]->subname.'<br>';
				$ser_name.=",";				 
				
				
				
				$ser_name=trim($ser_name,",");
				
			}		
			
			$bookid= $viewbook->book_id;
			$newbook = DB::table('booking')
								 ->where('book_id', '=', $bookid)
								 ->get();
					

                $userdetail_count = DB::table('users')
                ->where('id', '=', $newbook[0]->user_id)
                ->count();
				
				if(!empty($userdetail_count))
				{
					
				$userdetail = DB::table('users')
                ->where('id', '=', $newbook[0]->user_id)
                ->get(); 
				$userphoner = $userdetail[0]->phone;
                $usernamer = $userdetail[0]->name;
                }
                else
                {
					$userphoner = "";
					$usernamer = "";
				}	


                $bb_time = $newbook[0]->booking_time;
                $booking_date_time = $newbook[0]->booking_date.' '.$bb_time.':00:00';				
                $current_date_time = date('Y-m-d H:i:s');
				
				
				$source = strtotime($current_date_time);
				$destination = strtotime($booking_date_time);
					  ?>
    		
			<tr>
				<td><?php echo $viewbook->book_id; ?></td>
				<?php /* ?><td><?php echo $viewbook->shop_name;?></td><?php */?>
				<td><?php echo $ser_name;?></td>
				<td><?php echo $viewbook->booking_date;?></td>
				<td><?php echo $final_time;?></td>
				
				<td><?php echo $viewbook->booking_note;?></td>
				<td>
				<?php echo $usernamer;?><br/>
				<a href="<?php echo $url;?>/send-message/<?php echo Auth::user()->id;?>/<?php echo $newbook[0]->user_id;?>" class="send_message">{{ __('user.send_message') }}</a>
				</td>
				<td><?php echo $viewbook->user_email;?></td>
				<td><?php echo $userphoner;?></td>
				<td><?php echo $viewbook->total_amt.' '.$setting[0]->site_currency;?></td>
				<?php if($newbook[0]->status=="pending"){ $color="#F31C0A"; } else if($newbook[0]->status=="paid")  { $color="#0DE50D"; }
				else if($newbook[0]->status=="failed")  { $color="#FB8C00"; } else { $color="#F31C0A"; }
				?> 
			    <td style="color:<?php echo $color;?>;"><?php echo $newbook[0]->status;?></td>
				
				<td align="center"><?php if($newbook[0]->status=="paid" && $viewbook->service_complete==0){
					
					
					?>
				<?php if($source < $destination){?>
				
				<a href="<?php echo $url;?>/myorder/reject/<?php echo base64_encode($bookid);?>" onclick="return confirm('Are you sure you want to do this?');">{{ __('user.reject') }}</a>
				
				<?php }  ?>
				<?php }  ?>
				<?php if(!empty($newbook[0]->reject)){?><?php echo $newbook[0]->reject;?><?php } else { if($viewbook->service_complete!=0){ echo '-'; } } ?>
				</td>
				 
                <td align="center"><?php if(empty($newbook[0]->reject)){?><?php if($viewbook->service_complete==0){?><a href="<?php echo $url;?>/myorder/service/<?php echo base64_encode($bookid);?>/1" class="btn btn-primary">{{ __('user.mark_complete') }}</a><?php } ?><?php if($viewbook->service_complete==1){?>{{ __('user.completed') }}<?php } ?>
				<?php if($viewbook->service_complete==2){?>{{ __('user.released_payment') }}<?php } ?><?php } else { echo '-'; } ?></td>
			</tr>
			 <?php } ?>
			 
			</tbody>
															
            </table>
			</div>
	</div>
	<?php } ?> 
	
	
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>


<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
       
    });
});
</script>


