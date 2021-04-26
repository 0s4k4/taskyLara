<!DOCTYPE html>
<html lang="es">
<head>

    

   @include('style')
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    
	
	
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>{{ __('user.booking_details') }}</h1></div>
	 </div>
	
	<div class="container">
	<div class="clearfix"></div>
	
	
	

	<div class="col-md-6">
		<h4><?php echo $shop[0]->shop_name;?></h4>
		
				
			<p><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ __('user.booking_date') }}- <?php echo $booking[0]->booking_date; ?></p>
			<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ __('user.booking_time') }} - <?php echo $final_time; ?></p>
		
	</div>
	
	
	<div class="col-md-6 service_style">
	
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>{{ __('user.selected_services') }}</th>
					<th>{{ __('user.price') }}</th>
					 <th>{{ __('user.service_charge') }}</th>
					 <th>{{ __('user.tax') }}</th>
                </tr>
            </thead>
			<tbody>			
			<tr>
			
				<td><?php echo $ser_name;?></td>
				<td><?php echo $price; ?></td>
				<?php if($commission_mode=="percentage"){ $symbol = "%"; } else if($commission_mode == "fixed") { $symbol = ' '.$currency; }?>
				<td> 
				<?php echo $commission_amt.$symbol; ?> 
				</td>
				
				<td><?php echo $taxer.'%'; ?></td>
<?php //echo $tax_price;?>
<?php //echo $get_tax;


$total_sum = $sum + $get_tax; 

?>
			</tr>
			<td class="total-charge" colspan="1">{{ __('user.total_charges_c') }}</td><td class="total-charge"><?php echo $total_sum;?>&nbsp;<?php echo $currency;?></td>
			</tbody>
															
            </table>
			
	</div>
	
	</div>
	<?php /*$enc = Crypt::encryptString($sum);
	$decrypted = Crypt::decryptString($enc);
	
	$admin_enc = Crypt::encryptString($admin_email);*/
	// echo $enc;
	?>
	<form class="" name="admin_s" id="formID" method="post" enctype="multipart/form-data" action="{{ route('booking_info') }}">
	{!! csrf_field() !!}
	<div class="container">
<div class="col-md-8"></div>

<div class="col-md-4">
<input type="hidden" name="price" value="<?php echo $total_sum;?>">

<input type="hidden" name="admin_amt" value="<?php echo $admin_amt;?>">

<input type="hidden" name="tax_amt" value="<?php echo $get_tax;?>">

<input type="hidden" name="service_amt" value="<?php echo $tax_price;?>">

<input type="hidden" name="currency" value="<?php echo $currency;?>">


<input type="hidden" name="admin_email" value="<?php echo $adminemail;?>">

<input type="hidden" name="user_email" value="<?php echo $useremail;?>">

<input type="hidden" name="usernamer" value="<?php echo $usernamer;?>">

<input type="hidden" name="userphone" value="<?php echo $userphone;?>">


<input type="hidden" name="seller_email" value="<?php echo $selleremail;?>">

<input type="hidden" name="service_name" value="<?php echo $ser_name;?>">

<input type="hidden" name="booking_date" value="<?php echo $booking[0]->booking_date;?>">


<button type="submit" value="PROCEED TO CHECKOUT" class="booknow right">{{ __('user.proceed_checkout_c') }}</button>


</div>
</div>
	</form>
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>