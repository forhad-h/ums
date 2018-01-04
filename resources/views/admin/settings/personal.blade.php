@extends('layouts.index')
@section('personal-settings')

<section class="content-header">
  <h5>
      {{ Breadcrumbs::render('personal-settings') }}
  </h5>
</section>
<section class="content">
        <div class="box box-primary  collapsed-box">
            <div class="box-header">
              <h3 class="box-title">User roles</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body" style="display:none;">
            <div class="col-sm-6">
                <form enctype="multipart/form-data" action="{{url('/role/insert-role/')}}" method="post">
                {{csrf_field()}}
                         <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                             <label for="id">ID <span class="text-optional">(you can leave blank for auto increment)</span></label>
                             <input type="text" class="form-control" id="id" name="id" value="{{old('id')}}">
                             @if ($errors->has('id'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('id') }}</strong>
                                 </span>
                             @endif
                         </div>

                         <div class="form-group{{ $errors->has('role_name') ? ' has-error' : '' }}">
                             <label for="role_name">Role name <span class="text-require">(require)</span></label>

                                 <input type="text" class="form-control" id="role_name" name="role_name" value="{{old('role_name')}}">
                                 @if ($errors->has('role_name'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('role_name') }}</strong>
                                     </span>
                                 @endif
                         </div>

                         <div class="form-group{{$errors->has('permissions') ? ' has-error' : '' }}">
                             <label for="permissions">Permissions</label>
                             <select name="permissions[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                     style="width: 100%;">
                                 <option>Alabama</option>
                                 <option>Alaska</option>
                                 <option>California</option>
                                 <option>Delaware</option>
                                 <option>Tennessee</option>
                                 <option>Texas</option>
                                 <option>Washington</option>
                             </select>
                                 @if ($errors->has('permissions'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('permissions') }}</strong>
                                     </span>
                                 @endif
                         </div>
                 <div class="panel-footer footer1">
                      <div class="form-group text-center">
                     <button type="submit" class="btn btn-info">ADD</button>
                 </div>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Role name</th>
                  <th>Permissions</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($select as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->role_name}}</td>
                  <td>{{$data->permissions}}</td>
                  <td class="manage-btn">
                      @if($data->status == 1)
                          <a href="{{url('role/hide/'.$data->id)}}" onclick="softDelete(event, this)" class="btn btn-warning"><i class="fa fa-eye fa-lg"></i></a>
                      @else
                          <a href="{{url('role/show/'.$data->id)}}" onclick="softDelete(event, this)" class="btn btn-warning"><i class="fa fa-eye-slash fa-lg"></i></a>
                      @endif
                      <a href="{{url('role/delete-role/'.$data->id)}}" onclick="event.preventDefault();confirmBox(this, 'delete');" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
</section>
@endsection