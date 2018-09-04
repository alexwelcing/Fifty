@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-form">
                <div class="box-header">
                    <h3 class="box-title">Create {{ $title }}</h3>
                    </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        
                        {!! Form::open(['route' => 'uploadstatecsv.store', 'files' => true]) !!}

                        @include('admin.uploadstatecsv.partials.form')

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ $title }}</button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                     <a href="{{ url('api/statesdata/') }}"><button type="button" class="btn btn-success"> Create 115State json</button></a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@stop