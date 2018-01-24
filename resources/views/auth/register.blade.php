@extends('layouts.app')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Register</b> (initial)</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">User registration form</p>

    <form method="POST" action="{{ route('register') }}">
	  {{ csrf_field() }}
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter full name" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		
		@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
		@endif
      </div>
	  
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		
		@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
		@endif
      </div>
	   
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
		@endif
      </div>
	  
      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
	  
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 col-xs-offset-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection
