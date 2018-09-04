@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-form">
                <div class="box-header">
                    <h3 class="box-title">Show {{ $title }}</h3>
                    <a href="{{ route('sectionsdata.index', [$statesthreefourty->id,$section->id]) }}" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $sectiondata->sections->title }}</h3>
                            <div class="pull-right">		                        
		                        <a href="{{ route('sectionsdata.edit', [$statesthreefourty->id, $section->id,$sectiondata->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
		                        
								@if(auth()->user()->roles_id=='1')
								<a data-method="Delete" data-confirm="Are you sure?" class="btn btn-danger" href="{{ route('sectionsdata.destroy', [$statesthreefourty->id, $section->id,$sectiondata->id]) }}">
									<i class="fa fa-trash-o danger"></i> Delete
								</a>
								@endif
								
                                
							</div>
                        </div>
						<div class="col-md-12">
							
							
							<p><strong>Table:</strong> @if($sectiondata->table_select == '1') Table 1 @else Table2 @endif</p>
                            <p><strong>Question:</strong> {{ $sectiondata->questions->question}}</p>
                          @if($sectiondata->table_select == '1')

                            <p><strong>Ingredient Cost:</strong>{{ $sectiondata->ingredient_cost }}</p>
                            <p><strong>Dispensing Fee:</strong>{{ $sectiondata->dispensing_fee }}</p>
                            <p><strong>Clarifying Detail:</strong>{{ $sectiondata->clarifying_detail }}</p>
                            @else
                            <p><strong>Answer:</strong>{{ $sectiondata->clarifying_detail }}</p>
						   @endif

                           <p><strong>Source:</strong> {{ $sectiondata->source }}</p>
                           <p><strong>Source Link:</strong> {{ $sectiondata->source_link }}</p>
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