@extends('layout.menu')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Importar csv</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/calendarios">Home</a></li>
                            <li class="breadcrumb-item active">Importar csv</li>
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
                        <div class="col-md-7">
                            <div class="card card-primary" style="height:140px; padding: 30px;">
                                <div class="card-body p-0">
                                    <table>
                                        <tr>
                                            <td class="col-md-8">
                                                <input type="text" style="width:100%" disable/>
                                            </td>
                                            <td class="col-md-1">
                                                <i class="fas fa-folder-open" style="cursor:pointer;"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-12 text-center">
                                                <div class="importButton" style="border-radius: 5px; background-color:lightgreen; width:120px; height: 28px; text-align:center; margin:auto; position: relative; top: 25px; left: 20px;">Importar</div>
                                            </td>
                                        </tr>
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

@stop
