@extends('layouts.index')
@section('select')
<section class="content-header">
    <h5>
        {{ Breadcrumbs::render('viewEmployee', $select) }}
    </h5>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                  @if(($select->image != '') && File::exists(public_path('asset/dist/uploads/employees/').$select->image))
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('asset')}}/dist/uploads/employees/{{$select->image}}" alt="Employee profile picture">
                    @else
                      @if(Auth::user()->gender == 'female')
                           <img class="profile-user-img img-responsive img-circle" src="{{asset('asset')}}/dist/img/defaultf.jpg" alt="User profile picture"> 
                      @else
                           <img class="profile-user-img img-responsive img-circle" src="{{asset('asset')}}/dist/img/defaultm.jpg" alt="User profile picture">
                      @endif
                    @endif
                    
                  <h3 class="profile-username text-center">{{$select->name}}</h3>
                  <p class="text-muted text-center">{{$select->designation}}</p>
                  
                  @if($select->role_id != '')
                      <p class="text-muted text-center text-pr">{{$select->roleM->role_name}}</p>
                  @else
                      <p class="text-muted text-center text-pr">Employee</p>
                  @endif
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Contact info</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                  <p class="text-muted">{{$select->email}}</p>

                  <hr>

                  <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                  <p class="text-muted">{{$select->phone}}</p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i>Current address</strong>
                  <p class="text-muted">{{$select->caddress}}</p>
                  </div>
            <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body view-structure">
                    <strong>ID</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->id}}</p><br>
                    
                    <strong>Name</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->name}}</p><br>
                    
                    <strong>Designation</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->designation}}</p><br>
                    
                    <strong>Email</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->email}}</p><br>
                    
                    <strong>phone</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->phone}}</p><br>
                    
                    <strong>NID No.</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->nid}}</p><br>
                    
                    <strong>Current address</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->caddress}}</p><br>
                    
                    <strong>Permanent address</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->paddress}}</p><br>
                    
                    <strong>Salary scale</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->salary_scale}}</p><br>
                    
                    <strong>Joining date</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->joining_date}}</p><br>
                    
                    <strong>Role</strong>
                    <p><span class="text-muted">&DoubleLeftRightArrow;</span>{{$select->roleM ? $select->roleM->role_name : 'N/A'}}</p><br>
                    
                    <strong>Experience</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->experience}}</p><br>
                    
                    <strong>Gender</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->gender}}</p><br>
                    
                    <strong>Nationality</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->nationality}}</p><br>
                    
                    <strong>Religion</strong>
                    <p><span class="text-muted"> &DoubleLeftRightArrow;</span>{{$select->religion}}</p><br>
                  
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection