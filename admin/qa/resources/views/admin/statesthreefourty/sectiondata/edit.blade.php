@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-form">
                <div class="box-header">
                    <h3 class="box-title">Edit {{ $title }}</h3>
                    <a href="{{ route('sectionsdata.index', [$statesthreefourty->id,$section->id]) }}" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        
                        {!! Form::model($sectiondata, ['route' => ['sectionsdata.update', $statesthreefourty->id, $section->id,$sectiondata->id], 'method' => 'PATCH']) !!}

                        @include('admin.statesthreefourty.sectiondata.partials.form')

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Update {{ $title }}</button>
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