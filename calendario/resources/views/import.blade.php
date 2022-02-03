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
                            <li class="breadcrumb-item"><a href="{{route('calendarioatual')}}">Calendário Atual</a></li>
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

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example5" class="table table-bordered table-striped">

                                    </table>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <form method="post" action="">

            </form>
        </section>
    </div>

<!-- jQuery -->
<script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
<!-- Toastr -->
<script src="{{(asset('/plugins/toastr/toastr.min.js'))}}"></script>
    <script>

        $(function () {
            $("#example5").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
            });
        });

     // * cookie shennanigans
     document.cookie = "username=John Doe";

     function setCookie(cname, cvalue) {
         document.cookie = cname + "=" + cvalue ;
     }
     function getCookie(cname) {
         let name = cname + "=";
         let decodedCookie = decodeURIComponent(document.cookie);
         let ca = decodedCookie.split(';');
         for(let i = 0; i <ca.length; i++) {
             let c = ca[i];
             while (c.charAt(0) == ' ') {
                 c = c.substring(1);
             }
             if (c.indexOf(name) == 0) {
                 return c.substring(name.length, c.length);
             }
         }
         return "";
     }

     function checkCSV(){
         if (getCookie("CSV") == "") {
             console.log("CSV cookie not found")
             toastr.warning('Atenção! Não foi importado um ficheiro CSV para ler dados.')
         }
         if (getCookie("CSV") == "true"){
             toastr.success("Ficheiro CSV importado!")
             console.log("Cookie shows CSV is already loaded")
         }
     }

     checkCSV()
     //* End of cookie shenannigans


            const myForm = document.getElementById("myForm");
            const csvFile = document.getElementById("customFile");

            myForm.addEventListener("submit", function (e) {
                e.preventDefault();
                const input = csvFile.files[0];

                const reader = new FileReader();
                reader.onload = function (e) {
                    const text = e.target.result;
                    const data = csvToArray(text);
                }
                reader.readAsText(input);
            });

     /**
      * Converte um csv num array
      * @param str
      * @param delimiter
      * @returns array
      */
     function csvToArray(str, delimiter = ";") {
         const rows = str.slice(str.indexOf("\n")).split("\n");

         const arr = rows.map(function (row) {
              return row.split(delimiter);
         });

         var table = document.getElementById('example5');

         var tableBody = document.createElement('TBODY');
         table.appendChild(tableBody);

         for (var i = 0; i < arr.length; i++) {
             var tr = document.createElement('TR');
             tableBody.appendChild(tr);

             for (var j = 0; j < 15; j++) {
                  var td = document.createElement('TD');
                  td.appendChild(document.createTextNode(arr[i][j]));
                  tr.appendChild(td);
             }
         }

         return arr;
     }
    </script>
@stop
