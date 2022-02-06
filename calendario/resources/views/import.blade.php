@extends('layout.menu')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                                <button type="submit" value="submit" class="btn btn-primary">Visualizar os Dados</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content" style="display:none" id="tabela">
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
                <button class="btn btn-primary" onclick="sendToController()">Importar</button>
            </section>

        </section>
    </div>

    <!-- jQuery -->
    <script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
    <!-- Toastr -->
    <script src="{{(asset('/plugins/toastr/toastr.min.js'))}}"></script>
    <script>


        // * cookie shennanigans
        document.cookie = "username=John Doe";

        function setCookie(cname, cvalue) {
            document.cookie = cname + "=" + cvalue;
        }

        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
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

        function checkCSV() {
            if (getCookie("CSV") == "") {
                console.log("CSV cookie not found")
                toastr.warning('Atenção! Não foi importado um ficheiro CSV para ler dados.')
            }
            if (getCookie("CSV") == "true") {
                toastr.success("Ficheiro CSV importado!")
                console.log("Cookie shows CSV is already loaded")
            }
        }

        checkCSV()
        //* End of cookie shenannigans


        const myForm = document.getElementById("myForm");
        const csvFile = document.getElementById("customFile");
        var data = ""; //guarda os dados do csv

        myForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const input = csvFile.files[0]; //leitura do primeiro ficheiro inserido

            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                data = csvToArray(text);
            }
            reader.readAsText(input);
        });

        /**
         * Converte um csv num array e depois cria uma tabela
         * @param str
         * @param delimiter
         */
        function csvToArray(str, delimiter = ";") {
            const rows = str.split("\n");
            rows.pop(); //remove o ultimo elemento que é null

            //separa cada array por ';'
            const array = rows.map(function (row) {
                return row.split(delimiter);
            });

            //torna a tabela visível
            table = document.getElementById("tabela");
            table.style.display = "block";

            var table = $('#example5').DataTable({
                columns: [
                    {title: 'Disciplina'},
                    {title: 'Abreviatura'},
                    {title: 'Código disciplina'},
                    {title: 'Horario'},
                    {title: 'Turma'},
                    {title: 'Tipo'},
                    {title: 'Código de curso e ano'},
                    {title: 'Nome docente'},
                    {title: 'E-mail'},
                    {title: 'MEC docente'},
                    {title: 'Sala'},
                    {title: 'Dia da semana'},
                    {title: 'Hora de início'},
                    {title: 'Hora de fim'},
                    {title: 'Datas'}
                ],
                data: array, //dados da tabela
                "responsive": true, "lengthChange": false, "autoWidth": false,

            });

            return array;

        }

       function sendToController() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('import')}}",
                {
                    data: JSON.stringify(data)

                },

                function (data, status){
                    if(status === "success"){
                        setCookie("CSV", true);
                        checkCSV();
                    }


                })
        }


    </script>
@stop
