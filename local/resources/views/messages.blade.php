 
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
	 <div class="col-md-12" align="center"><h1>{{ __('user.my_messages') }}</h1></div>
	 </div>
	<div class="container">
	 
	 <div class="height30"></div>
	 
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
	<div class="container">
	
	
	
	
	 
	<div class="row service_style">
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover datatable">
  <thead>
    <tr>
      <th>{{ __('user.sno') }} </th>
	  <th>{{ __('user.photo') }} </th>
      <th>{{ __('user.username') }}</th>
    </tr>
  </thead>
  <tbody class="">
  
  <?php 
  if(!empty($view_message_count)){
  $i=1;
  foreach($view_message as $message)
  {
	  
   $receiver_id = $message->receiver;
   $receive_user = DB::table('users')
               ->where('id', '=', $receiver_id)
                ->get(); 
$logid = Auth::user()->id;
   $view_unread_count = DB::table('tbl_private_message')
                        ->where('sender', '=', $receiver_id)
						->where('receiver', '=', $logid)
						->where('read_status', '=', 1)
						
						->orderBy('pid','desc')
                        ->count();
						
	$shop_receive_user=DB::table('shop')
							->where('user_id','=',$receiver_id)
							->get();
	$shop_receive_user_count=DB::table('shop')
							->where('user_id','=',$receiver_id)
							->count();
							
	if($shop_receive_user_count>0){
		
		$shop_name_message='('.$shop_receive_user[0]->shop_name.')';
	}else{
		
		$shop_name_message="";
	}												
						
  ?>
  
    <tr>
      <th><?php echo $i;?></th>
      <td>

	  <?php 
	  if(!empty($receive_user[0])) { 
		$receive_name = $receive_user[0]->name;  
		$receive_pic = $receive_user[0]->photo;
				$url = URL::to("/");
				$userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$receive_pic;
						if($receive_user[0]->photo!=""){?>
					<a href="<?php echo $url;?>/chat/<?php echo $receiver_id;?>" title="<?php echo $receive_name;?>"><img src="<?php echo $url.$path;?>" class="img-responsive round" alt=""></a>
						<?php } else { ?>
						<a href="<?php echo $url;?>/chat/<?php echo $receiver_id;?>" title="<?php echo $receive_name;?>"><img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-responsive round" alt="">
						<?php } ?></a>
		<?php } ?>
	  </td>
      <td>
	 
	  <a href="<?php echo $url;?>/chat/<?php echo $receiver_id;?>"><?php echo $receive_name;?><?php if(!empty($view_unread_count)){?> <span class="countes"><?php echo $view_unread_count;?></span><?php } ?><?php echo $shop_name_message; ?></a>
	  </td>
      
	  
    </tr>
  <?php $i++; } ?>
  <?php } ?>
    
	
	
	
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
	   <script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
       
    });
});
</script>


      @include('footer')
</body>
</html>
