<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
	?>
<!DOCTYPE html>
<html lang="es">
<head>
   
   

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('/css/slick.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('/css/slick-theme.css')); ?>"/>
<script type="text/javascript" src="<?php echo e(URL::asset('/js/slick.min.js')); ?>"></script>



</head>
<body class="<?php echo e($view_name); ?>">

   

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->
	
	
	
    <div id="banner">
	<div id="overlays"></div>
	<?php if(!empty($setts[0]->site_banner)){?>
      <div class="hidden-xs">	  
	  <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_banner;?>" class="img-responsive bannerheight" />
	  </div>
	  <div class="visible-xs">
	  <img src="<?php echo $url;?>/local/images/settings/tools-banner-mobile.jpg" class="img-responsive bannerheight" />
	  </div>
	<?php } else {?>
	<img src="<?php echo $url;?>/img/banner.jpg" class="img-responsive bannerheight">
	<?php } ?>
	
    
	
	<div class="bannertxt">
	 
		<div class="col-md-12" align="center">
		<div class="row">
		
		<h1 class="headingcolor"><?php echo e(__('user.convenient_affordable_around_home')); ?></h1>
		</div>
		<div class="row">
		<div class="col-md-12">
		<h4 class="headingcolor"> <?php echo e(__('user.taskers_help_without_breaking_bank')); ?> </h4>
		</div>

		</div>
		</div>
		
		<div class="col-md-12 form_move" align="center">
		<div class="col-md-1"></div>
		<form action="<?php echo e(route('shopsearch')); ?>" method="post" enctype="multipart/form-data" id="formID">
		<div class="col-md-10">
		<?php echo csrf_field(); ?>

		<div class="col-md-8 paddingoff">
		
		<input type="text" name="search_text" class="searchtext validate[required]" id="search_text" placeholder=" <?php echo e(__('user.need_something_different')); ?>">
		
		</div>
	<div class="col-md-4 paddingoff" ><input type="submit" id="sv_autosearch" name="search" class="searchbtn" value=" <?php echo e(__('user.get_started')); ?>"></div>
		
		
		</div>
		</form>
		<div class="col-md-1"></div>
		
		
		</div>
		
		
	</div>
	</div>
	
	<script type="text/javascript">

   $(document).ready(function() {
    src = "<?php echo e(route('searchajax')); ?>";
     $("#search_text").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);
                }
                 
            });
            //$("#sv_autosearch").click();
        },
        minLength: 1,
     
    });
   
    
    
});

/* document.getElementById("search_text").onchange = function() {
    document.getElementById("formID").submit();
}; */
</script>

