@extends('layouts.index')
@section('edit-profile')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('editProfile') }}
  </h5>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-header with-border">
            <div class="col-md-12 box-title">
                Edit profile
                <a href="{{url('view-profile/'.Auth::id())}}" class="btn btn-warning btn-sm pull-right">View profile</a>
             </div>
            <div class="clearfix"></div>
        </div>


        <form enctype="multipart/form-data" action="{{route('updateProfile', ['id' => Auth::id()])}}" method="post">
            {{csrf_field()}}
        <div class="box-body body0">
            <div class="row">
                <div class="form-group vpi">
                    @if((Auth::user()->image != '') && File::exists(public_path('asset/dist/uploads/').Auth::user()->image))
                        <img class="profile-user-img img-responsive" src="{{asset('asset')}}/dist/uploads/{{Auth::user()->image}}" alt="User profile picture">
                    @else
                      @if(Auth::user()->gender == 'female')
                           <img class="profile-user-img img-responsive" src="{{asset('asset')}}/dist/img/defaultf.jpg" alt="User profile picture"> 
                      @else
                           <img class="profile-user-img img-responsive" src="{{asset('asset')}}/dist/img/defaultm.jpg" alt="User profile picture">
                      @endif
                    @endif
                    <input type="file" name="ppic" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                    <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload &hellip;</span></label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 custom-padding">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name <span class="text-require">(require)</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email <span class="text-require">(require)</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                        <label for="nid">NID No.</label>
                        <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter your NID number" value="{{Auth::user()->nid}}">
                        @if ($errors->has('nid'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nid') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
                <div class="col-sm-6 custom-padding">
                    <div class="form-group{{ $errors->has('caddress') ? ' has-error' : '' }}">
                        <label for="caddress">Current address</label>
                        <textarea class="form-control" id="caddress" name="caddress" rows="3" placeholder="Enter your current address">{{Auth::user()->caddress}}</textarea>
                        @if ($errors->has('caddress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('caddress') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('paddress') ? ' has-error' : '' }}">
                        <label for="paddress">Permanent address</label>
                        <textarea class="form-control" id="paddress" name="paddress" rows="3" placeholder="Enter your permanent address">{{Auth::user()->paddress}}</textarea>
                        @if ($errors->has('paddress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('paddress') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 custom-padding">
                    <label>Education</label>
                    <div class="form-group{{ $errors->has('courset') ? ' has-error' : '' }}">
                        <select name="courset" id="courset" class="form-control select2" style="width: 100%;">
                            <option value="">Select course type</option>
                            @if(Auth::user()->educationM && (Auth::user()->educationM->course_type == 'graduate'))
                                <option value="graduate" selected>Graduate</option>
                            @else
                                <option value="graduate">Graduate</option>
                            @endif
                            
                            @if(Auth::user()->educationM && (Auth::user()->educationM->course_type == 'postgraduate'))
                                <option value="postgraduate" selected>Postraduate</option>
                            @else
                                <option value="postgraduate">Postraduate</option>
                            @endif
                            
                            @if(Auth::user()->educationM && (Auth::user()->educationM->course_type == 'phd'))
                                <option value="phd" selected>PHD</option>
                            @else
                                <option value="phd">PHD</option>
                            @endif
                            
                        </select>
                        @if ($errors->has('courset'))
                            <span class="help-block">
                                <strong>{{ $errors->first('courset') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('coursen') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">Course name</span>
                            <input type="text" class="form-control" id="coursen" name="coursen" placeholder="Course name" 
                                   value="{{Auth::user()->educationM ? Auth::user()->educationM->course_name : ''}}">
                        </div>
                        @if ($errors->has('coursen'))
                            <span class="help-block">
                                <strong>{{ $errors->first('coursen') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('cfrom') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon bg-gray">From</span>
                            <input type="text" class="form-control" id="cfrom" name="cfrom" placeholder="School/College/University"
                                   value="{{Auth::user()->educationM ? Auth::user()->educationM->institute : ''}}">
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
                            <input type="text" class="form-control" id="cresult" name="cresult" placeholder="GPA/Class"
                                   value="{{Auth::user()->educationM ? Auth::user()->educationM->result : ''}}">
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
                            <input type="text" class="form-control" id="pyear" name="pyear" placeholder="Year"
                                   value="{{Auth::user()->educationM ? Auth::user()->educationM->passing_year : ''}}">
                        </div>
                        @if ($errors->has('pyear'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pyear') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6 custom-padding{{ $errors->has('experience') ? ' has-error' : '' }}">
                    <div class="form-group">
                        <label for="experience">Experience</label>
                        <textarea class="form-control" id="experience" name="experience" rows="3" placeholder="Enter your experience">{{Auth::user()->experience}}</textarea>
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
                                   {{Auth::user()->gender == 'male' ? ' checked' : ''}}> Male
                        </label>
                        <label class="grad font-light">
                        <input type="radio" name="gender" value="female" class="minimal"
                               {{Auth::user()->gender == 'female' ? ' checked' : ''}}> Female
                        </label>

                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 custom-padding">

                    <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{Auth::user()->religion}}">
                        @if ($errors->has('religion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('religion') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" value="{{Auth::user()->nationality}}">
                        @if ($errors->has('nationality'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nationality') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6 custom-padding">
                    <div class="form-group{{ $errors->has('password') || $errors->has('cpassword') ? ' has-error' : '' }}">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('cpassword') ? ' has-warning' : '' }}">
                        <label for="cpassword">Confirm password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                        @if ($errors->has('cpassword'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpassword') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer footer0">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-info">UPDATE</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection