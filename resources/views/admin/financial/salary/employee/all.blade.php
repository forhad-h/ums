@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('allESalary') }}
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
          <th>Designation</th>
          <th>Salary scale</th>
          <th>Others</th>
          <th>Total</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->designation}}</td>
          <td>{{$data->salary_scale}}</td>
          <td>{{''}}</td>
          <td>{{''}}</td>
          <td class="manage-btn">
                  <a href="{{url('employee-salary/add/'.$data->id)}}" target="_blank" class="btn btn-primary"><i class="fa fa-dollar fa-lg"></i> Pay</a>
                  <a href="{{url('employee-salary/receipt/'.$data->id)}}" class="btn btn-success" data-toggle="tooltip" title="View payment"><i class="fa fa-eye fa-lg"></i></a>
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