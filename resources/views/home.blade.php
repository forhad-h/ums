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
        <div class="col-sm-4 text-center">

              @php
                  $select_adm = App\Admission::orderBy('admission_id', 'DESC')->first();
                  $start_date = $select_adm->start_date;
                  $end_date = $select_adm->end_date;
                  $end_date_obj = \Carbon\Carbon::parse($end_date);
                  $current_date = \Carbon\Carbon::now();
                  $total_days = \Carbon\Carbon::parse($start_date)->diffInDays($end_date_obj);
                  $remaining_days = \Carbon\Carbon::now()->diffInDays($end_date_obj) + 1;
                  
                  $total_candidates = App\Candidate::where([
                                                   ['status', '=', 2],
                                                   ['session_year', '=', $select_adm->session_year],
                                                   ['session_name', '=', $select_adm->session_name],
                                                ])->count();
                                                
                 $total_take_exam = App\Candidate::where([
                                                   ['take_exam', '=', 1],
                                                   ['session_year', '=', $select_adm->session_year],
                                                   ['session_name', '=', $select_adm->session_name],
                                                ])->count();
              @endphp
            @if($end_date_obj->addDays(1) > $current_date) 
            <div class="info-box text-left">
                <span class="info-box-icon bg-aqua"><i class="fa fa-id-card-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Admission going on</span>
                  <span class="text-info">Start date - {{$start_date}}</span><br>
                  <span class="text-info">End date - {{$end_date}}</span><br>
                  <span class="text-info">Remaining - <span class="text-maroon">{{$remaining_days}} days</span></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            @else
            <div class="info-box text-left">
                <span class="info-box-icon bg-gray"><i class="fa fa-id-card-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Admission end</span>
                  <span class="text-muted">Start date - {{$start_date}}</span><br>
                  <span class="text-muted">End date - {{$end_date}}</span><br>
                  <span class="text-muted">Remaining - 0 days</span>
                </div>
                <!-- /.info-box-content -->
            </div>
             <!-- /.info-box -->
            @endif
        </div>
            
        <div class="col-sm-4">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-address-book-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Candidates</span>
                  <span class="text-info">Total - {{$total_candidates}}</span><br>
                  <span class="text-info">Take exam - {{$total_take_exam}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
          <!-- /.info-box -->
        </div>
    </div>
</section>
@endsection
