@extends('layout.menu')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Criar Calendário 2021-2022 1ºsemestre</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/calendario-atual">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Criar Calendário</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Curso</label>
                                        <select class="select2" multiple="multiple"
                                                data-placeholder="Selecione um curso" style="width: 100%;">
                                            <option>Tecnologias de informação</option>
                                            <option>Eletrónica e Mecânica Industrial</option>
                                            <option>Engenharia Eletrotécnica</option>
                                            <option>Gestão Comercial</option>
                                            <option>Gestão da Qualidade</option>
                                            <option>Secretariado e Comunicação Empresarial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Ano do curso</label>
                                        <select class="select2" multiple="multiple"
                                                data-placeholder="Selecione um curso" style="width: 100%;">
                                            <option>1º ano</option>
                                            <option>2º ano</option>
                                            <option>3º ano</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Época</label>
                                        <select class="select2" multiple="multiple"
                                                data-placeholder="Selecione uma época" style="width: 100%;">
                                            <option>Normal</option>
                                            <option>Recurso</option>
                                            <option>1º subperíodo</option>
                                            <option>Especial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <!-- Date range -->
                                <div class="card-body">
                                    <label>Date range:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                          </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="reservation">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>






@stop