<!-- cartas donde se descibre como funciona la aplicacion -->
<div class="clearfix home-clearfix"></div>
	<div class="clearfix home-clearfix"></div>
	
	<div class="works">
	<div class="container">
	 <div class="col-md-12" align="center" ><h1><b style="font-size:35px; color:#FF4600; letter-spacing: 4px; text-transform: uppercase; "> <?php echo e(__('user.how_works')); ?></b></h1></div>
	<div class="row">
	<div class="col-md-12">
	<div class="col-md-4">	
	<div class="media">
	  <div class="media-top pull-center">
		<a href="#">
		  <center><img class="img-fluid"  width="70%" height="70%" src="<?php echo $url;?>/img/img1.png"></center>
		</a>
	  </div>
	  <div class="media-body">
		<span class="count"  style="font-size:35px; color:#FF4600" >1</span>
	<center><h4 class="media-heading"><b style="color:#02B21E"> <?php echo e(__('user.describe_task')); ?></b></h4></center>
		<p class=""> <?php echo e(__('user.describe_task_para1')); ?></p>
	  </div>
	</div>
	</div>
	<div class="col-md-4">
	
	<div class="media">
	  <div class="media-top pull-center">
		<a href="#">
		  <center><img class="img-fluid"  width="70%" height="70%" src="<?php echo $url;?>/img/img2.png" ></center>
		</a>
	  </div>
	  <div class="media-body">
		<span class="count" style="font-size:35px; color:#FF4600" >2</span>
		<center><h4 class="media-heading"><b  style="color:#02B21E"> <?php echo e(__('user.get_matched')); ?></b></h4></center>
		<p class=""> <?php echo e(__('user.get_matched_para1')); ?></p>
	  </div>
	</div>
	
	</div>
	<div class="col-md-4">
	<div class="media">
	  <div class="media-top pull-center">
		<a href="#">
		  <center><img class="img-fluid"  width="70%" height="70%" src="<?php echo $url;?>/img/img3.png"></center>
		</a>
	  </div>
	  <div class="media-body">
		<span class="count" style="font-size:35px; color:#FF4600" >3</span>
		<center><h4 class="media-heading"> <b style="color:#02B21E"><?php echo e(__('user.get_done')); ?></b></h4></center>
		<p class=""> <?php echo e(__('user.get_done_para1')); ?></p>
	  </div>
	</div>
	</div>

	</div>
	
	</div>
	
	</div>
	
	<div class="clearfix"></div>
	</div>
	
	
    
	<?php /* if(!empty($services_cnt)){?>
	<div class="icons">
	
	<div class="col-md-12 homepageicon" >
	<ul class="paddoff customcolor">
	<?php foreach ($services as $service) {
     $subserve=strtolower($service->name);
			$result_url = preg_replace('/[ ,]+/', '-', trim($subserve));
	?>
	<li>
	<div class="move10">
	<?php 
					   $servicephoto="/servicephoto/";
						$path ='/local/images'.$servicephoto.$service->image;
						if($service->image!=""){
						?>
	<a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>"><img src="<?php echo $url.$path;?>" border="0" width="50"></a>
	<?php } else { ?>
						  <a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" border="0" width="50"></a>
						 <?php } ?>
	
	</div>
	
	<div><a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>" class="serviceclr"><?php echo $service->name;?></a></div>
	</li>
	<?php } ?>
	
	
	<li>
	<div class="move10">
	<a href="<?php echo $url; ?>/all-services"><img src="<?php echo $url."/local/images/more.png";?>" border="0" width="50"></a>
	</div>
	<div><a href="<?php echo $url; ?>/all-services" class="serviceclr">More</a></div>
	</li>
	
	
	</ul>
	</div>
	
	</div>
	<?php } */ ?>
	
	<div class="ashbg">
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="container">

    <div class="col-md-12">
	<?php if(!empty($carousel)){
		
		foreach($carousel_get as $getrow){
		?>
	
	<?php if(!empty($getrow->name)){?> <h2 class="sli-head"><?php echo $getrow->name;?></h2><?php }


	?>
	 <script type="text/javascript">
	 $(window).load(function() {
	 
		$('#slickdemo<?php echo $getrow->id;?>').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  swipe: true,
		  arrows: true,
		  centerMode: true,
		  autoplay: true,
		  infinite: true,
		  autoplaySpeed: 2000,
		  responsive: [
			{
			  breakpoint: 1199,
			  settings: {
				arrows: true,
				swipe: true,
				centerMode: false,
				centerPadding: '30px',
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: true,
				swipe: true,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
		});
	 
	 
	 /* $("#flexiselDemo<?php echo $getrow->id;?>").flexisel({
        visibleItems: 4,
        itemsToScroll: 1,         
        autoPlay: {
            enable: true,
            interval: 5000,
            pauseOnHover: true
        }        
    }); */
	 });
	 </script>
	 <!--<style type="text/css">
	 #flexiselDemo<?php echo $getrow->id;?> .weightbg .img-responsive
	{
		display:inherit !important
	}
	</style>-->
	 
    <div id="slickdemo<?php echo $getrow->id;?>" style="direction: ltr;">
	<?php 
			
		$ser_count = DB::table('subservices')
		             ->where('service', '=', $getrow->id)
		             ->count();	
			
		if(!empty($ser_count))
		{			
			
		$first = DB::table('subservices')
		             ->where('service', '=', $getrow->id)
		             ->get();		
		 foreach($first as $newservice){
			 $subview=strtolower($newservice->subname);
			$results = preg_replace('/[ ,]+/', '-', trim($subview));
			 ?>
    <div>
	<div class="weightbg">
	<div>
	<?php 
					   $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$newservice->subimage;
						if($newservice->subimage!=""){
						?>
	<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="img-responsive"/></a>
						<?php } else {?>
						<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive"></a>
						<?php } ?>
	</div>
	<div class="craft-title" href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php  echo $newservice->subname;?></a></div>
	</div>
	</div>
		<?php } } ?>

</div>    
	 <div class="clearfix height30"></div>
	 
		<?php } } ?> 
</div>

</div>

	
	<!-- main container -->
	
	
	
	<div class="ashbg">
	
	<div class="clearfix home-clearfix"></div>
		
	
	
	<div class="clearfix"></div>
	
	<div class="blog">
	<div class="clearfix"></div>
	<div class="container">
	 <div class="col-md-12" align="center"><h1> <?php echo e(__('user.customers_get_millions')); ?><br/>  <?php echo e(__('user.quickly_easily')); ?></h1></div>
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	<div class="col-md-1"></div>
	
	
	
	<!-- seccion de testimonios se comenta hasta que se cuenten con mas usuarios  a quienes se deben encuestar para poner sus opiniones aqui-->
	
	<!--<div class="col-md-10 nopadding testimons"> -->
	
	<!--<?php if(!empty($testimonials_cnt)){?>
	<div id="flexiselDemotesti">
	
	<?php foreach($testimonials as $testimonial){?>
    <li>
	<div class="weightbg">
	<div class="innerbg">
	<p><?php echo $testimonial->description;?></p>
	</div>
	<div class="user">
	<?php 
					   $testimonialphoto="/testimonialphoto/";
						$path ='/local/images'.$testimonialphoto.$testimonial->image;
						if($testimonial->image!=""){
						?>
	<img src="<?php echo $url.$path;?>" class="img-responsive" alt="">
	<?php } else {?>
						<img src="<?php echo $url.'/local/images/nophoto.jpg';?>"  class="img-responsive">
						<?php } ?>
	<div class="user-txt">
	
	<h5><?php echo $testimonial->name;?></h5>
	</div>
	</div>
	</div>
	</li>
	<?php } ?>
		
	
	</div>
	<?php } ?> -->
	</div>
	
	<div class="col-md-1"></div>
	</div>
	
	</div>
	 
	</div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	</div>
	
	
	<div class="getmore hidden-xs">
	<div class="getmore-overlay">
	<div class="col-sm-12">
	<div class="col-sm-6 col-sm-offset-6">
	<h2> <?php echo e(__('user.get_more_anytime_anywhere')); ?></h2>
	<p> <?php echo e(__('user.get_more_anytime_anywhere_para1')); ?></p>
	<div class="height40"></div>
	
	<div class="row">	
	<div class="row">	
	<div class="col-sm-12">	
	<div class="col-sm-5 col-md-4">
	<a href="https://play.google.com/store/apps/details?id=com.fourtasker.app&hl=es_MX&gl=US"><img src="<?php echo $url.'/local/images/google.png';?>" class="img-responsive" alt=""></a>
	</div>
	<div class="col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-0">
	<a href="#"><img src="<?php echo $url.'/local/images/apple.png';?>" class="img-responsive" alt=""></a>
	</div>
	</div>	
	</div>	
	</div>	
	<div class="height20"></div>
	
	
	</div>
	</div>
	</div>

	</div>


   <!-- se comenta esta area, se puede utilizar para otra funcion-->
	
	<!--
	<div class="video svimgsec">
	<div class="clearfix"></div>
	<div class="container">
	<div class="col-md-12" align="center"><h1> <?php echo e(__('user.thousands_professionals_growing')); ?><br/>  <?php echo e(__('user.businesses')); ?></h1></div>
	<div class="height30"></div>
	
	
	<div class="row">
	<div class="col-md-12">
	<div class="wrapper">
	<div class="bupadda" id="bupada">
		<style>
		</style>
	</div>
	<div class="masonry">
	   <div class="brick">
			<div class="brickbox">
		   <img src="img/v1.jpg" class="img-responsive" alt="">
		   <div class="titlesection">
			<h3>William Mark</h3>
			<span><?php echo e(__('user.analyst')); ?></span>
		   </div>
		   </div>
	   </div>
	   <div class="brick">
			<div class="brickbox">
		    <img src="img/v2.jpg" class="img-responsive" alt="">
			<div class="titlesection">
			<h3>Jhon Doe</h3>
			<span><?php echo e(__('user.developer')); ?></span>
			</div>
			</div>
	   </div>
	   <div class="brick">
			<div class="brickbox">
		    <img src="img/v3.jpg" class="img-responsive" alt="">		
			<div class="titlesection">
			<h3>Sophie Olivia</h3>
			<span><?php echo e(__('user.analyst')); ?></span>
			</div>
			</div>
	   </div>
	   <div class="brick">
			<div class="brickbox">
		    <img src="img/v5.jpg" class="img-responsive" alt="">		
			<div class="titlesection">
			<h3>catherine</h3>
			<span><?php echo e(__('user.designer')); ?></span>
			</div>
			</div>
	   </div>
	   <div class="brick">
			<div class="brickbox">
		   <img src="img/v4.jpg" class="img-responsive" alt="">
		   <div class="titlesection">
			<h3>William Mark</h3>
			<span><?php echo e(__('user.analyst')); ?></span>
		   </div>
		   </div>
	   </div>
	   <div class="brick">
			<div class="brickbox">
		    <img src="img/v6.jpg" class="img-responsive" alt="">		
			<div class="titlesection">
			<h3>Rachel</h3>
			<span>Designer</span>
			</div>
			</div>
	   </div>
	</div>
	</div>
	</div>
	</div>

	</div>
	</div>
	

      <div class="clearfix"></div>
	  <div class="clearfix"></div>
	-->

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>




<?php /**PATH C:\xampp\htdocs\taskyLara\local\resources\views/index.blade.php ENDPATH**/ ?>