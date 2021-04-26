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
	 <div class="col-md-12" align="center"><h1>{{ __('user.gallery') }}</h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 
	

	
	<div class="container">
	
	<div class="col-md-6">
	
	@if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
	
	<div class="row">
	<form class="form-horizontal" role="form" method="POST" action="{{ route('gallery') }}" id="formID" enctype="multipart/form-data">
   <div class="col-md-12">
   {!! csrf_field() !!}
   
   
   <input type="hidden" name="editid" value="<?php echo $editid;?>">
   
   
	<div class="form-group col-md-12" >
	<!--<label>Gallery Image<span class="star">*</span></label>-->
	<div class="upload-btn-wrapper">
		<button class="btn">{{ __('user.upload_gallery_image') }} </button>
		<input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12 <?php if(empty($editid)){?>validate[required]<?php } ?>">
		
		@if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
		
		<?php 
		if(!empty($editgallery)) {
			$gallerypho="/gallery/";
		    $path ='/local/images'.$gallerypho.$editgallery[0]->image;
			if($editgallery[0]->image!=""){
			?>
			<div class="movelit">
			
			<img src="<?php echo $url.$path;?>" class="thumb nbn" width="100">
			</div>
			<?php } else { ?>
			<div class="movelit">
			
			<img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb nbn" width="100">
			</div>
		<?php } } ?>
	</div>
	</div>
	
	<input type="hidden" name="current_photo" value="<?php if(!empty($editgallery[0]->image)) { echo $editgallery[0]->image; } ?>">
	
	<input type="hidden" name="user_id" value="<?php if(!empty($uuid)){ echo $uuid; } ?>">
	
	<input type="hidden" name="shop_id" value="<?php if(!empty($shopview[0]->id)){ echo $shopview[0]->id; }?>">
	
	
	</div>
	
	<div class="clearboth"></div>
	<div class="col-md-12">
		                       
							   <a href="<?php echo $url;?>/gallery" class="btn btn-primary radiusoff">{{ __('user.reset') }}</a>
							   
							   <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btn-md radiusoff btndisable">{{ __('user.submit') }}</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							   
                                <button type="submit" class="btn btn-success btn-md radiusoff">
                                    {{ __('user.submit') }}
                                </button>
								
								<?php } ?>
                           
		</div>
	
	
	</form>
	
	</div>
	
	</div>
	
	
	<div class="col-md-6">
	
	<div class="row" align="right" style="margin-bottom:2px;">
	
	 <?php if(config('global.demosite')=="yes"){?><span class="disabletxt">( <?php echo config('global.demotxt');?> ) </span><button type="button" class="btn btn-primary radiusoff btndisable">{{ __('user.add_image') }} </button> 
								<?php } else { ?>
	
	 <a href="<?php echo $url;?>/gallery" class="btn btn-primary radiusoff">{{ __('user.add_image') }} </a>
								<?php } ?>
	 
	 </div>
	 
	<div class="row">
	<div class="table-responsive service_style">
	<table class="table table-bordered datatable">
  <thead>
    <tr>
       <th>{{ __('user.sno') }}</th>
      <th>{{ __('user.image') }}</th>
      <th>{{ __('user.update') }}</th>
	  <th>{{ __('user.delete') }}</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($ccount)){?>
  <?php 
  $ii=1;
  foreach($viewgallery as $newgal){?>
    <tr>
      <td><?php echo $ii;?></td>
      <td>
	  <?php 
		$galleryimg="/gallery/";
		$path ='/local/images'.$galleryimg.$newgal->image;
		if($newgal->image!=""){
	  ?>
	 <img src="<?php echo $url.$path;?>" class="thumb" width="150">
		<?php } else {?>
		 <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="150">
		<?php } ?>
	 </td>
      
	  <td>
	  <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="{{ __('user.edit') }}" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> ) </span>
	  <?php } else {?> 
	  <a href="<?php echo $url;?>/gallery/<?php echo $newgal->id;?>"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="{{ __('user.edit') }}" border="0"></a>
	  <?php } ?>
	  
	  
	  </td>
	  <td>
	  
	  <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/delete.png';?>" alt="{{ __('user.delete') }}" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> ) </span>
	  <?php } else {?> 
	  
	  
	  <a href="<?php echo $url;?>/gallery/<?php echo $newgal->id;?>/delete" onclick="return confirm('Are you sure you want to delete this?')">
	  <img src="<?php echo $url.'/local/images/delete.png';?>" alt="{{ __('user.delete') }}" border="0"></a>
	  
	  <?php } ?>
	  
	  </td>
    </tr>
  <?php $ii++; } ?>
    <?php } else { ?>
	<tr><td colspan="4" class="err-msg" align="center">{{ __('user.no_images_found') }}</td></tr>
	<?php } ?>
	
  </tbody>
</table>
	</div>
	
	</div>
	
	</div>
	
	</div>
	
	<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
       
    });
});
</script>

	
	</div>
	
	</div>
	</div>
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>
