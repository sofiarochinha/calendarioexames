@extends('layout.menu')
@section('content')
    <style>
        .fa-save {
            color: #2a6cf5;
            cursor: pointer;
        }

        .fa-trash {
            color: #ff5c33;
            cursor: pointer;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Configurações</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('marcarexames')}}">Calendário Atual</a></li>
                            <li class="breadcrumb-item active">Configurações</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group w-100 mb-2">
                            <a class="btn btn-info tablinks active" onclick="datatable(event, 'UC')"> Unidades
                                Curriculares </a>
                            <hr/>
                            <a style="margin-left: 10px;" class="btn btn-info tablinks"
                               onclick="datatable(event, 'docentes')"> Docentes </a>
                            <a style="margin-left: 10px;" class="btn btn-info tablinks"
                               onclick="datatable(event, 'salas')"> Salas </a>
                            <a style="margin-left: 10px;" class="btn btn-info tablinks"
                               onclick="datatable(event, 'epocas')"> Épocas </a>
                        </div>
                        <div class="card" id="UC">
                            <div class="card-body">
                                <button class="btn btn-primary float-right" onclick="">Adicionar</button>
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Docente</th>
                                        <th>Curso</th>
                                        <th>Ano do Curso</th>
                                        <th>Número de alunos inscritos</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->name}}</td>
                                            <td>{{$subject->associated_professor->name}} </td>
                                            <td>{{ $subject->courses->name}}</td>
                                            <td>{{ $subject->courses->course_year}}</td>
                                            <td>0</td>
                                            <td align="center"><a><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card" id="docentes" style="display: none;">
                            <div class="card-body">
                                <button class="btn btn-primary float-right" onclick="">Adicionar</button>
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Disponibilidade</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($professors as $professor)
                                        <tr>
                                            <td>{{ $professor->name}}</td>
                                            <td>{{$professor->email}}</td>
                                            <td>{{$professor->availability}}</td>
                                            <td align="center"><a><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card" id="salas" style="display: none;">
                            <div class="card-body">
                                <button class="btn btn-primary float-right" onclick="">Adicionar</button>
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sala</th>
                                        <th>Tipo</th>
                                        <th>Lotação máxima em exame</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classrooms as $classroom)
                                        <tr>
                                            <td>{{ $classroom->classroom}}</td>
                                            <td>{{ $classroom->type}}</td>
                                            <td>{{ $classroom->capacity}}</td>
                                            <td align="center"><a><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="card" id="epocas" style="display: none;">
                            <button class="btn btn-primary float-right" id="adicionar">Adicionar</button>
                            <div class="card-body">
                                <table id="example4" class="table table-bordered table-striped">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <script src="{{(asset('/plugins/jquery/jquery-3.6.0.min.js'))}}"></script>
    <script src="{{(asset('/plugins/moment/moment.min.js'))}}"></script>
    <script src="{{(asset('/plugins/daterangepicker/daterangepicker.js'))}}"></script>
    <!-- Datatables-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/sb-1.3.2/sp-2.0.0/sl-1.3.4/datatables.min.js"></script>

    <script>


        function datatable(event, id) {
            var table;

            // Get all elements with class="card" and hide them
            table = document.getElementsByClassName("card");
            for (i = 0; i < table.length; i++) {
                table[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(id).style.display = "block";
            event.currentTarget.className += " active";
        }


        var tableEpocas = $("#example4").DataTable({
            columns: [
                {title: 'Índice'},
                {title: 'Nome'},
                {title: 'Data da época'},
                {title: 'Operações'}
            ],

            "responsive": true, "lengthChange": false, "autoWidth": false,
        }); //tabela das épocas

        /**
         * The above code is adding data to the table.
         */
        function addData() {
            @foreach ($epocas as $epoca)
            tableEpocas.row.add([
                ' <div class="data" id="{{$epoca->id}}">{{$epoca->name}}</div>', //class "data"
                '  <div class="epoca">' + "{{$epoca->start_date}}" + " até " + "{{$epoca->end_date}}" + '</div>',
                '  <div align="center"> <a class="edit"> <i class="fas fa-edit"> </i>' +
                '  </a> <a class="delete"> <i class="fas fa-trash"></i> </a>' +
                '  <a class="save"> <i class="fas fa-save"></i> </a></div>']).draw();

            @endforeach

        }

        addData();

        //The above code is hiding the save button until the user has entered a question.
        $('.save').hide();

        /*The above code is making the edit button on the table clickable. When clicked, it will make all the data in the
        table editable.*/
        $('#epocas').on('click', 'tbody td .edit', function () {
            var clickedRow = $($(this).closest('td')).closest('tr');

            //Adding a new input field to each row of the table.
            $(clickedRow).find('td').each(function () {
                epoca = $(this).find(".data");
                data = $(clickedRow).find(".epoca");

                nomeEpoca = epoca.html();
                dataEpoca = data.html();

                //obtém o id da época
                idEpoca = epoca.attr('id');

                //adiciona um input para escrever o nome da época
                epoca.html('<input class="data" type="text" value="' + nomeEpoca + '" name="nomeEpoca">');
                data.html('<div class="input-group">' +
                    '   <div class="input-group-prepend">' +
                    '       <span class="input-group-text">' +
                    '           <i class="far fa-calendar-alt"></i> ' +
                    '       </span>' +
                    '  </div>' +
                    '  <input type="text" class="form-control float-right daterange" > </div>');

                //coloca as datas no daterange picker comforme o id da epoca
                @foreach($epocas as $epoca)
                if (idEpoca == {!! $epoca->id !!}) {
                    $(".daterange").daterangepicker(
                        {
                            locale: {
                                format: 'YYYY-MM-DD'
                            },
                            startDate: '{{ $epoca->start_date}}',
                            endDate: '{{ $epoca->end_date}}'
                        });
                }
                @endforeach


                saveEpoca(idEpoca);
                return false;
            })


            $(this).siblings('.save').show();
            $(this).siblings('.delete').hide();
            $(this).hide();

        });

        //Updating the name of the epoca.
        function updateEpoca(idEpoca, nomeEpoca, startDate, endDate) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('editepoca')}}",
                {
                    id: JSON.stringify(idEpoca),
                    name: JSON.stringify(nomeEpoca),
                    startDate: JSON.stringify(startDate),
                    endDate: JSON.stringify(endDate),

                })
        }

        //The above code is making the save button on the edit page do the same thing as the save button on the add page.
        function saveEpoca(idEpoca) {

            $("#epocas").on('click', 'tbody td .save', function () {
                nomeEpoca = $('#epocas').find('input.data');

                $.each(nomeEpoca, function () {
                    date = $('.daterange');

                    //indice da row que foi selecionada para ser editada
                    var rowIndex = tableEpocas.row($(nomeEpoca).closest('tr')).index();

                    //o nome inserido
                    var fieldName = $('#epocas').find('input.data[name="nomeEpoca"]').val();
                    var fieldDate = date.val();
                    dateArray = fieldDate.split("-");

                    startDate = dateArray[0] + "-" + dateArray[1] + "-" + dateArray[2];
                    endDate = dateArray[3] + "-" + dateArray[4] + "-" + dateArray[5];

                    //remove todos os dados adicionados anteriormente
                    $('#epocas').find("input.data").remove();
                    $('#epocas').find("input.daterange").remove();

                    //adiciona o novo nome a celula
                    tableEpocas.cell(rowIndex, 0).data('<div id=' + idEpoca + ' class="data">' + fieldName + '</div>');
                    tableEpocas.cell(rowIndex, 1).data('<div class="epoca">' + startDate + " até " + endDate + '</div>');

                    //update na base de dados
                    updateEpoca(idEpoca, fieldName, startDate, endDate);
                    return false;
                });

                $(this).siblings('.edit').show();
                $(this).siblings('.delete').show();
                $(this).hide();
            });
        }


        $('#epocas').on('click', 'tbody td .delete', function () {
            var clickedRow = $($(this).closest('td')).closest('tr');
            $(clickedRow).find('td').each(function () {
                epoca = $(this).find(".data");

                //obtém o id da época
                idEpoca = epoca.attr('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post("{{ route('deleteEpoca')}}",
                    {
                        id: JSON.stringify(idEpoca),

                    })
            })


            $(this).parents('tr').remove();
        });


        /**
         * The above code is adding a new row to the table.
         */
        $("#adicionar").on('click', function () {
            tableEpocas.row.add([
                '  <div class="data">0 Nova Época</div>',
                '  <div class="input-group">' +
                '   <div class="input-group-prepend">' +
                '       <span class="input-group-text">' +
                '           <i class="far fa-calendar-alt"></i> ' +
                '       </span>' +
                '  </div>' +
                '  <a type="text" class="form-control float-right daterange"> </div>',
                '  <div align="center"> <a class="edit"> <i class="fas fa-edit"> </i>' +
                '  </a> <a class="save"> <i class="fas fa-trash"></i> </a>' +
                '  <a class="delete"> <i class="fas fa-trash"></i> </a></div>']).draw();

        });
    </script>


@stop
