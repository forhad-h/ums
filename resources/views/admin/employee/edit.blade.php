@extends('layouts.index')
@section('edit')
<section class="content-header clearfix">
  <h5 class="pull-right">
      {{ Breadcrumbs::render('editEmployee', $select) }}
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


        <form enctype="multipart/form-data" action="{{route('updateEmployee', ['id' => $select->id])}}" method="post">
                {{csrf_field()}}
                <div class="box-body body0">
                    <div class="row">
                        <div class="form-group vpi">
                            @if(($select->image != '') && File::exists(public_path('asset/dist/uploads/employees/').$select->image))
                                <img class="profile-user-img img-responsive" src="{{asset('asset')}}/dist/uploads/employees/{{$select->image}}" alt="Employee profile picture">
                            @else
                              @if($select->gender == 'female')
                                   <img class="profile-user-img img-responsive" src="{{asset('asset')}}/dist/img/defaultf.jpg" alt="User profile picture"> 
                              @else
                                   <img class="profile-user-img img-responsive" src="{{asset('asset')}}/dist/img/defaultm.jpg" alt="User profile picture">
                              @endif
                            @endif
                            <input type="file" name="ppic" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Change &hellip;</span></label>
                        </div>
                        </div>
                        <div class="col-sm-6 custom-padding">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Name <span class="text-require">(require)</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$select->name}}" placeholder="Enter full name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email <span class="text-require">(require)</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$select->email}}" placeholder="Enter email address">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$select->phone}}" placeholder="Enter phone number">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                                <label for="designation">Designation <span class="text-require">(require)</span></label>
                                <input type="text" class="form-control" id="designation" name="designation" value="{{$select->designation}}" placeholder="Enter designation">
                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('salaray_scale') || $errors->has('salary_scale') ? ' has-error' : '' }}">
                                <label for="salary_scale">Salary scale</label>
                                <input type="text" class="form-control" id="salary_scale" name="salary_scale" value="{{$select->salary_scale}}">
                                @if ($errors->has('salary_scale'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary_scale') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="joining_date">Joining date</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control  pull-right" id="joining_date" name="joining_date" value="{{$select->joining_date}}" placeholder="01 January 2001">
                                </div>
                                <!-- /.input group -->
                            </div>
                            
                            <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" value="{{$select->nationality}}" placeholder="Nationality">
                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control" id="religion" name="religion" value="{{$select->religion}}" placeholder="Religion">
                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('caddress') ? ' has-error' : '' }}">
                                <label for="caddress">Current address</label>
                                <textarea class="form-control" id="caddress" name="caddress" rows="3" placeholder="Enter current address">{{$select->caddress}}</textarea>
                                @if ($errors->has('caddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caddress') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('paddress') ? ' has-error' : '' }}">
                                <label for="paddress">Permanent address</label>
                                <textarea class="form-control" id="paddress" name="paddress" rows="3" placeholder="Enter permanent address">{{$select->paddress}}</textarea>
                                @if ($errors->has('paddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paddress') }}</strong>
                                    </span>
                                @endif
                            </div>
							
							

                            <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                                <label for="nid">NID No. <span class="text-require">(require)</span></label>
                                <input type="text" class="form-control" id="nid" name="nid" value="{{$select->nid}}" placeholder="Enter NID number">
                                @if ($errors->has('nid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nid') }}</strong>
                                    </span>
                                @endif
                            </div>
							
                            <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                                <label for="experience">Experience</label>
                                <textarea class="form-control" id="experience" name="experience" rows="3" placeholder="Enter experience">{{$select->experience}}</textarea>
                                @if ($errors->has('experience'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label>Gender <span class="text-require">(require)</span></label><br>
                                <label class="font-light">
                                    <input type="radio" name="gender" value="male" class="minimal"
                                           {{$select->gender == 'male' ? 'checked' : ''}}> Male
                                </label>
                                <label class="grad font-light">
                                <input type="radio" name="gender" value="female" class="minimal"
                                       {{$select->gender == 'female' ? 'checked' : ''}}> Female
                                </label>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
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