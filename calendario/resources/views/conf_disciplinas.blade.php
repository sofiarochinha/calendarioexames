@extends('layout.menu')
@section('configurar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Configuração Disciplinas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/calendarios/">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Configuração Disciplinas</li>
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
                                <input type="radio" name="options" id="option1" autocomplete="off" onclick="window.location='/disciplinas';" checked> Disciplinas
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option2" autocomplete="off" onclick="window.location='/docentes';"> Docentes
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="options" id="option3" autocomplete="off" onclick="window.location='/salas';"> Salas
                            </label>
                        </div>
                                                        
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">                              

                                <table id="table-classes" class="table table-bordered col-sm-12">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="col-sm-3" style="cursor: pointer;">Disciplina</th>
                                            <th class="col-sm-4" style="cursor: pointer;">Docente</th>
                                            <th class="col-sm-3" style="cursor: pointer;">Curso</th>
                                            <th class="col-sm-1">&nbsp</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="col-sm-3 text-center" style="opacity:0.6;">Aplicações</td>
                                            <td class="col-sm-4"><select style="border:0; width:100%;" disabled/><option class="text-center">Fábio Marques</option></td>
                                            <td class="col-sm-4 text-center" style="opacity:0.6;">Engenharia</td>
                                            <td class="col-sm-1 text-center"><i class="fas fa-user-edit" style="cursor:pointer;"></i></td>
                                        </tr>

                                        <tr>
                                            <td class="col-sm-3 text-center" style="opacity:0.6;">Web Design</td>
                                            <td class="col-sm-4"><select style="border:0; width:100%;" disabled/><option class="text-center">Rita Santos</option></td>
                                            <td class="col-sm-4 text-center" style="opacity:0.6;">Tecnologias de Informação</td>
                                            <td class="col-sm-1 text-center"><i class="fas fa-user-edit" style="cursor:pointer;"></i></td>
                                        </tr>

                                        <tr>
                                            <td class="col-sm-3 text-center" style="opacity:0.6;">Segurança Informática</td>
                                            <td class="col-sm-4"><select style="border:0; width:100%;" disabled/><option class="text-center">Hélder</option></td>
                                            <td class="col-sm-4 text-center" style="opacity:0.6;">Tecnologias de Informação</td>
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
            // $("#table-classes").DataTable({
            //     "buttons": ["csv", "excel", "pdf", "print"],
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": true,
            //     "ordering": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // }).buttons().container().appendTo('#table-classes_wrapper .row:first-of-type .col-sm-12:first-of-type');   

            $("#table-classes").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false,
                "responsive": true,
            });

            $("#table-classes_info").hide();        
        });
    </script>
@stop
