@extends('layout.menu')
@section('content')

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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="sticky-top mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Curso</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Selecione um curso..." style="width: 100%;">
                                            @foreach($courses as $course)
                                                       @if(old('courses') == $course->name)
                                                            <option value="{{$course->id}}" selected>{{ $course->name}}</option>
                                                            @else
                                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endif
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
                                        <select class="select2" multiple="multiple"
                                                data-placeholder="Selecione um curso" style="width: 100%;">
                                            <option>1º ano</option>
                                            <option>2º ano</option>
                                            <option>3º ano</option>
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
                                        <select class="select2" multiple="multiple" data-placeholder="Selecione um curso..." style="width: 100%;">
                                            @foreach($evaluation_season as $season)
                                                @if(old('evaluation_season') == $season->evaluation_season)
                                                                <option value="{{$season->id}}" selected>{{ $season->evaluation_season}}</option>
                                                             @else
                                                        <option value="{{ $season->id }}">{{ $season->evaluation_season }}</option>
                                                    @endif
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
                    <a href="{{route('calendarioatual')}}"><input type="submit" value="Criar Calendário"
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
    <script>
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
