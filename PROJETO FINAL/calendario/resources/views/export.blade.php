@extends('layout.menu')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exportar calendários</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('marcarexames')}}">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Exportar</li>
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
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div id="checkboxes">
                                        <label><h3>Escolha quais cursos pretende exportar</h3></label>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Nome Curso</th>
                                                <th>Código</th>
                                                <th>Ano</th>
                                                <th>Época</th>
                                                <th>Exportar?</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($calendars as $calendar)
                                            <tr id="export_checkbox_00666">
                                                <td>
                                                    <div contenteditable>{{$calendar->course->name}}</div>
                                                </td>
                                                <td>
                                                    <div contenteditable>{{$calendar->course->course_code}}</div>
                                                </td>
                                                <td>
                                                    <div contenteditable>{{$calendar->course->course_year}}</div>
                                                </td>
                                                <td>
                                                    <div contenteditable>{{$calendar->epoca->name}}</div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                               id="TIcheckbox_1_n" value="option1">
                                                        <label for="TIcheckbox_1_n" class="custom-control-label">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-primary">
                            Exportar PDF &nbsp;
                            <i class="fas fa-file-pdf"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>
    </div><!-- /.container-fluid -->
    </section>
    </div>
    <!-- /.content-wrapper -->


@stop
