<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>
<!DOCTYPE html>
<html lang="es">
<head>

    

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	


<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAu93cD3ifRoxBSljZFjV3zvLk7ZCiGcrU"></script>

</head>
<body>

<!-- fixed navigation bar -->
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
<div class="Post_a_job">

<div class="headerbg">
 <div class="col-md-12" align="center"><h1><?php echo e(__('user.post_job')); ?></h1></div>
</div>
	 
<div class="container">

<div class="row">	
<div class="col-md-12">	
	<?php if(Session::has('success')): ?>
	    <div class="alert alert-success">
	      <?php echo e(Session::get('success')); ?>

	    </div>
	<?php endif; ?>

 	<?php if(Session::has('error')): ?>
	    <div class="alert alert-danger">
	      <?php echo e(Session::get('error')); ?>

	    </div>
	<?php endif; ?>

	<?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <strong><?php echo e(__('user.whoops')); ?></strong><?php echo e(__('user.some_problems_with_your_input')); ?><br><br>
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>
	
</div>	 
</div>	 
	 
<div class="row">	 
<div class="col-md-12 sv_request_form">
		      
<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('new-request')); ?>" id="formID" enctype="multipart/form-data">
     <?php echo e(csrf_field()); ?>	 
<div class="col-sm-8 col-sm-offset-2">
	<div class="form-group">		
		<input type="text" class="form-control validate[required] input-lg" placeholder="<?php echo e(__('user.choose_name_your_project')); ?>" id="request_name" name="request_name" value="<?php echo e(old('request_name')); ?>">   
    </div>
						
    <div class="form-group">
	  	<textarea class="form-control validate[required] input-lg" name="describe_service" placeholder="<?php echo e(__('user.tell_us_more_about_your_project')); ?>" id="describe_service" style="min-height:200px;"><?php echo e(old('describe_service')); ?></textarea>
    </div>
  
    <div class="form-group">  
  
    <div class="row">
       <div class="col-sm-6">
       <div class="col-sm-12">
	   <div class="form-group">
        <select id="category" onchange="getSubcategory();" name="category" class="form-control input-lg validate[required]">
		  <option value=""><?php echo e(__('user.select_category')); ?></option>
		  <?php foreach($viewcati as $viewas){?>
		  <option value="<?php echo $viewas->id;?>" <?php if(Input::old('category')==$viewas->id){?> selected="selected" <?php } ?>><?php echo $viewas->name;?>			  
		  </option>		  
		  <?php } ?>		  
		</select>
       </div>
       </div>
       </div>
	
       <div class="col-sm-6">
       <div class="col-sm-12">
	   <div class="form-group">
		<select id="subcategory" name="subcategory" class="form-control input-lg">
		   <option><?php echo e(__('user.sub_category')); ?></option>    
		</select>	
       </div>
       </div>
       </div>
    </div>
	
    </div>

	<div class="form-group">
	<div class="row">        
		<div class="col-sm-6">
	    <div class="upload-btn-wrapper">
	  	  <button class="btn"><?php echo e(__('user.upload_files')); ?></button>
	  	  <input type="file" class="form-control input-lg" id="image" name="image[]" value="<?php echo Input::old('image');?>" multiple="true">
	    </div>
		<p style="color:red;"><?php echo e(__('user.please_upload_only')); ?></p>
		</div>
		
		<div class="col-sm-6">
		<div class="upload-btn-wrapper">
		<button class="btn"><?php echo e(__('user.featured_image')); ?></button>
		<input type="file" id="photo" name="photo" class="form-control input-lg">
			<?php if($errors->has('photo')): ?>
                 <span class="help-block" style="color:red;">
                     <strong><?php echo e($errors->first('photo')); ?></strong>
                 </span>
            <?php endif; ?>
		</div>
		</div>		
    </div>	
    </div>		

    <div class="form-group">
		<label for="Budget" class="control-label"><?php echo e(__('user.what_skills_required')); ?> <span class="redd">*</span></label>
			<select class="multipleSelect input-lg" name="request_skills[]" multiple>
				<option  selected="selected"><?php echo e(__('user.what_skills_required')); ?></option>
				<?php if(!empty($skills_count)){?>
				<?php 
				$h=1;
				foreach($skills_get as $skill){?>
						<option value="<?php echo $skill->id;?>" <?php if(Input::old('request_skills')==$skill->id){?> selected <?php } ?> ><?php echo $skill->skill;?></option>
				<?php $h++; } ?>			
				<?php } ?>
			</select>			
	<script>  
		$('.multipleSelect').fastselect();  
	</script>
	</div>
  
  
  <input type="hidden" name="budget_type" value="fixed">

  <?php /*?>
  <div class="form-group">
    <label for="Budget" class="col-sm-3 control-label">How do you want to pay?</label>
     <div class="col-sm-8">
	   <input type="radio" class="" id="fixed" name="budget_type" value="fixed" <?php if(old('budget_type')=="fixed"){?> checked <?php } ?> checked> Fixed price project<br/>
	 <input type="radio" class="validate[required]" id="hour" name="budget_type" value="hour" <?php if(old('budget_type')=="hour"){?> checked <?php } ?>> Hourly project
     </div>
  </div><?php */?>
  
  <?php $cy = $site_setting[0]->site_currency; ?>
  
	<div class="form-group">
    <label for="Budget" class="control-label"><?php echo e(__('user.what_your_estimated_budget')); ?><span class="redd">*</span></label>
     <select name="fixed_price" class="form-control input-lg validate[required]" id="fixed_price">
		<option  selected="selected"><?php echo e(__('user.what_your_estimated_budget')); ?> </option>
		<option value="10 - 30 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="10 - 30 ". $cy){?> selected <?php } ?>><?php echo e(__('user.micro_project')); ?>(10 - 30 <?php echo $cy;?>)</option>

		<option value="30 - 250 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="30 - 250 ". $cy){?> selected <?php } ?>><?php echo e(__('user.simple_project')); ?> (30 - 250 <?php echo $cy;?>)</option>
		
		<option value="250 - 750 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="250 - 750 ". $cy){?> selected <?php } ?>><?php echo e(__('user.very_small_project')); ?>(250 - 750 <?php echo $cy;?>)</option>
		
		<option value="750 - 1500 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="750 - 1500 ". $cy){?> selected <?php } ?>><?php echo e(__('user.small_project')); ?> (750 - 1500 <?php echo $cy;?>)</option>
		
		<option value="1500 - 3000 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="1500 - 3000 ". $cy){?> selected <?php } ?>><?php echo e(__('user.medium_project')); ?> (1500 - 3000 <?php echo $cy;?>)</option>
		
		<option value="3000 - 5000 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="3000 - 5000 ". $cy){?> selected <?php } ?>><?php echo e(__('user.large_project')); ?>(3000 - 5000 <?php echo $cy;?>)</option>
		
		<option value="5000 - 10000 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="5000 - 10000 ". $cy){?> selected <?php } ?>><?php echo e(__('user.large_project')); ?> (5000 - 10000 <?php echo $cy;?>)</option>
		
		<option value="10000 - 20000 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="10000 - 20000 ". $cy){?> selected <?php } ?>><?php echo e(__('user.very_large_project')); ?>(10000 - 20000 <?php echo $cy;?>)</option>
		
		<option value="20000 - 50000 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="20000 - 50000 ". $cy){?> selected <?php } ?>><?php echo e(__('user.huge_project')); ?> (20000 - 50000 <?php echo $cy;?>)</option>
		
		<option value="50000 - 100000 <?php echo $cy;?>" <?php if(Input::old('fixed_price')=="50000 - 100000 ". $cy){?> selected <?php } ?>><?php echo e(__('user.major_project')); ?> (50000 +  <?php echo $cy;?>)</option>
		
		<option value="custom_budget" <?php if(Input::old('fixed_price')=="custom_budget"){?> selected <?php } ?>><?php echo e(__('user.customize_budget')); ?></option>

	</select>
	</div>
	
	<div class="form-group">
	<select name="hour_price" class="form-control input-lg validate[required]" id="hour_price" style="display:none;">
		<option value="2 - 8 <?php echo $cy;?>"
 <?php if(Input::old('hour_price')=="2 - 8 ". $cy){?> selected <?php } ?>>Basic ($2 - 8 <?php echo $cy;?>)</option>
        <option value="8 - 15 <?php echo $cy;?>" <?php if(Input::old('hour_price')=="8 - 15 ". $cy){?> selected <?php } ?>><?php echo e(__('user.moderate')); ?> ($8 - 15 <?php echo $cy;?>)</option>
        <option value="15 - 25 <?php echo $cy;?>" <?php if(Input::old('hour_price')=="15 - 25 ". $cy){?> selected <?php } ?>><?php echo e(__('user.standard')); ?> ($15 - 25 <?php echo $cy;?>)</option>
        <option value="25 - 50 <?php echo $cy;?>" <?php if(Input::old('hour_price')=="25 - 50 ". $cy){?> selected <?php } ?>><?php echo e(__('user.skilled')); ?> ($25 - 50 <?php echo $cy;?>)</option>
        <option value="50 - 100 <?php echo $cy;?>" <?php if(Input::old('hour_price')=="50 - 100 ". $cy){?> selected <?php } ?>><?php echo e(__('user.expert')); ?> ($50 +  <?php echo $cy;?>)</option>
        <option value="custom_budget" <?php if(Input::old('hour_price')=="custom_budget"){?> selected <?php } ?>><?php echo e(__('user.customize_budget')); ?></option>
	</select>
    </div>  
  
    <div class="form-group" id="hide1" style="display:none;">
		<label for="Budget" class="col-sm-3 control-label"><?php echo e(__('user.minimum_budget')); ?></label>
		<div class="col-sm-8">
		<input type="number" class="form-control input-lg validate[required]" id="minimum_budget" name="minimum_budget" value="<?php echo e(old('minimum_budget')); ?>">
		<p><?php echo $cy;?></p>
		</div>
    </div>
    
  <div class="form-group" id="hide2" style="display:none;">
    <label for="Budget" class="col-sm-3 control-label"><?php echo e(__('user.maximum_budget')); ?></label>
    <div class="col-sm-8">
    <input type="number" class="form-control input-lg validate[required]" id="maximum_budget" name="maximum_budget" value="<?php echo e(old('maximum_budget')); ?>">
	<p><?php echo $cy;?></p>
	</div>     
  </div>

  <div class="form-group">
     <input type="number" class="form-control input-lg" id="delivery" placeholder="<?php echo e(__('user.estimate_delivery_days')); ?>" name="delivery" value="<?php echo e(old('delivery')); ?>">
  </div>
  
  <input type="hidden" name="edit_id" value="<?php if(!empty($edit_count)){?><?php echo $edit[0]->rid;?><?php } else { ?>0<?php } ?>">
  
  <div class="form-group">
     <input type="text" class="form-control input-lg" id="autocomplete" placeholder="<?php echo e(__('user.preferred_location')); ?>" name="preferred_location" value="<?php echo e(old('preferred_location')); ?>">
  </div>  

  <script>
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input,{types: ['(cities)']});
    google.maps.event.addListener(autocomplete, 'place_changed', function(){
       var place = autocomplete.getPlace();
    })
  </script>
  
  
  <div class="form-group" align="center">
	<button type="submit" class="btn-success btn-lg form-control borbtn-inverse"><?php echo e(__('user.submit')); ?></button>
  </div>
</form>

<div class="form-group">
	<span class="redd">*</span> -  <?php echo e(__('user.mandatory_fields')); ?>

</div>
</div>

</div>
</div>

</div>
</div>
	   
	 
<script type="text/javascript">
    $(document).ready(function() {
		$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
	});
	
	function getSubcategory(){
	
			
        
            var stateID = $('#category').val();
          
                $.ajax({
                    url: '<?php echo $url;?>/new-request/ajax/passing/'+stateID,
                    type: "GET",
                    dataType: "json",
					 
                    success:function(data) {
						
                        
                        $('select[name="subcategory"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
           
       
	}
  	
</script>
      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/new-request.blade.php ENDPATH**/ ?>