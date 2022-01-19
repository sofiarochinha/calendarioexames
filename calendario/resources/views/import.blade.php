@extends('layout.menu')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Importar CSV</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('curso')}}">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Importar CSV</li>
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
                    <!-- general form elements disabled -->
                    <div class="card card-secondary col-sm-6 ">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/importar-csv" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="custom-file">
                                        @csrf
                                        <input type="file" class="custom-file-input" name="file" id="customFile">
                                        <label class="custom-file-label" for="customFile">Escolha um ficheiro</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" >Importar</button> {{--submit data to database--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@stop
