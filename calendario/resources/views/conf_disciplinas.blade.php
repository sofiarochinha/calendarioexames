@extends('layout.menu')
@section('conf_disciplinas')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Disciplinas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/calendarios">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Configurações</a></li>
                            <li class="breadcrumb-item active">Disciplinas</li>
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
                                                <th class="col-md-3">Disciplina</th>
                                                <th class="col-md-4">Docente</th>
                                                <th class="col-md-4">Curso</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="col-md-3"><input type="text" class="text-center" style="border:0; opacity:0.7; width: 100%;" value="Matemática" disabled/></td>
                                                <td class="col-md-4"><select style="border:0; width:100%;" disabled/><option class="text-center">Rita Santos</option></td>
                                                <td class="col-md-4"><input type="select" class="text-center" style="border:0; opacity:0.7; width: 100%;" value="Engenharia" disabled/></td>
                                                <td class="col-md-1 text-center"><i class="fas fa-user-edit" style="cursor:pointer;"></i></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-4"></td>
                                                <td class="col-md-1"></td>
                                            </tr>

                                            <tr>
                                                <td class="col-md-3">&nbsp</td>
                                                <td class="col-md-4"></td>
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

@stop