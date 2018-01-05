@extends('layouts.index')
@section('all')
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
          <td>{{$data->id}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->institute}}</td>
          <td>{{$data->result}}</td>
          @if($data->marks != '')
              <td>{{$data->marks}}</td>
          @else
          <td><a href="{{route('addMarks', ['id' => $data->candidate_id])}}" class="btn btn-info" data-toggle="modal" data-target="#add-marks" onclick="setAction(this);"><i class="fa fa-plus"></i></a></td>
          @endif
          <td class="manage-btn">
                  <a href="{{url('teacher/view/'.$data->id)}}" class="btn btn-success"><i class="fa fa-eye fa-lg"></i></a>
                  <a href="{{url('teacher/edit/'.$data->id)}}" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i></a>
                  <a href="{{url('teacher/soft-delete/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'soft-delete');" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></a>
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