@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-form">
                <div class="box-header">
                    <h3 class="box-title">Create {{ $title }}</h3>
                    <a href="{{ route('faqs.index', $data->id) }}" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        
                        {!! Form::open(['route' => ['faqs.store', $data]]) !!}

                        @include('admin.datas.faqs.partials.form')

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create {{ $title }}</button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@stop