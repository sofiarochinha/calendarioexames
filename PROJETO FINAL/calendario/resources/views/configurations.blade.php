@extends('layout.menu') @section('configuration')
<style>
    .fa-save {
        color: #2a6cf5;
        cursor: pointer;
    }

    .fa-trash {
        color: #ff5c33;
        cursor: pointer;
    }
</style>
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
                        <li class="breadcrumb-item"><a href="{{route('marcarexames')}}">Calendário Atual</a></li>
                        <li class="breadcrumb-item active">Configurações</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="btn-group w-100 mb-2">
                        <a class="btn btn-info tablinks active" onclick="datatable(event, 'UC')"> Unidades Curriculares </a>
                        <hr />
                        <a style="margin-left: 10px;" class="btn btn-info tablinks" onclick="datatable(event, 'docentes')"> Docentes </a>
                        <a style="margin-left: 10px;" class="btn btn-info tablinks" onclick="datatable(event, 'salas')"> Salas </a>
                        <a style="margin-left: 10px;" class="btn btn-info tablinks" onclick="datatable(event, 'epocas')"> Épocas </a>
                    </div>
                    <div class="card" id="UC">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Docente</th>
                                        <th>Curso</th>
                                        <th>Ano do Curso</th>
                                        <th>Número de alunos inscritos</th>
                                        <th>Adicionar</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($subjects as $subject)
                                            <tr>
                                                <td >{{ $subject->name}}</td>
                                                <td >{{$subject->associated_professor->name}} </td>
                                                <td >{{ $subject->courses->name}}</td>
                                                <td >{{ $subject->courses->course_year}}</td>
                                                <td>0</td>
                                                <td align="center"><a onclick="addrow(this.id)" href="{{route('subject.adicionar', $subject->id)}}"><i class="fas fa-plus"></i></a></td>
                                                <td align="center"><a href="{{route('subject.edit', $subject->id)}}"><i class="fas fa-edit"></i></a></td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card" id="docentes" style="display: none;">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Disponibilidade</th>
                                        <th>Adicionar</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($professors as $professor)
                                        <tr>
                                            <td>{{ $professor->name}}</td>
                                            <td>{{$professor->email}}</td>
                                            <td>{{$professor->availability}}</td>
                                            <td align="center"><a onclick="addrow(this.id)" href="{{route('docente.adicionar', $professor->id)}}"><i class="fas fa-plus"></i></a></td>
                                            <td align="center"><a href="{{route('docente.edit', $professor->id)}}"><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card" id="salas" style="display: none;">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sala</th>
                                        <th>Tipo</th>
                                        <th>Lotação máxima em exame</th>
                                        <th>Adicionar</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classrooms as $classroom)
                                        <tr>
                                              <td>{{ $classroom->classroom}}</td>
                                              <td>{{ $classroom->type}}</td>
                                              <td>{{ $classroom->capacity}}</td>
                                            <td align="center"><a onclick="addrow(this.id)" href="{{route('sala.adicionar', $classroom->id)}}"><i class="fas fa-plus"></i></a></td>
                                            <td align="center"><a href="{{route('sala.edit', $classroom->id)}}"><i class="fas fa-edit"></i></a></td>

                                        </tr>
                                            @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card" id="epocas" style="display: none;">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data Range</th>
                                        <th>Adicionar</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($epocas as $epoca)
                                    <tr>
                                        <td>{{$epoca->name}}</td>
                                        <td>
                                            <input type="text" id = 'datepicker' name="daterange" value="{{$epoca->start_date}} - {{$epoca->end_date}} " />
                                        </td>
                                        <td align="center"><a onclick="addrow(this.id)" href="{{route('epoca.adicionar', $epoca->id)}}"><i class="fas fa-plus"></i></a></td>
                                        <td align="center"><a href="{{route('epoca.edit', $epoca->id)}}"><i class="fas fa-edit"></i></a></td>
                                        <td align="center"><a href="{{route('epoca.delete', $epoca->id)}}"><i class="fas fa-trash"></i></a></td>

                                    </tr>
                                    @endforeach
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

        {{--<form id="adicionarSubject">
            <label for="fname">Nome da Unidade Curricular</label><br>
            <input type="text" id="fname" name="nomeSubject"><br>

            <select class="custom-select form-control-border" id="courseInput">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>

            <select class="custom-select form-control-border" id="profSubject">

            </select>


        </form>--}}
    </section>
    <!-- /.content -->
</div>

<script>
    function datatable(event, id) {
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
        document.getElementById(id).style.display = "block";
        event.currentTarget.className += " active";
    }

    function edited(elementID) {
        let elemID = String(elementID);
        let DivId = elemID.split("_")[0];
        let save_ID = DivId + "_save";
        document.getElementById(save_ID).style.color = "#99ff66";
    }

    function on_save(elementID) {
        document.getElementById(elementID).style.color = "#2a6cf5";
    }

    function addrow(id){
       // let table = document.getElementById(id);
       // table.Rows.add();
    }

    /*function formulario(idCourse){

        var option = "";

        $('#courseInput').change(function(){
            {{--@foreach($professors as $prof)
                if({!! $prof->suject->courses->id !!} == idCourse){
                    option = "<option value='{{$prof->id}}'>{{$prof->name}}</option>"
                }
            @endforeach--}}
        });
    }*/

</script>


@stop
