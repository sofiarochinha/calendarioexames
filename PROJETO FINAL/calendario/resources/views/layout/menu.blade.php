<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ua Calendar</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{(asset('/plugins/fontawesome-free/css/all.min.css'))}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{(asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'))}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{(asset('/plugins/jqvmap/jqvmap.min.css'))}}">
    <!-- overlayScrollbars for sidebar -->
    <link rel="stylesheet" href="{{(asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'))}}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{(asset('/plugins/fullcalendar/main.css'))}}">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/sb-1.3.2/sp-2.0.0/sl-1.3.4/datatables.min.css"/>

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{(asset('/plugins/daterangepicker/daterangepicker.css'))}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{(asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css'))}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href=" {{(asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'))}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{(asset('/plugins/select2/css/select2.min.css'))}}">
    <link rel="stylesheet" href="{{(asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'))}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{(asset('/plugins/dropzone/min/dropzone.min.css'))}}">
    <!-- Theme style - contain css for multiple select-->
    <link rel="stylesheet" href="{{(asset('/dist/css/adminlte.min.css'))}}">
    <!-- Toast Messages -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{(asset('/dist/img/AdminLTELogo.png'))}}" alt="AdminLTELogo" height="60"
         width="60">
</div>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('marcarexames')}}" class="brand-link">
        <img src="{{(asset('/dist/img/AdminLTELogo.png'))}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ua Calendar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{(asset('/dist/img/user2-160x160.gif'))}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Username</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('criarcalendario')}}" class="nav-link active">
                        <i class="nav-icon fas fa-calendar-plus "></i>
                        <p>
                            Criar Calendário
                        </p>
                    </a>
                </li>

                <li class="nav-header"></li>

                <li class="nav-item menu-open">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendário Atual
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{route('marcarexames')}}"
                               @if (\Illuminate\Support\Facades\Route::current()->getName() == "marcarexames")
                               class="active nav-link" @else class="nav-link" @endif >

                                <i class="far fa-circle nav-icon"></i>
                                <p>Marcar Exames</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configurations')}}"
                               @if (\Illuminate\Support\Facades\Route::current()->getName() == "configurations")
                               class="active nav-link" @else class="nav-link" @endif >
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dados Auxiliares</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header"></li>
                <li class="nav-header"></li>


                <li class="nav-item">
                    <a href="{{route('import')}}"
                       @if (\Illuminate\Support\Facades\Route::current()->getName() == "import")
                       class="active nav-link"
                       @else class="nav-link" @endif >
                        <i class="nav-icon fas fa-file-csv"></i>
                        <p>
                            Importar CSV
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('export')}}"
                       @if (\Illuminate\Support\Facades\Route::current()->getName() == "export")
                       class="active nav-link"
                       @else class="nav-link" @endif >
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>
                            Exportar
                        </p>
                    </a>
                </li>

                <li class="nav-header"></li>


                <li class="nav-item">
                    <a href="{{route('calendarioanterior')}}"
                       @if (\Illuminate\Support\Facades\Route::current()->getName() == "calendarioanterior")
                       class="active nav-link"
                       @else class="nav-link" @endif >
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Calendários Anteriores
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('signout') }}" class="nav-link fixed-bottom">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Sair
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@section('content')
@show

<!-- jQuery -->
<script src="{{(asset('/plugins/jquery/jquery-3.6.0.min.js'))}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{(asset('/plugins/jquery-ui/jquery-ui.min.js'))}}"></script>
<!-- Bootstrap 4 -->
<script src="{{(asset('/plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
<!-- Sparkline -->
<script src="{{(asset('/plugins/sparklines/sparkline.js'))}}"></script>
<!-- JQVMap -->
<script src="{{(asset('/plugins/jqvmap/jquery.vmap.min.js'))}}"></script>
<script src="{{(asset('/plugins/jqvmap/maps/jquery.vmap.usa.js'))}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{(asset('/plugins/jquery-knob/jquery.knob.min.js'))}}"></script>
<!-- daterangepicker -->
<script src="{{(asset('/plugins/moment/moment.min.js'))}}"></script>
<script src="{{(asset('/plugins/daterangepicker/daterangepicker.js'))}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{(asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'))}}"></script>
<!-- overlayScrollbars -->
<script src="{{(asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'))}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{(asset('/dist/js/demo.js'))}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{(asset('/dist/js/pages/dashboard.js'))}}"></script>
<!-- Select2 -->
<script src="{{(asset('/plugins/select2/js/select2.full.min.js'))}}"></script>
<!-- AdminLTE App -->
<script src="{{(asset('/dist/js/adminlte.min.js'))}}"></script>
<!-- Filterizr-->
<script src="{{(asset('/plugins/filterizr/jquery.filterizr.min.js'))}}"></script>
<!-- AdminLTE for demo purposes -->

<!-- DataTables  & Plugins -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/sb-1.3.2/sp-2.0.0/sl-1.3.4/datatables.min.js"></script>

<!-- Toastr -->
<script src="{{(asset('/plugins/toastr/toastr.min.js'))}}"></script>
<!-- PAGE PLUGINS -->
<!-- fullCalendar 2.2.5 -->
<script src="{{(asset('/plugins/moment/moment.min.js'))}}"></script>
<!-- bs-custom-file-input -->
<script src="{{(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js'))}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Page configurations specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": [ "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function () {
        $("#example2").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<!--function for date range in create calendar page-->
<script>

    $(function () {

        $('#reservation').daterangepicker();
        $('#reservation2').daterangepicker();
        $('#reservation3').daterangepicker();
        //$('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    })

    $(function () {
        bsCustomFileInput.init();
    });


 function deleteCookie (cname) {
     document.cookie = cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
 }

</script>

</body>
</html>
