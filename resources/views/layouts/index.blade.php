<!DOCTYPE html>
<html  class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>University managemennt system</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('asset')}}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Custom file input -->
  <link rel="stylesheet" href="{{asset('asset')}}/dist/css/custom-file-input.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('asset')}}/plugins/iCheck/all.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('asset')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!--data table-->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!--sweet alert-->
  <link rel="stylesheet" href="{{asset('asset')}}/bower_components/bootstrap-sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" href="{{asset('asset')}}/dist/css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- remove this if you use Modernizr -->
  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>UMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('asset')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('asset')}}/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('asset')}}/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('asset')}}/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('asset')}}/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('asset')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('asset')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('asset')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{Request::is('home') ? 'active' : ''}}"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{Request::is('teachers') ||
        (Request::is('teacher/edit/*') &&
        Auth::id() != @$select->id) ||
        (Request::is('teacher/view/*') &&
        Auth::id() != @$select->id) ? 'active' : ''}}"><a href="{{url('teachers')}}"><i class="fa fa-user"></i> <span>Teachers</span></a></li>

        <li class="{{Request::is('students') ||
        Request::is('student/edit/*') || Request::is('student/view/*') ? 'active' : ''}}"><a href="{{url('students')}}"><i class="fa fa-users"></i> <span>Students</span></a></li>
        
        <li class="{{Request::is('employees') ||
        Request::is('employee/edit/*') ||
        Request::is('employee/view/*') ? 'active' : ''}}"><a href="{{url('employees')}}"><i class="fa fa-user-circle-o"></i> <span>Employees</span></a></li>
        
        <li class="treeview{{Request::is('admission/form') ||
        Request::is('admissions') ||
        Request::is('admission/view/*') ||
        Request::is('admission/edit/*')||
        Request::is('admission/exams') ||
        Request::is('admission/exam/edit/*') ||
        Request::is('admission/exams/QuestionPaper/*') ||
        Request::is('admission/QuestinPaper/*') ||
        Request::is('exam/question/edit/*') ? ' active' : ''}}">
            <a href="#"><i class="fa fa-id-card-o"></i> <span>Admissions</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{Request::is('admissions') ||
                 Request::is('admission/view/*') ||
                 Request::is('admission/edit/*') ? 'active' : ''}}"><a href="{{url('admissions')}}"><i class="fa fa-square-o"></i>All Admission</a></li>
                <li class="{{Request::is('admission/exams') ||
                             Request::is('admission/exam/edit/*') ||
                             Request::is('admission/exams/QuestionPaper/*') ||
                             Request::is('exam/question/edit/*') ? 'active' : ''}}">
                    <a href="{{url('admission/exams')}}"><i class="fa fa-square-o"></i>All Exam</a>
                </li>
                <li class="{{Request::is('admission/form') ? 'active' : ''}}"><a href="{{url('admission/form')}}"><i class="fa fa-square-o"></i>Form</a></li>
                <li class="{{Request::is('admission/QuestinPaper/*') ? 'active' : ''}}"><a href="{{url('admission/QuestinPaper')}}"><i class="fa fa-square-o"></i>Question paper</a></li>
            </ul>
        </li>
        
        <li class="treeview{{Request::is('candidates') ||
        Request::is('candidates/selected') ||
        Request::is('candidates/rejected') ||
        Request::is('candidate/select/*') ? ' active' : ''}}">
            <a href="#"><i class="fa fa-address-book-o"></i> <span>Candidates</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{Request::is('candidates')||
                 Request::is('candidate/select/*') ? 'active' : ''}}"><a href="{{url('candidates')}}"><i class="fa fa-square-o"></i>All candidates</a></li>
                <li class="{{Request::is('candidates/selected') ? 'active' : ''}}"><a href="{{url('candidates/selected')}}"><i class="fa fa-square-o"></i>Selected</a></li>
                <li class="{{Request::is('candidates/rejected') ? 'active' : ''}}"><a href="{{url('candidates/rejected')}}"><i class="fa fa-square-o"></i>Rejected</a></li>
            </ul>
        </li>
        
        <li class="treeview{{Request::is('students-payment') ||
        Request::is('student-payment/add/*') ||
        Request::is('student-payment/receipt/*') ||
        Request::is('teachers-salary') ||
        Request::is('teacher-salary/add/*') ||
        Request::is('teacher-salary/receipt/*') ||
        Request::is('employees-salary') ||
        Request::is('employee-salary/add/*') ||
        Request::is('employee-salary/receipt/*') ||
        Request::is('f-others') ||
        Request::is('f-other/add/*') ||
        Request::is('f-other/receipt/*') ? ' active' : ''}}">
            <a href="#"><i class="fa fa-credit-card"></i> <span>Financial</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{Request::is('students-payment') ||
                  Request::is('student-payment/add/*') ||
                  Request::is('student-payment/receipt/*') ? 'active' : ''}}"><a href="{{url('students-payment')}}"><i class="fa fa-square-o"></i>Students payment</a></li>
                <li class="{{Request::is('teachers-salary') ||
                 Request::is('teacher-salary/add/*') ||
                 Request::is('teacher-salary/receipt/*') ? 'active' : ''}}"><a href="{{url('teachers-salary')}}"><i class="fa fa-square-o"></i>Teachers salary</a></li>
                <li class="{{Request::is('employees-salary') ||
                  Request::is('employee-salary/add/*') ||
                  Request::is('employee-salary/receipt/*') ? 'active' : ''}}"><a href="{{url('employees-salary')}}"><i class="fa fa-square-o"></i>Employees salary</a></li>
                <li class="{{Request::is('f-others') ||
                 Request::is('f-other/add/*') ||
                 Request::is('f-other/receipt/*') ? 'active' : ''}}"><a href="{{url('f-others')}}"><i class="fa fa-square-o"></i>Others</a></li>
            </ul>
        </li>
            
        <li class="{{Request::is('settings') ? 'active' : ''}}"><a href="{{url('settings')}}"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
        
        <li class="{{Request::is('all-trash') ? 'active' : ''}}"><a href="{{url('all-trash')}}"><i class="fa fa-trash-o"></i> <span>Trash</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-red">
                    {{
                    
                        App\User::where('status', '=', 0)->count() +
                        App\Student::where('status', '=', 0)->count() +
                        App\Employee::where('status', '=', 0)->count() +
                        App\Admission::where('status', '=', 0)->count() +
                        App\Exam::where('status', '=', 0)->count()
                    
                    }}
                </small>
              </span></a></li>
        
        <li class="header">ACCOUNT</li>
        <li class="{{(Request::is('teacher/view/*') && Auth::id() == @$select->id) || Request::is('edit-profile') ||  Request::is('view-profile/*')? 'active' : ''}}"><a href="{{url('view-profile/'.Auth::id())}}"><i class="fa fa-address-book text-aqua"></i> <span>Profile</span></a></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out text-orange"></i> <span>Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
         @yield('all')
         @yield('edit')
         @yield('edit-profile')
         @yield('view')
         
         @yield('admission-form')
         
         @yield('add')
         
         @yield('select')
         
         @yield('content')
         
         
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('asset')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('asset')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('asset')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('asset')}}/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('asset')}}/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('asset')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('asset')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('asset')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('asset')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('asset')}}/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('asset')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('asset')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('asset')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('asset')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('asset')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- custom file input-->
<script src="{{asset('asset')}}/dist/js/jquery.custom-file-input.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('asset')}}/plugins/iCheck/icheck.min.js"></script>
<!--data table-->
<script src="{{asset('asset')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('asset')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="{{asset('asset')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- jQuery Knob -->
<script src="{{asset('asset')}}/bower_components/jquery-knob/js/jquery.knob.js"></script>
<script>
    /* jQueryKnob */
    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    /* END JQUERY KNOB */
</script>
<!-- AdminLTE App -->
<script src="{{asset('asset')}}/dist/js/adminlte.min.js"></script>
<!-- SweetAlert -->
<script src="{{asset('asset')}}/bower_components/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
@if(session('success-add'))
    <div class="success-alert-msg" role="alert"><strong>Successful! </strong>Data has been added.</div>
@elseif(session('success-restore'))
   <div class="success-alert-msg" role="alert"><strong>Successful! </strong>Data has been restored.</div>
@elseif(session('success-update'))
    <div class="success-alert-msg" role="alert"><strong>Successful! </strong>Record has been updated</div>
@elseif(session('nu-error'))
    <div class="warning-alert-msg" role="alert"><strong>Warning! </strong>Nothing to update</div>
@elseif(session('success-pdelete'))
    <div class="error-alert-msg" role="alert">One record has been permanently deleted.</div>
@elseif(session('success-delete'))
    <div class="error-alert-msg" role="alert">One record has been cast to trash.</div>
@endif
@php
    $errors2 = '';
    if($errors->has('role') || 
        $errors->has('password') || 
        $errors->has('cpassword')) $errors2 = true;
    else $errors1 = false;
@endphp
@if($errors2)
    <script>
        $('#bs-modal').modal('show');
    </script>
@endif
<script src="{{asset('asset')}}/dist/js/custom.js"></script>
</body>
</html>
