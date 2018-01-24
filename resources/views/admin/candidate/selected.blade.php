@extends('layouts.index')
@section('all')
<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('sCandidates') }}
  </h5>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">All candidates</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="allTeacher" class="table table-bordered table-striped">
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
              <td>{{$data->marks}}<a href="{{route('addMarks', ['id' => $data->id])}}" class="btn-inner" data-toggle="modal" data-target="#add-marks" onclick="setAction(this);"><i class="fa fa-refresh"></i></a></td>
          @else
          <td><a href="{{route('addMarks', ['id' => $data->id])}}" class="btn-add" data-toggle="modal" data-target="#add-marks" onclick="setAction(this);"><i class="fa fa-plus-circle"></i></a></td>
          @endif
          <td class="manage-btn">
              @if($data->marks >= 40)
                <a href="{{url('candidate/select/'.$data->id)}}" class="btn btn-success"><i class="fa fa-check fa-lg"></i></a>
              @endif
                <a href="{{url('candidate/omit/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger"><i class="fa fa-close fa-lg"></i></a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    
        <div class="modal fade" id="add-marks">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add marks</h4>
              </div>
                <form method="post" action="#" id="am-form">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="marks">Marks</label>
                            <input type="text" id="marks" name="marks" class="form-control" placeholder="Enter marks">
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
    <!-- /.box-body -->
  </div>
</section>
@endsection