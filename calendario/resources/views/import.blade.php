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
                            <form action="{{route('import')}}" method="POST" id="myForm">
                                @csrf
                                <div class="form-group" name="file">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" accept=".csv">
                                        <label class="custom-file-label" for="customFile">Escolha um ficheiro</label>
                                    </div>
                                </div>
                                <button type="submit" value="submit" class="btn btn-primary">Importar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table id="table">

            </table>
        </section>

        <script>
            const myForm = document.getElementById("myForm");
            const csvFile = document.getElementById("customFile");

            myForm.addEventListener("submit", function (e) {
                e.preventDefault();
                const input = csvFile.files[0];
                console.log(input);
                console.log("Form submitted");

                const reader = new FileReader();
                reader.onload = function (e) {
                    const text = e.target.result;
                    console.log(text);
                    const data = csvToArray(text);
                    console.log(data);


                }

                reader.readAsText(input);
            });

            function csvToArray(str, delimiter = ";") {
                const rows = str.slice(str.indexOf("\n")).split("\n");

                const arr = rows.map(function (row) {
                    const values = row.split(delimiter);
                    return values;
                });

                // return the array
                return arr;
            }

        </script>
@stop
