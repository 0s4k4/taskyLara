<!DOCTYPE html>
<html lang="es">
<head>

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- slider -->
	<div class="video">
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.services')); ?></h1></div>
	 </div>
	<div class="container">
	 
	 <div class="height30"></div>
	 
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
	<div class="container">
	<div class="row">
	<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('services')); ?>" id="formID" enctype="multipart/form-data">
   		<?php echo csrf_field(); ?>

   		<div class="row">
   			<input type="hidden" name="editid" value="<?php echo $editid;?>">
			<div class="col-sm-4">
				<div class="col-sm-12">
					<div class="form-group" >
						<label><?php echo e(__('user.services_name')); ?><span class="star">*</span></label>
						<select class="form-control input-lg validate[required]" id="subservice_id" name="subservice_id" required>
							<option value=""><?php echo e(__('user.select_services')); ?></option>
							<?php foreach($services as $disp){?>
							<option value="<?php echo $disp->id;?>" disabled><?php echo $disp->name;?></option>
							<?php $subservices = DB::table('subservices')->where('service', '=', $disp->id)->orderBy('subname','asc')->get();
							foreach($subservices as $dispsub){
							?>
							<option value="<?php echo $dispsub->subid;?>" <?php if(!empty($sellservices)) { if($sellservices[0]->subservice_id==$dispsub->subid){?> selected <?php } } ?>> -- <?php echo $dispsub->subname;?></option>
							<?php } } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="col-sm-12">
					<div class="form-group">	
						<label><?php echo e(__('user.currency')); ?></label>
						<input type="text"  name="" id="" class="form-control input-lg validate[required] text-input" disabled="disabled" value="<?php echo $setting[0]->site_currency;?>">
					</div>	
				</div>	
			</div>	
			<div class="col-sm-2">
				<div class="col-sm-12">
					<div class="form-group">		
						<label><?php echo e(__('user.price')); ?> <span class="star">*</span></label>
						<input type="text"  name="price" required id="price" class="form-control input-lg validate[required] text-input" value="<?php if(!empty($sellservices)) { echo $sellservices[0]->price; }?>">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col-sm-12">
					<div class="form-group" id="shop_address" >
						<label><?php echo e(__('user.time_hours')); ?></label>
						<input type="text" name="time" id="time" class="form-control input-lg validate[required] text-input" value="<?php if(!empty($sellservices)) { echo $sellservices[0]->time; }?>">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col-sm-12">
					<div class="form-group">
					    <label for="description">Description </label>
					    <textarea class="form-control" id="description" rows="3" name="description"><?php if(!empty($sellservices)) { echo $sellservices[0]->description; }?></textarea>
					</div>
				</div>
			</div>
			<input type="hidden" name="user_id" value="<?php echo $uuid;?>">
			<input type="hidden" name="shop_id" value="<?php echo $shopview[0]->id;?>">
		</div>
		<div class="clearboth"></div>
		<div class="row">
			<div class="col-sm-12">		                      
				<a href="<?php echo $url;?>/services" class="btn btn-primary radiusoff"><?php echo e(__('user.reset')); ?></a>
				<?php if(config('global.demosite')=="yes"){?>
				<button type="button" class="btn btn-success btn-md radiusoff btndisable"><?php echo e(__('user.submit')); ?></button> 
				<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
		        <button type="submit" class="btn btn-success btn-md radiusoff">
		            <?php echo e(__('user.submit')); ?>

		        </button>
				<?php } ?>
			</div>
		</div>
	</form>
	
	</div>
		
	<div class="clearfix"></div>
	<div class="row" align="right" style="margin-bottom:2px;">
	 <?php if(config('global.demosite')=="yes"){?><span class="disabletxt">( <?php echo config('global.demotxt');?> ) </span><button type="button" class="btn btn-primary radiusoff btndisable"><?php echo e(__('user.add_services')); ?></button> 
								<?php } else { ?>
	
	 <a href="<?php echo $url;?>/services" class="btn btn-primary radiusoff"><?php echo e(__('user.add_services')); ?></a>
								<?php } ?>
	 
	 </div>
	 
	<div class="row">
	<div class="table-responsive service_style">
	 <table class="table table-striped table-bordered table-hover datatable" data-page-length='5'>
  <thead>
    <tr>
       <th><?php echo e(__('user.sno')); ?></th>
      <th><?php echo e(__('user.services')); ?></th>
      <th><?php echo e(__('user.price')); ?></th>
      <th><?php echo e(__('user.time')); ?></th>
	  <th><?php echo e(__('user.update')); ?></th>
	  <th><?php echo e(__('user.delete')); ?> </th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $ii=1;
  foreach($viewservice as $newserve){?>
    <tr>
      <th><?php echo $ii;?></th>
      <td><?php echo $newserve->subname;?></td>
      <td><?php echo $newserve->price.' '.$setting[0]->site_currency;?></td>
      <td><?php echo $newserve->time;?></td>
	  <td>
	  <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="<?php echo e(__('user.edit')); ?>" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
	  <?php } else { ?>
	  <a href="<?php echo $url;?>/services/<?php echo $newserve->id;?>"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="<?php echo e(__('user.edit')); ?>" border="0"></a>
	  <?php } ?>
	  	  
	  </td>
	  <td>
	   <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/delete.png';?>" alt="<?php echo e(__('user.delete')); ?>" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
	  <?php } else { ?>
	  <a href="<?php echo $url;?>/services/<?php echo $newserve->id;?>/delete" onclick="return confirm('Are you sure you want to delete this?')">
	  <img src="<?php echo $url.'/local/images/delete.png';?>" alt="<?php echo e(__('user.delete')); ?>" border="0"></a></td>
	  <?php } ?>
    </tr>
  <?php $ii++; } ?>

  </tbody>
</table>
	</div>
	
	</div>

	</div>
	
	</div>
	
	</div>
	</div>

      <div class="clearfix"></div>
	  <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
       
    });
});
</script><?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/services.blade.php ENDPATH**/ ?>