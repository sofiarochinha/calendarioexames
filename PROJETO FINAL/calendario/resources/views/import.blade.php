@extends('layout.menu')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Importar CSV</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('marcarexames')}}">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Importar CSV</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="card card-secondary col-sm-6 ">
                        <div class="card-body">
                            <form method="POST" id="myForm">
                                @csrf
                                <div class="form-group" name="file">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" onchange="" id="customFile" accept=".csv">
                                        <label class="custom-file-label" for="customFile">Escolha um ficheiro</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--Tabela em que se tem uma preview de todos os dados do ficheiro csv--}}
            <section class="content" style="display:none" id="tabela">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary" onclick="sendToController()">Importar</button>
                                    <table id="example5" class="table table-bordered table-striped">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </section>
    </div>

    <!-- jQuery -->
    <script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
    <!-- Toastr -->
    <script src="{{(asset('/plugins/toastr/toastr.min.js'))}}"></script>
    <script>



        /**
         * verificação de dados na base de dados
         * importado o csv - existe dado
         */
        function checkIfImported(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('checkifimported')}}",
                function (response){
                    if(response == 1) setCookie("CSV", true);
                    else setCookie("CSV", "");

                    checkCSV();
                })
        }

        checkIfImported();

        document.cookie = "username=John Doe";

        /**
         * It's a function that sets a cookie.
         * @param cname
         * @param cvalue
         */
        function setCookie(cname, cvalue) {
            document.cookie = cname + "=" + cvalue;
        }


        /**
         * It's a function that returns the value of a cookie.
         * @param cname
         * @returns {string}
         */
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) === 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkCSV() {
            if (getCookie("CSV") === "")
                toastr.warning('Atenção! Não foi importado um ficheiro CSV para ler dados.')

            if (getCookie("CSV") === "true")
                toastr.success("Ficheiro CSV importado!")

        }

        //* End of cookie shenannigans


        const myForm = document.getElementById("myForm");
        const csvFile = document.getElementById("customFile");
        var data = ""; //guarda os dados do csv

        /**
         * Quando existe uma alteração do ficheiro introduzido no form será mostrados os dados
         */
        myForm.addEventListener("change", function (e) {
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

        /**
         * Envia os dados do csv para o controller em formato JSON
         */
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
                        window.location.href = "{{ route('criarcalendario')}}";
                    }
                })
        }

    </script>
@stop
