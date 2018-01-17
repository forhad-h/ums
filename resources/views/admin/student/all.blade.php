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
      <table id="allTeacher" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Subject</th>
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
          <td>{{''}}</td>
          <td>{{''}}</td>
          <td class="manage-btn">
                  <a href="{{url('student/view/'.$data->id)}}" class="btn btn-success"><i class="fa fa-eye fa-lg"></i></a>
                  <a href="{{url('student/edit/'.$data->id)}}" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="{{url('teacher/soft-delete/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></a>
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