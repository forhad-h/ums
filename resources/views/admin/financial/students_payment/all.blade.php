@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('allPayments') }}
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
          <th>Subject</th>
          <th>Session fee</th>
          <th>Due</th>
          <th>Paid</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select_students as $data)
            @php
                $payment_id = '';
                foreach($select_payments as $datap) {
                   if($data->id == $datap->student_id) {
                     $payment_id = $datap->payment_id; 
                     break;
                    }
                }
            @endphp
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->subject_name}}</td>
          <td>{{$data->course_fee}}</td>
          <td>{{$data->course_fee}}</td>
          <td>{{$data->course_fee}}</td>
          <td class="manage-btn">
                  <a href="{{url('student-payment/add/'.$data->id)}}" target="_blank" class="btn btn-primary"><i class="fa fa-dollar fa-lg"></i> Pay</a>
                  <a href="{{url('student-payment/receipt/'.$data->id.'/'.$payment_id)}}" class="btn btn-success" data-toggle="tooltip" title="View payment"><i class="fa fa-eye fa-lg"></i></a>
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