@extends('layouts.index')
@section('select')
<section class="content-header">
  <h5>
     {{ Breadcrumbs::render('receiptPayment', $select_student, $select_last_payment) }}
  </h5>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                
                <div class="box-header receipt-header with-border">
                    <h1 class="receipt-title">ABC University</h1>
                    <p>Natore district at Rajshahi division in Bangladesh</p>
                    <h3 class="box-title">Money receipt</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body view-structure receipt-body">
                    <div class="col-md-12">
                    <div class="col-sm-12">
                        <div class="pull-right date">
                            <strong>Date</strong>
                            <p><span class="text-muted">&colon;</span>{{$select_last_payment->payment_date}}</p><br>
                        </div>
                    </div>
                    <div class="col-sm-7">
                    
                        <strong>Payment type</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->payment_type}}</p><br>

                        <strong>Payment method</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->payment_method}}</p><br>
                    
                        <strong>Amount in taka</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->pamount_taka}}</p><br>

                        <strong>Amount in words</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->pamount_words}}</p><br>
                    </div>
                    <div class="col-sm-5">
                        <strong class="small-strong">ID</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_student->id}}</p><br>

                        <strong class="small-strong">Name</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_student->name}}</p><br>
                        
                        <strong class="small-strong">Subject</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_student->subjectM ? $select_student->subjectM->subject_name : ''}}</p><br>

                        <strong class="small-strong">Semester</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_student->semester}}</p><br>
                    </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix" style="padding-top: 50px;">
                    <div class="col-md-10 col-md-offset-1">
                        <p class="pull-left">Paid by</p>
                        <p class="pull-right">Authorized signature</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="box-title">All payments</h2>
                </div>
                <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Semester</th>
                            <th>Amount</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($select_payment as $data)
                        <tr>
                            <td>{{$data->payment_date}}</td>
                            <td>{{$data->student_semester}}</td>
                            <td>{{$data->pamount_taka}}</td>
                            <td class="manage-btn">
                                <a href="{{url('student-payment/receipt/'.$data->student_id.'/'.$data->payment_id)}}" class="btn btn-success" data-toggle="tooltip" title="View receipt"><i class="fa fa-eye fa-lg"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection