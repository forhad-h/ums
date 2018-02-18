@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('allCandidates') }}
  </h5>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All candidates</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table data-table="true" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Roll no.</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Institute</th>
          <th>Result</th>
          <th>Marks</th>
          <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select as $data)
        <tr>
          <td>{{$data->candidate_id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->institute}}</td>
          <td>{{$data->result}}</td>
          @if($data->marks != '')
              <td>{{$data->marks}}<a href="#" data-link="{{route('addMarks', ['id' => $data->id])}}" class="btn-inner" data-target="#add-marks" onclick="appearModal(this, event, {{$data->id}}, 'marks');" title="Edit marks"><i class="fa fa-refresh"></i></a></td>
          @else
              <td><a href="#" data-link="{{route('addMarks', ['id' => $data->id])}}" class="btn-add" data-toggle="modal" onclick="appearModal(this, event, {{$data->id}}, 'marks');" title="Add marks"><i class="fa fa-plus-circle"></i></a></td>
          @endif
          <td class="manage-btn">
              @if($data->marks >= 40)
                <a href="{{url('candidate/select/'.$data->id)}}" class="btn btn-success" data-toggle="tooltip" title="Select candidate"><i class="fa fa-check fa-lg"></i></a>
              @endif
                <a href="{{url('candidates/reject/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger" data-toggle="tooltip" title="Reject candidate"><i class="fa fa-close fa-lg"></i></a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.box-body -->
        <div class="modal fade{{$errors->all() ? ' in' : ''}}"  id="bs-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add marks</h4>
              </div>
                <form method="post" action="#" id="modal-form">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('marks') ? ' has-error' : '' }}">
                            <label for="marks">Marks</label>
                            <input type="text" id="marks" name="marks" class="form-control" placeholder="Enter marks">
                            @if ($errors->has('marks'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('marks') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  </div>
</section>
@endsection