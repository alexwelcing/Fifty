<div class="form-group {!! ($errors->has('title') ? 'has-error' : '') !!}">
    {!! Form::label('title','Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('first_heading') ? 'has-error' : '') !!}">
    {!! Form::label('first_heading','First Heading', ['class' => 'control-label']) !!}
    {!! Form::text('first_heading', null, ['class' => 'form-control' . ($errors->has('first_heading') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('first_heading', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('second_heading') ? 'has-error' : '') !!}">
    {!! Form::label('second_heading','Second Heading', ['class' => 'control-label']) !!}
    {!! Form::text('second_heading', null, ['class' => 'form-control' . ($errors->has('second_heading') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('second_heading', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('states_id') ? 'has-error' : '') !!}">
    {!! Form::label('states_id','States', ['class' => 'control-label']) !!}
    {!! Form::select('states_id', $states, null, ['class' => 'form-control' . ($errors->has('states_id') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('states_id', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('table_rows') ? 'has-error' : '') !!}">
    {!! Form::label('table_rows','Rows', ['class' => 'control-label']) !!}    
    {!! Form::select('table_rows', array('1' => 'One', '2' => 'Two'), null, ['class' => 'form-control' . ($errors->has('table_rows') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('table_rows', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>