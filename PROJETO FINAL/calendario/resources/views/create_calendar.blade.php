@extends('layout.menu')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                            <li class="breadcrumb-item"><a href="{{route('marcarexames')}}">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Criar Calendário</li>
                        </ol>
                    </div>
                </div>
            </div>
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
                                                data-placeholder="Selecione um curso..." style="width: 100%;"
                                                id="course">
                                            @foreach($courses as $course)
                                                <option value="{{ $course->course_code }}">{{ $course->name }}</option>
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
                                        <select class="select2" multiple="multiple" id="anoCourse"
                                                data-placeholder="Selecione um curso" style="width: 100%;">

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
                                                data-placeholder="Selecione um curso..." style="width: 100%;"
                                                id="epoca">
                                            @foreach($evaluation_season as $season)
                                                <option value="{{ $season->id }}">{{ $season->name }}</option>
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
                    <a onclick="showFrom()">
                        <input type="submit" value="Criar época" class="btn btn-primary" id="showCriarEpoca">
                    </a>
                </div>
            </div>


            {{--It's a form to create a new epoca.--}}
            <form>
                <div class="form-group" style="display: none;" id="criarEpocaForm">

                    <label>Nome da época</label>
                    <input type="text" class="form-control" placeholder="Escreva o nome da época" id="nomeEpoca">

                    <label>Período de avaliação</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a onclick="createEpoca()">
                                <input type="submit" value="Criar Época" class="btn btn-primary">
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            {{--Cria o calendário com os cursos e a época selecionada--}}
            <div class="row">
                <div class="col-12">
                    <a onclick="createCalendar()">
                        <input type="submit" value="Criar Calendário" class="btn btn-primary float-right">
                    </a>
                </div>
            </div>
        </section>
    </div>



    <!-- jQuery -->
    <script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
    <!-- Toastr -->
    <script src="{{(asset('/plugins/toastr/toastr.min.js'))}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        //It's a callback function. It's called when the user selects a course.
        $('#course').change(function () {

            //curso ou cursos selecionados
            var selectedCourse = $('#course').val();
            var anostring = "";

            $.each(selectedCourse, function (i, courseCode) {
                @foreach ($allCourses as $course)
                if (courseCode == {!!$course->course_code!!})
                    anostring += '<option value="{{ $course->id }}">{{ $course->name }} - {{$course->course_year}}º Ano</option>';
                @endforeach
            });

            $("#anoCourse").html(anostring);
        });

        /**
         * Cria um calendário ou mais calendários com uma época e ano do curso (id)
         * Envia por AJAX um JSON para o controller
         */
        function createCalendar() {
            $anoCourse = $('#anoCourse').val();
            $epoca = $('#epoca').val();

            if ($anoCourse.length != 0 && $epoca.length != 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post("{{ route('enviardados')}}",
                    {
                        ano: JSON.stringify($anoCourse),
                        epoca: JSON.stringify($epoca)
                    })
                window.location.href = "{{ route('marcarexames')}}";
            }
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
                while (c.charAt(0) == ' ')
                    c = c.substring(1);

                if (c.indexOf(name) == 0)
                    return c.substring(name.length, c.length);

            }
            return "";
        }

        //It's a function that checks if there is a CSV file imported.
        function checkCSV() {
            if (getCookie("CSV") == "")
                toastr.warning('Atenção! Não foi importado um ficheiro CSV para ler dados.')
        }

        /**
         * verificação de dados na base de dados
         * importado o csv - existe dado
         */
        function checkIfImported() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('checkifimported')}}",

                function (response) {
                    if (response == 1) setCookie("CSV", true);
                    else setCookie("CSV", "");

                    checkCSV();
                })
        }

        /**
         * It's a function that sets a cookie.
         * @param cname
         * @param cvalue
         */
        function setCookie(cname, cvalue) {
            document.cookie = cname + "=" + cvalue;
        }

        checkIfImported();

        /**
         * It's a function that shows or hides the form to create a new epoca.
         */
        function showFrom() {
            let mostrarEpoca = $('#showCriarEpoca');
            let form = $('#criarEpocaForm');

            if (mostrarEpoca.css("display") === "none") {
                mostrarEpoca.css("display", "inline-block");
                form.css("display", "none");
            } else {
                mostrarEpoca.css("display", "none");
                form.css("display", "block");
            }
        }

        /**
         * It's a function that sends a request to the server to create a new epoca.
         */
        function createEpoca() {

            let nome = $('#nomeEpoca').val();
            let data = $('#reservation').val();
            range = data.split("-");

            dataInicio = range[0];
            dataFim = range[1];

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('criarEpoca')}}", {
                    nome: JSON.stringify(nome),
                    dataInicio: JSON.stringify(dataInicio),
                    dataFim: JSON.stringify(dataFim),
                },
                function (response) {

                })
        }
    </script>
@stop
