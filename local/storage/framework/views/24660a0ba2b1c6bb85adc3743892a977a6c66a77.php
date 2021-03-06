<?php
use Illuminate\Support\Facades\Route;
use Responsive\Language;
 
$languages=language::get();
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
if(Auth::check()) 
{
	if(Auth::user()->provider!="" && Auth::user()->admin==3)
	{
		if($currentPaths!='step2'){
		?>
		<script type="text/javascript">
		window.location.href="<?php echo $url;?>/step2";
		</script>
		<?php
		}
	}
}		
?>		
<div class="navbar sticky <?php if($currentPaths=="index" or $currentPaths=="/"){?>homenav<?php } else {?>migrateshop_othernav<?php } ?> navbar-inverse" role="navigation">
      <div class="container topbottom">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#b-menu-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <a class="" href="<?php echo $url;?>">
		   <?php if(!empty($setts[0]->site_logo)){ ?>
		  
		  <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="" />
		   <?php } ?>
		   
		  </a>
        </div>
        <div class="collapse navbar-collapse" id="b-menu-1">
			
		
          <ul class="nav navbar-nav navbar-right <?php if($currentPaths=="index" or $currentPaths=="/"){?>sangvish_homepage<?php } else {?>sangvish_otherpage<?php } ?>">
		  <!--<li class="active"><a href="#">Join as a pro</a></li>-->
            <?php if (Auth::guest()) {?>
			
            <li><a href="<?php echo $url;?>/register"><?php echo e(__('user.signup')); ?></a></li>
            <li><a href="<?php echo $url;?>/login"><?php echo e(__('user.login')); ?></a></li>
           	 <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo e(__('user.language')); ?><i class="fa fa-angle-down" aria-hidden="true"></i> </a>
              	<ul class="dropdown-menu">
              		<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="" value="<?php echo e($language->symbol); ?>" class="language_value"> <?php echo e($language->name); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
              	</ul>
            </li>
			<li><a href="<?php echo $url;?>/new-request"  class="borbtn"><?php echo e(__('user.post_job')); ?></a></li>
            <?php } else { ?>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo e(Auth::user()->name); ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
</a>
              <ul class="dropdown-menu">
                 <?php if(Auth::check()) {

               $view_unread = DB::table('tbl_private_message')
                        
						->where('receiver', '=', Auth::user()->id)
						->where('read_status', '=', 1)
						->orderBy('pid','desc')
                        ->count();

				 ?>
                <?php if(Auth::user()->admin==1) {?>
				<li><a href="<?php echo e(url('admin/')); ?>" target="_blank">Admin Dashboard</a></li>
				<?php } ?>
								
				<?php if(Auth::user()->admin==0) {?>
				<li><a href="<?php echo $url;?>/dashboard"><?php echo e(__('user.my_profile')); ?></a></li>
				
				<li><a href="<?php echo $url;?>/my_bookings"><?php echo e(__('user.my_bookings')); ?></a></li>
				
				<li class="dropdown-submenu">
                <a tabindex="-1" href="#"><?php echo e(__('user.my_jobs')); ?></a>
                <ul class="dropdown-menu ">
                  <li><a href="<?php echo $url;?>/my_request"><?php echo e(__('user.my_posted_jobs')); ?></a></li>
                 
                  <li><a href="<?php echo $url;?>/my_client_request"><?php echo e(__('user.running_jobs_client')); ?></a></li>
				  <li><a href="<?php echo $url;?>/my_freelancer_request"><?php echo e(__('user.running_jobs_freelancer')); ?></a></li>
                  <li><a href="<?php echo $url;?>/my_applied_request"><?php echo e(__('user.my_applied_jobs')); ?></a></li>
				  <li><a href="<?php echo $url;?>/buyer_request"><?php echo e(__('user.all_jobs')); ?></a></li>
                </ul>
              </li>
				
				<li><a href="<?php echo $url;?>/messages"><?php echo e(__('user.my_messages')); ?> <?php if(!empty($view_unread)){?><span class="countes"><?php echo $view_unread;?></span><?php } ?></a></li>
				<li><a href="<?php echo $url;?>/wallet"><?php echo e(__('user.wallet')); ?></a></li>
				<?php } ?>			
								
								
			    <?php if(Auth::user()->admin==2) {
					
					$sellmail = Auth::user()->email;
    	 $shcount = DB::table('shop')
		 ->where('seller_email', '=',$sellmail)
		 ->count();
					?>
				<li><a href="<?php echo $url;?>/dashboard"><?php echo e(__('user.my_profile')); ?></a></li>
				<li><a href="<?php echo $url;?>/my_bookings"><?php echo e(__('user.my_bookings')); ?></a></li>
				<li><a href="<?php echo $url;?>/messages"><?php echo e(__('user.my_messages')); ?> <?php if(!empty($view_unread)){?><span class="countes"><?php echo $view_unread;?></span><?php } ?></a></li>
				<li><a href="<?php echo $url;?>/myorder"><?php echo e(__('user.my_order')); ?></a></li>
				
				
				 <li class="dropdown-submenu">
                <a tabindex="-1" href="#" class="test"><?php echo e(__('user.my_jobs')); ?></a>
                <ul class="dropdown-menu sv_sub_menu">
                  <li><a href="<?php echo $url;?>/my_request"><?php echo e(__('user.my_posted_jobs')); ?></a></li>
                 
                  <li><a href="<?php echo $url;?>/my_client_request"><?php echo e(__('user.running_jobs_client')); ?></a></li>
				  <li><a href="<?php echo $url;?>/my_freelancer_request"><?php echo e(__('user.running_jobs_freelancer')); ?></a></li>
                  <li><a href="<?php echo $url;?>/my_applied_request"><?php echo e(__('user.my_applied_jobs')); ?></a></li>
				  <li><a href="<?php echo $url;?>/buyer_request"><?php echo e(__('user.all_jobs')); ?></a></li>
                </ul>
              </li>
				
				
				<li><a href="<?php if(empty($shcount)){?><?php echo $url;?>/addshop<?php } else { ?><?php echo $url;?>/shop<?php } ?>"><?php echo e(__('user.my_shop')); ?></a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/services" <?php if(empty($shcount)){?>class="disabled"<?php } ?>><?php echo e(__('user.my_services')); ?> </a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/gallery" <?php if(empty($shcount)){?>class="disabled"<?php } ?>><?php echo e(__('user.shop_gallery')); ?></a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/wallet" <?php if(empty($shcount)){?>class="disabled"<?php } ?>><?php echo e(__('user.wallet')); ?></a></li>
				
				<?php } ?>			
								
								
								<?php } ?>										
                <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <?php echo e(__('user.logout')); ?></a></li>
                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
              </ul>
            </li>
             <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo e(__('user.language')); ?><i class="fa fa-angle-down" aria-hidden="true"></i> </a>
          		
              	<ul class="dropdown-menu">
					<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="" value="<?php echo e($language->symbol); ?>" class="language_value"> <?php echo e($language->name); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              	</ul>
            </li>
			<li><a href="<?php echo $url;?>/new-request"  class="borbtn"> <?php echo e(__('user.post_job')); ?></a></li>
			<?php } ?>
          </ul>
        </div> <!-- /.nav-collapse -->
      </div> <!-- /.container -->
    </div> <!-- /.navbar -->
	
	<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>



