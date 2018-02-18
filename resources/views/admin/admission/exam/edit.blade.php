@extends('layouts.index')
@section('edit')
<section class="content-header clearfix">
  <h5>
      {{Breadcrumbs::render('editExam', $select)}}
  </h5>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-header with-border">
            <div class="col-md-12 box-title">
                Edit Exam
             </div>
            <div class="clearfix"></div>
        </div>


        <form enctype="multipart/form-data" action="{{route('updateExam', ['id' => $select->eid])}}" method="post">
            {{csrf_field()}}
             <div class="box-body  body0">
                 <div class="col-sm-6 col-sm-offset-3 custom-padding">
                     <div class="form-group{{ $errors->has('exam_id') ? ' has-error' : '' }}">
                         <label for="exam_id">Exam identification code</label>
                         <input type="text" class="form-control" id="exam_id" name="exam_id" value="{{$select->exam_id}}" placeholder="Enter exam identification code">
                         @if ($errors->has('exam_id'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('exam_id') }}</strong>
                             </span>
                         @endif
                     </div>
                     <div class="form-group{{ $errors->has('exam_name') ? ' has-error' : '' }}">
                         <label for="exam_name">Exam name</label>
                         <input type="text" class="form-control" id="exam_name" name="exam_name" value="{{$select->exam_name}}" placeholder="Enter exam name">
                         @if ($errors->has('exam_name'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('exam_name') }}</strong>
                             </span>
                         @endif
                     </div>

                     <div class="form-group{{ $errors->has('exam_duration') ? ' has-error' : '' }}">
                         <label for="exam_duration">Exam duration <span class="text-muted">(miniute)</span></label>
                         <input type="text" class="form-control" id="exam_duration" name="exam_duration" value="{{$select->exam_duration}}" placeholder="Enter exam duration">
                         @if ($errors->has('exam_duration'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('exam_duration') }}</strong>
                             </span>
                         @endif
                     </div>


                     <div class="form-group{{ $errors->has('exam_total_marks') ? ' has-error' : '' }}">
                         <label for="exam_total_marks">Total marks</label>
                         <input type="text" class="form-control" id="exam_total_marks" name="exam_total_marks" value="{{$select->exam_total_marks}}" placeholder="Enter total marks">
                         @if ($errors->has('exam_total_marks'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('exam_total_marks') }}</strong>
                             </span>
                         @endif
                     </div>

                 </div>
             </div>
            <div class="box-footer footer0">
             <div class="form-group text-center">
                 <button type="submit" class="btn btn-lg btn-info">Update</button>
             </div>
            </div>
         </form> 
        
	 </div>
        
</section>
@endsection