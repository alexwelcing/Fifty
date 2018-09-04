{!! Form::hidden('datas_id', $data->id) !!}

<div class="form-group {!! ($errors->has('categories_id') ? 'has-error' : '') !!}">
    {!! Form::label('categories_id','Categories', ['class' => 'control-label']) !!}
    {!! Form::select('categories_id', $categories, null, ['class' => 'form-control' . ($errors->has('categories_id') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('categories_id', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('description') ? 'has-error' : '') !!}">
    {!! Form::label('description','Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>

@if($data->table_rows=='2')
<div class="form-group {!! ($errors->has('description2') ? 'has-error' : '') !!}">
    {!! Form::label('description2','Description 2', ['class' => 'control-label']) !!}
    {!! Form::textarea('description2', null, ['class' => 'form-control' . ($errors->has('description2') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('description2', '<span class="help-block">:message</span>') !!}
</div>
@endif

@section('script')
<script>
CKEDITOR.replace('description');
CKEDITOR.replace('description2');
</script>
@endsection