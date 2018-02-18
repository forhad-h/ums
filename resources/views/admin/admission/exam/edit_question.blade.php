@extends('layouts.index')
@section('edit')
<section class="content-header">
  <h5>
       {{Breadcrumbs::render('editQuestion', $select)}}
  </h5>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-heading text-center add-pheading" role="tab" id="heading">
            <a href="{{url('admission/exams/QuestionPaper/'.$select->exam_id)}}" role="button" class="btn btn-default btn-back">
               <i class="fa fa-arrow-circle-left"></i> back
            </a>
          <h4 class="box-title">
              Edit question
          </h4>
        </div>
        <div class="box-body">
		<form enctype="multipart/form-data" action="{{url('exam/question/update/'.$select->quest_id)}}" method="post">
		   {{csrf_field()}}
			<div class="box-body body0">
                            <div class="col-sm-6 col-sm-offset-3 custom-padding">
                                <div class="form-group{{ $errors->has('question_type') ? ' has-error' : '' }}">
                                        <label for="question_type">Question type <span class="text-require">(require)</span></label>

                                        <select name="question_type" id="question_type" class="form-control select2" style="width: 100%;">
                                            <option value="">Select question type</option>
                                            @if($select->question_type == 1)
                                                 <option value="1" selected>Multiple choice</option>
                                            @else
                                                  <option value="1">Multiple choice</option>
                                            @endif

                                            @if($select->question_type == 2)
                                                  <option value="2" selected>Descriptional</option>
                                            @else
                                                  <option value="2">Descriptional</option>
                                            @endif

                                        </select>
                                        @if ($errors->has('question_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('question_type') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                        <label for="question">Question <span class="text-require">(require)</span></label>
                                        <input type="text" class="form-control" id="question" name="question" value="{{$select->question}}" placeholder="Enter question">
                                        @if ($errors->has('question'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('question') }}</strong>
                                                </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                        <label>Status <span class="text-optional">(you can leave blank for <u>optinal</u>)</span></label><br>
                                        <label class="font-light">
                                                <input type="radio" name="quest_status" value="1" class="minimal"
                                                           {{$select->quest_status == 1 ? 'checked' : ''}}> Optional
                                        </label>
                                        <label class="grad font-light">
                                                <input type="radio" name="quest_status" value="2" class="minimal"
                                                           {{$select->quest_status == 2 ? 'checked' : ''}}> Required
                                        </label>
                                </div>

                                <div id="option_field" style="display: {{$select->question_type == 1  ? 'block' : 'none'}}">
                                        <div class="form-group{{ $errors->has('quest_option1') ? ' has-error' : '' }}">
                                                <label for="quest_option1">Option 1</label>
                                                <input type="text" class="form-control" id="quest_option1" name="quest_option1" value="{{$select->quest_option1}}" placeholder="Enter Option 1">
                                                @if ($errors->has('quest_option1'))
                                                        <span class="help-block">
                                                                <strong>{{ $errors->first('quest_option1') }}</strong>
                                                        </span>
                                                @endif
                                        </div>


                                        <div class="form-group{{ $errors->has('quest_option2') ? ' has-error' : '' }}">
                                                <label for="quest_option2">Option 2</label>
                                                <input type="text" class="form-control" id="quest_option2" name="quest_option2" value="{{$select->quest_option2}}" placeholder="Enter option 2">
                                                @if ($errors->has('quest_option2'))
                                                        <span class="help-block">
                                                                <strong>{{ $errors->first('quest_option2') }}</strong>
                                                        </span>
                                                @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('quest_option3') ? ' has-error' : '' }}">
                                                <label for="quest_option3">Option 3</label>
                                                <input type="text" class="form-control" id="quest_option3" name="quest_option3" value="{{$select->quest_option3}}" placeholder="Enter option 3">
                                                @if ($errors->has('quest_option3'))
                                                        <span class="help-block">
                                                                <strong>{{ $errors->first('quest_option3') }}</strong>
                                                        </span>
                                                @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('quest_option4') ? ' has-error' : '' }}">
                                                <label for="quest_option4">Option 4</label>
                                                <input type="text" class="form-control" id="quest_option4" name="quest_option4" value="{{$select->quest_option4}}" placeholder="Enter option 4">
                                                @if ($errors->has('quest_option4'))
                                                        <span class="help-block">
                                                                <strong>{{ $errors->first('quest_option4') }}</strong>
                                                        </span>
                                                @endif
                                        </div>
                                </div>
                            </div>
			</div>
		   <div class="panel-footer footer0">
			<div class="form-group text-center">
				<button type="submit" class="btn btn-lg btn-info">Add question</button>
			</div>
		   </div>
		</form>
    </div>
    </div>
</section>
@endsection