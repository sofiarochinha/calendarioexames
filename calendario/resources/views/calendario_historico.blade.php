@extends('layout.menu')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calendários Anteriores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/calendario-atual">Calendário Atual</a></li>
                        <li class="breadcrumb-item active">Calendários Anteriores</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="sticky-top mb-4">
                        <div class="card">
                            <div class="card-body">
                                <label class="card-title">Curso</label>
                                <select class="custom-select form-control-border" id="exampleSelectBorder">
                                    <option>Tecnologias de informação</option>
                                    <option>Eletrónica e Mecânica Industrial</option>
                                    <option>Engenharia Eletrotécnica </option>
                                    <option>Gestão Comercial </option>
                                    <option>Gestão da Qualidade </option>
                                    <option>Secretariado e Comunicação Empresarial</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="sticky-top mb-4">
                        <div class="card">
                            <div class="card-body">
                                <label class="card-title">Ano letivo</label>
                                <select class="custom-select form-control-border" id="exampleSelectBorder">
                                    <option>2020-2019</option>
                                    <option>2019-2018</option>
                                    <option>2018-2017</option>
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
                                <select class="custom-select form-control-border" id="exampleSelectBorder">
                                    <option>Normal</option>
                                    <option>Recurso</option>
                                    <option>Especial</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="sticky-top mb-4">
                        <div class="card">
                            <div class="card-body">
                                <label class="card-title">Ano</label>
                                <select class="custom-select form-control-border" id="exampleSelectBorder">
                                    <option>1º</option>
                                    <option>2º</option>
                                    <option selected>3º</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="sticky-top mb-4">
                        <div class="card">
                            <div class="card-body">
                                <label class="card-title">Semestre</label>
                                <select class="custom-select form-control-border" id="exampleSelectBorder">
                                    <option>1º</option>
                                    <option>2º</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/plugins/fullcalendar/main.js"></script>
<script src="/plugins/fullcalendar/locales-all.js"></script>
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
      zIndex        : 1070,
      revert        : true, // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    })

  })
}
var date = new Date()
var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

var Calendar = FullCalendar.Calendar;
var Draggable = FullCalendar.Draggable;
var checkbox = document.getElementById('drop-remove');
var calendarEl = document.getElementById('calendar');
var calendar = new Calendar(calendarEl, {
  headerToolbar: {
    left  : 'prev,next',
    center: 'title',
    right : 'dayGridMonth,timeGridWeek'
  },
  themeSystem: 'bootstrap',
  //Random default events
  events: [
    {
      title          : 'Desenvolvimento Web Multiplataforma',
      start          : new Date(2020, 0, 7, 14, 00),
      end            : new Date(2020, 0, 7, 18, 00),
      allDay         : false,
      backgroundColor: '#0073b7', //Blue
      borderColor    : '#0073b7' //Blue
    },
    {
      title          : 'Web Design',
      start          : new Date(2020, 0, 9, 14, 00),
      end            : new Date(2020, 0, 9, 18, 00),
      allDay         : false,
      backgroundColor: '#f56954', //Red
      borderColor    : '#f56954' //Red
    },
    {
      title          : 'Segurança Informática',
      start          : new Date(2020, 0, 14, 9, 30),
      end            : new Date(2020, 0, 14, 13, 30),
      allDay         : false,
      backgroundColor: '#00c0ef', //Red
      borderColor    : '#00c0ef' //Red
    }
  ],
  editable  : false,
  droppable : false, // this allows things to be dropped onto the calendar !!!
  drop      : function(info) {
    // is the "remove after drop" checkbox checked?
    if (checkbox.checked) {
      // if so, remove the element from the "Draggable Events" list
      info.draggedEl.parentNode.removeChild(info.draggedEl);
    }
  },
  initialDate: "2020-01-07",
  initialView: 'timeGridWeek',
  locale: 'pt',
  allDaySlot: false,
  hiddenDays: [0],
  slotMinTime: "09:00:00",
  aspectRatio: 2.115
});

calendar.render();
//$('#calendar').fullCalendar()

})
</script>

@stop
