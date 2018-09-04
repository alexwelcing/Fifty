<div class="form-group {!! ($errors->has('name') ? 'has-error' : '') !!}">
    {!! Form::label('name','Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('abbreviation') ? 'has-error' : '') !!}">
    {!! Form::label('abbreviation','Abbreviation', ['class' => 'control-label']) !!}
    {!! Form::text('abbreviation', null, ['class' => 'form-control' . ($errors->has('abbreviation') ? ' is-invalid' : ''), 'maxlength' => 2]) !!}
    {!! $errors->first('abbreviation', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>