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
                        <a href="{{ route('statesthreefourty.show', [$statesthreefourty->id,$section->id]) }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                        <a href="{{ route('sectionsdata.create', [$statesthreefourty->id,$section->id]) }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
                
                @include('admin.statesthreefourty.sectiondata.partials.table',['datas' => $sectiondata])

            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop