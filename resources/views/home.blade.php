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
	<div class="col-lg-3 col-xs-6">
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
	
	<div class="col-lg-3 col-xs-6">
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
    </div>
</section>
@endsection
