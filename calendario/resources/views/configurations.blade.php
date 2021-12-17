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
                            <a class="btn btn-info tablinks" onclick="datatable(event, 'epocas')"> Épocas </a>
                        </div>
                        <div class="card" id="UC">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table  id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Docente</th>
                                        <th>Curso</th>
                                        <th>Ano do Curso</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><div contenteditable>Web Design</div></td>
                                        <td><div contenteditable>Rita Santos</div></td>
                                        <td><div contenteditable>Tecnologias da Informação</div></td>
                                        <td><div contenteditable>3º ano</div></td>
                                   	 <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>Web Design</div></td>
                                        <td><div contenteditable>Rita Santos</div></td>
                                        <td><div contenteditable>Tecnologias da Informação</div></td>
                                        <td><div contenteditable>3º ano</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>Web Design</div></td>
                                        <td><div contenteditable>Rita Santos</div></td>
                                        <td><div contenteditable>Tecnologias da Informação</div></td>
                                        <td><div contenteditable>3º ano</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>Web Design</div></td>
                                        <td><div contenteditable>Rita Santos</div></td>
                                        <td><div contenteditable>Tecnologias da Informação</div></td>
                                        <td><div contenteditable>3º ano</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>Segurança Informática</div></td>
                                        <td><div contenteditable>Hélder Gomes</div></td>
                                        <td><div contenteditable>Tecnologias da Informação</div></td>
                                        <td><div contenteditable>3º ano</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>Economia I</div></td>
                                        <td><div contenteditable>Miguel Magueta</div></td>
                                        <td><div contenteditable>Gestão Pública</div></td>
                                        <td><div contenteditable>1º ano</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>

                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card" id="docentes" style="display: none">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped" >
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Disponibilidade</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><div contenteditable>Rita Santos</div></td>
                                        <td><div contenteditable>rita.santos@ua.pt</div></td>
                                        <td><div contenteditable></div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>Hélder Gomes</div></td>
                                        <td><div contenteditable>helder.gomes@ua.pt</div></td>
                                        <td><div contenteditable></div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>Miguel Magueta</div></td>
                                        <td><div contenteditable>dmagueta@ua.pt</div></td>
                                        <td><div contenteditable></div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>


                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card" id="salas" style="display: none">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped " >
                                    <thead>
                                    <tr>
                                        <th>Sala</th>
                                        <th>Tipo</th>
                                        <th>Lotação máxima</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><div contenteditable>5.1.15</div></td>
                                        <td><div contenteditable>Informáticas</div></td>
                                        <td><div contenteditable>25</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>5.1.09</div></td>
                                        <td><div contenteditable>Aulas</div></td>
                                        <td><div contenteditable>20</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td><div contenteditable>5.1.12</div></td>
                                        <td><div contenteditable>Laboratório de Redes</div></td>
                                        <td><div contenteditable>35</div></td>
                                        <td><i class="fas fa-check"></i></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card" id="epocas" style="display: none">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example4" class="table table-bordered table-striped " >
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data Range</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Normal</td>
                                        <td>
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                              </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="reservation">
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Recurso</td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                  </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Especial</td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                  </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation3">
                                            </div>
                                        </td>
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
