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
                        <li class="breadcrumb-item"><a href="{{route('calendarioatual')}}">Calendário Atual</a></li>
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
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                        @foreach($subjects as $subject)
                                        <tr>
                                                       @if(old('subjects') == $subject->subjects)
                                                            <td>{{ $subject->name}}</td>
                                                            <td>
                                                                @foreach($subject->associated_professor as $professor)
                                                                    {{$professor->name}}
                                                                @endforeach
                                                            </td>
                                                            <td>{{$subject->courses->name}}</td>
                                                            <td>{{$subject->courses->course_year}}</td>
                                                            <td align="center"><i onClick="on_save(this.id)" class="fas fa-save"></i></td>
                                                            <td align="center"><i class="fas fa-trash"></i></td>
                                                            <td align="center"><i class="fas fa-edit"></i></td>
                                                            @else
                                                            <td>{{ $subject->name}}</td>
                                                            <td>
                                                                @foreach($subject->associated_professor as $professor)
                                                                    {{$professor->name}}
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $subject->courses->name}}</td>
                                                            <td>{{ $subject->courses->course_year}}</td>
                                                            <td align="center"><i onClick="on_save(this.id)" class="fas fa-save"></i></td>
                                                            <td align="center"><i class="fas fa-trash"></i></td>
                                                            <td align="center"><i class="fas fa-edit"></i></td>
                                                            
                                                    @endif
                                                    <tr>
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
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($professors as $professor)
                                        <tr>
                                                       @if(old('professors') == $professor->professors)
                                                            <td>{{ $professor->name}}</td>
                                                            <td>{{$professor->email}}</td>
                                                            <td>{{$professor->availability}}</td>
                                                            <td align="center"><i onClick="on_save(this.id)" class="fas fa-save"></i></td>
                                                            <td align="center"><i class="fas fa-trash"></i></td>
                                                            <td align="center"><i class="fas fa-edit"></i></td>
                                                            @else
                                                            <td>{{ $professor->name}}</td>
                                                            <td>{{$professor->email}}</td>
                                                            <td>{{$professor->availability}}</td>
                                                            <td align="center"><i onClick="on_save(this.id)" class="fas fa-save"></i></td>
                                                            <td align="center"><i class="fas fa-trash"></i></td>
                                                            <td align="center"><i class="fas fa-edit"></i></td>
                                                            
                                                    @endif
                                                    <tr>
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
                                        <th>Lotação máxima</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classrooms as $classroom)
                                        <tr>
                                                       @if(old('classrooms') == $classroom->classrooms)
                                                            <td>{{ $classroom->classroom}}</td>
                                                            <td>{{ $classroom->type}}</td>
                                                            <td>{{ $classroom->capacity}}</td>
                                                            <td align="center"><i onClick="on_save(this.id)" class="fas fa-save"></i></td>
                                                            <td align="center"><i class="fas fa-trash"></i></td>
                                                            <td align="center"><i class="fas fa-edit"></i></td>
                                                            @else
                                                            <td>{{ $classroom->classroom}}</td>
                                                            <td>{{ $classroom->type}}</td>
                                                            <td>{{ $classroom->capacity}}</td>
                                                            <td align="center"><i onClick="on_save(this.id)" class="fas fa-save"></i></td>
                                                            <td align="center"><i class="fas fa-trash"></i></td>
                                                            <td align="center"><i class="fas fa-edit"></i></td>
                                                            
                                                    @endif
                                                    <tr>
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
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Normal</td>
                                        <td>
                                            <div id="season_dates" onClick="edited(this.id)" class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation" />
                                            </div>
                                        </td>
                                        <td align="center"><i id="season_save" onClick="on_save(this.id)" class="fas fa-save"></i></td>
                                        <td align="center"><i class="fas fa-trash"></i></td>
                                        <td align="center"><i class="fas fa-edit"></i></td>
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
                                                <input type="text" class="form-control float-right" id="reservation2" />
                                            </div>
                                        </td>
                                        <td align="center"><i class="fas fa-save"></i></td>
                                        <td align="center"><i class="fas fa-trash"></i></td>
                                        <td align="center"><i class="fas fa-edit"></i></td>
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
                                                <input type="text" class="form-control float-right" id="reservation3" />
                                            </div>
                                        </td>
                                        <td align="center"><i class="fas fa-save"></i></td>
                                        <td align="center"><i class="fas fa-trash"></i></td>
                                        <td align="center"><i class="fas fa-edit"></i></td>
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
</script>

@stop
