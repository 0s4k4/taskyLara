<div class="login-page">
<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>

@extends('layouts.app')
@section('content')
@include('style')

<?php
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$hidden = explode(',',$setts[0]->social_login_option);
		?>		
	
	
	 @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif

	
	
	@if(Session::has('resenderr'))
		
<?php 

$gett = Session::get('resenderr');

$ery = 'Confirme la verificación del correo electrónico para iniciar sesión <a href="'.$url.'/index/'.$gett.'" style="font-weight:bold; text-decoration:underline;">Resend Email</a>'; ?>
	    <div class="alert alert-danger">

	      <?php echo $ery;?>

	    </div>

	@endif
	
	
	
        <div class="login-box">
        <div class="login-box-overlay">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
						<div class="login-logo text-center">
						 <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="" /></a>
						</div>
						<div class="col-sm-12">
						<div class="col-sm-8 col-sm-offset-2 text-center">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="username" type="text" class="form-control input-lg" placeholder="Correo electrónico" name="username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control input-lg" placeholder="{{ __('user.password') }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('user.remember_me') }}
                                    </label>
                                </div>
                        </div>						

                        <div class="form-group">
                                <button type="submit" class="borbtn-inverse form-control btn-lg">
                                    {{ __('user.login') }}
                                </button>
                        </div>
                        	@if(Session::has('error'))
                        

                        

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
						<div class="form-group">
                                <a class="btn-link" href="{{ route('forgot') }}">
                                     {{ __('user.forgot_your_password') }}
                                </a><br>
                                {{ __('user.not_registered') }} <a class="btn-link" href="{{ route('register') }}">{{ __('user.create_an_account') }} </a>
                        </div>
						</div>
						</div>

                      


                        
						<!-- se comenta mientras se arregla la api de verificacion por redes sociales
						<div class="col-sm-12 text-center">
						<?php  if (in_array('Facebook', $hidden)){?>
							<div class="form-group"><a href="{{ url('/login/facebook') }}"><img src="<?php echo $url;?>/local/images/button1.png" border="0"></a></div>
						<?php } ?>		
						<?php  if (in_array('Twitter', $hidden)){?>
							<div class="form-group"><a href="{{ url('/login/twitter') }}"><img src="<?php echo $url;?>/local/images/button2.png" border="0"></a></div>
						<?php } ?>	
							<?php  if (in_array('GPlus', $hidden)){?>
							<div class="form-group"><a href="{{ url('/login/google') }}"><img src="<?php echo $url;?>/local/images/button3.png" border="0"></a></div>

						<?php } ?>
                -->
                        <!--se establece un a para rediridir al inicio--->
                        <a href="<?php echo $url;?>/index"  class="btn-link">Volver a inicio</a>

					</div>
						
						
                    </form>
                </div>
            </div>
        </div>
        </div>

</div>

@endsection
