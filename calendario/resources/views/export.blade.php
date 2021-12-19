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
                    <div class="col-12">
                        <div class="card-body">
                            <div>
                                <div id="checkboxes">
                                    <label><h3>Escolha quais cursos pretende exportar</h3></label>
                                <table  id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nome Curso</th>
                                        <th>Código</th>
                                        <th>Exportar?</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="export_checkbox_00666">
                                        <td><div  contenteditable>Tecnologias informação</div></td>
                                        <td><div contenteditable>00666</div></td>
                                        <td><div contenteditable><input type="checkbox"></div></td>
                                    </td>
                                    </tr>
                                    <tr id="export_checkbox_30566">
                                        <td><div  contenteditable>Eletrónica e Mecânica Industrial</div></td>
                                        <td><div contenteditable>30566</div></td>
                                        <td><div contenteditable><input type="checkbox"></div></td>
                                    </td>
                                    </tr>
                                    <tr id="export_checkbox_51894">
                                        <td><div  contenteditable>Gestão Comercial</div></td>
                                        <td><div contenteditable>51894</div></td>
                                        <td><div contenteditable><input type="checkbox"></div></td>
                                    </td>
                                    </tr>
                                    <tr id="export_checkbox_07777">
                                        <td><div  contenteditable>Gestão Qualidade</div></td>
                                        <td><div contenteditable>07777</div></td>
                                        <td><div contenteditable><input type="checkbox"></div></td>
                                    </td>
                                    </tr>
                                    <tr id="export_checkbox_42069">
                                        <td><div  contenteditable>Gestão Pública</div></td>
                                        <td><div contenteditable>42069</div></td>
                                        <td><div contenteditable><input type="checkbox"></div></td>
                                    </td>
                                    </tr>
                                    <tr id="export_checkbox_42069">
                                        <td><div  contenteditable>Secretariado e Comunicação Empresarial</div></td>
                                        <td><div contenteditable>20069</div></td>
                                        <td><div contenteditable><input type="checkbox"></div></td>
                                    </td>
                                    </tr>
                                    </tfoot>
                                </table>
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

  <!-- <script >
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
       </script> -->

@stop
