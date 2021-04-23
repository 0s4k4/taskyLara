<div class="register-page">
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


	<div class="register-box">
        <div class="register-box-overlay">
            <div class="panel panel-default">
                
				<div class="panel-body text-center">
				<div class="login-logo text-center">
						 <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="" /></a>
					</div>
				<div class="col-xs-8 col-xs-offset-2">
					
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input id="name" type="text" class="form-control input-lg" placeholder="{{ __('user.username') }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control input-lg" placeholder="{{ __('user.email_address') }}" name="email" value="{{ old('email') }}" required>

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
                                <input id="password-confirm" type="password" placeholder="{{ __('user.confirm_password') }}" class="form-control input-lg" name="password_confirmation" required>
                        </div>											
						
						 <div class="form-group">
                                <input id="phoneno" type="text" class="form-control input-lg" placeholder="{{ __('user.phone_no') }}" name="phoneno" required>
                        </div>												
						
						<div class="form-group">
							<select name="gender" class="form-control input-lg" required>
							  
							  <option value="">{{ __('user.gender') }}</option>
							   <option value="male">{{ __('user.male') }}</option>
							   <option value="female">{{ __('user.female') }}</option>
							</select>
                        </div>
						<div class="form-group">
							<select name="usertype" class="form-control input-lg" required>
							  <option value="">{{ __('user.user_type') }}</option>
							   <option value="0">{{ __('user.customer') }}</option>
							   <option value="2">{{ __('user.seller') }}</option>
							</select>                              
                        </div>
                        <div class="form-group">
                            <button type="submit" class="borbtn-inverse form-control btn btn-lg">
                                {{ __('user.create_account') }}
                            </button>
                        </div>
                        {{ __('user.already_have_account') }}<a class="btn-link" href="{{ route('login') }}">{{ __('user.sign_in') }}</a>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection