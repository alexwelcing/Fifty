{!! Form::hidden('sections_id', $section->id) !!}
{!! Form::hidden('users_id', auth()->user()->id) !!}
<div class="form-group {!! ($errors->has('question_type') ? 'has-error' : '') !!}">
    {!! Form::label('table_select','Table Type', ['class' => 'control-label']) !!}    
    {!! Form::select('table_select', array('1' => 'Table 1', '2' => 'Table 2'), null, ['class' => 'form-control' . ($errors->has('table_rows') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('table-select', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('questions_id') ? 'has-error' : '') !!}">
    {!! Form::label('questions_id','Questions', ['class' => 'control-label']) !!}
    {!! Form::select('questions_id', $questions, null, ['class' => 'form-control' . ($errors->has('questions_id') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('questions_id', '<span class="help-block">:message</span>') !!}
</div>

<div id= "tabl1">
<div class="form-group {!! ($errors->has('ingredient_cost') ? 'has-error' : '') !!}">
    {!! Form::label('ingredient_cost','Ingredient Cost', ['class' => 'control-label']) !!}
    {!! Form::text('ingredient_cost', null, ['class' => 'form-control' . ($errors->has('ingredient_cost') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('ingredient_cost', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('dispensing_fee') ? 'has-error' : '') !!}">
    {!! Form::label('dispensing_fee','Dispensing Fee', ['class' => 'control-label']) !!}
    {!! Form::text('dispensing_fee', null, ['class' => 'form-control' . ($errors->has('dispensing_fee') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('dispensing_fee', '<span class="help-block">:message</span>') !!}
</div>


<div class="form-group {!! ($errors->has('clarifying_detail') ? 'has-error' : '') !!}">
    {!! Form::label('clarifying_detail','Clarifying Detail', ['class' => 'control-label']) !!}
    {!! Form::text('clarifying_detail', null, ['class' => 'form-control clr' . ($errors->has('clarifying_detail') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('clarifying_detail', '<span class="help-block">:message</span>') !!}
</div></div>

<div id="tbl2">
    <div class="form-group {!! ($errors->has('clarifying_detail') ? 'has-error' : '') !!}">
    {!! Form::label('clarifying_detail','Answer', ['class' => 'control-label']) !!}
    {!! Form::text('clarifying_detail', null, ['class' => 'form-control ans' . ($errors->has('clarifying_detail') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('clarifying_detail', '<span class="help-block">:message</span>') !!}
</div>
    </div>
  
<div class="form-group {!! ($errors->has('source') ? 'has-error' : '') !!}">
    {!! Form::label('source','Source', ['class' => 'control-label']) !!}
    {!! Form::text('source', null, ['class' => 'form-control' . ($errors->has('source') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('source', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('source_link') ? 'has-error' : '') !!}">
    {!! Form::label('source_link','Source Link', ['class' => 'control-label']) !!}
    {!! Form::text('source_link', null, ['class' => 'form-control' . ($errors->has('source_link') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('source_link', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>

@section('script')
<script>
  
$(document).ready(function(){
    $("#tbl2").hide();
  
    $(".ans").attr('disabled','disabled');
$('#table_select').on('change', function() {
  //alert( this.value );
if(this.value == 2){
     $("#tbl2").show();
     $("#tabl1").hide();
     $(".ans").removeAttr('disabled');
     $("#ingredient_cost").hide();
     $("#ingredient_cost").attr('disabled','disabled');
     $("#ingredient_cost").removeAttr('name');
     ("#dispensing_fee").hide();
      $("#dispensing_fee").attr('disabled','disabled');
      $("#dispensing_fee").removeAttr('name');
      $(".clr").hide();
      $(".clr").removeAttr('name');
       $(".clr").attr('disabled','disabled');

   
  
}else{
     $("#tabl1").show();
   $("#tbl2").hide();
    $(".ans").attr('disabled','disabled');
    $("#ingredient_cost").show();
    $("#ingredient_cost").removeAttr('disabled');
      $("#dispensing_fee").removeAttr('disabled');
       $("#clarifying_detail").removeAttr('disabled');
}

});
});
</script>
@endsection