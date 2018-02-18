@extends('layouts.public')
@section('all')
<section class="content-header">
  @auth
  <h5>
      {{ Breadcrumbs::render('questionPaper', $id) }}
  </h5>
  @endauth
</section>
<section class="content clearfix">
<div class="col-md-8 col-md-offset-2">
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
            </div>
              @if($data->question_type == 1)
                  @if ($errors->has('qOption'.$data->quest_id))
                    <span class="help-block text-red">
                        <strong>{{ $errors->first('qOption'.$data->quest_id) }}</strong>
                    </span>
                  @endif
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="1">
                            {{$data->quest_option1}}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="2">
                            {{$data->quest_option2}}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="3">
                            {{$data->quest_option3}}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="qOption{{$data->quest_id}}" value="4">
                            {{$data->quest_option4}}
                        </label>
                    </div>
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

        <div class="panel-footer footer0">
         <div class="form-group text-center">
             <button type="submit" class="btn btn-lg btn-info">Submit</button>
         </div>
        </div> 
        </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</section>
@endsection