@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('students') }}
  </h5>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All students</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table data-table="true" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Subject</th>
          <th>Semester</th>
          <th>Session fee</th>
          <th>Due</th>
          <th>Paid</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->subject_name}}</td>
          <td>{{$data->semester}}</td>
          <td>{{$data->course_fee}}</td>
          <td>{{''}}</td>
          <td>{{''}}</td>
          <td class="manage-btn">
                  <a href="#" data-link="{{route('changeSemester', ['id' => $data->id])}}" data-toggle="modal" class="btn btn-primary" data-target="#change-semester" onclick="setAction(this);" title="Change semester"><i class="fa fa-rocket"></i></a>
                  <a href="{{url('student/view/'.$data->id)}}" class="btn btn-success" data-toggle="tooltip" title="View student"><i class="fa fa-eye fa-lg"></i></a>
                  <a href="{{url('student/edit/'.$data->id)}}" class="btn btn-warning" data-toggle="tooltip" title="Edit student"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="{{url('student/soft-delete/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger" data-toggle="tooltip" title="Delete student"><i class="fa fa-trash fa-lg"></i></a>
                  
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
<div class="modal fade{{$errors->all() ? ' in' : ''}}"  id="change-semester" style="{{$errors->all() ? 'display:block;' : 'display:none;'}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add marks</h4>
      </div>
        <form method="post" action="#" id="modal-form">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                    <label for="semester">Semester <span class="text-require">(require)</span></label>
                    <select name="semester" id="semester" class="form-control select2" style="width: 100%;">
                       <option value="">Change semester</option>
                       <option value="1st">1st</option>
                       <option value="2nd">2nd</option>
                       <option value="3rd">3rd</option>
                       <option value="4th">4th</option>
                       <option value="5th">5th</option>
                       <option value="6th">6th</option>
                       <option value="7th">7th</option>
                       <option value="8th">8th</option>
                       <option value="9th">9th</option>
                       <option value="10th">10th</option>
                    </select>
                    @if ($errors->has('semester'))
                        <span class="help-block">
                            <strong>{{ $errors->first('semester') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</section>
@endsection