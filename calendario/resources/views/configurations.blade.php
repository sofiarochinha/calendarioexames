@extends('layout.menu')
@section('configuration')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Configurações</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/calendarios/">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Configurações</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group w-100 mb-2">
                            <a class="btn btn-info tablinks active" onclick="datatable(event, 'UC')"> Unidades Curriculares </a>
                            <a class="btn btn-info tablinks" onclick="datatable(event, 'docentes')"> Docentes </a>
                            <a class="btn btn-info tablinks" onclick="datatable(event, 'salas')"> Salas </a>
                        </div>
                        <div class="card" id="UC">
                            <div class="card-header">
                                <h3 class="card-title">Configurações de Unidades Curriculares</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table  id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Docente</th>
                                        <th>Curso</th>
                                        <th>Ano do Curso</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Web Design</td>
                                        <td>Rita Santos</td>
                                        <td>Tecnologias da Informação</td>
                                        <td>3º ano</td>
                                    </tr>
                                    <tr>
                                        <td>Web Design</td>
                                        <td>Rita Santos</td>
                                        <td>Tecnologias da Informação</td>
                                        <td>3º ano</td>
                                    </tr>
                                    <tr>
                                        <td>Web Design</td>
                                        <td>Rita Santos</td>
                                        <td>Tecnologias da Informação</td>
                                        <td>3º ano</td>
                                    </tr>
                                    <tr>
                                        <td>Web Design</td>
                                        <td>Rita Santos</td>
                                        <td>Tecnologias da Informação</td>
                                        <td>3º ano</td>
                                    </tr>
                                    <tr>
                                        <td>Segurança Informática</td>
                                        <td>Hélder Gomes</td>
                                        <td>Tecnologias da Informação</td>
                                        <td>3º ano</td>
                                    </tr>
                                    <tr>
                                        <td>Economia I</td>
                                        <td>Miguel Magueta</td>
                                        <td>Gestão Pública</td>
                                        <td>1º ano</td>
                                    </tr>

                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card" id="docentes" style="display: none">
                            <div class="card-header">
                                <h3 class="card-title">Configurações de Docentes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped" >
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Disponibilidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Rita Santos</td>
                                        <td>rita.santos@ua.pt</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Hélder Gomes</td>
                                        <td>helder.gomes@ua.pt</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Miguel Magueta</td>
                                        <td>dmagueta@ua.pt</td>
                                        <td></td>
                                    </tr>


                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card" id="salas" style="display: none">
                            <div class="card-header">
                                <h3 class="card-title">Configurações das Salas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped " >
                                    <thead>
                                    <tr>
                                        <th>Sala</th>
                                        <th>Tipo</th>
                                        <th>Lotação máxima</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>5.1.15/td>
                                        <td>Informáticas</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>5.1.09</td>
                                        <td>Aulas</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>5.1.12</td>
                                        <td>Laboratório de Redes</td>
                                        <td>35</td>
                                    </tr>
                                    </tfoot>
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

<script>
    function datatable(event, id){
        var table;

        // Get all elements with class="card" and hide them
        table = document.getElementsByClassName("card");
        for (i = 0; i < table.length; i++) {
            table[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(id).style.display = 'block';
        event.currentTarget.className += " active";
    }

</script>

@stop
