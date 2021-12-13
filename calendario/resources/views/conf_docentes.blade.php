@extends('layout.menu')
@section('configurar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Configuração Docentes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/calendarios/">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Configuração Docentes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-11">

                        <div class="btn-group btn-group-toggle col-sm-12" style="margin-bottom: 15px;" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" name="options" id="option1" autocomplete="off" onclick="window.location='/disciplinas';"> Disciplinas
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option2" autocomplete="off" onclick="window.location='/docentes';" checked> Docentes
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option3" autocomplete="off" onclick="window.location='/salas';"> Salas
                            </label>
                        </div>
                                                        
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">                              

                                <table id="table-teachers" class="table table-bordered col-sm-12">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="col-md-4" style="cursor: pointer;">Nome</th>
                                            <th class="col-md-3" style="cursor: pointer;">E-mail</th>
                                            <th class="col-md-3" style="cursor: pointer;">Disponibilidade</th>
                                            <th class="col-sm-1">&nbsp</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="col-sm-4 text-center" style="opacity:0.6;">Fábio Marques</td>
                                            <td class="col-sm-3 text-center" style="opacity:0.6;">fabio@ua.pt</td>
                                            <td class="col-md-4"><select style="border:0; width:100%;" disabled/><option class="text-center">Segundas, Terças</option></td>
                                            <td class="col-sm-1 text-center"><i class="fas fa-user-edit" style="cursor:pointer;"></i></td>
                                        </tr>

                                        <tr>
                                        <td class="col-sm-4 text-center" style="opacity:0.6;">Rita Santos</td>
                                            <td class="col-sm-3 text-center" style="opacity:0.6;">rita@ua.pt</td>
                                            <td class="col-md-4"><select style="border:0; width:100%;" disabled/><option class="text-center">Segundas, Sextas</option></td>
                                            <td class="col-sm-1 text-center"><i class="fas fa-user-edit" style="cursor:pointer;"></i></td>
                                        </tr>

                                        <tr>
                                        <td class="col-sm-4 text-center" style="opacity:0.6;">Hélder</td>
                                            <td class="col-sm-3 text-center" style="opacity:0.6;">helder@ua.pt</td>
                                            <td class="col-md-4"><select style="border:0; width:100%;" disabled/><option class="text-center">Quintas</option></td>
                                            <td class="col-sm-1 text-center"><i class="fas fa-user-edit" style="cursor:pointer;"></i></td>
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
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    
    <!-- <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0-rc
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer> -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            // $("#table-teachers").DataTable({
            //     "buttons": ["csv", "excel", "pdf", "print"],
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": true,
            //     "ordering": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // }).buttons().container().appendTo('#table-teachers_wrapper .row:first-of-type .col-sm-12:first-of-type');   

            $("#table-teachers").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false,
                "responsive": true,
            });

            $("#table-teachers_info").hide();        
        });
    </script>
@stop