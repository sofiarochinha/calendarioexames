@extends('layout.menu')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Curso</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Calendário Atual</a></li>
              <li class="breadcrumb-item active">Curso</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div>
                                <div class="filter-container p-0 row">
                                    <div class="filtr-item col-sm-2" data-category="1" style="height: 250px;">
                                      <a href=/calendario-atual/{{'TI'}} data-toggle="lightbox" data-title="sample 2 - black">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Tecnologias informação</div>
                                        </div>
                                      </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4" style="height: 250px;">
                                        <a href=/calendario-atual/{{'EMI'}} data-toggle="lightbox" data-title="sample 2 - black">
                                          <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                              <div class="text-center text-muted">Eletrónica e Mecânica Industrial</div>
                                          </div>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="3, 4" style="height: 250px;">
                                      <a href=/calendario-atual/{{'GC'}} data-toggle="lightbox" data-title="sample 2 - black">
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Gestão Comercial</div>
                                        </div>
                                      </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="3, 4" style="height: 250px;">
                                    <a href=/calendario-atual/{{'GQ'}}>
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Gestão Qualidade</div>
                                        </div>
                                    </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4" style="height: 250px;">
                                    <a href=/calendario-atual/{{'GP'}}>
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Gestão Pública</div>
                                        </div>
                                    </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="1" style="height: 250px;">
                                    <a href=/calendario-atual/{{'SCE'}}>
                                        <div class="bg-white d-flex align-items-center justify-content-center" style="height: 97%;">
                                            <div class="text-center text-muted">Secretariado e Comunicação Empresarial</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--</div>-->
                    </div>
                  </div>
                </div>
              </div>
            <!--</div>-->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@stop
