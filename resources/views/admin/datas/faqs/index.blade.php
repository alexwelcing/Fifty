@extends('layouts.admin')

@section('content')
<section class="content">                    
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List {{ $title }}</h3>
                   
                    <div class="pull-right">
                        <a href="{{ route('datas.show', $data->id) }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                        <a href="{{ route('faqs.create', $data->id) }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
                
                @include('admin.datas.faqs.partials.table',['datas' => $faqs])

            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop