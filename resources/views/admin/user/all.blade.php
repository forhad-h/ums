@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('teachers') }}
  </h5>
</section>
<section class="content">
    <div id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading text-center add-pheading" role="tab" id="heading">
          <h4 class="panel-title">
              <a class="btn btn-success{{$errors->all() || session('success-add') ? '' : ' collapsed'}}" id="btn-add" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesec" aria-expanded="{{$errors->all() || session('success-add') ? 'true' : 'false'}}" aria-controls="collapsesec">
              Add teacher 
              
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </h4>
        </div>
        <div id="collapsesec" class="panel-collapse collapse{{$errors->all() || session('success-add') ? ' in' : ''}}" role="tabpanel" aria-labelledby="heading">
               <form enctype="multipart/form-data" action="{{url('teacher/insert')}}" method="post">
                   {{csrf_field()}}
                    <div class="panel-body  body0">
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
                                <label for="email">Email <span class="text-require">(require)</span></label>
                                
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email address">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter phone number">
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
                                <input type="text" class="form-control" id="salary_scale" name="salary_scale" value="{{old('salary_scale')}}" placeholder="Enter salary scale">
                                @if ($errors->has('salary_scale'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary_scale') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 custom-padding">
                            
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
                            
                            <div class="form-group">
                                <label for="joining_date">Joining date</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control  pull-right" id="joining_date" name="joining_date" value="{{old('joining_date')}}" placeholder="01 January 2001">
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
                            
                            <div class="form-group{{ $errors->has('password') || $errors->has('cpassword') ? ' has-error' : '' }}">
                                <label for="password">Password <span class="text-require">(require)</span></label>
                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{$errors->has('cpassword') ? ' has-warning' : ''}}">
                                <label for="cpassword">Confirm password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Retype password">
                                
                                @if ($errors->has('cpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                   <div class="panel-footer footer0">
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-info">REGISTRATION</button>
                    </div>
                   </div>
              </form> 
        </div>
    </div>
    </div>
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All teachers</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="allTeacher" class="table table-bordered table-striped">
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
              @if(Request::is('teachers') && ($data->id == Auth::user()->id))
                  <a href="{{url('view-profile/'.Auth::user()->id)}}" class="btn btn-success" data-toggle="tooltip" title="View profile"><i class="fa fa-eye fa-lg"></i></a>
                  <a href="{{url('edit-profile')}}" class="btn btn-warning" data-toggle="tooltip" title="Edit profile"><i class="fa fa-pencil fa-lg"></i></a>
              @else
                  <a href="{{url('teacher/view/'.$data->id)}}" class="btn btn-success"><i class="fa fa-eye fa-lg" data-toggle="tooltip" title="View teacher"></i></a>
                  <a href="{{url('teacher/edit/'.$data->id)}}" class="btn btn-warning" data-toggle="tooltip" title="Edit teacher"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="{{url('teacher/soft-delete/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger" data-toggle="tooltip" title="Delete teacher"><i class="fa fa-trash fa-lg"></i></a>
              @endif
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