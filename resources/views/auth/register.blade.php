@extends('layouts.auth')
@section('title', 'Registration')
@section('content')
<div class="box-login">
	<div class="box-login-body">
		<h3><span><b>Nature Care</b> Centre</span></h3>		
		<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
			@csrf			
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" placeholder="{{ __('First Name') }}" value="{{ old('fname') }}" required />
				@if ($errors->has('fname'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('fname') }}</strong>
				</span>
				@endif
			</div>
			
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" placeholder="{{ __('Last Name') }}" value="{{ old('lname') }}" required />
				@if ($errors->has('lname'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('lname') }}</strong>
				</span>
				@endif
			</div>
			
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
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
			</div>
						
			<div class="form-group btn-grp">
				<div class="login-btn">
					<button type="submit" class="btn btn-block btn-default">{{ __('Register') }}</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
