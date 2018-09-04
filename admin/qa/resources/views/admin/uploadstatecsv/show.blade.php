@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-form">
                <div class="box-header">
                    <h3 class="box-title">Show {{ $title }}</h3>
                    <a href="{{ route('datas.index') }}" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $question->title }}</h3>
                            <div class="pull-right">		                        
		                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
		                        
								@if(auth()->user()->roles_id=='1')
								<a data-method="Delete" data-confirm="Are you sure?" class="btn btn-danger" href="{{ route('questions.destroy', $question->id) }}">
									<i class="fa fa-trash-o danger"></i> Delete
								</a>
								@endif
							</div>
                        </div>
						<div class="col-md-12">
							
							<p><strong>Question:</strong> {{ $question->question }}</p>
							
						</div>

						<div class="col-md-12">
	                        
						</div>
                        
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@stop