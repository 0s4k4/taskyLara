 
<!DOCTYPE html>
<html lang="es">
<head>

   <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
<style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
</style>



</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- slider -->
    
	
	<div class="video">
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo e(__('user.search')); ?></h1></div>
	 </div>
	<div class="container">
	 
	 <div class="height30"></div>
	 
	 
	<div class="container">
	<div class="row">
	<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('shopsearch')); ?>" id="formID" enctype="multipart/form-data">
   <div class="col-md-12">
   <?php echo csrf_field(); ?>

   
   
	<div class="col-md-4 swidth noborder" >
	
		<?php //if(!empty($serid[0]->subid)){ echo $serid[0]->subid; }
		
		
		
		?>
		<?php
	if(!empty($selservice))
	{
	$arrays =  $selservice;
	}
	?>		
				<select name="langOpt[]" multiple id="langOpt" class="validate[required]">
				<?php 
				
				foreach($viewservices as $service){
					
						
					?>
					
                <option value="<?php echo $service->subid;?>"  <?php if(!empty($selservice)){ if(in_array($service->subid,$arrays)){?> selected <?php }  } ?>    ><?php echo $service->subname;?></option>
                <?php } ?>
                </select>
	
	</div>
	
	
	
	<div class="col-md-3 swidth nocity">	
		
		<input type="text"  name="city" id="txtPlaces" class="form-control" placeholder="<?php echo e(__('user.enter_city')); ?>" value="<?php if(!empty($city)){ echo $city; } ?>">
	</div>	
	
	
	<div class="col-md-3 swidth nocity">
	<select name="star_rate" class="form-control">
	<option value=""><?php echo e(__('user.star_rating')); ?></option>
	<option value="1" <?php if(!empty($star_rate)) { if($star_rate==1){?> selected <?php } } ?>><?php echo e(__('user.one_star')); ?></option>
	<option value="2" <?php if(!empty($star_rate)) { if($star_rate==2){?> selected <?php } } ?>><?php echo e(__('user.two_stars')); ?></option>
	<option value="3" <?php if(!empty($star_rate)) { if($star_rate==3){?> selected <?php } } ?>><?php echo e(__('user.three_stars')); ?></option>
	<option value="4" <?php if(!empty($star_rate)) { if($star_rate==4){?> selected <?php } } ?>><?php echo e(__('user.four_stars')); ?></option>
	<option value="5" <?php if(!empty($star_rate)) { if($star_rate==5){?> selected <?php } } ?>><?php echo e(__('user.five_stars')); ?></option>
	</select>
	</div>
	
	
	<div class="col-md-2 custobtn">
		                       
							   
                                <button type="submit" class="btn btn-success btn-md">
                                    <?php echo e(__('user.filter')); ?> 
                                </button>
                           
		</div>
	
	
	
	</div>
	
	</form> 
	
	</div>
	
	</div>
	
	</div>
	<div class="notopborder"></div>
	<div class="container">
	
	<div class="container">
	
	
	<div class="clearfix"></div>
	
	<?php /* ?><?php if(!empty($count)) { if(!empty($viewnames)){?><div><h4 style="line-height:25px;">Search Result : <?php echo $viewnames;?></h4></div><?php } } ?><?php */?>
	
	
	<div class="row">
			<div class="col-md-6 svsearch">
			<div class="clearfix"></div>
		<?php foreach($newsearches as $shop){  	?>
	
				<div class="col-md-6">
				<div class="shop-list-page">
				<div class="shop_pic">
						<?php 
						$shopphoto="/shop/";
						$paths ='/local/images'.$shopphoto.$shop->cover_photo;
						if($shop->cover_photo!=""){
						?>
						<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><img src="<?php echo $url.$paths;?>" class="img-responsive imgservice"></a>
						<?php } else { ?>
						<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><img src="<?php echo $url.'/local/images/no-image-big.jpg';?>" class="img-responsive imgservice"></a>
						<?php } ?>
				</div>
			
			
			
				<div class="col-lg-12 imgthumb">
				<?php 
						$npaths ='/local/images'.$shopphoto.$shop->profile_photo;
						if($shop->profile_photo!=""){?>
						<img align="center" class="sthumb" src="<?php echo $url.$npaths;?>" alt="<?php echo e(__('user.profile_hoto')); ?>"/>
						<?php } else { ?>
						<img align="center" class="sthumb" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="Profile Photo"/>
						<?php } ?>
				</div>
			
				<?php
					if($shop->rating=="")
						{
						$starpath = '/local/images/nostar.png';
						}else {
						$starpath = '/local/images/'.$shop->rating.'star.png';
						}
			
					?>
			
				<div class="col-lg-12 shop_content">
					<h4 class="sv_shop_style"><a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><?php echo $shop->shop_name; ?>
					
					</a></h4>
							
				<img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating==""){ echo "0"; } else { echo $shop->rating; }?> stars"  class="star_rates" />
				<h5><span class="lnr lnr-map-marker"></span>&nbsp;<?php echo $shop->city; ?></h5>
				
				<?php 				
					if($shop->start_time>12)
					{
						$start=$shop->start_time-12;
						$stime=$start."PM";
					}
					else
					{
						$stime=$shop->start_time."AM";
					}
					if($shop->end_time>12)
					{
						$end=$shop->end_time-12;
						$etime=$end."PM";
					}
					else
					{
						$etime=$shop->end_time."AM";
					}
				?>
				<h5><span class="lnr lnr-clock"></span>&nbsp; <?php echo $stime; ?> - <?php echo $etime; ?></h5>
							
				<div align="center"><a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" class="btn btn-success radiusoff"><?php echo e(__('user.view_shop_book')); ?></a></div>
			</div> 
					
			</div>
		</div>	
	
	<?php }  ?>
