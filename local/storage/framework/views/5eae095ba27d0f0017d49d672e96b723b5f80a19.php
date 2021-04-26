<!DOCTYPE html>
<html lang="en">
<head>

    

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	

<script type="text/javascript">

function withdraw_check(str)
{	

        document.getElementById("bank_info").style.display="none";
		document.getElementById("paypal").style.display="none";
		document.getElementById("stripe").style.display="none";
		document.getElementById("payumoney").style.display="none";
	if(str=="paypal")
	{	
		document.getElementById("bank_info").style.display="none";
		document.getElementById("paypal").style.display="block";
		document.getElementById("stripe").style.display="none";
		document.getElementById("payumoney").style.display="none";
	}
	else if(str=="bank")
	{
		document.getElementById("paypal").style.display="none";
		document.getElementById("bank_info").style.display="block";
		document.getElementById("stripe").style.display="none";
		document.getElementById("payumoney").style.display="none";
	}
	else if(str=="stripe")
	{
		document.getElementById("paypal").style.display="none";
		document.getElementById("bank_info").style.display="none";
		document.getElementById("stripe").style.display="block";
		document.getElementById("payumoney").style.display="none";
	}
	else if(str=="payumoney")
	{
		document.getElementById("paypal").style.display="none";
		document.getElementById("bank_info").style.display="none";
		document.getElementById("stripe").style.display="none";
		document.getElementById("payumoney").style.display="block";
	}
	
}
</script>


