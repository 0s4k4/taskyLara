<!DOCTYPE html>
<html lang="es">
<head>


   @include('style')
	


</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
	<div class="clearfix"></div>
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>{{ __('user.page_not_found') }}</h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12" align="center" style="font-size:20px;">
	{{ __('user.requested_page_was_not_found') }}
	
	</div>
	
	
	</div>
	
	</div>
	</div>
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>