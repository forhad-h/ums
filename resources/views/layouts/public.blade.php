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
  <style type="text/css">
      .content-wrapper, .main-footer {
		  margin: auto;
	  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">


  </header>

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
      <b>HTML Template</b> AdminLTE 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Forhad Hosain</a>.</strong> All rights
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
