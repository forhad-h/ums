@extends('layouts.index')
@section('edit')
<section class="content-header clearfix">
  <h5>
      {{Breadcrumbs::render('editAdmission', $select)}}
  </h5>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-header with-border">
            <div class="col-md-12 box-title">
                Edit admission
             </div>
            <div class="clearfix"></div>
        </div>


        <form enctype="multipart/form-data" action="{{route('updateAdmission', ['id' => $select->admission_id])}}" method="post">
		   {{csrf_field()}}
			<div class="panel-body  body0">
				<div class="col-sm-6 col-sm-offset-3 custom-padding">
					<div class="form-group{{ $errors->has('session_year') ? ' has-error' : '' }}">
						<label for="session_year">Session year <span class="text-require">(require)</span></label>
						<input type="text" class="form-control" id="session_year" name="session_year" value="{{$select->session_year}}" placeholder="Enter session year">
						@if ($errors->has('session_year'))
							<span class="help-block">
								<strong>{{ $errors->first('session_year') }}</strong>
							</span>
						@endif
					</div>
					
					<div class="form-group{{ $errors->has('session_name') ? ' has-error' : '' }}">
						<label for="session_name">Session name <span class="text-require">(require)</span></label>
						
						<select name="session_name" id="session_name" class="form-control select2" style="width: 100%;">
							<option value="">Select session name</option>
							@if($select->session_name == 'Summer')
								<option value="Summer" selected>Summer</option>
							@else
								<option value="Summer">Summer</option>
							@endif
							
							@if($select->session_name == 'Winter')
								<option value="Winter" selected>Winter</option>
							@else
								<option value="Winter">Winter</option>
							@endif
							
							@if($select->session_name == 'Fall')
								<option value="Fall" selected>Fall</option>
							@else
								<option value="Fall">Fall</option>
							@endif
							
						</select>
						@if ($errors->has('session_name'))
							<span class="help-block">
								<strong>{{ $errors->first('session_name') }}</strong>
							</span>
						@endif
					</div>
					
					<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
						<label for="start_date">Start date <span class="text-require">(require)</span></label>

						<div class="input-group date">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" class="form-control  pull-right" id="start_date" name="start_date" value="{{$select->start_date}}" placeholder="01 January 2001">
						</div>
						@if ($errors->has('start_date'))
							<span class="help-block">
								<strong>{{ $errors->first('start_date') }}</strong>
							</span>
						@endif
						<!-- /.input group -->
					</div>
					
					<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
						<label for="end_date">End date <span class="text-require">(require)</span></label>

						<div class="input-group date">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" class="form-control  pull-right" id="end_date" name="end_date" value="{{$select->end_date}}" placeholder="01 January 2001">
						</div>
						@if ($errors->has('end_date'))
							<span class="help-block">
								<strong>{{ $errors->first('end_date') }}</strong>
							</span>
						@endif
						<!-- /.input group -->
					</div>
				</div>
			</div>
		   <div class="panel-footer footer0">
			<div class="form-group text-center">
				<button type="submit" class="btn btn-lg btn-info">Start</button>
			</div>
		   </div>
		</form> 
        
	 </div>
        
</section>
@endsection