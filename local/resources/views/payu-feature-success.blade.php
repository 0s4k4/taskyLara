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

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix sv_mob_clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix sv_mob_clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>PAYMENT SUCCESS</h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	
	
	<div class="container text-center">
	
	
	
	<h2>Your Payumoney transaction has been transferred</h2>
    
	<h2>Your Payment ID - <?php echo $txnid; ?>.</h2>
	
	</div>
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>