<!DOCTYPE html>
<html lang="es">
  <head>
   
   <?php echo $__env->make('admin.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('admin.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php echo $__env->make('admin.sitename', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php echo $__env->make('admin.welcomeuser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       <?php echo $__env->make('admin.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<?php $url = URL::to("/"); ?>
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Completed Withdrawal</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
				 
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SNo</th>
											<th>Username</th>
											<th>Email</th>
											<th>Mobile No</th>
											
											<th>Withdraw Amt</th>
											<th>Withdraw Mode</th>
											<th>Paypal Id</th>
											<th>Stripe Id</th>
											<th>Payumoney Id</th>
											<th>Bank Acc No</th>
											<th>Bank Info</th>
											<th>IFSC Code</th>
											<th>Status</th>
											
						  
						  
						  
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $sno=0;
					  foreach ($withdraw as $draw) {
						  $sno++;
					

                       $user_details_cnt = DB::table('users')
							  ->where('id','=',$draw->id)
							  ->count();
					  
					  if(!empty($user_details_cnt))
					  {
					  $user_details = DB::table('users')
							  ->where('id','=',$draw->id)
							  ->get();
					   $username = $user_details[0]->name;
                       				   
							  
					  }
					  else
					  {
						  $username = "";
						  
					  }    
					
					  ?>
    
						
                        <tr>
						 <td><?php echo $sno; ?></td>
						 
                          <td><?php echo $username;?></td>
                          
						  <td><?php echo $draw->email;?></td>
						  
						   <td><?php echo $draw->phone;?></td>
						   
						   
						   
						   
						   
						   
						   <td><?php echo $draw->withdraw_amt.' '.$setting[0]->site_currency;?></td>
						   
						   <td><?php echo $draw->withdraw_mode;?></td>
						   
						   <td><?php echo $draw->paypal_id;?></td>
						   
						   <td><?php echo $draw->stripe_id;?></td>
						   
						   <td><?php echo $draw->payumoney;?></td>
						   
						   <td><?php echo $draw->bank_acc_no;?></td>
						   
						   <td><?php echo $draw->bank_info;?></td>
						   
						   <td><?php echo $draw->ifsc_code;?></td>
						   
						    <td><?php echo $draw->withdraw_status;?></td>
						   
						   
						   
							
						 
                        </tr>
                        <?php } ?>
                       
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
			  
			  
			  
		 
		  
		  
		  
        </div>
        <!-- /page content -->

      <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>

    <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
	
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\tasky\local\resources\views/admin/completed_withdraw.blade.php ENDPATH**/ ?>