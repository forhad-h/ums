@extends('layouts.index')

@section('content')
<section class="content-header clearfix">
      <h1 class="pull-left">
        Dashboard
      </h1>
	  <h5 class="pull-right">{{ Breadcrumbs::render('home') }}</h5>
</section>
<section class="content">
    <div class="row">
	<div class="col-md-4 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-aqua">
		<div class="inner">
		  <h3>{{App\User::where('status', '=', 1)->count()}}</h3>

		  <p>Teachers</p>
		</div>
		<div class="icon">
		  <i class="fa fa-user"></i>
		</div>
		<a href="{{url('teachers')}}" class="small-box-footer">All teachers <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
        </div>
	
	<div class="col-md-4 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-green">
		<div class="inner">
		  <h3>{{App\Student::where('status', '=', 1)->count()}}</h3>

		  <p>Students</p>
		</div>
		<div class="icon">
		  <i class="fa fa-users"></i>
		</div>
		<a href="{{url('students')}}" class="small-box-footer">All students <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
        </div>
        
        <div class="col-md-4 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-yellow">
		<div class="inner">
		  <h3>{{App\Employee::where('status', '=', 1)->count()}}</h3>

		  <p>Employee</p>
		</div>
		<div class="icon">
		  <i class="fa fa-user-circle-o"></i>
		</div>
		<a href="{{url('employees')}}" class="small-box-footer">All employees <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">

              @php
                  $start_date = App\Admission::orderBy('admission_id', 'DESC')->first()->start_date;
                  $end_date = App\Admission::orderBy('admission_id', 'DESC')->first()->end_date;
                  $current_date = \Carbon\Carbon::now();
                  $total_days = \Carbon\Carbon::parse($start_date)->diffInDays(\Carbon\Carbon::parse($end_date));
                  $passed_days = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($end_date));
                  $candidates = App\Candidate::where('status', '=', 1)->count();
              @endphp
            
            <div class="info-box text-left">
                <span class="info-box-icon bg-aqua"><i class="fa fa-id-card-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Admission</span>
                  <span class="info-box-number">Start date - {{$start_date}}</span>
                  <span class="info-box-number">End date - {{$end_date}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
          <!-- /.info-box -->
        </div>
            
        <div class="col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-address-book-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Candidates</span>
                  <span class="info-box-number">Total - {{$candidates}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
          <!-- /.info-box -->
        </div>
    </div>
</section>
@endsection
