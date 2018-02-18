@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('allExam') }}
  </h5>
</section>
<section class="content">
    <div id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading text-center add-pheading" role="tab" id="heading">
          <h4 class="panel-title">
              <a class="btn btn-success{{$errors->all() ? '' : ' collapsed'}}" id="btn-add" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesec" aria-expanded="{{$errors->all() ? 'true' : 'false'}}" aria-controls="collapsesec">
              Start exam
              
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </h4>
        </div>
        <div id="collapsesec" class="panel-collapse collapse{{$errors->all() ? ' in' : ''}}" role="tabpanel" aria-labelledby="heading">
            <form enctype="multipart/form-data" action="{{url('exam/insert')}}" method="post">
                {{csrf_field()}}
                 <div class="panel-body  body0">
                     <div class="col-sm-6 col-sm-offset-3 custom-padding">
                         <div class="form-group{{ $errors->has('exam_id') ? ' has-error' : '' }}">
                             <label for="exam_id">Exam identification code <span class="text-require">(require)</span></label>
                             <input type="text" class="form-control" id="exam_id" name="exam_id" value="{{old('exam_id')}}" placeholder="Enter exam identification code">
                             @if ($errors->has('exam_id'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('exam_id') }}</strong>
                                 </span>
                             @endif
                         </div>
                         <div class="form-group{{ $errors->has('exam_name') ? ' has-error' : '' }}">
                             <label for="exam_name">Exam name <span class="text-require">(require)</span></label>
                             <input type="text" class="form-control" id="exam_name" name="exam_name" value="{{old('exam_name')}}" placeholder="Enter exam name">
                             @if ($errors->has('exam_name'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('exam_name') }}</strong>
                                 </span>
                             @endif
                         </div>

                         <div class="form-group{{ $errors->has('exam_duration') ? ' has-error' : '' }}">
                             <label for="exam_duration">Exam duration <span class="text-muted">(miniute)</span> <span class="text-require">(require)</span></label>
                             <input type="text" class="form-control" id="exam_duration" name="exam_duration" value="{{old('exam_duration')}}" placeholder="Enter exam duration">
                             @if ($errors->has('exam_duration'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('exam_duration') }}</strong>
                                 </span>
                             @endif
                         </div>


                         <div class="form-group{{ $errors->has('exam_total_marks') ? ' has-error' : '' }}">
                             <label for="exam_total_marks">Total marks<span class="text-require">(require)</span></label>
                             <input type="text" class="form-control" id="exam_total_marks" name="exam_total_marks" value="{{old('exam_total_marks')}}" placeholder="Enter total marks">
                             @if ($errors->has('exam_total_marks'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('exam_total_marks') }}</strong>
                                 </span>
                             @endif
                         </div>

                     </div>
                 </div>
                <div class="panel-footer footer0">
                 <div class="form-group text-center">
                     <button type="submit" class="btn btn-lg btn-info">Start</button>
                 </div>
                </div>
           </form> 
        </div>
    </div>
    </div>
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All exam</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table data-table="true" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Exam name</th>
          <th>Exam duration</th>
          <th>Total marks</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select as $data)
        <tr>
          <td>{{$data->exam_name}}</td>
          <td>{{$data->exam_duration}}</td>
          <td>{{$data->exam_total_marks}}</td>
          <td class="manage-btn">
				  
              <a href="{{url('admission/exam/edit/'.$data->eid)}}" class="btn btn-warning" data-toggle="tooltip" title="Edit exam"><i class="fa fa-pencil fa-lg"></i></a>
				  
                  <a href="{{url('exam/soft-delete/'.$data->eid)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger" data-toggle="tooltip" title="Delete exam"><i class="fa fa-trash fa-lg"></i></a>
                  <a href="{{url('admission/exams/QuestionPaper/'.$data->exam_id)}}" class="bg-green-gradient pad custom-btn" data-toggle="tooltip" title="Manage question">Question</a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
@endsection