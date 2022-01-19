@extends('layout.menu')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Criar Calendário</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('curso')}}"></a></li>
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
                                        <select class="select2" name="course" multiple="multiple"
                                                data-placeholder="Selecione um curso" style="width: 100%;">
                                            @foreach ($courses as $course)
                                                @if(old('courses') == $course->name)
                                                    <option value="{{ $course->course_id }}" selected>{{ $course->name }}</option>
                                                @else
                                                    <option value="{{ $course->course_id }}">{{ $course->name }}</option>
                                                @endif
                                            @endforeach
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
                                        <select class="select2" name="course" multiple="multiple"
                                                data-placeholder="Selecione uma época" style="width: 100%;">
                                            @foreach ($academicYears as $academic)
                                                @if(old('courses') == $academic->evaluation_seasons_name)
                                                    <option value="{{ $academic->id }}" selected>{{ $academic->evaluation_seasons_name }}</option>
                                                @else
                                                    <option value="{{ $academic->id }}">{{ $academic->evaluation_seasons_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('curso')}}"><input type="submit" value="Criar Calendário"
                                                        class="btn btn-primary float-right"></a>
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>






@stop
