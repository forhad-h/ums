@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('allTSalary') }}
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
          <th>Salary</th>
          <th>Bonus/Others</th>
          <th>Total</th>
          <th>Last month</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select_teachers as $data)
            @php
                $payment_id = '';
                $payment_month = '';
                foreach($select_payments as $datap) {
                   if($data->id == $datap->user_id) {
                     $payment_id = $datap->payment_id;
                     $payment_month = $datap->payment_month;
                     break;
                    }
                }
            @endphp
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->designation}}</td>
          <td>{{$data->salary_scale}}</td>
          <td>{{''}}</td>
          <td>{{''}}</td>
          @if((strtotime(\Carbon\Carbon::now()->parse()->format('F Y')) - 
               strtotime($payment_month)) > 2678400 )
              <td>Due {{round((strtotime(\Carbon\Carbon::now()->parse()->format('F Y')) - 
                        strtotime($payment_month))/2678400 - 1)}}</td>
          @else
              <td>Paid</td>
          @endif
          <td class="manage-btn">
                  <a href="{{url('teacher-salary/add/'.$data->id)}}" target="_blank" class="btn btn-primary"><i class="fa fa-dollar fa-lg"></i> Pay</a>
                  <a href="{{url('teacher-salary/receipt/'.$data->id.'/'.$payment_id)}}" class="btn btn-success" data-toggle="tooltip" title="View payment"><i class="fa fa-eye fa-lg"></i></a>
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