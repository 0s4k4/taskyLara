<!DOCTYPE html>
<html lang="es">
<head>

   @include('style')
	
   <style type="text/css">
		.our-address{
			font-size: 22px
		}
	</style>

</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    
	
	<div class="video">
		<div class="headerbg">
		 	<div class="col-md-12" align="center"><h1><?php if(!empty($contact[0]->page_title)){ echo $contact[0]->page_title; } ?></h1></div>
		</div>
		
	 	<div class="height30"></div>
		<div class="container panel">
	       <div class="col-md-12 cform">
		        <div class="col-md-7">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('contact') }}" id="formID" enctype="multipart/form-data">
		                {{ csrf_field() }}
				        <div class="col-lg-6 col-md-6 col-sm-6">
				  		    <label>Name<span class="star">*</span></label>
						    <input type="text" value=""  class="form-control validate[required] text-input" id="name" name="name" >
						</div>
				      	<div class="col-lg-6 col-md-6 col-sm-6">
				        	<label>Email<span class="star">*</span> </label>
				        	<input type="text" value=""  class="form-control validate[required,custom[email]] text-input" id="email" name="email" >
				      	</div>
								  
				      	<div class="col-lg-6 col-md-6 col-sm-6">
				        	<label>Phone No<span class="star">*</span></label>
				        	<input type="text" value=""  class="form-control validate[required] text-input" id="phone_no" name="phone_no" >
				      	</div>
				      	<div class="col-lg-6 col-md-6 col-sm-6">
				        	<label>Message<span class="star">*</span> </label>
				        	<textarea value=""  style="min-height:100px;"  class="form-control validate[required] text-input" id="msg" name="msg"></textarea>
				      	</div>
				      	<div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 20px;">
				        	<input type="submit" class="btn btn-primary" value="Send">
				      	</div>
		        	</form>
				</div>
			</div>
			<div class="col-md-12 cform">
				<div class="col-md-5 ">
		            <h3>Our Address</h3>
		            <span class="our-address"> <i class="icon-pin fa fa-address-card"></i>&nbsp;{{$settings[0]->site_address}}</span>
		        </div>
	        </div>
		</div>
	
	</div>
	   <div class="clearfix"></div>

      @include('footer')
	  <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
</body>
</html>