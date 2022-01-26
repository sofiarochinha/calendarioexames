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
                    console.log(e);
                    console.log(text);
                    const data = csvToArray(text);
                    console.log(data);

               //     addTable(data);


                }

                reader.readAsText(input);
            });

            function csvToArray(str, delimiter = ";") {
                // slice from \n index + 1 to the end of the text
                // use split to create an array of each csv value row
                const rows = str.slice(str.indexOf("\n")).split("\n");

                // Map the rows
                // split values from each row into an array
                // use headers.reduce to create an object
                // object properties derived from headers:values
                // the object passed as an element of the array
                const arr = rows.map(function (row) {
                    const values = row.split(delimiter);
                    return values;
                });

                // return the array
                return arr;
            }

            function addTable(arr){

                var myTableDiv = document.getElementById("table");

                var table = document.createElement('TABLE');
                table.border = '1';

                var tableBody = document.createElement('TBODY');
                table.appendChild(tableBody);

                for (var i = 0; i < ; i++) {
                    var tr = document.createElement('TR');
                    tableBody.appendChild(tr);

                    for (var j = 0; j < 4; j++) {
                        var td = document.createElement('TD');
                        td.width = '75';
                        td.appendChild(document.createTextNode("Cell " + i + "," + j));
                        tr.appendChild(td);
                    }
                }
                myTableDiv.appendChild(table);

            }

        </script>
@stop
