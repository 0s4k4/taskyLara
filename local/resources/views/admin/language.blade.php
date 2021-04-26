<!DOCTYPE html>
<html lang="es">
  	<head>
	   	@include('admin.title')
	    @include('admin.style')
  	</head>
  	<body class="nav-md">
    	<div class="container body">
      		<div class="main_container">
        		<div class="col-md-3 left_col">
          			<div class="left_col scroll-view">
            			@include('admin.sitename')
            			<div class="clearfix"></div>
			            <!-- menu profile quick info -->
			            @include('admin.welcomeuser')
			            <!-- /menu profile quick info -->

			            <br />

			            <!-- sidebar menu -->
			            @include('admin.menu')
          			</div>
        		</div>

	        	<!-- top navigation -->
	       		@include('admin.top')
				<?php $url = URL::to("/"); ?>
	        	<!-- /top navigation -->

	        	<!-- page content -->
		        <div class="right_col" role="main">
		           	<div class="col-md-12 col-sm-12 col-xs-12">
		                <div class="x_panel">
		                  	<div class="x_title">
			                    <h2>Languages</h2>
			                    <ul class="nav navbar-right panel_toolbox">
			                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			                    </ul>
			                    <div class="clearfix"></div>
			                </div>
			                <div class="row">
			                	<div class="col-md-2"></div>
				              	<div class="col-md-8 col-sm-12 col-xs-12">
					                <div class="x_panel" >
					                  	<div class="x_content" style="margin-top: 6%;">
					                   		<form class="form-horizontal"  role="form" method="POST" action="{{ route('language.store') }}">
					                     		{{ csrf_field() }}  
						                      	<div class="item form-group">
							                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Language Name:
							                        </label>
							                        <div class="col-md-6 col-sm-6 col-xs-12">
							                          	<input id="name" class="form-control col-md-7 col-xs-12"  name="name" value="" required="required" type="text">
												   	</div>
						                      	</div>
						                      	<div class="item form-group">
							                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="symbol">Language Symbol: 
							                        </label>
							                        <div class="col-md-6 col-sm-6 col-xs-12">
							                          <input type="text" id="symbol" name="symbol" required="required" value="" class="form-control col-md-7 col-xs-12">
							                        </div>
						                      	</div>
						                     
						                      	<div class="form-group">
							                        <div class="col-md-6 col-md-offset-3">
													 <?php if(config('global.demosite')=="yes"){?>
													 <a href="#" class="btn btn-success btndisable">Submit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
							                          <button type="submit" class="btn btn-success">Submit</button>
				  <?php } ?>
													  
							                        </div>
						                      	</div>
					                    	</form>
					                  	</div>
					                </div>
	            			</div>
	              		</div>
	              	</div>
	              	<table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	                    <thead>
	                        <tr>
	                          	<th>Sno</th>
	                          	<th>Name</th>
	                          	<th>Language code</th>
	                          	<th>Edit</th>
	                          	<th>Delete</th>
	                        </tr>
	                    </thead>
	                    <tbody>
						  	@foreach ($languages as $language)
		                        <tr>
								 	<td>{{$language->id}}</td>
		                          	<td>{{$language->name}}</td>
		                          	<td>{{$language->symbol}}</td>
								  	<td> 
									<?php if(config('global.demosite')=="yes"){?>
													 <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				  
				  <a href="{{ route('language.edit',['id'=>$language->id]) }}" class="btn btn-success">Edit</a></td>
				  <?php } ?>
								  	
								  		<!-- <a href="{{ route('language.destroy',['id'=>$language->id]) }}" >
						                  <button class="btn btn-danger" type="submit">Delete</button>
						                </a> -->

						            <td>
									<?php if(config('global.demosite')=="yes"){?>
													 <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				  
						                <form method="POST" action="{{ route('language.destroy',['id'=>$language->id]) }}">
										    {{ csrf_field() }}
										    {{ method_field('DELETE') }}
										    <button class="btn btn-danger" type="submit">Delete</button>
										</form>
										<?php } ?>
								  	</td>
		                        </tr>
	                       @endforeach
	                    </tbody>
	                </table>
	       		</div>
    		</div>
    	</div>
		@include('admin.footer')
  	</body>
</html>