<!-- Mobile menu start here -->
<header class="sv_mob_menu">
<div id="mySidenav" class="sidenav ">
    <div class="header_part">
    <span class="sv_menu_title">Tasky</span>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  </div>
  
    <?php if (Auth::guest()) {?>
			
           <a href="<?php echo $url;?>/register"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  <?php echo e(__('user.signup')); ?></a>
           <a href="<?php echo $url;?>/login"><i class="fa fa-sign-in" aria-hidden="true"></i><?php echo e(__('user.login')); ?></a>

           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-globe" aria-hidden="true"></i>
 <?php echo e(__('user.language')); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu sv_sub_menu">
			<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="" value="<?php echo e($language->symbol); ?>" class="language_value"> <?php echo e($language->name); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  </li>


		    <a href="<?php echo $url;?>/new-request"  class="borbtn"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Post a Job</a>
            <?php } else {  ?>
            
           
                 <?php if(Auth::check()) {

               $view_unread = DB::table('tbl_private_message')
                        
						->where('receiver', '=', Auth::user()->id)
						->where('read_status', '=', 1)
						->orderBy('pid','desc')
                        ->count();

				 ?>
                <?php if(Auth::user()->admin==1) {?>
				<li><a href="<?php echo e(url('admin/')); ?>" target="_blank">Admin Dashboard</a></li>
				<?php } ?>
								
				<?php if(Auth::user()->admin==0) {?>
				<li><a href="<?php echo $url;?>/dashboard"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo e(__('user.my_profile')); ?></a></li>
				
				<li><a href="<?php echo $url;?>/my_bookings"><i class="fa fa-check" aria-hidden="true"></i> <?php echo e(__('user.my_bookings')); ?></a></li>
				
			               
                  <li><a href="<?php echo $url;?>/my_request"><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo e(__('user.my_posted_jobs')); ?></a></li>
                 
                  <li><a href="<?php echo $url;?>/my_client_request"><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo e(__('user.running_jobs_client')); ?></a></li>
				  <li><a href="<?php echo $url;?>/my_freelancer_request"><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo e(__('user.running_jobs_freelancer')); ?></a></li>
                  <li><a href="<?php echo $url;?>/my_applied_request"><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo e(__('user.my_applied_jobs')); ?></a></li>
				  <li><a href="<?php echo $url;?>/buyer_request"><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo e(__('user.all_jobs')); ?></a></li>
				
				<li><a href="<?php echo $url;?>/messages"><i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo e(__('user.my_messages')); ?> <?php if(!empty($view_unread)){?><span class="countes"><?php echo $view_unread;?></span><?php } ?></a></li>
				<li><a href="<?php echo $url;?>/wallet"><i class="fa fa-money" aria-hidden="true"></i><?php echo e(__('user.wallet')); ?></a></li>
				<?php } ?>			
				
			
								
			    <?php if(Auth::user()->admin==2) {
					
					$sellmail = Auth::user()->email;
    	 $shcount = DB::table('shop')
		 ->where('seller_email', '=',$sellmail)
		 ->count();
					?>
					
				<li><a href="<?php echo $url;?>/dashboard"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo e(__('user.my_profile')); ?></a></li>
				<li><a href="<?php echo $url;?>/my_bookings"><i class="fa fa-check" aria-hidden="true"></i> <?php echo e(__('user.my_bookings')); ?></a></li>
				<li><a href="<?php echo $url;?>/messages"><i class="fa fa-commenting-o" aria-hidden="true"></i>  <?php echo e(__('user.my_messages')); ?> <?php if(!empty($view_unread)){?><span class="countes"><?php echo $view_unread;?></span><?php } ?></a></li>
				<li><a href="<?php echo $url;?>/myorder"><i class="fa fa-first-order" aria-hidden="true"></i> <?php echo e(__('user.my_order')); ?></a></li>
				
				
				<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-search-minus" aria-hidden="true"></i><?php echo e(__('user.my_jobs')); ?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu sv_sub_menu">
			  <li><a href="<?php echo $url;?>/new-request"  class="borbtn"><?php echo e(__('user.post_job')); ?></a></li>
                   <li><a href="<?php echo $url;?>/my_request"><?php echo e(__('user.my_posted_jobs')); ?></a></li>
                 
                  <li><a href="<?php echo $url;?>/my_client_request"><?php echo e(__('user.running_jobs_client')); ?></a></li>
				  <li><a href="<?php echo $url;?>/my_freelancer_request"><?php echo e(__('user.running_jobs_freelancer')); ?></a></li>
                  <li><a href="<?php echo $url;?>/my_applied_request"><?php echo e(__('user.my_applied_jobs')); ?></a></li>
				  <li><a href="<?php echo $url;?>/buyer_request"><?php echo e(__('user.all_jobs')); ?></a></li>
                  </ul>
                  </li>
				
				<li><a href="<?php if(empty($shcount)){?><?php echo $url;?>/addshop<?php } else { ?><?php echo $url;?>/shop<?php } ?>"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <?php echo e(__('user.my_shop')); ?></a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/services" <?php if(empty($shcount)){?>class="disabled"<?php } ?>><i class="fa fa-cogs" aria-hidden="true"></i><?php echo e(__('user.my_services')); ?> </a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/gallery" <?php if(empty($shcount)){?>class="disabled"<?php } ?>><i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo e(__('user.shop_gallery')); ?> </a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/wallet" <?php if(empty($shcount)){?>class="disabled"<?php } ?>><i class="fa fa-money" aria-hidden="true"></i> <?php echo e(__('user.wallet')); ?> </a></li>
				
				<?php } ?>			
								 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-globe" aria-hidden="true"></i>
 <?php echo e(__('user.language')); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu sv_sub_menu">
			<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="" value="<?php echo e($language->symbol); ?>" class="language_value"> <?php echo e($language->name); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  </li>	
								<?php } ?>										
                <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo e(__('user.logout')); ?> </a></li>
                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
             
            
		
			<?php } ?>
  
  
</div>



<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

 <a class="" href="<?php echo $url;?>">
		   <?php if(!empty($setts[0]->site_logo)){ ?>
		  
		  <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="" />
		   <?php } ?>
		   
		  </a>

<script type="text/javascript">
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
 </header>  

<script>
    
    // Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}
</script>

<script>
$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});

</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script><!-- language -->
<script type="text/javascript" defer="defer">//language
    $(document).ready(function(){
      	$(".language_value").click(function(){
	        $.cookie("language", $(this).attr("value"),{ path: '/', expires: 365 });
        	console.log($.cookie("language"));
        	location.reload();
      	});
	});
</script>	
<script type="text/javascript">
	$(document).ready(function(){  
	  	var rtl_arabic=$.cookie('language');
	  	if (rtl_arabic == "ar" ){
	  		$("body").addClass("rtl_arabic");

	  		$(".rtl_arabic").attr("dir", "rtl");
	  	} 
	  	else{
	  		$("body").removeClass("rtl_arabic");
	  	}
 	}); 
</script><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/header.blade.php ENDPATH**/ ?>