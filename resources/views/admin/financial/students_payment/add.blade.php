@extends('layouts.index')
@section('add')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('addPayment', $select) }}
  </h5>
</section>
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Add payment</h3>
        </div>
        <form enctype="multipart/form-data" action="{{url('student-payment/insert')}}" method="post">
            {{csrf_field()}}
             <div class="box-body">
                 <div class="col-sm-6 col-sm-offset-3">
                     <div class="form-group">
                         <label>Student ID</label>
                         <input type="text" class="form-control" name="student_id" value="{{$select->id}}" readonly>
                     </div>
                     
                     <div class="form-group">
                         <label>Student name</label>
                         <input type="text" class="form-control" value="{{$select->name}}" disabled="disabled">
                     </div>

                     <div class="form-group{{ $errors->has('payment_type') ? ' has-error' : '' }}">
                        <label for="payment_type">Payment type <span class="text-require">(require)</span></label>
                        <select id="payment_type" name="payment_type" class="form-control select2" style="width: 100%;">
                            <option value="">Select payment type</option>
                            @if(old('payment_type') == 'semester fee')
                                <option value="semester fee" selected="selected">Semester fee</option>
                            @else
                                <option value="semester fee">Semester fee</option>
                            @endif
                            @if(old('payment_type') == 'others')
                                <option value="others" selected="selected">Others</option>
                            @else
                                <option value="others">Others</option>
                            @endif
                        </select>
                        @if ($errors->has('payment_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('payment_type') }}</strong>
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
                        @if ($errors->has('payment_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('payment_date') }}</strong>
                            </span>
                        @endif
                         <!-- /.input group -->
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
</section>
@endsection