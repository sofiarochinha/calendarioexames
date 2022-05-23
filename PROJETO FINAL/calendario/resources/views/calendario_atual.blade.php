@extends('layout.menu')
@section('content')

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{(asset('/plugins/select2/css/select2.min.css'))}}">
        <title>Ua Calendar</title>

    </head>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Calendário 2021-2022 1ºsemestre</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('marcarexames')}}">Calendário Atual</a></li>
                            <li class="breadcrumb-item" active>2021-2022</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="card-title">Curso</label>
                                    <select class="custom-select form-control-border" id="curso">
                                        @foreach($courses_names as $course)
                                            @if ($course->calendar != null)
                                                <option value="{{$course->course_code}}">{{$course->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="card-title">Época</label>
                                    <select class="custom-select form-control-border" id="epoca">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="card-title">Ano do curso</label>
                                    <select class="custom-select form-control-border" id="ano">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Disciplinas</h4>
                            </div>
                            <div class="card-body">
                                <div id="external-events">


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    </div>

    <div>
        <div class="modal fade" id="schedule-edit">


        </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>

    <script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
    <!-- Bootstrap -->
    <script src="{{(asset('/plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
    <!-- jQuery UI -->
    <script src="{{(asset('/plugins/jquery-ui/jquery-ui.min.js'))}}"></script>
    <script src="{{(asset('/plugins/fullcalendar/main.js'))}}"></script>

    <script src="{{(asset('/plugins/select2/js/select2.full.min.js'))}}"></script>


    <!-- Page specific script -->
    <script>



        /**
         * comboboxs para o calendário atual
         * verifica quais são as epocas que estam associadas ao curso e quais são os anos do curso
         */
        var valcurso = $('#curso').val();
        var epocaString = "";
        var anoString = "";
        var disciplinaString = "";

        @foreach ($courses as $course)
        if (valcurso == {!!$course->course_code!!}) {
            @if ($course->calendar !=null)
                anoString += "<option value='{{$course->course_year}}'>{{$course->course_year}}</option>";
            @endif
        }

        @endforeach
        $("#ano").html(anoString);


        var valAno = $("#ano").val();

        @foreach ($courses as $course)

        if (valcurso == {!!$course->course_code!!}) {
            if (valAno == {!!$course->course_year!!}) {
                @foreach ($epocas as $epoca)
                    @if( $epoca->course_id == $course->id)
                        epocaString = epocaString + "<option value='{{$epoca->id}}'>{{$epoca->epoca->name}}</option>";
                        @foreach ($epoca->course->subject as $subject)
                            @if($subject->evaluationSlot == null)
                               disciplinaString += "<div class='external-event bg-success'>{{$subject->name}}</div>";
                            @endif
                        @endforeach
                    @endif
                @endforeach
            }
        }

        @endforeach

        $("#external-events").html(disciplinaString);
        $("#epoca").html(epocaString);

        //valCurso -> o codigo do curso
        //valAno -> ano de curso

        /**
         * Percisa de enviar o codigo de curso
         * Ano de curso
         * E a epoca
         */

        getExames(valcurso, $('#epoca').val(), valAno);

        function getExames(codeCourse, idEpoca, yearCourse){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('api-getExames')}}",
                {
                    codeCourse: JSON.stringify(codeCourse),
                    idEpoca: JSON.stringify(idEpoca),
                    yearCourse: JSON.stringify(yearCourse),

                }, function (response) {
                    console.log(response['subjects'])
                    console.log(response['associatedSala'])

                })

        }
        alterarCalendario();

        // Creating a function that is called when the user changes the course.
        $("#curso").change(function () {
            var valcurso = $(this).val();
            var epocaString = "";
            var anoString = "";
            var disciplinaString = "";

            @foreach ($courses as $course)
            if (valcurso == {!!$course->course_code!!}) {
                @if ($course->calendar !=null)
                    anoString += "<option value='{{$course->course_year}}'>{{$course->course_year}}</option>";
                @endif
            }

            @endforeach
            $("#ano").html(anoString);


            var valAno = $("#ano").val();

            @foreach ($courses as $course)
            if (valcurso == {!!$course->course_code!!}) {
                if (valAno == {!!$course->course_year!!}) {
                    @foreach ($epocas as $epoca)
                        @if( $epoca->course_id == $course->id)
                        epocaString = epocaString + "<option value='{{$epoca->id}}'>{{$epoca->epoca->name}} </option>";

                        @endif
                    @endforeach
                }
            }

            @endforeach
            $("#epoca").html(epocaString);

            var epoca = $('#epoca').val(); //epoca selecionada
            var disciplinaString = "";
            @foreach ($epocas as $epoca)
            if ({!!$epoca->id!!} == epoca) {
                @foreach ($epoca->course->subject as $subject)
                    @if($subject->evaluationSlot == null)
                        disciplinaString += "<div class='external-event bg-success'>{{$subject->name}}</div>";
                    @endif
                @endforeach
            }
            @endforeach

            $("#external-events").html(disciplinaString);

            alterarCalendario();
        });

        /**
         * verifica quais são as épocas que estam associados ao ano do curso
         */
        $("#ano").change(function () {
            var valAno = $(this).val();
            var epocaString = "";
            var disciplinaString = "";
            var valcurso = $("#curso").val();

            /**
             * WARNING: as disciplinas estam repetidas se houver mais que uma época
             */
            @foreach ($courses as $course)
            if (valcurso == {!!$course->course_code!!}) {
                if (valAno == {!!$course->course_year!!}) {
                    @foreach ($epocas as $epoca)
                        @if( $epoca->course_id == $course->id)
                        epocaString = epocaString + "<option value='{{$epoca->id}}'>{{$epoca->epoca->name}}</option>";
                    @endif
                    @endforeach
                }
            }

            @endforeach
            $("#epoca").html(epocaString);

            var epoca = $('#epoca').val(); //epoca selecionada
            var disciplinaString = "";
            @foreach ($epocas as $epoca)
            if ({!!$epoca->id!!} == epoca) {
                @foreach ($epoca->course->subject as $subject)
                    @if($subject->evaluationSlot == null)
                    disciplinaString += "<div class='external-event bg-success'>{{$subject->name}}</div>";
                @endif
                @endforeach
            }
            @endforeach

            $("#external-events").html(disciplinaString);

            alterarCalendario();
        });

        // Creating a function that will be called when the user changes the value of the select element with id "epoca".
        $("#epoca").change(function () {
            var epoca = $(this).val(); //epoca selecionada
            var disciplinaString = "";
            @foreach ($epocas as $epoca)
            if ({!!$epoca->id!!} == epoca) {
                @foreach ($epoca->course->subject as $subject)
                    @if($subject->evaluationSlot == null)
                    disciplinaString += "<div class='external-event bg-success'>{{$subject->name}}</div>";
                @endif
                @endforeach
            }
            @endforeach
            $("#external-events").html(disciplinaString);
            alterarCalendario();
        });

        // Creating an array of objects, each object containing the start and end date of an event.
        function alterarCalendario() {
            let dateEpoca = $('#epoca').val(), dataInicio = "",arrayEvent = [];//criação de um objeto

            @foreach($epocas as $epoca)

                if ({!!  $epoca->id !!} == dateEpoca) {
                    dataInicio = '{!! $epoca->epoca->start_date !!}'.split(" ");

                    var inicio = "", fim = "", nome = "";

                    if (dateEpoca == {!! $epoca->id !!}) {
                            @if ($epoca->evaluationslots != null)

                            @foreach($epoca->evaluationslots as $event){
                            var event = {};
                            if ({!! $event->timeslot->id !!} == 1) {
                                event.start = "{!! $event->calendar_day !!}".concat(" ", "09:30:00");
                                event.end = "{!! $event->calendar_day !!}".concat(" ", "13:30:00");
                            } else if ({!! $event->timeslot->id !!} == 2) {
                                event.start = "{!! $event->calendar_day !!}".concat(" ", "14:00:00");
                                event.end = "{!! $event->calendar_day !!}".concat(" ", "18:00:00");
                            } else {
                                event.start = "{!! $event->calendar_day !!}".concat(" ", "18:30:00");
                                event.end = "{!! $event->calendar_day !!}".concat(" ", "22:30:00");
                            }

                            event.id = {!! $event->id !!};


                            event.title = "{!! $event->Subject->name!!}" + getSalas({!! $event->id !!})
                            + " Salas" + getDocentes({!! $event->id !!}) + " Vigilantes";
/*
                                getSalas({!! $event->id !!}, changeTitle(event, {!! $event->Subject->name!!}));

                                changeTitle(event, {!! $event->Subject->name!!});*/
                            arrayEvent.push(event);

                        }
                        @endforeach
                        @endif
                    }
                }
            @endforeach

            calendar(dataInicio[0], arrayEvent);
        }

        function changeTitle(event, title){
            event.title = title;
        }
       /* /!**
         * Obtém o número de salas e de docentes já associadas a um exame
         *!/
        function getSalasDocentes(idExame){
            var array = [];

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('api-getSalasDocentes')}}",
                {
                    idExame: JSON.stringify(idExame),
                }, function (response) {
                    array.push(response['countSala']);
                    array.push(response['countProf']);
                })

            return array; //não funciona
        }*/

        function getSalas(idExame){
            var salas;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('api-getSalas')}}",
                {
                    idExame: JSON.stringify(idExame),
                }, function (response) {

                    salas = response['countSala'];
                    console.log(salas);
                })
            console.log(salas);
        }

        function getDocentes(idExame){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('api-getDocentes')}}",
                {
                    idExame: JSON.stringify(idExame),
                }, function (response) {
                    return response['countProf'];
                })
        }

        /**
         * Tranforma o mes em numero
         * @param mes
         * @returns {string}
         */
        function getMes(mes) {
            if (mes == "Jan") return "01";
            if (mes == "Feb") return "02";
            if (mes == "Mar") return "03";
            if (mes == "Apr") return "04";
            if (mes == "May") return "05";
            if (mes == "Jun") return "06";
            if (mes == "Jul") return "07";
            if (mes == "Aug") return "08";
            if (mes == "Sep") return "09";
            if (mes == "Oct") return "10";
            if (mes == "Nov") return "11";
            if (mes == "Dec") return "12";
        }

        /**
         * Envia os dados para o controller por ajax
         * Marca um exame
         */
        function sendToController(data, name, timeSlot, calendar) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('addevento')}}",
                {
                    data: JSON.stringify(data),
                    name: JSON.stringify(name),
                    timeSlot: JSON.stringify(timeSlot),
                    calendar: JSON.stringify(calendar),

                });
        }

        /**
         * obtém o id do timeslot associado à data
         * @param date
         * @returns {number}
         */
        function getTimeSlot(date) {
            if (date >= 9 && date < 14) return 1;
            if (date >= 14 && date < 18) return 2;
            return 3;
        }

        function calendar(dataInicio, event) {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function (eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });


            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: '',
                    center: 'title',
                    right: ''
                },
                views: {
                    timeGrid2Week: {
                        type: 'timeGrid',
                        duration: {days: 15},
                        buttonText: 'nothing',
                    }
                },

                themeSystem: 'bootstrap',
                //Random default events
                events: [{
                    id: 'a',
                    title: 'my event',
                    start: '2018-09-01'
                }],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (info) { //marca um exame que ainda não está marcado
                    var date = (info.date).toString().split(" ");

                    var horas = date[4].split(":");

                    var data = new Date(date[3], getMes(date[1]) - 1, date[2],
                        horas[0], horas[1], horas[2]);

                    var nome = info.draggedEl.innerHTML;

                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                    sendToController(data, nome, getTimeSlot(data.getUTCHours()),
                        $('#epoca').val());


                },
                //quando muda a data do exame
                eventDrop: function (info) {

                    var dateTime = info.event.start.toISOString().split("T");
                    var date = dateTime[0].split("-");

                    var horas = dateTime[1].split(".");
                    var hour = horas[0].split(":");

                    var data = new Date(date[0], date[1] - 1, date[2],
                        hour[0], hour[1], hour[2]);

                    var nome = info.event.title;

                    var timeslot = getTimeSlot(parseInt(hour[0]));

                    sendToController(data, nome, timeslot,
                        $('#epoca').val());

                    alterarCalendario();
                },
                initialView: 'timeGrid2Week',
                initialDate: dataInicio,
                locale: 'pt',
                allDaySlot: false,
                defaultTimedEventDuration: "04:30",
                hiddenDays: [0],
                eventDurationEditable: false,
                slotMinTime: "09:30:00",
                eventClick: function (event) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('api-modal')}}",
                        {
                            idExame: JSON.stringify(event.event.id),

                        }, function (response) {
                            $('#schedule-edit').append(response);
                    })

                    $('#schedule-edit').modal();
                },

                aspectRatio: 1.6
            });

            calendar.addEventSource(event); //adiciona os eventos

            calendar.render();

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('');
            })
        };
    </script>

@stop

