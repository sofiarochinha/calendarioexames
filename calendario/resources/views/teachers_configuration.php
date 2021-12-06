<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UACalendário | Configurar docentes</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <!-- <a href="index3.html" class="brand-link">
             <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
             <span class="brand-text font-weight-light">AdminLTE 3</span>
             </a> -->

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                    <li class="nav-item menu-open">
                        <a href="/calendarios" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Calendários
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/calendarios/ano-letivo" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ano letivo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/calendarios/curso" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Curso</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item menu-is-opening menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Configurações
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/configuracoes/disciplinas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Disciplinas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/configuracoes/salas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Salas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/configuracoes/docentes" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Docentes</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/exportar" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Exportar
                            </p>
                        </a>
                    </li>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Docentes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Configurações</li>
                            <li class="breadcrumb-item active">Docentes</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <!-- /.col -->
                        <div class="col-md-11">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <table class="table-bordered col-md-12">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="col-md-4">Nome</th>
                                                <th class="col-md-3">E-mail</th>
                                                <th class="col-md-4">Disponibilidade</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="text-center" style="border:0; opacity:0.7; width: 100%;" value="Rita Santos" disabled/></td>
                                                <td class="col-md-3"><input type="text" class="text-center" style="border:0; opacity:0.7; width: 100%;" value="rita.santos@ua.pt" disabled/></td>
                                                <td class="col-md-4"><input type="select" class="text-center" style="border:0; opacity:0.7; width: 100%;" value="Segundas, Terças" disabled/></td>
                                                <td class="col-md-1 text-center"><i class="fas fa-user-edit" style="cursor:pointer;"></i></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-4">&nbsp</td>
                                                <td class="col-md-3"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>
                                        </tbody>       
                                    </table>                             
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0-rc
        </div>
    </footer>
</body>





<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>

</body>
</html>
