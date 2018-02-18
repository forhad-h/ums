@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('examQuestPaper', $id) }}
  </h5>
</section>
<section class="content">
    <div id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading text-center add-pheading" role="tab" id="heading">
          <h4 class="panel-title">
              <a class="btn btn-success{{$errors->all() || session('success-add') ? '' : ' collapsed'}}" id="btn-add" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesec" aria-expanded="{{$errors->all() || session('success-add') ? 'true' : 'false'}}" aria-controls="collapsesec">
              Add question
              
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </h4>
        </div>
        <div id="collapsesec" class="panel-collapse collapse{{$errors->all() || session('success-add') ? ' in' : ''}}" role="tabpanel" aria-labelledby="heading">
            <form enctype="multipart/form-data" action="{{url('exam/question/insert/'.$id)}}" method="post">
                   {{csrf_field()}}
                    <div class="panel-body  body0">
                        <div class="col-sm-6 col-sm-offset-3 custom-padding">
                            <div class="form-group{{ $errors->has('question_type') ? ' has-error' : '' }}">
                                <label for="question_type">Question type <span class="text-require">(require)</span></label>

                                <select name="question_type" id="question_type" class="form-control select2" style="width: 100%;">
                                        <option value="">Select question type</option>
                                        @if(old('question_type') == 1)
                                                <option value="1" selected>Multiple choice</option>
                                        @else
                                                <option value="1">Multiple choice</option>
                                        @endif

                                        @if(old('question_type') == 2)
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
                                <input type="text" class="form-control" id="question" name="question" value="{{old('question')}}" placeholder="Enter question">
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
                                           {{old('quest_status') == 1 ? 'checked' : ''}}> Optional
                                </label>
                                <label class="grad font-light">
                                    <input type="radio" name="quest_status" value="2" class="minimal"
                                           {{old('quest_status') == 2 ? 'checked' : ''}}> Required
                                </label>
                            </div>
                            
                            <div id="option_field" style="display: {{old('question_type') == 1  ? 'block' : 'none'}}">
                                <div class="form-group{{ $errors->has('quest_option1') ? ' has-error' : '' }}">
                                    <label for="quest_option1">Option 1</label>
                                    <input type="text" class="form-control" id="quest_option1" name="quest_option1" value="{{old('quest_option1')}}" placeholder="Enter Option 1">
                                    @if ($errors->has('quest_option1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('quest_option1') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('quest_option2') ? ' has-error' : '' }}">
                                    <label for="quest_option2">Option 2</label>
                                    <input type="text" class="form-control" id="quest_option2" name="quest_option2" value="{{old('quest_option2')}}" placeholder="Enter option 2">
                                    @if ($errors->has('quest_option2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('quest_option2') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('quest_option3') ? ' has-error' : '' }}">
                                    <label for="quest_option3">Option 3</label>
                                    <input type="text" class="form-control" id="quest_option3" name="quest_option3" value="{{old('quest_option3')}}" placeholder="Enter option 3">
                                    @if ($errors->has('quest_option3'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('quest_option3') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('quest_option4') ? ' has-error' : '' }}">
                                    <label for="quest_option4">Option 4</label>
                                    <input type="text" class="form-control" id="quest_option4" name="quest_option4" value="{{old('quest_option4')}}" placeholder="Enter option 4">
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
    </div>
  <div class="box box-primary custom-padding">
    <div class="box-header">
      <h3 class="box-title">Question paper</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body QuestionPaper center-block">
        <form enctype="multipart/form-data" action="{{url('exam/answer/insert/'.$id)}}" method="post">
        {{csrf_field()}}
        @foreach($select as $data)
        <div class="single_question">
            <div class="clearfix">
            <h4 class="pull-left text-capitalize">{{$data->question}}</h4>
            <div class="manage-btn pull-left" style="margin-left:20px;margin-top:5px;">

                      <a href="{{url('exam/question/edit/'.$data->quest_id)}}" class="btn btn-warning" data-toggle="tooltip" title="Edit question"><i class="fa fa-pencil fa-lg"></i></a>

                      <a href="{{url('exam/question/delete/'.$data->exam_id.'/'.$data->quest_id)}}" onclick="event.preventDefault();confirmBox(this, 'delete');" class="btn btn-danger" data-toggle="tooltip" title="Delete question"><i class="fa fa-trash fa-lg"></i></a>

            </div>
            </div>
              @if($data->question_type == 1)
                  @if ($errors->has('qOption'.$data->quest_id))
                    <span class="help-block text-red">
                        <strong>{{ $errors->first('qOption'.$data->quest_id) }}</strong>
                    </span>
                  @endif
                  @if($data->quest_option1 != '')
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="1">
                            {{$data->quest_option1}}
                        </label>
                    </div>
                  @endif
                  @if($data->quest_option2 != '')
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="2">
                            {{$data->quest_option2}}
                        </label>
                    </div>
                  @endif
                  @if($data->quest_option3 != '')
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="3">
                            {{$data->quest_option3}}
                        </label>
                    </div>
                  @endif
                  @if($data->quest_option4 != '')
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="4">
                            {{$data->quest_option4}}
                        </label>
                    </div>
                  @endif
              @else
                @if ($errors->has('qOption'.$data->quest_id))
                  <span class="help-block text-red">
                      <strong>{{ $errors->first('qOption'.$data->quest_id) }}</strong>
                  </span>
                @endif
                <div class="form-group">
                    <textarea name="qOption{{$data->quest_id}}" class="form-control" rows="3" placeholder="Write your answer"></textarea>
                </div>
              @endif
        </div>
        @endforeach
        </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
@endsection