@extends('layout.menu')
@section('content')

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
                                        @foreach($courses as $course)
                                            <option value="{{$course->course_code}}">{{$course->name}}</option>
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
                                    <div class="external-event bg-success">WEB DESIGN</div>
                                    <div class="external-event bg-info">DESENVOLVIMENTO WEB MULTIPLATAFORMA</div>
                                    <div class="external-event bg-primary">SEGURANÇA INFORMÁTICA</div>
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
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    !-- Edit Modal -->
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
                            <select class="select2" multiple="multiple"
                                    data-placeholder="Selecione uma época" style="width: 100%;">
                                <option>Heldér Gomes</option>
                                <option>Miguel Magueta</option>
                                <option>Rita Santos</option>
                                <option>Fábio Marques</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Salas</label>
                            <select class="select2" multiple="multiple"
                                    data-placeholder="Selecione uma época" style="width: 100%;">
                                <option>5.1.08</option>
                                <option>5.1.09</option>
                                <option>5.1.10
                                <option>
                                <option>5.1.11</option>
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
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap -->
    <script src="{{(asset('/plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
    <!-- jQuery UI -->
    <script src="{{(asset('/plugins/jquery-ui/jquery-ui.min.js'))}}"></script>
    <script src="{{(asset('/plugins/fullcalendar/main.js'))}}"></script>



    <script>


	   /**
	   * comboboxs para o calendário atual
	   * verifica quais são as epocas que estam associadas ao curso e quais são os anos do curso
	   */
        $("#curso").change(function () {
            var valcurso = $(this).val();
            var epocaString = "";
            var anoString = "";
            var anoArray = [];

              @foreach ($courses as $course)
                if (valcurso == {!!$course->course_code!!}) {
             //   anoArray.push();
		anoString += "<option value='{{$course->course_year}}'>{{$course->course_year}}</option>";

            }

            @endforeach
            $("#ano").html(anoString);


            var valAno = $("#ano").val();

            @foreach ($courses as $course)
                if (valcurso == {!!$course->course_code!!}) {
                	if(valAno == {!!$course->course_year!!}){
		        	 @foreach ($epocas as $epoca)
					@if( $epoca->course_id == $course->id)
					 	epocaString = epocaString + "<option value='{{$epoca->id}}'>{{$epoca->calendar_name}}</option>";
					@endif
		        	@endforeach
                	}
            }

            @endforeach

            $("#epoca").html(epocaString);
        });

        /**
        * verifica quais são as épocas que estam associados ao ano do curso
        */
        $("#ano").change(function () {
            var valAno= $(this).val();
            var epocaString = "";

            var valcurso = $("#curso").val();

            @foreach ($courses as $course)
                if (valcurso == {!!$course->course_code!!}) {
                	if(valAno == {!!$course->course_year!!}){
		        	 @foreach ($epocas as $epoca)
					@if( $epoca->course_id == $course->id)
					 	epocaString = epocaString + "<option value='{{$epoca->id}}'>{{$epoca->calendar_name}}</option>";
					@endif
		        	@endforeach
                	}
            }

            @endforeach

            $("#epoca").html(epocaString);
        });

    </script>

        <!-- Page specific script -->
    <script>


        $(function () {

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
                events: [],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (info) {
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                },
                initialView: 'timeGrid2Week',
                initialDate: "2021-01-04",
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
            calendar.render();

            // $('#calendar').fullCalendar()

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
        })
    </script>

@stop

