@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('admissions') }}
  </h5>
</section>
<section class="content">
    <div id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading text-center add-pheading" role="tab" id="heading">
          <h4 class="panel-title">
              <a class="btn btn-success{{$errors->all() ? '' : ' collapsed'}}" id="btn-add" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesec" aria-expanded="{{$errors->all() ? 'true' : 'false'}}" aria-controls="collapsesec">
              Start admission
              
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </h4>
        </div>
        <div id="collapsesec" class="panel-collapse collapse{{$errors->all() ? ' in' : ''}}" role="tabpanel" aria-labelledby="heading">
               <form enctype="multipart/form-data" action="{{url('admission/insert')}}" method="post">
                   {{csrf_field()}}
                    <div class="panel-body  body0">
                        <div class="col-sm-6 col-sm-offset-3 custom-padding">
                            <div class="form-group{{ $errors->has('session_year') ? ' has-error' : '' }}">
                                <label for="session_year">Session year <span class="text-require">(require)</span></label>
                                <input type="text" class="form-control" id="session_year" name="session_year" value="{{old('session_year')}}" placeholder="Enter session year">
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
                                            @if(old('session_name') == 'Summer')
                                                    <option value="Summer" selected>Summer</option>
                                            @else
                                                    <option value="Summer">Summer</option>
                                            @endif

                                            @if(old('session_name') == 'Winter')
                                                    <option value="Winter" selected>Winter</option>
                                            @else
                                                    <option value="Winter">Winter</option>
                                            @endif

                                            @if(old('session_name') == 'Fall')
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
                                  <input type="text" class="form-control  pull-right" id="start_date" name="start_date" value="{{old('start_date')}}" placeholder="01 January 2001">
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
                                  <input type="text" class="form-control  pull-right" id="end_date" name="end_date" value="{{old('end_date')}}" placeholder="01 January 2001">
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
    </div>
    </div>
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All admission</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table data-table="true" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Session year</th>
          <th>Session name</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @php
           $loop_num = 0;
        @endphp
        @foreach($select as $data)
        <tr>
          <td>{{$data->session_year}}</td>
          <td>{{$data->session_name}}</td>
          <td>{{$data->start_date}}</td>
          <td>{{$data->end_date}}</td>
          <td class="manage-btn">
             @php
                $loop_num += 1;
             @endphp
             @if($select->count() == $loop_num)
                <a href="{{url('admission/edit/'.$data->admission_id)}}" class="btn btn-warning" data-toggle="tooltip" title="Edit admission"><i class="fa fa-pencil fa-lg"></i></a>
             @else
                <a href="#" class="btn btn-warning disabled"><i class="fa fa-pencil fa-lg"></i></a>
             @endif
          
            <a href="{{url('admission/soft-delete/'.$data->admission_id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger" data-toggle="tooltip" title="Delete admission"><i class="fa fa-trash fa-lg"></i></a>
          
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