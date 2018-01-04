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
      <h3 class="box-title">All teachers</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="allTeacher" class="table table-bordered table-striped">
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
        @foreach($select as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->designation}}</td>
          <td>{{$data->email}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->role_name}}</td>
          <td>{{$data->joining_date}}</td>
          <td class="manage-btn">
              @if($data->id == Auth::user()->id)
                  <a href="{{url('view-profile/'.Auth::user()->id)}}" class="btn btn-success"><i class="fa fa-eye fa-lg"></i></a>
                  <a href="{{url('edit-profile')}}" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i></a>
              @else
                  <a href="{{url('teacher/view/'.$data->id)}}" class="btn btn-success"><i class="fa fa-eye fa-lg"></i></a>
                  <a href="{{url('teacher/edit/'.$data->id)}}" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="{{url('teacher/soft-delete/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></a>
              @endif
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