@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('allOthers') }}
  </h5>
</section>
<section class="content">
  <div id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading text-center add-pheading" role="tab" id="heading">
          <h4 class="panel-title">
              <a class="btn btn-success{{$errors->all() || session('success-add') ? '' : ' collapsed'}}" id="btn-add" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesec" aria-expanded="{{$errors->all() || session('success-add') ? 'true' : 'false'}}" aria-controls="collapsesec">
              Add
              
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </h4>
        </div>
        <div id="collapsesec" class="panel-collapse collapse{{$errors->all() || session('success-add') ? ' in' : ''}}" role="tabpanel" aria-labelledby="heading">
            <form enctype="multipart/form-data" action="{{url('f-other/insert')}}" method="post">
                 {{csrf_field()}}
                  <div class="box-body">
                     <div class="col-sm-6 col-sm-offset-3">
                     <div class="form-group{{ $errors->has('payment_type') ? ' has-error' : '' }}">
                        <label for="payment_type">Payment type <span class="text-require">(require)</span></label>
                        <select id="payment_type" name="payment_type" class="form-control select2" style="width: 100%;">
                            <option value="">Select payment type</option>
                            @if(old('payment_type') == 'acquirement')
                                <option value="acquirement" selected="selected">Acquirement</option>
                            @else
                                <option value="acquirement">Acquirement</option>
                            @endif
                            @if(old('payment_type') == 'expenditure')
                                <option value="expenditure" selected="selected">Expenditure</option>
                            @else
                                <option value="expenditure">Expenditure</option>
                            @endif
                        </select>
                        @if ($errors->has('payment_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('payment_type') }}</strong>
                            </span>
                        @endif
                     </div>
                         
                        <div class="form-group{{ $errors->has('payment_des') ? ' has-error' : '' }}">
                                <label for="payment_des">Payment description <span class="text-require">(require)</span></label>
                                <textarea class="form-control" id="payment_des" name="payment_des" rows="3" placeholder="Enter payment description">{{old('payment_des')}}</textarea>
                                @if ($errors->has('payment_des'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_des') }}</strong>
                                    </span>
                                @endif
                        </div>
                         
                          <div class="form-group{{ $errors->has('payment_method') ? ' has-error' : '' }}">
                             <label for="payment_method">Payment method <span class="text-require">(require)</span></label>
                             <select id="payment_method" name="payment_method" class="form-control select2" style="width: 100%;">
                                 <option value="">Select payment method</option>
                                 @if(old('payment_method') == 'cash')
                                     <option value="cash" selected="selected">Cash</option>
                                 @else
                                     <option value="Cash">Cash</option>
                                 @endif
                                 @if(old('payment_method') == 'cheque')
                                     <option value="cheque" selected="selected">Cheque</option>
                                 @else
                                     <option value="cheque">Cheque</option>
                                 @endif
                                 @if(old('payment_method') == 'bkash')
                                     <option value="bkash" selected="selected">Bkash</option>
                                 @else
                                     <option value="bkash">Bkash</option>
                                 @endif
                             </select>
                             @if ($errors->has('payment_method'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('payment_method') }}</strong>
                                 </span>
                             @endif
                          </div>

                          <div class="form-group{{ $errors->has('pamount_taka') ? ' has-error' : '' }}">
                              <label for="pamount_taka">Amount in Taka <span class="text-require">(require)</span></label>
                                  <input type="text" class="form-control" id="pamount_taka" name="pamount_taka" value="{{old('pamount_taka')}}" placeholder="Amount in taka">
                                  @if ($errors->has('pamount_taka'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('pamount_taka') }}</strong>
                                      </span>
                                  @endif
                          </div>

                          <div class="form-group{{ $errors->has('pamount_words') ? ' has-error' : '' }}">
                              <label for="pamount_words">Amount in words <span class="text-require">(require)</span></label>
                                  <input type="text" class="form-control" id="pamount_words" name="pamount_words" value="{{old('pamount_words')}}" placeholder="Amount in words">
                                  @if ($errors->has('pamount_words'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('pamount_words') }}</strong>
                                      </span>
                                  @endif
                          </div>

                          <div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
                              <label for="payment_date">Payment date <span class="text-require">(require)</span></label>

                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                  <input type="text" class="form-control  pull-right" id="payment_date" name="payment_date" value="{{old('payment_date')}}" placeholder="01 January 2001">
                              </div>
                              <!-- /.input group -->
                               @if ($errors->has('payment_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_date') }}</strong>
                                    </span>
                               @endif
                          </div>
                      </div>
                  </div>
                  <div class="box-footer footer0">
                     <div class="form-group text-center">
                         <button type="submit" class="btn btn-lg btn-info">REGISTRATION</button>
                     </div>
                 </div>
            </form>
        </div>
    </div>
    </div>
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All students</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table data-table="true" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Type</th>
          <th>Method</th>
          <th>Description</th>
          <th>Amount (Taka)</th>
          <th>Amount (Words)</th>
          <th>Payment date</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select as $data)
        <tr>
          <td>{{$data->payment_type}}</td>
          <td>{{$data->payment_method}}</td>
          <td>{{$data->payment_des}}</td>
          <td>{{$data->pamount_taka}}</td>
          <td>{{$data->pamount_words}}</td>
          <td>{{$data->payment_date}}</td>
          <td class="manage-btn">
                  <a href="{{url('f-other/receipt/'.$data->payment_id)}}" class="btn btn-success" data-toggle="tooltip" title="View payment"><i class="fa fa-eye fa-lg"></i> View</a>
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