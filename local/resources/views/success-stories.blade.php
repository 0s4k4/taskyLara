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
	 <div class="col-md-12" align="center"><h1><?php if(!empty($stories[0]->page_title)) { echo $stories[0]->page_title; }?></h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	
	<?php 
	
	if(!empty($stories[0]->page_desc))
	{
	
	echo str_replace("'","",$stories[0]->page_desc);
	
	}
	?>
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>