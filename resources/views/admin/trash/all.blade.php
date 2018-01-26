@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('allTrash') }}
  </h5>
</section>
<section class="content">
  <div class="box box-primary">
    <!-- /.box-header -->
    <div class="box-body trash-body">
	
    <div class="trash-header">
      <h3>Teachers</h3>
    </div>
      <table class="table table-bordered">
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
        @foreach($select_users as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->designation}}</td>
          <td>{{$data->email}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->role_name}}</td>
          <td>{{$data->joining_date}}</td>
          <td class="manage-btn">
            <a href="{{url('teacher/restore/'.$data->id)}}" class="btn btn-success"><i class="fa fa-history fa-lg" data-toggle="tooltip" title="Restore"></i></a>
            <a href="{{url('teacher/delete/'.$data->id)}}" class="btn btn-danger" data-toggle="tooltip" title="Delete permanently" onclick="event.preventDefault();confirmBox(this, 'delete');"><i class="fa fa-trash fa-lg"></i></a>
          </td>
        </tr>
        @endforeach
      </table>
	  
		<div class="trash-header">
		  <h3>Students</h3>
		</div>
	  <table class="table table-bordered">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Subject</th>
          <th>Session fee</th>
          <th>Due</th>
          <th>Paid</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select_students as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->subject_name}}</td>
          <td>{{$data->course_fee}}</td>
          <td>{{''}}</td>
          <td>{{''}}</td>
          <td class="manage-btn">
            <a href="{{url('student/restore/'.$data->id)}}" class="btn btn-success"><i class="fa fa-history fa-lg" data-toggle="tooltip" title="Restore"></i></a>
            <a href="{{url('student/delete/'.$data->id)}}" class="btn btn-danger" data-toggle="tooltip" title="Delete permanently" onclick="event.preventDefault();confirmBox(this, 'delete');"><i class="fa fa-trash fa-lg"></i></a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    
        <div class="modal fade" id="add-marks">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add marks</h4>
              </div>
                <form method="post" action="#" id="am-form">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="marks">Marks</label>
                            <input type="text" id="marks" name="marks" class="form-control" placeholder="Enter marks">
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
    <!-- /.box-body -->
  </div>
</section>
@endsection