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

        @include('admin.top')
		
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
		 
		      <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
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
                <?php $url = URL::to("/"); ?>   
                <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('language.update',$language->id) }}" >
                  {{ csrf_field() }}  
                  <span class="section">Edit Page</span>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="" class="form-control col-md-7 col-xs-12"  name="name" value="{{$language->name}} " required="required" type="text">
			              </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="symbol">Symbol <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="" class="form-control col-md-7 col-xs-12"  name="symbol" value="{{$language->symbol}}" required="required" type="text">
                    </div>
                  </div>
					        <input type="hidden" name="language_id" value="{{$language->id}}">
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <a href="" class="btn btn-primary">Cancel</a>
                      <button id="send" type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          @include('admin.footer')
        </div>
      </div>
    </div>
  </body>
</html>
