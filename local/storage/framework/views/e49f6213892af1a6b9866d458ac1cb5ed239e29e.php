<?php
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		?>
<title><?php echo $setts[0]->site_name;?></title><?php /**PATH C:\xampp\htdocs\taskyLara\local\resources\views/admin/title.blade.php ENDPATH**/ ?>