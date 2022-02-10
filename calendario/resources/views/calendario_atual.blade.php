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
                        <h1>Calendário 2021-2022 1ºsemestre</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('calendarioatual')}}">Calendário Atual</a></li>
                            <li class="breadcrumb-item" active>2021-2022</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
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
                                <!-- the events -->
                                <div id="external-events">

                                    <!--<div class="external-event bg-danger">Sleep tight</div>-->
                                    <div class="d-none">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove" checked>
                                            remove after drop
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Popup para selecionar a sala e os vigilantes -->
    <div class="modal fade" id="schedule-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Configurar exame</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Vigilantes</label>
                            <select id="profs" class="select2" multiple="multiple"
                                    data-placeholder="Selecione uma época" style="width: 100%;">
                                @foreach($professors as $prof)
                                        <option value="{{$prof->id}}">{{$prof->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Salas</label>
                            <select id="salas" class="select2" multiple="multiple"
                                    data-placeholder="Selecione uma época" style="width: 100%;">
                                @foreach($classroom as $class)
                                    <option value="{{$class->id}}">{{$class->classroom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
    <!-- Bootstrap -->
    <script src="{{(asset('/plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
    <!-- jQuery UI -->
    <script src="{{(asset('/plugins/jquery-ui/jquery-ui.min.js'))}}"></script>
    <script src="{{(asset('/plugins/fullcalendar/main.js'))}}"></script>


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
                if(valAno == {!!$course->course_year!!}){
                    @foreach ($epocas as $epoca)

                    @if( $epoca->course_id == $course->id)
                        epocaString = epocaString + "<option value='{{$epoca->id}}'>{{$epoca->epoca->name}}</option>";
                        @foreach ($epoca->course->subject as $subject)
                            @if($subject->evaluationSlot == null)
                                disciplinaString+="<div class='external-event bg-success'>{{$subject->name}}</div>";
                            @endif
                        @endforeach
                    @endif
                @endforeach
                }
        }

        @endforeach

        $("#external-events").html(disciplinaString);
        $("#epoca").html(epocaString);
        console.log("1")
        alterarCalendario();

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
                    if(valAno == {!!$course->course_year!!}){
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
                        if({!!$epoca->id!!} == epoca){
                            @foreach ($epoca->course->subject as $subject)
                                @if($subject->evaluationSlot == null)
                                disciplinaString+="<div class='external-event bg-success'>{{$subject->name}}</div>";
                                @endif
                            @endforeach
                        }
		        	@endforeach

            $("#external-events").html(disciplinaString);

            console.log("2")
            alterarCalendario();
        });

        /**
        * verifica quais são as épocas que estam associados ao ano do curso
        */
        $("#ano").change(function () {
            var valAno= $(this).val();
            var epocaString = "";
            var disciplinaString = "";
            var valcurso = $("#curso").val();

            /**
             * WARNING: as disciplinas estam repetidas se houver mais que uma época
             */
            @foreach ($courses as $course)
            if (valcurso == {!!$course->course_code!!}) {
                if(valAno == {!!$course->course_year!!}){
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
                        if({!!$epoca->id!!} == epoca){
                            @foreach ($epoca->course->subject as $subject)
                                @if($subject->evaluationSlot == null)
                                disciplinaString+="<div class='external-event bg-success'>{{$subject->name}}</div>";
                                @endif
                            @endforeach
                        }
		        	@endforeach

            $("#external-events").html(disciplinaString);

            alterarCalendario();
        });

        $("#epoca").change(function () {
            var epoca = $(this).val(); //epoca selecionada
            var disciplinaString = "";
		        	@foreach ($epocas as $epoca)
                        if({!!$epoca->id!!} == epoca){
                            @foreach ($epoca->course->subject as $subject)
                                @if($subject->evaluationSlot == null)
                                disciplinaString+="<div class='external-event bg-success'>{{$subject->name}}</div>";
                                @endif
                            @endforeach
                        }
		        	@endforeach
                    $("#external-events").html(disciplinaString);
                    alterarCalendario();
        });

       function alterarCalendario(){
           var dateEpoca =  $('#epoca').val();
           var dataInicio = "";
           var arrayEvent = [];//criação de um objeto

           @foreach($epocas as $epoca)

               if({!!  $epoca->id !!}  == dateEpoca){
                   dataInicio = '{!! $epoca->epoca->start_date !!}'.split(" ");

                   var inicio = "", fim ="", nome = "";

                   if(dateEpoca == {!! $epoca->id !!}){
                       @if ($epoca->evaluationslots != null)

                           @foreach($epoca->evaluationslots as $event){
                               var event = {};
                               if({!! $event->timeslot->id !!} == 1){
                                   event.start = "{!! $event->calendar_day !!}".concat(" ", "09:30:00");
                                   event.end = "{!! $event->calendar_day !!}".concat(" ", "13:30:00");
                               } else if({!! $event->timeslot->id !!} == 2){
                                   event.start = "{!! $event->calendar_day !!}".concat(" ", "14:00:00");
                                   event.end = "{!! $event->calendar_day !!}".concat(" ", "18:00:00");
                               } else {
                                   event.start = "{!! $event->calendar_day !!}".concat(" ", "18:30:00");
                                   event.end = "{!! $event->calendar_day !!}".concat(" ", "22:30:00");
                               }

                               event.title = "{!! $event->Subject->name!!}";

                               arrayEvent.push(event);

                             }
                             @endforeach
                         @endif
                   }
               }
           @endforeach

           calendar(dataInicio[0], arrayEvent);
       }

       /**
        * Tranforma o mes em numero
        * @param mes
        * @returns {string}
        */
       function getMes(mes){
           if(mes == "Jan") return "01";
           if(mes == "Feb") return "02";
           if(mes == "Mar") return "03";
           if(mes == "Apr") return "04";
           if(mes == "May") return "05";
           if(mes == "Jun") return "06";
           if(mes == "Jul") return "07";
           if(mes == "Aug") return "08";
           if(mes == "Sep") return "09";
           if(mes == "Oct") return "10";
           if(mes == "Nov") return "11";
           if(mes == "Dec") return "12";
       }

       /**
        * Envia os dados para o controller por ajax
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
        * õbtém o id do timeslot associado à data
        * @param date
        * @returns {number}
        */
       function getTimeSlot(date){
           console.log(date);
           if(date >= 9 && date < 14) return 1;
           if(date >= 14 && date < 18) return 2;
           return 3;
       }

       function calendar(dataInicio, event){

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
            //var checkbox = document.getElementById('drop-remove');
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
                        duration: { days: 15 },
                        buttonText: 'nothing',
                    }
                },

                themeSystem: 'bootstrap',
                //Random default events
                events: [ {
                    id: 'a',
                    title: 'my event',
                    start: '2018-09-01'
                }],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (info) {
                    var date = (info.date).toString().split(" ");

                    var horas = date[4].split(":");

                    var data = new Date(date[3], getMes(date[1])-1, date[2],
                        horas[0], horas[1], horas[2]);

                    var nome = info.draggedEl.innerHTML;

                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                    sendToController(data, nome, getTimeSlot(data.getUTCHours()),
                        $('#epoca').val());
                },
                eventDrop: function(info) {
                    console.log(info);
                    console.log(info.event.start.toISOString());

                    var dateTime = info.event.start.toISOString().split("T");
                    var date = dateTime[0].split("-");
                    console.log(date[1]);

                    var horas = dateTime[1].split(".");
                    var hour = horas[0].split(":");

                    var data = new Date(date[0], date[1]-1, date[2],
                        hour[0], hour[1], hour[2]);

                    var nome = info.event.title;

                    var timeslot = getTimeSlot(parseInt(hour[0]));

                    sendToController(data, nome, timeslot,
                        $('#epoca').val());
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
                    var modal = $("#schedule-edit");
                    modal.modal();
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
                $('#new-event').val('')
            })
        };
    </script>

@stop

