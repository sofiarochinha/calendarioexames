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
                            <li class="breadcrumb-item"><a href="{{route('calendarioatual')}}"></a></li>
                            <li class="breadcrumb-item active">Criar Calendário</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <section class="content" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Curso</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Selecione um curso..." style="width: 100%;" id="course">
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
                                        <select class="select2" multiple="multiple" id="ano"
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
                                        <select class="select2" multiple="multiple" data-placeholder="Selecione um curso..." style="width: 100%;" id="epoca">
                                            @foreach($evaluation_season as $season)
                                                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                                                 @endforeach
                                            </select>
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
                    <a onclick="getdata()" ><input type="submit" value="Criar Calendário"
                                                        class="btn btn-primary float-right"></a>
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>

<!-- jQuery -->
<script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
<!-- Toastr -->
<script src="{{(asset('/plugins/toastr/toastr.min.js'))}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var $teste = $('#course');
    $teste.change(function(){
        var valcourse = $('#course').val();
        console.log(valcourse);
        var anostring = "";
        jQuery.each(valcourse, function(i, val){

            @foreach ($coursesall as $course)
                if (val == {!!$course->course_code!!}) {
                        anostring += '<option value="{{ $course->id }}">{{ $course->name }} - {{$course->course_year}}º Ano</option>';
            }

            @endforeach
        });
        console.log(anostring);
        $("#ano").html(anostring);
    });


    function getdata(){
        $valano = $('#ano').val();
        $valepoca= $('#epoca').val();
        if($valano.length != 0 && $valepoca.length != 0){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('enviardados')}}",
                {
                    ano: JSON.stringify($valano),
                    epoca: JSON.stringify($valepoca)

                })
            window.location.href = "{{ route('calendarioatual')}}";
        }
    }

     // * cookie shennanigans
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
     }

     checkCSV()
     //* End of cookie shenannigans

    </script>>






@stop