</head>
<body>

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->

	<div class="video">

	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.wallet')); ?></h1></div>
	 </div>
	
	<div class="container">

	 <div class="height30"></div>

	 
	 <?php if($check_count != 0 && $check_count > 0){
		 
		 ?>
		 
	 <div class="row">
	

	<form class="form-large" action="<?php echo e(route('wallet')); ?>" accept-charset="UTF-8" id="formID" method="post">
<?php echo e(csrf_field()); ?>

<div class="container">

	<div class="text-center withdraw_amt">		
		<span class="lnr lnr-tag"></span> <label>&nbsp;<?php echo e(__('user.minimum_withdraw_amt')); ?></label><span>&nbsp;<?php echo $setting[0]->withdraw_amt;?> <?php echo $setting[0]->site_currency;?>	</span>			
	</div>
     <br/>
	<div class="col-md-12">
	
	<input type="hidden" name="min_with_amt" value="<?php echo $setting[0]->withdraw_amt;?>">
				
		<div class="col-sm-2">
			<div class="form-group">
				<label><?php echo e(__('user.shop_balance')); ?></label> [ <?php echo $setting[0]->site_currency;?> ]
				<?php 
				
								
				
				?>
				<?php 
				/*if($with_count!=0) {
					$amt = $shop_balance;
					
				
				}
				if($with_count==0)
				{
					$amt = $bal;
					
				}*/
				
				?>
				<input type="text" class="form-control" id="shop_balance" name="shop_balance" readonly value="<?php echo $wallet_up_amount; ?>">
				
			</div>
		</div>
		
		<div class="col-sm-2">
			<div class="form-group">
				<label><?php echo e(__('user.withdraw_amount')); ?></label>
				<input type="text" class="form-control validate[required] text-input" id="withdraw_amt" name="withdraw_amt">	
			</div>
		</div>
		
		<div class="col-sm-4">
			<div class="form-group">
				<label><?php echo e(__('user.withdraw_option')); ?></label>
					<select id="withdraw_mode" name="withdraw_mode" class="form-control validate[required]" onchange="javascript:withdraw_check(this.value);">
					<option value=""><?php echo e(__('user.select')); ?></option>
						<?php 
						
						foreach($setting as $row)
						{
							$catid=$row->withdraw_option;
							$sel= explode(",",$catid); 
							$lev= count($sel);
							for($i=0;$i<$lev;$i++)
							{
								 $ad_cat= $sel[$i];
							
						?>
						<option value="<?php echo $ad_cat; ?>" ><?php echo $ad_cat; ?></option>
						<?php 
						} }
						?> 
					</select>
					
			</div>
		</div>
		
		<div class="col-sm-4" id="paypal" style="display:none;">
			<div class="form-group">
				<label><?php echo e(__('user.enter_paypal_id')); ?></label>
				
					<input type="text" class="form-control validate[required] text-input" id="paypal_id" name="paypal_id">	
					
			</div>
		</div>
		
		
		<div class="col-sm-4" id="stripe" style="display:none;">
			<div class="form-group">
				<label><?php echo e(__('user.enter_stripe_email_id')); ?></label>
				
					<input type="text" class="form-control validate[required] text-input" id="stripe_id" name="stripe_id">	
					
			</div>
		</div>
		
		
		<div class="col-sm-4" id="payumoney" style="display:none;">
			<div class="form-group">
				<label><?php echo e(__('user.enter_payumoney_email_id')); ?></label>
				
					<input type="text" class="form-control validate[required] text-input" id="payumoney" name="payumoney">	
					
			</div>
		</div>
		
		
		
		<div class="col-sm-4" id="bank_info" <?php if($setting[0]->withdraw_option=="bank"){ } else {?>style="display:none;"<?php } ?>>
			<div class="form-group">
				<label><?php echo e(__('user.bank_account_no')); ?></label>
					<input type="text" class="form-control validate[required] text-input" id="bank_acc_no" name="bank_acc_no">
					<br/>				
					
					<label><?php echo e(__('user.bank_name_address')); ?></label>
					<input type="text" class="form-control validate[required] text-input" id="bank_name" name="bank_name">
									<br/>
					
					<label><?php echo e(__('user.ifsc_code')); ?> </label>
					<input type="text" class="form-control validate[required] text-input" id="ifsc_code" name="ifsc_code">	
										

			</div>
		</div>
		

	</div>
	<div class="row clearfix" style="">
	<div class="" align="center">
	<?php if(config('global.demosite')=="yes"){?><button type="button" class="form-control services-btn radiusoff btndisable"><?php echo e(__('user.save')); ?></button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
	
	
			<input type="submit" class="form-control services-btn radiusoff" name="save" value="<?php echo e(__('user.save')); ?>">
								<?php } ?>
	</div>
	</div>


</div>
</form>
	
	

	
	</div>
	
	 <?php } ?>
	
	
	
	<?php 
	 
	 
	 if($check_count == 0 or $check_count < 0){?>
	 <div class="err-msg" align="center"><?php echo e(__('user.your_balance')); ?> <?php echo $check_count;?> <?php echo $setting[0]->site_currency;?></div>
	
	 <?php } ?>
	
	
	<div class="clearfix"></div>
	<div class="container">
			<div id="page-inner"> 
                  <div class="row">
                
				
				<?php if(Auth::user()->admin==2){?>
				<div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo e(__('user.upcoming_payments')); ?> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th><?php echo e(__('user.sno')); ?></th>
											<th><?php echo e(__('user.customer_name')); ?></th>
											<th><?php echo e(__('user.booking_id')); ?></th>
											<th><?php echo e(__('user.booking_date')); ?></th>
											<th><?php echo e(__('user.amount')); ?></th>
											<th><?php echo e(__('user.payment_status')); ?></th>								
                                        </tr>
                                    </thead>
									<tbody>
									
                                    <?php 
									$vendor_id = Auth::user()->id;
									$userwives = DB::table('shop')
              
											   ->where('user_id', '=', $vendor_id)
								   
											   ->get();
											   
											   
									$booking_count = DB::table('booking')
              
												   ->where('shop_id', '=', $userwives[0]->id)
												   ->where('status', '=', 'paid')
												   ->where('service_complete', '!=', 2)
												   ->where('reject','=','')
												   ->count();		   
											   
									if(!empty($booking_count))
									{										
									$booking_well = DB::table('booking')
              
												   ->where('shop_id', '=', $userwives[0]->id)
												   ->where('status', '=', 'paid')
												   ->where('service_complete', '!=', 2)
												   ->where('reject','=','')
												   ->get();	
                                    $i=1;												   
									foreach($booking_well as $booking)
									{

                                    $customer = DB::table('users')
              
											   ->where('id', '=', $booking->user_id)
								   
											   ->get();	
$vendor_amount = $booking->total_amt - $booking->admin_commission;											   
									?>

  									
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $customer[0]->name;?></td>
											<td><?php echo $booking->book_id;?></td>	
											<td><?php echo $booking->booking_date;?></td>
											<td><?php echo $vendor_amount;?>&nbsp;<?php echo $setting[0]->site_currency; ?></td>
											<td><?php if($booking->service_complete==0){ ?>awaiting completion<?php } ?>
											<?php if($booking->service_complete==1){ ?>awaiting for release<?php } ?>
											</td>
																						
											
										</tr>
									<?php $i++; } } ?>	
									</tbody>
															
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
				<?php } ?>
				
				
            </div>
                <!-- /. ROW  -->
            </div>
		</div>

	<?php 
	
	
	if(!empty($with_count)) {?>
	<div class="clearfix"></div>
	
	<div class="container">
			<div id="page-inner"> 
                  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo e(__('user.pending_withdrawal')); ?>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th><?php echo e(__('user.sno')); ?></th>
											<th><?php echo e(__('user.withdraw_amount')); ?></th>
											<th><?php echo e(__('user.withdraw_mode')); ?></th>
											<th><?php echo e(__('user.paypal_id')); ?></th>
											<th><?php echo e(__('user.stripe_id')); ?></th>
											<th><?php echo e(__('user.payumoney_id')); ?></th>
											<th><?php echo e(__('user.bank_account_no')); ?></th>
											<th><?php echo e(__('user.bank_info')); ?></th>
											<th><?php echo e(__('user.ifsc_code')); ?></th>
											<th><?php echo e(__('user.status')); ?></th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
									
									$w_count_one = DB::table('withdraw')
												  ->where('user_id', '=', Auth::user()->id)
												  ->where('withdraw_status', '=', 'pending')
												  ->orderBy('wid','desc')
												   ->count();
									if(!empty($w_count_one))
									{
									$withdraws = DB::table('withdraw')
												  ->where('user_id', '=', Auth::user()->id)
												  ->where('withdraw_status', '=', 'pending')
												  ->orderBy('wid','desc')
												   ->get();
									
										$sno=0;
										
										foreach($withdraws as $row)
										{
											$sno++;
											
											
											
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $row->withdraw_amt;?>&nbsp;<?php echo $setting[0]->site_currency; ?></td>
											<td><?php echo $row->withdraw_mode;?></td>	
											<td><?php echo $row->paypal_id;?></td>
											<td><?php echo $row->stripe_id;?></td>
											<td><?php echo $row->payumoney;?></td>
											<td><?php echo $row->bank_acc_no;?></td>		
											<td><?php echo $row->bank_info;?></td>
											<td><?php echo $row->ifsc_code;?></td>	
											<td><?php echo $row->withdraw_status;?></td>											
											
										</tr>
									<?php } } ?>		
									</tbody>
															
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            </div>
		</div>
		
		
		<div class="clearfix"></div>
		
		
		<div class="container">
			<div id="page-inner"> 
                  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <?php echo e(__('user.completed_withdrawal')); ?>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										    <th><?php echo e(__('user.sno')); ?></th>
                                            <th><?php echo e(__('user.withdraw_amount')); ?></th>
											<th><?php echo e(__('user.withdraw_mode')); ?></th>
											<th><?php echo e(__('user.paypal_id')); ?></th>
											<th><?php echo e(__('user.stripe_id')); ?></th>
											<th><?php echo e(__('user.payumoney_id')); ?></th>
											<th><?php echo e(__('user.bank_account_no')); ?></th>
											<th><?php echo e(__('user.bank_info')); ?></th>
											<th><?php echo e(__('user.ifsc_code')); ?></th>
											<th><?php echo e(__('user.status')); ?></th>
                                        </tr>
                                    </thead>
									<tbody>
											<?php
										$w_count_two = DB::table('withdraw')
													  ->where('user_id', '=', Auth::user()->id)
													  ->where('withdraw_status', '=', 'completed')
													  ->orderBy('wid','desc')
													   ->count();	
										if(!empty($w_count_two))
										{											
										$withdraws_cc = DB::table('withdraw')
													  ->where('user_id', '=', Auth::user()->id)
													  ->where('withdraw_status', '=', 'completed')
													  ->orderBy('wid','desc')
													   ->get();	
											
										$sno=0;
										
										foreach($withdraws_cc as $row)
										{
											$sno++;
											
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $row->withdraw_amt;?>&nbsp;<?php echo $setting[0]->site_currency; ?></td>
											<td><?php echo $row->withdraw_mode;?></td>	
											<td><?php echo $row->paypal_id;?></td>
											<td><?php echo $row->stripe_id;?></td>
											<td><?php echo $row->payumoney;?></td>											
											<td><?php echo $row->bank_acc_no;?></td>		
											<td><?php echo $row->bank_info;?></td>
											<td><?php echo $row->ifsc_code;?></td>	
										</tr>
										<?php } } ?>		
									</tbody>
															
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
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
<?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/wallet.blade.php ENDPATH**/ ?>