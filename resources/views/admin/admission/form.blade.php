@extends('layouts.index')
@section('admission-form')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('admissionForm') }}
  </h5>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-header with-border">
            <div class="col-md-12 box-title">
                Admission form
             </div>
            <div class="clearfix"></div>
        </div>


        <form enctype="multipart/form-data" action="{{url('candidate/insert')}}" method="post">
            {{csrf_field()}}
        <div class="box-body body0">
            <div class="row">
                <div class="col-sm-6 custom-padding">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name <span class="text-require">(require)</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter full name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter your phone number">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email address">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                        <label for="nid">NID No.</label>
                        <input type="text" class="form-control" id="nid" name="nid" value="{{old('nid')}}" placeholder="Enter your NID number">
                        @if ($errors->has('nid'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nid') }}</strong>
                            </span>
                        @endif
                    </div><br>
                    
                    <label>Qualification <span class="text-require">(require)</span></label>
                    <div class="form-group{{ $errors->has('courset') ? ' has-error' : '' }}">
                        <select name="courset" id="courset" class="form-control select2" style="width: 100%;">
                            <option value="">Select course type</option>
                            @if(old('courset') == 'HSC')
                                <option value="HSC" selected>HSC</option>
                            @else
                                <option value="HSC">HSC</option>
                            @endif
                            
                            @if(old('courset') == 'Alim')
                                <option value="Alim" selected>Alim</option>
                            @else
                                <option value="Alim">Alim</option>
                            @endif
                            
                            @if(old('courset') == 'Diploma')
                                <option value="Diploma" selected>Diploma</option>
                            @else
                                <option value="Diploma">Diploma</option>
                            @endif
                            
                        </select>
                        @if ($errors->has('courset'))
                            <span class="help-block">
                                <strong>{{ $errors->first('courset') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('cfrom') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">From</span>
                            <input type="text" class="form-control" id="cfrom" name="cfrom" placeholder="School/College/University" value="{{old('cfrom')}}">
                        </div>
                        @if ($errors->has('cfrom'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cfrom') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('cresult') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">Result</span>
                            <input type="text" class="form-control" id="cresult" name="cresult" placeholder="GPA/Class" value="{{old('cresult')}}">
                        </div>
                        @if ($errors->has('cresult'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cresult') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('pyear') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">Year</span>
                            <input type="text" class="form-control" id="pyear" name="pyear" placeholder="Year" value="{{old('pyear')}}">
                        </div>
                        @if ($errors->has('pyear'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pyear') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('caddress') ? ' has-error' : '' }}">
                        <label for="caddress">Current address</label>
                        <textarea class="form-control" id="caddress" name="caddress" rows="3" placeholder="Enter your current address">{{old('caddress')}}</textarea>
                        @if ($errors->has('caddress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('caddress') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('paddress') ? ' has-error' : '' }}">
                        <label for="paddress">Permanent address</label>
                        <textarea class="form-control" id="paddress" name="paddress" rows="3" placeholder="Enter your permanent address">{{old('paddress')}}</textarea>
                        @if ($errors->has('paddress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('paddress') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    
                </div>
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('gname') ? ' has-error' : '' }}">
                        <label for="gname">Guardian name <span class="text-require">(require)</span></label>
                        <input type="text" class="form-control" id="gname" name="gname" value="{{old('gname')}}" placeholder="Enter guardian name">
                        @if ($errors->has('gname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gname') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('gphone') ? ' has-error' : '' }}">
                        <label for="gphone">Guardian phone <span class="text-require">(require)</span></label>
                        <input type="text" class="form-control" id="gphone" name="gphone" value="{{old('gphone')}}" placeholder="Enter guardian phone number">
                        @if ($errors->has('gphone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gphone') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('bdate') ? ' has-error' : '' }}">
                        <label for="bdate">Birth date <span class="text-require">(require)</span></label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control  pull-right" id="bdate" name="bdate" value="{{old('bdate')}}" placeholder="01 January 2001">
                        </div>
                        <!-- /.input group -->
                        @if ($errors->has('bdate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bdate') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label>Gender <span class="text-require">(require)</span></label><br>
                        <label class="font-light">
                            <input type="radio" name="gender" value="male" class="minimal"
                                   {{old('gender') == 'male' ? 'checked' : ''}}> Male
                        </label>
                        <label class="grad font-light">
                        <input type="radio" name="gender" value="female" class="minimal"
                               {{old('gender') == 'female' ? 'checked' : ''}}> Female
                        </label>

                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div><br>
                    
                    <label>Subject <span class="text-require">(require)</span></label>
                    <div class="form-group{{ $errors->has('subject_first') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">First</span>
                            <select name="subject_first" id="subject_first" class="form-control select2" style="width: 100%;">
                                <option value="">Select first choice</option>
                                @foreach($select_subject as $data)
                                    @if(old('subject_first') == $data->subject_code)
                                        <option value="{{$data->subject_code}}" selected>{{$data->subject_name}}</option>
                                    @else
                                        <option value="{{$data->subject_code}}">{{$data->subject_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                        @if ($errors->has('subject_first'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject_first') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('subject_second') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">Second</span>
                            <select name="subject_second" id="subject_second" class="form-control select2" style="width: 100%;">
                                <option value="">Select second choice</option>
                                @foreach($select_subject as $data)
                                    @if(old('subject_second') == $data->subject_code)
                                        <option value="{{$data->subject_code}}" selected>{{$data->subject_name}}</option>
                                    @else
                                        <option value="{{$data->subject_code}}">{{$data->subject_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                        @if ($errors->has('subject_second'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject_second') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('subject_third') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">Third</span>
                            <select name="subject_third" id="subject_third" class="form-control select2" style="width: 100%;">
                                <option value="">Select third choice</option>
                                @foreach($select_subject as $data)
                                    @if(old('subject_third') == $data->subject_code)
                                        <option value="{{$data->subject_code}}" selected>{{$data->subject_name}}</option>
                                    @else
                                        <option value="{{$data->subject_code}}">{{$data->subject_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                        @if ($errors->has('subject_third'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject_third') }}</strong>
                            </span>
                        @endif
                    </div><br><br><br>
                    
                    <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{old('religion')}}" placeholder="Religion">
                        @if ($errors->has('religion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('religion') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" value="{{old('nationality')}}" placeholder="Nationality">
                        @if ($errors->has('nationality'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nationality') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                    <label for="file-1">Photo <span class="text-require">(require)</span></label>
                    <div class="form-group">
                        
                        <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload &hellip;</span></label>
						<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
						@if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
						</div>
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                    <label for="file-2">Signature <span class="text-require">(require)</span></label>
                    <div class="form-group">
                        
                        <input type="file" name="signature" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload &hellip;</span></label>
						
						<div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }}">
						@if ($errors->has('signature'))
                            <span class="help-block">
                                <strong>{{ $errors->first('signature') }}</strong>
                            </span>
                        @endif
						</div>
                    </div>
                    </div>
                    </div>
                </div>
               
            </div>
        </div>

        <div class="box-footer footer0">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-info">SUBMIT</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection