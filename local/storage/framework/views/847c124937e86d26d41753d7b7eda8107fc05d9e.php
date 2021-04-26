 
<!DOCTYPE html>
<html lang="es">
<head>
   	<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   	<style type="text/css">
		.gallerybox {background-color: transparent; }
		.round{width: 40px;height: 40px;}

		/*chat*/
		.talk-bubble {
		  	display: inline-block;
		  	position: relative;
			height: auto;
			background-color: #ebffe5;
		}
		.border{
		  border: 8px solid #666;
		}
		.tri-right.border.left-top:before {
			content: ' ';
			position: absolute;
			width: 0;
			height: 0;
		  	left: -40px;
			right: auto;
		  	top: -8px;
			bottom: auto;
			border: 32px solid;
			border-color: #666 transparent transparent transparent;
		}
		.tri-right.left-top:after{
			content: ' ';
			position: absolute;
			width: 0;
			height: 0;
		  	left: -20px;
			right: auto;
		  	top: 0px;
			bottom: auto;
			border: 22px solid;
			border-color: #ebffe5 transparent transparent transparent;
		}
		.talktext{
		  padding: 1em;
			text-align: left;
		  line-height: 1.5em;
		}
		.talktext p{
		  /* remove webkit p margins */
		  -webkit-margin-before: 0em;
		  -webkit-margin-after: 0em;
		}
	</style>
<script type="text/javascript">
$(window).load(function() {
  $(".msgboxes").animate({ scrollTop: $(document).height() }, 1000);
  
});
</script>

</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->

	<?php $check_shop = DB::table('shop')
							->where('user_id', '=', $sender)
							->count();
		$user_cnt = DB::table('users')
                             ->where('id','=',$sender)
                             ->count();	
  if(!empty($user_cnt))
  {	  
    $userr = DB::table('users')
			->where('id','=',$sender)
			->get();
	if($userr[0]->admin==2)
			{
				if(!empty($check_shop))
				{
				$pather = $url."/vendor/".$userr[0]->name;
				$class="";
				}
				else
				{
					$pather="#";
					$class="hideclass";
				}
			}
			else
			{
				$pather = $url."/user/".$userr[0]->id.'/'.$userr[0]->name;
				$class="";
			} 
			
  }		
			?>
	<div class="video">

	<div class="headerbg">
	 <div class="col-md-12" align="center"><h2><?php echo e(__('user.conversation_with')); ?> <span class="black"><?php if($type=="2"){ ?><a href="<?php echo $pather;?>" class="black <?php echo $class;?>"><?php echo $usernamo;?></a> <?php }else{ echo $usernamo; } ?></span></h2></div>
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
		<div class="row msgboxes" style="max-height:400px; overflow-y:scroll; bottom: auto; top: 3px;">
			<div class="col-md-12 gallerybox clearfixed " >
				<?php if(!empty($view_message_count)){?>
				<?php foreach($view_message as $view){
					
					$userr = DB::table('users')
							->where('id', '=', $view->sender)
							->get();
					$userr_cnt = DB::table('users')
								->where('id', '=', $view->sender)
								->count();
				?>
				<?php if(!empty($userr_cnt)){ ?>
				<div class="col-md-12" style="overflow-x: hidden !important; ">
					<div class="height10"></div>
					<div class="col-md-2 text-center">
						<?php if(!empty($userr[0]->photo)){?>
					 	<img src="<?php echo $url;?>/local/images/userphoto/<?php echo $userr[0]->photo;?>" class="round"> 
					 	<?php } else { ?>
					 	<img src="<?php echo $url;?>/local/images/nophoto.jpg" alt="" width="70" class="round">
					 	<?php }  ?>			
					</div>
					<div class="col-md-2 ">
						<strong class="font18"><?php echo $userr[0]->name;?></strong>
						<p ><a href="#" data-toggle="tooltip" title="<?php echo $view->submitted;?>"> <i class="fa fa-info-circle" aria-hidden="true" style=" color:#fec832"></i></a> </p>
					</div>
					<div class="col-md-8">
						<div class="height20"></div>
						<div class="talk-bubble tri-right left-top">
								<div class="talktext">
								<p><?php echo $view->message;?></p>
						  	</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	
	
	<div class="height20"></div>
	<div class="container">
	<div class="btn btn-primary sv_send_message"><?php echo e(__('user.send_a_message')); ?></div> 
	
	<div class="conversation_bg">
	<form action="<?php echo e(route('chat')); ?>" method="post" id="formID" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<div class="form-group card required">
                  <label class="control-label"><?php echo e(__('user.message')); ?></label>
                <textarea autocomplete="off" name="msg" class="form-control validate[required] c_convert" style="min-height:200px;"></textarea>
              </div>
	<input type="hidden" name="sender" value="<?php echo $receiver;?>">
	<input type="hidden" name="receiver" value="<?php echo $sender;?>">
	
	
	<div class="form-group card required">
	<a href="<?php echo $url;?>/messages" class="btn btn-primary"> <?php echo e(__('user.back')); ?> </a>
	<input type="submit" name="csubmit" value="Submit" class="btn btn-success">
    </div>	
	
	</form>
	
	</div>
	
	
	</div>
	
	
	</div>
	
	</div>
	</div>
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">
		$('a[data-toggle="tooltip"]').tooltip({
		    animated: 'fade',
		    placement: 'bottom',
		});
	</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/chat.blade.php ENDPATH**/ ?>