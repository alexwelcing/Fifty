<div class="form-group {!! ($errors->has('question') ? 'has-error' : '') !!}">
    {!! Form::label('question','Question', ['class' => 'control-label']) !!}
    {!! Form::text('question', null, ['class' => 'form-control' . ($errors->has('question') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('question', '<span class="help-block">:message</span>') !!}
</div>



<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>