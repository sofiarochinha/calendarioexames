
@extends('layout.menu')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Exportar calendários</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/calendario-atual">Calendário Atual</a></li>
              <li class="breadcrumb-item active">Exportar</li>
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
                                <option>Todos</option>
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
                                <option>Todos</option>
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
                                <option>Todas</option>
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
                                <option>Todos</option>
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
                                <option>Todos</option>
                                <option>1º</option>
                                <option>2º</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div>
                                <div class="filter-container p-0 row">
                                    <div id="001" class="filtr-item col-sm-2" data-category="1" style="height: 250px;" onclick="selectCourseToExport(this.id)">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Tecnologias informação</div>
                                        </div>
                                    </div>
                                    <div id="002" class="filtr-item col-sm-2" data-category="2, 4" style="height: 250px;" onclick="selectCourseToExport(this.id)">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Eletrónica e Mecânica Industrial</div>
                                        </div>
                                    </div>
                                    <div id="003" class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample" style="height: 250px;" onclick="selectCourseToExport(this.id)">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Gestão Comercial</div>
                                        </div>
                                    </div>
                                    <div id="004" class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample" style="height: 250px;" onclick="selectCourseToExport(this.id)">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Gestão Qualidade</div>
                                        </div>
                                    </div>
                                    <div id="005" class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample" style="height: 250px;" onclick="selectCourseToExport(this.id)">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Gestão Pública</div>
                                        </div>
                                    </div>
                                    <div id="006" class="filtr-item col-sm-2" data-category="1" data-sort="white sample" style="height: 250px;" onclick="selectCourseToExport(this.id)">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Secretariado e Comunicação Empresarial</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-primary">
                        Exportar PDF &nbsp;
                        <i class="fas fa-file-pdf"></i>                  
                        </button>
                    </div>
                </div>
        </section>
              </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <script >
    function selectCourseToExport(id) {
        var e = document.getElementById(id);
        var c = window.getComputedStyle(e).border;
        console.log(c)
        if (c != "5px solid rgb(42, 108, 245)") {
            document.getElementById(id).style.border = "#2A6CF5";
            e.style.border = "5px solid rgb(42, 108, 245)";
            /* document.getElementById(id).style.background = "#2A6CF5"; */
        }
        else{
            e.style.border = "";
            /* document.getElementById(id).style.background = "#f4f6f9"; */
        }
    }
  </script>

@stop

