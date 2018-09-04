<div class="form-group {!! ($errors->has('color') ? 'has-error' : '') !!}">
    {!! Form::label('color','Colorsfdsfsdf', ['class' => 'control-label']) !!}
    {!! Form::text('color', null, ['class' => 'form-control my-colorpicker1' . ($errors->has('color') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('color', '<span class="help-block">:message</span>') !!}

   
</div>

<div class="form-group {!! ($errors->has('hoverColor') ? 'has-error' : '') !!}">
    {!! Form::label('hoverColor','Hover Color', ['class' => 'control-label']) !!}
    {!! Form::text('hoverColor', null, ['class' => 'form-control my-colorpicker1' . ($errors->has('hoverColor') ? ' is-invalid' : ''), 'maxlength' => 2]) !!}
    {!! $errors->first('hoverColor', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>