</div>	
	<div class="col-md-6">
	<?php 
	$wel_count = count($newsearches);
	if(!empty($wel_count)){?>
	<div id="map_canvas" style="width:100%; min-height:700px; margin-top:30px;"></div>
    <?php } ?>
	
  <script type="text/javascript">


    
var locations = [
<?php foreach($newsearches as $shop){ ?>
    ['<?php echo $shop->shop_name;?>', '<?php echo $shop->address;?>', '<?php echo $url;?>/vendor/<?php echo $shop->shop_name;?>'],
<?php } ?>    
];

var geocoder;
var map;
var bounds = new google.maps.LatLngBounds();

function initialize() {
    map = new google.maps.Map(
    document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(),
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    geocoder = new google.maps.Geocoder();

    for (i = 0; i < locations.length; i++) {


        geocodeAddress(locations, i);
    }
}
google.maps.event.addDomListener(window, "load", initialize);

function geocodeAddress(locations, i) {
    var title = locations[i][0];
    var address = locations[i][1];
    var url = locations[i][2];
    geocoder.geocode({
        'address': locations[i][1]
    },

    function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var marker = new google.maps.Marker({
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                map: map,
                position: results[0].geometry.location,
                title: title,
                animation: google.maps.Animation.DROP,
                address: address,
                url: url
            })
            infoWindow(marker, map, title, address, url);
            bounds.extend(marker.getPosition());
            map.fitBounds(bounds);
        } else {
            //alert("geocode of " + address + " failed:" + status);
        }
    });
}

function infoWindow(marker, map, title, address, url) {
    google.maps.event.addListener(marker, 'click', function () {
        var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><div><a href='" + url + "'>View Shop</a></p></div>";
        iw = new google.maps.InfoWindow({
            content: html,
            maxWidth: 350
        });
        iw.open(map, marker);
    });
}

function createMarker(results) {
    var marker = new google.maps.Marker({
        icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
        map: map,
        position: results[0].geometry.location,
        title: title,
        animation: google.maps.Animation.DROP,
        address: address,
        url: url
    })
    bounds.extend(marker.getPosition());
    map.fitBounds(bounds);
    infoWindow(marker, map, title, address, url);
    return marker;
}
</script>

	
	
	</div>





	
	<?php if($count==0){ ?>
	 No data found!
	
	<?php } ?>
	

	
	
	</div>
	
	
	<?php echo e($newsearches->appends(\Request::except('_token'))->render()); ?>

	
	
	</div>
	
	
	</div>
	
	

   <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\venkat\tasky\tasky\local\resources\views/shopsearch.blade.php ENDPATH**/ ?>