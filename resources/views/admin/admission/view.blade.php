@extends('layouts.index')
@section('select')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('viewAdmission', $select) }}
  </h5>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                
                <div class="box-header receipt-header with-border">
                    <h1 class="receipt-title">Admission Details</h1>
                </div>
                <!-- /.box-header -->
                <div class="box-body view-structure receipt-body">
                    <div class="col-md-10 col-md-offset-1">
						
						<strong>Session year</strong>
						<p><span class="text-muted">&colon;</span>{{$select->session_year}}</p><br>
						
                        <strong>Session name</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->session_name}}</p><br>
                    
                        <strong>Start date</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->start_date}}</p><br>

                        <strong>End date</strong>
                        <p><span class="text-muted">&colon;</span>{{$select->end_date}}</p><br>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection