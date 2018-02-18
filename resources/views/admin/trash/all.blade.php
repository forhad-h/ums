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
    <div class='col-sm-6'>
        <div class="trash-header">
          <h3>Teachers</h3>
        </div>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Designation</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($select_users as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->designation}}</td>
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
              <td class="manage-btn">
                <a href="{{url('student/restore/'.$data->id)}}" class="btn btn-success"><i class="fa fa-history fa-lg" data-toggle="tooltip" title="Restore"></i></a>
                <a href="{{url('student/delete/'.$data->id)}}" class="btn btn-danger" data-toggle="tooltip" title="Delete permanently" onclick="event.preventDefault();confirmBox(this, 'delete');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
            @endforeach
        </table>

        <div class="trash-header">
          <h3>Employee</h3>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Designation</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($select_employees as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->designation}}</td>
              <td class="manage-btn">
                <a href="{{url('employee/restore/'.$data->id)}}" class="btn btn-success"><i class="fa fa-history fa-lg" data-toggle="tooltip" title="Restore"></i></a>
                <a href="{{url('employee/delete/'.$data->id)}}" class="btn btn-danger" data-toggle="tooltip" title="Delete permanently" onclick="event.preventDefault();confirmBox(this, 'delete');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
            @endforeach
        </table>
    </div>
        <div class="col-sm-6">
          <div class="trash-header">
              <h3>Admission</h3>
          </div>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>Session year</th>
              <th>Session name</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($select_admissions as $data)
            <tr>
              <td>{{$data->session_year}}</td>
              <td>{{$data->session_name}}</td>
              <td class="manage-btn">
                <a href="{{url('admission/restore/'.$data->admission_id)}}" class="btn btn-success"><i class="fa fa-history fa-lg" data-toggle="tooltip" title="Restore"></i></a>
                <a href="{{url('admission/delete/'.$data->admission_id)}}" class="btn btn-danger" data-toggle="tooltip" title="Delete permanently" onclick="event.preventDefault();confirmBox(this, 'delete');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
          
          <div class="trash-header">
              <h3>Exam</h3>
          </div>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>Exam ID code</th>
              <th>Exam name</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($select_exams as $data)
            <tr>
              <td>{{$data->exam_id}}</td>
              <td>{{$data->exam_name}}</td>
              <td class="manage-btn">
                <a href="{{url('exam/restore/'.$data->eid)}}" class="btn btn-success"><i class="fa fa-history fa-lg" data-toggle="tooltip" title="Restore"></i></a>
                <a href="{{url('exam/delete/'.$data->eid)}}" class="btn btn-danger" data-toggle="tooltip" title="Delete permanently" onclick="event.preventDefault();confirmBox(this, 'delete');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
@endsection