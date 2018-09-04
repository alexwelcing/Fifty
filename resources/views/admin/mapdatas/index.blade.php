@extends('layouts.admin')

@section('content')
<section class="content">                    
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List {{ $title }}</h3>
                    </a>
                </div>
                
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Sr.</th>
                                <th>State</th>
                                <th>color</th>
                                <th>Hover Color</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($mapdatas as $k => $mapdata)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $mapdata->name }}</td>
                                 <td>{{ $mapdata->color }}</td>
                                 <td>{{ $mapdata->hoverColor }}</td>
                                <td>
                                    @if($mapdata->active =='1')
                                        <i class="fa fa-check success"></i>
                                    @else
                                        <i class="fa fa-times danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('maps.edit', $mapdata->id) }}"">
                                        <i class="fa fa-pencil info"></i>
                                    </a>
                                    <!--a data-method="Delete" data-confirm="Are you sure?" href="{{ route('states.destroy', $mapdata->id) }}">
                                        <i class="fa fa-trash-o danger"></i>
                                    </a-->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->


            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop