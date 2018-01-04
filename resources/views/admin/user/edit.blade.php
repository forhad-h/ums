@extends('layouts.index')
@section('edit')
@if(session()->has('success'))
         
@elseif(session()->has('error'))

@endif
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('editTeacher', $select) }}
  </h5>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-header with-border">
            <div class="col-md-12 box-title">
                Edit teacher
                <a href="{{url('teachers')}}" class="btn btn-warning btn-sm pull-right">All users</a>
             </div>
            <div class="clearfix"></div>
        </div>


        <form enctype="multipart/form-data" action="{{route('updateTeacher', ['id' => $select->id])}}" method="post">
            {{csrf_field()}}
        <div class="box-body body0">
            <div class="col-sm-6 custom-padding">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name <span class="text-require">(require)</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$select->name}}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email <span class="text-require">(require)</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$select->email}}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$select->phone}}">
                    
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{$select->designation}}">

                    @if ($errors->has('designation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('designation') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('salary_scale') ? ' has-error' : '' }}">
                    <label for="salary_scale">Salary scale</label>
                    <input type="text" class="form-control" id="salary_scale" name="salary_scale" value="{{$select->salary_scale}}">
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
                        <option value="1">Select role</option>
                        @foreach($rselect as $data)
                            @if($data->id != $select->role_id)
                                <option value="{{$data->id}}">{{$data->role_name}}</option>
                            @else
                                <option value="{{$data->id}}" selected>{{$data->role_name}}</option>
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
                      <input type="text" class="form-control  pull-right" id="joining_date" name="joining_date" value="{{$select->joining_date}}">
                    </div>
                    <!-- /.input group -->
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

                <div class="form-group{{ $errors->has('password') || $errors->has('cpassword') ? ' has-error' : '' }}">
                    <label for="password">Password <span class="text-require">(require)</span></label>
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

        <div class="box-footer footer0">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-info">UPDATE</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection