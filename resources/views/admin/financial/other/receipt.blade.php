@extends('layouts.index')
@section('select')
<section class="content-header">

</section>

<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                
                <div class="box-header receipt-header with-border">
                    <h1 class="receipt-title">ABC University</h1>
                    <p>Natore district at Rajshahi division in Bangladesh</p>
                    <h3 class="box-title">Money receipt</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body view-structure receipt-body">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="col-sm-12">
                        <div class="pull-right date">
                            <strong>Date</strong>
                            <p><span class="text-muted">&colon;</span>{{$select->payment_date}}</p><br>
                        </div>
                    </div>
                    <div class="col-sm-7">
		        <strong>Payment type</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->payment_type}}</p><br>
                        
		        <strong>Payment description</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->payment_des}}</p><br>
                        
                        <strong>Payment method</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->payment_method}}</p><br>
                    
                        <strong>Amount in taka</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->pamount_taka}}</p><br>

                        <strong>Amount in words</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->pamount_words}}</p><br>
                    </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix" style="padding-top: 50px;">
                    <div class="col-md-10 col-md-offset-1">
                        <p class="pull-left">
                            {{$select->payment_type == 'expenditure' ? 'Received by' : 'Paid by'}}
                        </p>
                        <p class="pull-right">Authorized signature</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection