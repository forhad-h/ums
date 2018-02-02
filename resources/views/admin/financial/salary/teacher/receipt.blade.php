@extends('layouts.index')
@section('select')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('receiptTSalary', $select_teacher, $select_last_payment) }}
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
                    <div class="col-sm-12">
                        <div class="pull-right date">
                            <strong>Date</strong>
                            <p><span class="text-muted">&colon;</span>{{$select_last_payment->payment_date}}</p><br>
                        </div>
                    </div>
                    <div class="col-sm-7">
					
                        <strong>Payment method</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->payment_method}}</p><br>
                    
                        <strong>Amount in taka</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->pamount_taka}}</p><br>

                        <strong>Amount in words</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->pamount_words}}</p><br>
                    </div>
                    <div class="col-sm-5">
                        <strong class="small-strong">ID</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_teacher->id}}</p><br>

                        <strong class="small-strong">Name</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_teacher->name}}</p><br>

                        <strong class="small-strong">Month</strong>
                        <p><span class="text-muted">&colon;</span>{{$select_last_payment->payment_month}}</p><br>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix" style="padding-top: 50px;">
                    <div class="col-md-10 col-md-offset-1">
                        <p class="pull-left">Received by</p>
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
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($select_payment as $data)
                        <tr>
                            <td>{{$data->payment_month}}</td>
                            <td>{{$data->pamount_taka}}</td>
                            <td class="manage-btn">
                                <a href="{{url('teacher-salary/receipt/'.$data->user_id.'/'.$data->payment_id)}}" class="btn btn-success" data-toggle="tooltip" title="View receipt"><i class="fa fa-eye fa-lg"></i></a>
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