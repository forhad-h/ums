@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      
  </h5>
</section>
<section class="content">
    <div id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading text-center add-pheading" role="tab" id="heading">
          <h4 class="panel-title">
              <a class="btn btn-success{{$errors->all() || session('success-add') ? '' : ' collapsed'}}" id="btn-add" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesec" aria-expanded="{{$errors->all() || session('success-add') ? 'true' : 'false'}}" aria-controls="collapsesec">
              Add employee 
              
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </h4>
        </div>
        <div id="collapsesec" class="panel-collapse collapse{{$errors->all() || session('success-add') ? ' in' : ''}}" role="tabpanel" aria-labelledby="heading">
            <form enctype="multipart/form-data" action="{{url('employee/insert')}}" method="post">
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

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email address">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                            
                            <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" value="{{old('designation')}}" placeholder="Enter designation">
                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('salaray_scale') || $errors->has('salary_scale') ? ' has-error' : '' }}">
                                <label for="salary_scale">Salary scale</label>
                                <input type="text" class="form-control" id="salary_scale" name="salary_scale" value="{{old('salary_scale')}}">
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
                                  <input type="text" class="form-control  pull-right" id="joining_date" name="joining_date" value="{{old('joining_date')}}">
                                </div>
                                <!-- /.input group -->
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
                            </div>

                            <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                                <label for="nid">NID No.</label>
                                <input type="text" class="form-control" id="nid" name="nid" value="{{old('nid')}}" placeholder="Enter your NID number">
                                @if ($errors->has('nid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nid') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" value="{{old('nationality')}}">
                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control" id="religion" name="religion" value="{{old('religion')}}">
                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('caddress') ? ' has-error' : '' }}">
                                <label for="caddress">Current address <span class="text-require">(require)</span></label>
                                <textarea class="form-control" id="caddress" name="caddress" rows="3" placeholder="Enter your current address">{{old('caddress')}}</textarea>
                                @if ($errors->has('caddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caddress') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('paddress') ? ' has-error' : '' }}">
                                <label for="paddress">Permanent address <span class="text-require">(require)</span></label>
                                <textarea class="form-control" id="paddress" name="paddress" rows="3" placeholder="Enter your permanent address">{{old('paddress')}}</textarea>
                                @if ($errors->has('paddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                                <label for="experience">Experience</label>
                                <textarea class="form-control" id="experience" name="experience" rows="3" placeholder="Enter your experience">{{old('experience')}}</textarea>
                                @if ($errors->has('experience'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <label for="file-1">Photo</label>
                            <div class="form-group">

                                <input type="file" name="ppic" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload &hellip;</span></label>
                            </div>
                        
                            <div class="checkbox">
                                <label  id="cb-for-hf">
                                  <input type="checkbox" class="minimal" name="cb-for-hf"> Add as a user
                                </label>
                            </div>
                            
                            <div id="hidden-field" style="display: none;">
                                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                    <label for="role">Role <span class="text-require">(require)</span></label>
                                    <select id="role" name="role" class="form-control select2" style="width: 100%;">
                                        <option value="">Select role</option>
                                        @foreach($rselect as $data)
                                            @if(old('role') == $data->id)
                                                <option value="{{$data->id}}" selected>{{$data->role_name}}</option>
                                            @else
                                                <option value="{{$data->id}}">{{$data->role_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') || $errors->has('cpassword') ? ' has-error' : '' }}">
                                    <label for="password">Password <span class="text-require">(require)</span></label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{$errors->has('cpassword') ? ' has-warning' : ''}}">
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
                </div>

                <div class="box-footer footer0">
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-info">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All employees</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="allEmployees" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Role</th>
          <th>Joining date</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->designation}}</td>
          <td>{{$data->email}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->role_name}}</td>
          <td>{{$data->joining_date}}</td>
          <td class="manage-btn">
                  <a href="{{url('employee/view/'.$data->id)}}" class="btn btn-success"><i class="fa fa-eye fa-lg"></i></a>
                  <a href="{{url('employee/edit/'.$data->id)}}" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="{{url('employee/soft-delete/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></a>
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