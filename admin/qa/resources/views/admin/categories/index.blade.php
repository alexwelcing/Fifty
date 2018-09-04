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
						<a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
					</div>
                </div>
                <!-- /.box-header -->
                
				<div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($categories as $k => $categorie)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $categorie->name }}</td>
                                <td>
                                    @if($categorie->active =='1')
                                        <i class="fa fa-check success"></i>
                                    @else
                                        <i class="fa fa-times danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $categorie->id) }}"">
                                        <i class="fa fa-pencil info"></i>
                                    </a>
                                    <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('categories.destroy', $categorie->id) }}">
                                        <i class="fa fa-trash-o danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
					
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@stop