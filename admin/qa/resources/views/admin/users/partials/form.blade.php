<div class="form-group {!! ($errors->has('fname') ? 'has-error' : '') !!}">
    {!! Form::label('fname','First Name', ['class' => 'control-label']) !!}
    {!! Form::text('fname', null, ['class' => 'form-control' . ($errors->has('fname') ? ' is-invalid' : ''), 'maxlength' => 100]) !!}
    {!! $errors->first('fname', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('lname') ? 'has-error' : '') !!}">
    {!! Form::label('lname','Last Name', ['class' => 'control-label']) !!}
    {!! Form::text('lname', null, ['class' => 'form-control' . ($errors->has('lname') ? ' is-invalid' : ''), 'maxlength' => 100]) !!}
    {!! $errors->first('lname', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('email') ? 'has-error' : '') !!}">
    {!! Form::label('email','Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
    {!! $errors->first('lname', '<span class="help-block">:message</span>') !!}
</div>
@if(Request::segment(4)!='edit')
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
@endif
<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>