@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<div class="box-login">
	<div class="box-login-body">
		<h3><span><b>Admin</b></span></h3>		
		<form method="POST" class="login-form" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
			@csrf			
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus />
				@if ($errors->has('email'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</div>
			
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
				@if ($errors->has('password'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</div>
			
			<div class="form-group input-group">
				<div class="checkbox">
					<label for="terms" style="padding-left: 12px;">
						<input class="icheck_flat_20" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
					</label>
				</div>
			</div>
			
			<div class="form-group btn-grp">
				<div class="login-btn">
					<button type="submit" class="btn btn-block btn-default">{{ __('Login') }}</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
