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
                                <table id="ucsTabela" class="table table-bordered table-striped">

                                </table>
                            </div>
                        </div>
                        <div class="card" id="docentes" style="display: none;">
                            <button class="btn btn-primary float-right" id="adicionarDocente">Adicionar</button>
                            <div class="card-body">
                                <table id="docentesTabela" class="table table-bordered table-striped">

                                </table>
                            </div>
                        </div>
                        <div class="card" id="salas" style="display: none;">
                            <div class="card-body">
                                <table id="salasTabela" class="table table-bordered table-striped">

                                </table>
                            </div>
                        </div>


                        <div class="card" id="epocas" style="display: none;">
                            <button class="btn btn-primary float-right" id="adicionarEpoca">Adicionar</button>
                            <div class="card-body">
                                <table id="epocasTabela" class="table table-bordered table-striped">

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

        /**
         * Inicialização das datables
         * @type {*|jQuery}
         */
        var tableEpocas = $("#epocasTabela").DataTable({
            columns: [
                {title: 'Nome'},
                {title: 'Data da época'},
                {title: 'Operações'}
            ],

            "responsive": true, "lengthChange": false, "autoWidth": false,
        }); //tabela das épocas

        var tableSala = $("#salasTabela").DataTable({
            columns: [
                {title: 'Sala'},
                {title: 'Tipo'},
                {title: 'Lotação máxima em exame'},
                {title: 'Operações'}
            ],

            "responsive": true, "lengthChange": false, "autoWidth": false,
        }); //tabela das épocas

        var tableDocente = $("#docentesTabela").DataTable({
            columns: [
                {title: 'NMEC Docente'},
                {title: 'Nome'},
                {title: 'Email'},
                {title: 'Disponibilidade'},
                {title: 'Operações'}
            ],

            "responsive": true, "lengthChange": false, "autoWidth": false,
        }); //tabela das épocas

        var tableUCS = $("#ucsTabela").DataTable({
            columns: [
                {title: 'Nome'},
                {title: 'Docente'},
                {title: 'Curso'},
                {title: 'Ano do curso'},
                {title: 'Número de alunos inscritos'},
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

            @foreach($classrooms as $classroom)
            tableSala.row.add([
                '<div id={{$classroom->id}} class="salaNumber">{{ $classroom->classroom}}</div>',
                '{{ $classroom->type}}',
                '<div class="capacitySala">{{ $classroom->capacity}}</div>',
                '  <div align="center"> <a class="edit"> <i class="fas fa-edit"> </i>' +
                '  </a> <a class="save"> <i class="fas fa-save"></i> </a></div>'
            ]).draw();
            @endforeach

            @foreach($subjects as $subject)
            tableUCS.row.add([
                '<div id={{ $subject->id}} class="nomeUC">{{ $subject->name}}</div>',
                '<div class="nomeDocente" id={{$subject->associated_professor->id}}>{{$subject->associated_professor->name}}</div>',
                '{{ $subject->courses->name}}',
                '{{ $subject->courses->course_year}}',
                '<div class="alunos">0</div>',
                '  <div align="center"> <a class="edit"> <i class="fas fa-edit"> </i>' +
                '  </a> <a class="save"> <i class="fas fa-save"></i> </a></div>'
            ]).draw();
            @endforeach

            @foreach($professors as $professor)
            tableDocente.row.add([
                '<div class="mecDocente">{{ $professor->mec }}</div>',
                '<div class="nomeDocente" id={{ $professor->id}}>{{ $professor->name}}</div>',
                '<div class="emailDocente">{{$professor->email}}</div>',
                '{{$professor->availability}}',
                '  <div align="center"> <a class="edit"> <i class="fas fa-edit"> </i>' +
                '  </a> <a class="save"> <i class="fas fa-save"></i> </a></div>'
            ]).draw();
            @endforeach
        }

        addData();

        //The above code is hiding the save button until the user has entered a question
        $('#epocas').find('.save').each(function () {
            $(this).hide();
        });

        //EDIT DATA ON DATABLE FUNCTIONS
        /*The above code is making the edit button on the table clickable. When clicked, it will make all the data in the
        table editable.*/
        $('#epocas').on('click', 'tbody td .edit', function () {
            var clickedRow = $($(this).closest('td')).closest('tr');

            //Adding a new input field to each row of the table.
            epoca = $(clickedRow).find(".data");
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


            $(this).siblings('.save').show();
            $(this).siblings('.delete').hide();
            $(this).hide();

        });

        /**
         * Edição na table das salas
         */
        $('#salas').on('click', 'tbody td .edit', function () {
            var clickedRow = $($(this).closest('td')).closest('tr');

            //Adding a new input field to each row of the table.
            $(clickedRow).find('td').each(function () {
                var rowIndex = tableSala.row($(this).closest('tr')).index();

                sala = $(this).find(".salaNumber");
                capacidadeSala = $(this).find(".capacitySala");

                capacidade = 0;
                if (typeof capacidadeSala.html() !== 'undefined')
                    capacidade = capacidadeSala.html();

                tableSala.cell(rowIndex, 2).data('<input class="capacitySala" type="text" value="' + capacidade + '" name="capacidadeSala">');

                //obtém o id da sala
                idSala = sala.attr('id');

                saveSala(idSala);
                return false;
            })

            $(this).siblings('.save').show();
            $(this).hide();

        });

        /**
         * Edição na tabela dos docentes
         * Edição do nome, email, nmec
         */
        $('#docentes').on('click', 'tbody td .edit', function () {
            var clickedRow = $($(this).closest('td')).closest('tr');

            //Adding a new input field to each row of the table.
            var rowIndex = tableDocente.row($(this).closest('tr')).index();

            mec = $(clickedRow).find(".mecDocente").html();
            nome = $(clickedRow).find(".nomeDocente").html();
            email = $(clickedRow).find(".emailDocente").html();

            //obtém o id do docente
            idDocente = $(clickedRow).find(".nomeDocente").attr('id');

            tableDocente.cell(rowIndex, 0).data('<input class="mecDocente" type="number" value="' + mec + '" name="nmecDocente">');
            tableDocente.cell(rowIndex, 1).data('<input class="nomeDocente" type="text" value="' + nome + '" name="nomeDocente">');
            tableDocente.cell(rowIndex, 2).data('<input class="emailDocente" type="email" value="' + email + '" name="emailDocente">');

            saveDocente(idDocente);

            $(this).siblings('.save').show();
            $(this).hide();

        });

        $('#UC').on('click', 'tbody td .edit', function () {
            var clickedRow = $($(this).closest('td')).closest('tr');

            var rowIndex = tableUCS.row($(this).closest('tr')).index();

            //Adding a new input field to each row of the table.
            alunosInscritos = $(clickedRow).find(".alunos");
            nomeUc = $(clickedRow).find(".nomeUC");
            nomeDocente = $(clickedRow).find(".nomeDocente");

            numeroAlunos = alunosInscritos.html();

            //obtém o id da unidade curricular
            idUC = nomeUc.attr('id');

            //adiciona um input para escrever o numero de alunos inscritos
            tableUCS.cell(rowIndex, 4).data('<input class="alunos" type="number" value="' + numeroAlunos + '" name="alunosInscritos">');
            tableUCS.cell(rowIndex, 1).data('<div class="row">' +
                '<div>'+
                 '<div class="form-group">'+
                    '<select class="custom-select selectDocente">'+

                        @foreach($professors as $prof)
                            '<option value="{{$prof->name}}" id="{{$prof->id}}">{{$prof->name}} </option>' +
                        @endforeach

                                {{--    '<option selected>' + nomeDocente.html()+ '</option>'--}}
                                {{--else--}}
                                {{--    '<option value="{{$prof->name}}" id="{{$prof->id}}">{{$prof->name}} </option>'--}}


                    + '</select> </div> </div></div>');

            saveUC(idUC);


            $(this).siblings('.save').show();
            $(this).siblings('.delete').hide();
            $(this).hide();

            return;

        });

        //END EDIT DATA ON DATABLE FUNCTIONS


        //UPDATE DATA FROM DATABASE FUNCTIONS
        /**
         * Atualiza uma epoca
         * @param idEpoca
         * @param nomeEpoca
         * @param startDate
         * @param endDate
         */
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

        /**
         * Atualiza a sala
         * @param idSala
         * @param capacidade
         */
        function updateSala(idSala, capacidade) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('editSala')}}",
                {
                    id: JSON.stringify(idSala),
                    capacidade: JSON.stringify(capacidade),

                })
        }


        /**
         * A function that is called when the user clicks on the save button. It is responsible for updating the
         * information of the teacher.
         * @param idDocente
         * @param fieldNmec
         * @param fieldName
         * @param fieldEmail
         */
        function updateDocente(idDocente, fieldNmec, fieldName, fieldEmail) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('editDocente')}}",
                {
                    idDocente: JSON.stringify(idDocente),
                    fieldNmec: JSON.stringify(fieldNmec),
                    fieldName: JSON.stringify(fieldName),
                    fieldEmail: JSON.stringify(fieldEmail),

                })
        }

        /**
         * Update de uma unidade curricular
         * @param idUC
         * @param idDocente
         * @param alunosInscritos
         */
        function updateUC(idUC, idDocente, alunosInscritos) {
            console.log(alunosInscritos, idDocente);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('editUC')}}",
                {
                    idUC: JSON.stringify(idUC),
                    idDocente: JSON.stringify(idDocente),
                    alunosInscritos: JSON.stringify(alunosInscritos),

                })
        }

        //END UPDATE DATA FROM DATABASE FUNCTIONS

        //INSERT DATA TO DATABASE FUNCTIONS
        /**
         * Insere uma nova época na base de dados
         * @param fieldName
         * @param startDate
         * @param endDate
         */
        function insertNewEpoca(fieldName, startDate, endDate) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('criarEpocaConfigurations')}}",
                {
                    nome: JSON.stringify(fieldName),
                    startDate: JSON.stringify(startDate),
                    endDate: JSON.stringify(endDate),

                }, function (response) {
                    //adiciona o id da epoca
                    tableEpocas.row(':first').nodes().to$().find('.data').attr('id', response['idEpoca']);
                })

        }

        /**
         * Insere um novo docente na base de dados
         * @param fieldNmec numero mecanografico unico
         * @param fieldName nome
         * @param fieldEmail email novo e único
         */
        function insertNewDocente(fieldNmec, fieldName, fieldEmail) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('criarDocente')}}",
                {
                    nome: JSON.stringify(fieldName),
                    email: JSON.stringify(fieldEmail),
                    nmec: JSON.stringify(fieldNmec)

                }, function (response) {
                    //adiciona o id da epoca
                    if (typeof response['exception'] === "object") {
                        toastr.error('Ocorreu um erro! O nmec ou o email já está a ser utilizado.');
                        tableDocente.row(':first').remove().draw(false);

                    } else if (typeof response['idDocente'] === "number") {
                        tableDocente.row(':first').nodes().to$().find('.nomeDocente').attr('id', response['idDocente']);
                    }
                })

        }

        //END INSERT DATA TO DATABASE FUNCTIONS

        //SAVE DATA FUNCTIONS
        var adicionarEpoca = true; //permite adicionar uma nova epoca
        var adicionarDocente = true; //permite adicionar um novo docente

        /**
         * The above code is making the save button on the edit page do the same thing as the save button on the add page.
         * @param idSala
         */
        function saveSala(idSala) {

            $("#salas").on('click', 'tbody td .save', function () {
                let capacidadeSala = $('#salas').find('input.capacitySala');

                $.each(capacidadeSala, function () {

                    //indice da row que foi selecionada para ser editada
                    let rowIndex = tableSala.row($(capacidadeSala).closest('tr')).index();

                    //a capacidade inserida
                    let fieldCapacity = $('#salas').find('input.capacitySala[name="capacidadeSala"]').val();

                    //remove todos os dados adicionados anteriormente
                    $('#salas').find("input.capacitySala").remove();

                    //adiciona a nova capacidade da sala à célula
                    tableSala.cell(rowIndex, 2).data('<div id=' + idSala + ' class="salaNumber">' + fieldCapacity + '</div>');

                    //update na base de dados
                    updateSala(idSala, fieldCapacity);
                    adicionar = true;
                    return false;
                });

                $(this).siblings('.edit').show();
                $(this).hide();
            });
        }

        /**
         * The above code is making the save button on the edit page do the same thing as the save button on the add page.
         * @param idEpoca
         */
        function saveEpoca(idEpoca) {

            $("#epocas").on('click', 'tbody td .save', function () {
                nomeEpoca = $('#epocas').find('input.data');

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

                if (idEpoca == null) {
                    insertNewEpoca(fieldName, startDate, endDate);
                } else {
                    //update na base de dados
                    updateEpoca(idEpoca, fieldName, startDate, endDate);
                }
                adicionarEpoca = true;

                $(this).siblings('.edit').show();
                $(this).siblings('.delete').show();
                $(this).hide();
            });
        }


        /**
         * Guarda os dados do docente
         * @param idDocente id do docente
         */
        function saveDocente(idDocente) {

            $("#docentes").on('click', 'tbody td .save', function () {
                nomeDocente = $('#docentes').find('input.nomeDocente');

                docentes = $('#docentes');
                var inputName = docentes.find('input.nomeDocente[name="nomeDocente"]');
                var inputEmail = docentes.find('input.emailDocente[name="emailDocente"]');
                var inputNmec = docentes.find('input.mecDocente[name="nmecDocente"]');

                //indice da row que foi selecionada para ser editada
                var rowIndex = tableDocente.row($(nomeDocente).closest('tr')).index();

                //o nome, email e nmec inserido
                var fieldName = inputName.val();
                var fieldEmail = inputEmail.val();
                var fieldNmec = inputNmec.val();

                //remove todos os dados adicionados anteriormente
                inputName.remove();
                inputEmail.remove();
                inputNmec.remove();

                //adiciona o novo nome a celula
                tableDocente.cell(rowIndex, 0).data('<div>' + fieldNmec + '</div>');
                tableDocente.cell(rowIndex, 1).data('<div id=' + idDocente + ' class="data">' + fieldName + '</div>');
                tableDocente.cell(rowIndex, 2).data('<div>' + fieldEmail + '</div>');

                if (idDocente == null) {
                    insertNewDocente(fieldNmec, fieldName, fieldEmail);
                } else {
                    //update na base de dados
                    updateDocente(idDocente, fieldNmec, fieldName, fieldEmail);
                }
                adicionarDocente = true;

                $(this).siblings('.edit').show();
                $(this).siblings('.delete').show();
                $(this).hide();
            });
        }

        function saveUC(idUC) {

            $("#UC").on('click', 'tbody td .save', function () {
                let nomeDocente = $('#UC').find('.selectDocente');

                let uc = $('#UC');
                let alunosInscritos = $("#UC").find("input.alunos");

                var inputAlunosInscritos = uc.find('input.alunos[name="alunosInscritos"]');
                var selectNomeDocente = uc.find('.selectDocente :selected');

                //indice da row que foi selecionada para ser editada
                var rowIndex = tableUCS.row($(nomeDocente).closest('tr')).index();
                console.log(rowIndex);

                //o nome, email e nmec inserido
                var fieldName = selectNomeDocente.val();
                var fieldAlunosInscritos = inputAlunosInscritos.val();

                var idDocente = $('.selectDocente :selected').attr('id');

                //remove todos os dados adicionados anteriormente
                inputAlunosInscritos.remove();
                selectNomeDocente.remove();

                //adiciona o novo nome a celula
                tableUCS.cell(rowIndex, 1).data('<div class="nomeDocente">' + fieldName + '</div>');
                tableUCS.cell(rowIndex, 4).data('<div id=' + idDocente + ' class="alunos">' + fieldAlunosInscritos + '</div>');

                updateUC(idUC, idDocente, fieldAlunosInscritos);

                $(this).siblings('.edit').show();
                $(this).siblings('.delete').show();
                $(this).hide();

                return;
            });
        }
        //END SAVE DATA FUNCTIONS

        //DELETE FUNCTIONS
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

                return false;
            })


            $(this).parents('tr').remove();
        });

        //END DELETE FUNCTIONS

        //START ADD DATA TO DATABLE FUNCTIONS
        /**
         * The above code is adding a new row to the table.
         */
        $("#adicionarEpoca").on('click', function () {
            if (adicionarEpoca) {
                adicionarEpoca = false;
                tableEpocas.row.add([
                    ' <div class="data">0</div>',
                    '<div class="input-group">' +
                    '   <div class="input-group-prepend">' +
                    '       <span class="input-group-text">' +
                    '           <i class="far fa-calendar-alt"></i> ' +
                    '       </span>' +
                    '  </div>' +
                    '  <input type="text" class="form-control float-right daterange" > </div>',
                    '  <div align="center"> <a class="edit"> <i class="fas fa-edit"> </i>' +
                    '  </a> <a class="save"> <i class="fas fa-save"></i> </a>' +
                    '  <a class="delete"> <i class="fas fa-trash"></i> </a></div>']).draw();

                rowIndex = tableEpocas.row(':first').index();
                tableEpocas.cell(rowIndex, 0).data('<input class="data" type="text" value="' + 'Nova Época' + '" name="nomeEpoca">');

                $('.daterange').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                });

                tableEpocas.row(':first').nodes().to$().find('.edit').hide();

                saveEpoca(null);
            } else {
                toastr.warning('Só pode adicionar uma época de cada vez.')
            }
        });

        $("#adicionarDocente").on('click', function () {
            if (adicionarDocente) {
                adicionarDocente = false;
                tableDocente.row.add([
                    '<div>0</div>',
                    '<div class="data">0</div>',
                    '<div></div>',
                    '<div></div>',
                    '  <div align="center"> <a class="edit"> <i class="fas fa-edit"> </i>' +
                    '  </a> <a class="save"> <i class="fas fa-save"></i> </a>' +
                    '  <a class="delete"> <i class="fas fa-trash"></i> </a></div>']).draw();

                rowIndex = tableDocente.row(':first').index();

                tableDocente.cell(rowIndex, 0).data('<input class="mecDocente" type="number" value="' + 0 + '" name="nmecDocente">');
                tableDocente.cell(rowIndex, 1).data('<input class="nomeDocente" type="text" value="' + 'Novo Docente' + '" name="nomeDocente">');
                tableDocente.cell(rowIndex, 2).data('<input class="emailDocente" type="email" value="' + 'Novo Email' + '" name="emailDocente">');

                tableDocente.row(':first').nodes().to$().find('.edit').hide();
                tableDocente.row(':first').nodes().to$().find('.delete').hide();

                saveDocente(null);
            } else {
                toastr.warning('Só pode adicionar um docente de cada vez.')
            }
        });

        //END ADD DATA TO DATABLE FUNCTIONS
    </script>


@stop
