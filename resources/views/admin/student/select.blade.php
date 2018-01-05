@extends('layouts.index')
@section('select')
<section class="content-header">

</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  @if(($select->image != '') && File::exists(public_path('asset/dist/uploads/candidates/').$select->image))
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('asset')}}/dist/uploads/candidates/{{$select->image}}" alt="User profile picture">
                  @endif
                  <h3 class="profile-username text-center">{{$select->name}}</h3>
                </div>
                  
                  <form enctype="multipart/form-data" action="{{route('addStudent', ['id' => $select->id])}}" method="post">
                      {{csrf_field()}}
                    <div class="box-body">
                      <div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                        <label for="session">Session <span class="text-require">(require)</span></label>
                        <input type="text" class="form-control" id="session" name="session" value="{{old('session')}}" placeholder="2017-2018">
                        @if ($errors->has('session'))
                            <span class="help-block">
                                <strong>{{ $errors->first('session') }}</strong>
                            </span>
                        @endif
                      </div>
                      
                      <div class="form-group{{ $errors->has('session_name') ? ' has-error' : '' }}">
                        <label for="session_name">Session name <span class="text-require">(require)</span></label>
                        
                        <select name="session_name" id="session_name" class="form-control select2" style="width: 100%;">
                            <option value="">Select session name</option>
                            @if(old('session_name') == 'Summer')
                                <option value="Summer" selected>Summer</option>
                            @else
                                <option value="Summer">Summer</option>
                            @endif
                            
                            @if(old('session_name') == 'Winter')
                                <option value="Winter" selected>Winter</option>
                            @else
                                <option value="Winter">Winter</option>
                            @endif
                            
                            @if(old('session_name') == 'Fall')
                                <option value="Fall" selected>Fall</option>
                            @else
                                <option value="Fall">Fall</option>
                            @endif
                            
                        </select>
                        @if ($errors->has('session'))
                            <span class="help-block">
                                <strong>{{ $errors->first('session') }}</strong>
                            </span>
                        @endif
                      </div>
                      
                      <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject">Subject <span class="text-require">(require)</span></label>
                        <select name="subject" id="subject" class="form-control select2" style="width: 100%;">
                            <option value="">Select subject</option>
                            @foreach($select_subject as $data)
                                @if(old('subject') == $data->subject_code)
                                    <option value="{{$data->subject_code}}" selected>{{$data->subject_name}}</option>
                                @else
                                    <option value="{{$data->subject_code}}">{{$data->subject_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                      </div>
                      
                      <div class="form-group{{ $errors->has('adate') ? ' has-error' : '' }}">
                        <label for="adate">Admitting date <span class="text-require">(require)</span></label>
                        <input type="text" class="form-control" id="adate" name="adate" value="{{old('adate')}}" placeholder="Enter full name">
                        @if ($errors->has('adate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('adate') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer footer0">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-info">SUBMIT</button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body view-structure">
                    <strong>ID</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->id}}</p><br>
                    
                    <strong>Name</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->name}}</p><br>
                    
                    <strong>phone</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->phone}}</p><br>
                    
                    <strong>Email</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->email}}</p><br>
                    
                    <strong>Guardian name</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->gname}}</p><br>
                    
                    <strong>Guardian phone</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->gphone}}</p><br>
                    
                    <strong>NID No.</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->nid}}</p><br>
                    
                    <strong>Birth date</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->bdate}}</p><br>
                    
                    <strong>Gender</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->gender}}</p><br>
                    
                    <strong>Qualification</strong>
                    @if($select->qualificationM)
                        <p><span class="text-muted">&DoubleLeftRightArrow;</span>{{$select->qualificationM->course_type}}
                            from {{$select->qualificationM->institute}}
                            with {{$select->qualificationM->result}}
                            in {{$select->qualificationM->passing_year}}
                        </p><br>
                    @else
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span></p><br>
                    @endif
                    
                    <strong>Subject</strong>
                    <strong class="hidden">first choice</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>First choice &colon; {{$select->subjectfM->subject_name}}</p><br>
                    
                    <strong class="invisible">second choice</strong>
                    <p><span class="invisible"> &DoubleLeftRightArrow;</span>Second choice &colon; {{$select->subjectsM->subject_name}}</p><br>
                    
                    <strong class="invisible">third choice</strong>
                    <p><span class="invisible"> &DoubleLeftRightArrow;</span>Third choice &colon; {{$select->subjecttM->subject_name}}</p><br>
                    
                    <strong>Current address</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->caddress}}</p><br>
                    
                    <strong>Permanent address</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->paddress}}</p><br>
                    
                    <strong>Nationality</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->nationality}}</p><br>
                    
                    <strong>Religion</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->religion}}</p><br>
                    
                    <strong>Signature</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>
                    @if(($select->image != '') && File::exists(public_path('asset/dist/uploads/candidates/').$select->image))
                        <img class="signature-img img-responsive" src="{{asset('asset')}}/dist/uploads/candidates/{{$select->simage}}" alt="User signature">
                    @endif</p>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection