<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");


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

	<div class="video">
	
	<?php 
	if($gig_order_status[0]->payment_level==1){ $status_txt = "Progress"; $class_cls = "#FF4200"; }
	if($gig_order_status[0]->payment_level==2){ $status_txt = "Completed"; $class_cls = "#109C10"; }
	if($gig_order_status[0]->payment_level==3){ $status_txt = "Deliverd"; $class_cls = "#109C10"; }
	if($gig_order_status[0]->payment_level==4){ $status_txt = "Cancelled"; $class_cls = "#FF0000"; }
	?>

	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>{{ __('user.track_job') }}</h1></div>
	 </div>
	<div class="container">
	
	<div class="height30 clearfix"></div>
	
	<div class="col-md-12 ashborder sv_buyer_track">
	
	<?php if(!empty($gig_details_cnt)){?>
	<div class="text-left">
	 
	 <div class="col-md-3">
	 <?php
	 $gigger = DB::table('users')
			   ->where('id','=',$gig_order_status[0]->gig_user_id)
								->get();			
				$gigger_cnt = DB::table('users')
								->where('id','=',$gig_order_status[0]->gig_user_id)
								->count();
	 
	 if($gig_details[0]->job_type=="custom"){ 
	 
	 
	 if(Auth::user()->id!=$gig_details[0]->user_id){
		
		
		$temp_url = $url.'/customorder/'.$gig_details[0]->gid;
        }
		else
		{
			$temp_url = "javascript:void(0);";
		}

	 
	 
	 }
		else { $temp_url = $url.'/request/'.$gig_details[0]->gid.'/'.$gig_details[0]->request_slug; }
	 ?>
	 
	 <a href="<?php echo $temp_url;?>">
	<?php 
	
	if(!empty($giger_cnt)){
		
	if(!empty($giger_img[0]->image)){?>
	<img src="<?php echo $url;?>/local/images/gigs/<?php echo $giger_img[0]->image;?>" alt="" class="img-responsive small_thumb">
	<?php } else { ?>
	<img src="<?php echo $url;?>/local/images/noimage.jpg" alt="" class="img-responsive small_thumb">
    <?php } } else { ?><img src="<?php echo $url;?>/local/images/noimage.jpg" alt="" class="img-responsive small_thumb"><?php } ?></a>
	
	<span class="font15">{{ __('user.chat_with') }} <?php echo $gigger[0]->name;?></span>
	 </div>
	  <div class="col-md-9">
	 <?php 
	 
	if(!empty($gigger_cnt)){?>
	
	<h3><?php echo $gigger[0]->name;?> will 
	<?php echo $gig_details[0]->subject;?>
	for <?php echo $site_setting[0]->site_currency;?><?php echo $gig_order_status[0]->price;?></h3><br/>
	<div class="font21">{{ __('user.status') }}: <span style="color:<?php echo $class_cls;?>"><?php echo $status_txt;?></span></div>
	<?php } ?>
	
	
	 
	 </div>
	 
	 </div>
	 
	 <div class="height20 clearfix"></div>
	 
	  <div class="col-md-12 text-center whitebox">
	 <?php 
	 
	 $newDate = date("l F d Y", strtotime($gig_order_status[0]->payment_date));
	 ?>
	{{ __('user.ordered_from') }}  <?php echo $gigger[0]->name;?> on <?php echo $newDate;?>
	</div>
	 <div class="height30 clearfix"></div>
	 
	 
	 <div class="gallerybox_new">
			<div class="pay_heading text-center">
			<div class="pader">{{ __('user.payment_accpted') }}</div>
			</div>
			
			<div class="para_pads text-center">
			<p class="para"><i style="color:#51DD86" class="fa fa-check-square-o fa-2x"></i></p>
			<p class="para">{{ __('user.payment_accpted_para1') }}</p>
			</div>
		
		</div>
		
		<div class="height30 clearfix"></div>
		
		<div class="gallerybox_new">
			<div class="yell_heading text-center">
			<div class="pader">{{ __('user.seller_started_submit_information') }}</div>
			</div>
			
			<div class="para_pads text-center">
			
			<?php if($gig_order_status[0]->payment_type=="localbank"){?>
			<p class="para bold">
			<?php echo $gigger[0]->name;?> {{ __('user.requires_information_order_get_started') }}
			</p>
			<p class="para"><?php echo $gig_order_status[0]->additional_info;?></p>
			<?php } ?>
			
			<?php if($gig_order_status[0]->type=="extra"){?>
			
			<p class="para bold">{{ __('user.you_purchased_extras') }}</p>
			<p class="para"><?php echo $gig_order_status[0]->ex_text;?></p>
			<?php } ?>
			
			
			<?php if($gig_order_status[0]->type=="quantity"){?>
			
			<p class="para bold">{{ __('user.you_purchased_following') }}</p>
			<p class="para"><?php echo $gig_order_status[0]->ex_text;?> {{ __('user.quantity') }}</p>
			<?php } ?>
			
			<?php if($gig_order_status[0]->type=="shipping"){?>
			
			<p class="para bold">{{ __('user.you_purchased_following') }}</p>
			<p class="para">{{ __('user.shipping_rate') }}<?php echo $site_setting[0]->site_currency;?> <?php echo $gig_order_status[0]->ex_text;?></p>
			<?php } ?>
			
			</div>
		
		
		
		</div>
		
		<?php
		$complete_days = '+'.$gig_details[0]->complete_days.' '.'days';		   
	    $start_date = $gig_order_status[0]->payment_date;
		$end_date = date($start_date, strtotime($complete_days));
		
		$date = $start_date;
$date = strtotime($date);
$new_date = strtotime($complete_days , $date);
$end_last = date('M d, Y', $new_date);
		?>
		
		<div class="height30 clearfix"></div>
		
		<div class="gallerybox_new">
			<div class="blue_heading text-center">
			<div class="pader">{{ __('user.your_order_sent_to_seller') }}</div>
			</div>
			
			<div class="para_pads text-center">
			<p class="para"><i style="color:#00668C" class="fa fa-fighter-jet fa-3x"></i></p>
			<p class="para">{{ __('user.thank_you_order_sent_seller') }}</p>
			<p class="para">{{ __('user.expected_delivery') }} <strong><?php echo $end_last;?></strong></p>
			
			</div>
		
		
		</div>
		
		
		<div class="height30 clearfix"></div>
		<?php
		
		$check_order = DB::table('chat_message')
		           
				   ->where('gid','=',$gig_order_status[0]->gid)
				   ->where('order_id','=',$gig_order_status[0]->id)
				   ->where('buyer_id','=',$gig_order_status[0]->user_id)
				   ->where('seller_id','=',$gig_order_status[0]->gig_user_id)
				  
				   ->count();	
		
    if(!empty($check_order)){		
		$check_order_view = DB::table('chat_message')
		           
				   ->where('gid','=',$gig_order_status[0]->gid)
				   ->where('order_id','=',$gig_order_status[0]->id)
				   ->where('buyer_id','=',$gig_order_status[0]->user_id)
				   ->where('seller_id','=',$gig_order_status[0]->gig_user_id)
				  
				   ->get();	
foreach($check_order_view as $view){
             if($view->msg_type=="buyer_msg")
             {
				 $display_id = $view->buyer_id;
			 }
             else if($view->msg_type=="seller_msg")
             {
				 $display_id = $view->seller_id;
			 }			 
		$userr = DB::table('users')
				->where('id', '=', $display_id)
				->get();
				$userr_cnt = DB::table('users')
				->where('id', '=', $display_id)
				->count();
		?>
		<div class="gallerybox_new">
		<?php if(!empty($view->got_problem)){?>
		
		<?php if($view->problem_reason=="Mutual_Cancellation" && $view->msg_type=="seller_msg"){?>
		<div class="yell_heading text-center">
			<div class="pader">{{ __('user.seller_suggested_mutual_cancellation') }}</div>
			</div>
		<?php } ?>
		
		<?php if($view->problem_reason=="Mutual_Cancellation" && $view->msg_type=="buyer_msg"){?>
		<div class="yell_heading text-center">
			<div class="pader">{{ __('user.mutual_cancellation') }} </div>
			</div>
		<?php } ?>
		
		<?php } ?>

<?php 

$useid = $userr[0]->id;
			$check_shop = DB::table('shop')
							->where('user_id', '=', $useid)
							->count();
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
			$pather = "#";
			$class="";
		}

if(!empty($view->got_problem)){ if($view->complete_work=="yes"){ $green_bg="#F4FDF2"; } else { $green_bg=""; } } ?>
<?php if(!empty($view->got_problem)){ if($view->got_problem=="yes" && 	$view->problem_reason=="Reject_Order"){
	$red_bg="#FDF2F2"; } else { $red_bg=""; } } ?>		
			<div class="" style="background:<?php echo $green_bg.$red_bg;?>;">
			<div class="height10"></div>
			<div class="col-md-2 text-center">
			<a href="<?php echo $pather;?>" class="<?php echo $class;?>">
	<?php 
	
	if(!empty($userr[0]->photo)){?>
				 <img src="<?php echo $url;?>/local/images/userphoto/<?php echo $userr[0]->photo;?>" width="70" class="round">
				 <?php } else { ?>
				 <img src="<?php echo $url;?>/local/images/nophoto.jpg" alt="" width="70" class="round">
				 <?php }  ?>
				 </a>
				 <div class="font17">
				 <a href="<?php echo $pather;?>" class="<?php echo $class;?>">
				 <?php echo $userr[0]->name;?>
				 </a>
				 </div>
				 <div class="height10"></div>
	</div>
	
	<div class="col-md-7">
	
	<div class="font18">
	<?php if(!empty($view->got_problem)){?>
	<?php if($view->complete_work=="yes"){?>
	<div class="font25 bold">{{ __('user.your_order_ready') }}</div>
	<?php } ?>
	<?php } ?>
	
	
	<?php if(!empty($view->got_problem)){?>
	<?php if($view->got_problem=="yes" && 	$view->problem_reason=="Reject_Order"){?>
	<div class="font25 bold">{{ __('user.rejected_seller_work') }}</div>
	<?php } ?>
	<?php } ?>
	
	
	<div class="height20"></div>
	
	<?php if(!empty($view->got_problem)){?>
		
	<?php if($view->problem_reason=="Mutual_Cancellation"){?>{{ __('user.reason') }} : <?php }} ?>
	
	<?php echo $view->message;?>
	
	
	</div>
	<?php if($view->mutual_cancel=="no" && $view->msg_type=="seller_msg"){?><div class="ybg font15"> 	
{{ __('user.withdrawn_mutual_cancellation') }}</div><?php } ?>


<?php if($view->mutual_cancel=="no" && $view->msg_type=="buyer_msg"){?><div class="ybg font15"> 	
{{ __('user.seller_withdrawn_mutual_cancellation_proposal') }}</div><?php } ?>

	
	<div class="font18"><a href="<?php echo $url;?>/local/images/gigs/<?php echo $view->file;?>" download><?php echo $view->file;?></a></div>
	
	
	<?php if(!empty($view->got_problem)){?>
		
	<?php if($view->problem_reason=="Mutual_Cancellation" && $view->mutual_cancel=="" && $view->msg_type=="buyer_msg"){?>
	
	<div class="red">{{ __('user.abort_cancellation_continue') }}</div>
	<div class="height10"></div>
	<div class="font14">{{ __('user.order_cancelled_automatically_unless_rejected_aborted') }}</div>
	<div class="height10"></div>
	
	
	<?php } ?>
	
	
	<?php if($view->problem_reason=="Mutual_Cancellation" && $view->mutual_cancel=="" && $view->msg_type=="seller_msg"){?>
	
	<div class="height20"></div>
	<div class="font14">{{ __('user.order_cancelled_automatically_unless_rejected_aborted') }}</div>
	<div class="height10"></div>
	<div class="font16">
	<a href="<?php echo $url;?>/buyer_track/<?php echo $view->id;?>/<?php echo $gig_order_status[0]->id;?>/no" class="red">
	{{ __('user.reject_cancellation') }}</a> <a href="<?php echo $url;?>/buyer_track/<?php echo $view->id;?>/<?php echo $gig_order_status[0]->id;?>/yes" class="green">{{ __('user.accept_cancellation') }}</a></div>
	<div class="height20"></div>
	<?php }} ?>
	
	</div>
	
	<div class="col-md-3">
	<div class="height30"></div>
	<div class="font14"><?php echo $view->submit_date;?></div>
	</div>
	
		<div class="height10"></div>
		</div>
		</div>
		<div class="height20 clearfix"></div>
	<?php } } ?>
	<?php
	
		$final_status = DB::table('chat_message')
		           
				   ->where('gid','=',$gig_order_status[0]->gid)
				   ->where('order_id','=',$gig_order_status[0]->id)
				   ->where('buyer_id','=',$gig_order_status[0]->user_id)
				   ->where('seller_id','=',$gig_order_status[0]->gig_user_id)
				   ->where('got_problem', '=', 'no')
				   ->where('complete_work', '=', 'yes')
				   ->where('submission', '=', 'yes')
				   ->count();
				   if(!empty($final_status)){
				   ?>
	<div class="height30 clearfix"></div>
	<form action="{{ route('track_complete') }}" method="post" id="formID22" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="gallerybox_new">
			<div class="height20"></div>
			
			<input type="hidden" name="gid" value="<?php echo $gig_order_status[0]->gid;?>">
	<input type="hidden" name="order_id" value="<?php echo $gig_order_status[0]->id;?>">
	<input type="hidden" name="buyer_id" value="<?php echo $gig_order_status[0]->user_id;?>">
	<input type="hidden" name="seller_id" value="<?php echo $gig_order_status[0]->gig_user_id;?>">
	
			<div class="text-center">
			<div class="font30 bold text-center">{{ __('user.please_rate_review_experience') }}</div>
			</div>
			
			<div class="row para_pads text-center">
			
			<div class="font18 col-md-6" style="margin-top:20px;">
			<span><input type="radio" value="1" name="star_rate"> 
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			</span><br/>
			<span><input type="radio" value="2" name="star_rate"> 
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			</span><br/>
			<span><input type="radio" value="3" name="star_rate" checked> 
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			</span>
			<br/>
			<span><input type="radio" value="4" name="star_rate"> 
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star-o" aria-hidden="true"></i>
			</span>
			<br/>
			<span><input type="radio" value="5" name="star_rate"> 
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			</span>
			</div>
			
			
			<div class="col-md-6">
			 <div>
			 <input checked="checked" class="good-review-button" id="rating_value_1" name="ratingvalue" value="1" type="radio"><i style="color:#0ABA44" class="fa fa-thumbs-up fa-2x"></i>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input class="bad-review-button" id="rating_value_0" name="ratingvalue" value="0" type="radio"><i style="color:#F99F2A" class="fa fa-thumbs-down fa-2x"></i> 
             </div>                             
			<div>
			<textarea cols="35" id="rating_new" class="rating_new" maxlength="300" name="ratingcomment" rows="5" 
			placeholder="{{ __('user.add_feedback_this_shown_public') }}" required></textarea>
			</div>
			
			</div>
			
			<div class="">
			<input type="submit" name="feed_submit" value="Submit" class="btn btn-success btn-lg">
			</div>
			<div class="clearfix"></div>
			</div>
		
		<div class="height20"></div>
		</div>
		
		</form>
		
				   <?php } ?>
		
		<div class="height30 clearfix"></div>
		
		
		<?php
		$checker_status = DB::table('chat_message')
		           
				   ->where('gid','=',$gig_order_status[0]->gid)
				   ->where('order_id','=',$gig_order_status[0]->id)
				   ->where('buyer_id','=',$gig_order_status[0]->user_id)
				   ->where('seller_id','=',$gig_order_status[0]->gig_user_id)
				   ->where('got_problem', '=', 'yes')
				   ->where('mutual_cancel', '=', 'yes')
				   ->count();
				   
				   $finals_status = DB::table('review')
		           
				   ->where('gid','=',$gig_order_status[0]->gid)
				   ->where('order_id','=',$gig_order_status[0]->id)
				   ->where('buyer_id','=',$gig_order_status[0]->user_id)
				   ->where('seller_id','=',$gig_order_status[0]->gig_user_id)
				   ->count();
				   
				   
				   if(!empty($checker_status))
				   {
				   ?>
		
		<div class="gallerybox_new">
			<div class="reder_heading text-center">
			<div class="pader">{{ __('user.order_cancelled') }}</div>
			</div>
			
			<div class="para_pads text-center">
			<p class="para"><i style="color:#FB3737" class="fa fa-times fa-3x"></i></p>
			<p class="para">{{ __('user.order_cancelled_mutual_agreement_funds_returned') }}</p>
			
			</div>
		
		</div>
				   <?php } else if(empty($checker_status)){
					   
					   if(empty($finals_status)){
					   
					   ?>
		
		
		<div>
	<div class="btn btn-primary sv_send_message">{{ __('user.send_a_message') }}</div> 
	
	<div class="conversation_bg">
	<form action="{{ route('buyer_track') }}" method="post" id="formID" enctype="multipart/form-data">
	{{ csrf_field() }}
	
	
	<input type="hidden" name="gid" value="<?php echo $gig_order_status[0]->gid;?>">
	<input type="hidden" name="order_id" value="<?php echo $gig_order_status[0]->id;?>">
	<input type="hidden" name="buyer_id" value="<?php echo $gig_order_status[0]->user_id;?>">
	<input type="hidden" name="seller_id" value="<?php echo $gig_order_status[0]->gig_user_id;?>">
	<input type="hidden" name="msg_type" value="buyer_msg">
	
	<div class='form-group card required'>
                 <p class="para"> <strong>{{ __('user.message') }}</strong></p>
                <textarea autocomplete='off' name="msg" class='form-control validate[required] c_convert'></textarea>
              </div>
	<div class='form-group card required'>
                  <p class="para"><strong>{{ __('user.file_attachment') }}</strong></p>
                <input type="file" name="photo" class="form-control" />
				<p>{{ __('user.accepted_file_formats') }}</p>
              </div>
			  
	<div class='form-group card required'>
                 <p class="para"> <strong>{{ __('user.got_problem') }}</strong></p>
                <select name="got_problem" id="got_problem" class="form-control">
				<option value="no">{{ __('user.no') }}</option>
				<option value="yes">{{ __('user.yes') }}</option>
				</select>
              </div>
  
  <div class='form-group problemcard required' id="problemcard" style="display:none;">
<?php
$new_checker = DB::table('chat_message')
		           
				   ->where('gid','=',$gig_order_status[0]->gid)
				   ->where('order_id','=',$gig_order_status[0]->id)
				   ->where('buyer_id','=',$gig_order_status[0]->user_id)
				   ->where('seller_id','=',$gig_order_status[0]->gig_user_id)
				   ->where('got_problem', '=', 'no')
				   ->where('complete_work', '=', 'yes')
				   ->count();
				   
if(!empty($new_checker)){ $disable_txt = ""; } else { $disable_txt = "disabled"; }
?>                  
			  <div class="boxes"> 
                       <div class="box rejection first disabled" style="border-radius: 5px;"> 
<p class="para"><input type="radio" class="radio_button" name="reason" id="reject_order" value="Reject_Order" <?php echo $disable_txt;?>>
			<strong>{{ __('user.reject_delivered_work') }}</strong></p> 
                            <p>{{ __('user.seller_redeliver_available_after_delivery') }}</p> 
                        </div> 
<div class="box mutual-cancel mid mutual_toggler mutual_toggler_buyer " style="border-radius: 5px;"> 
<p class="para"><input type="radio" class="radio_button" id="reject_mutual" name="reason" value="Mutual_Cancellation"> 
<strong>{{ __('user.seller_agree_cancel') }}</strong></p> 
                            <p>{{ __('user.order_late_cancel') }}</p> 
                            </div> 
<div class="box notice last support_toggler" style="border-radius: 5px;"> 
<p class="para"><input type="radio" class="radio_button" id="get_help" name="reason" value="Get_Help"> 
<strong> {{ __('user.out_ideas') }}</strong></p> 
<p>{{ __('user.tips_solutions_order') }}</p> 
                        </div> 
                    </div>
					
	</div>
	
	<div class="support-message" id="support-message" style="display:none;">
            	<div style="clear:both !important"></div> 
                <h4 class="faq">{{ __('user.faq') }}</h4> 
                <div style="clear:both !important"></div>
                <ul class="faq" style="padding: 10px;"> 
                    <ul class="qa"> 
                        <li style="font-weight:bold">{{ __('user.seller_not_respond_messages') }}</li> 
                        <li class="a">{{ __('user.seller_not_respond_messages_para1') }}</li> 
                        <br>
                        <li style="font-weight:bold">{{ __('user.delivered_advertised_seller') }}</li> 
                        <li class="a">{{ __('user.delivered_advertised_seller_para1') }}</li> 
                    </ul> 
                </ul> 
            </div>
	
	
	<div class='form-group card required'>
	<input type="submit" name="csubmit" value="Submit" class="btn btn-success">
    </div>	
	
	</form>
	
	</div>
	
	</div>
		
					   <?php } else { ?>
					   
					   <div class="gallerybox_new">
			<div class="green_header text-center">
			<div class="pader">{{ __('user.order_completed') }}</div>
			</div>
			
			<div class="para_pads text-center">
			<p class="para"><i style="color:#0ABA44" class="fa fa-check-square-o fa-4x"></i></p>
			<p class="para">{{ __('user.this_order_complete') }} <a href="<?php echo $url;?>/chat/<?php echo $gig_order_status[0]->gig_user_id;?>">{{ __('user.talking_seller') }}</a></p>
			
			</div>
		
		</div>
		
					   <?php } ?>
		
				   <?php } ?>
		
		
	<?php } ?>
	 
	</div>
	
	</div>
	
	</div>
	
	<div class="height50 clearfix"></div>

      @include('footer')
</body>
</html>
