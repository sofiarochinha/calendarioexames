
@extends('layout.menu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Escolher para exportar</h1>
              <br>
              <button class="btn btn-primary">Exportar PDF</button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/calendarios/">Home</a></li>
              <li class="breadcrumb-item"><a href="#">2020-2021</a></li>
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
                                    <div id="001" class="filtr-item col-sm-2" data-category="1" onclick="selectCourseToExport(this.id)">

                                        <img src="https://via.placeholder.com/300/FFFFFF?text=Tecnologias da Informação" class="img-fluid mb-2" alt="white sample"/>
                                    </div>
                                    <div id="002" class="filtr-item col-sm-2" data-category="2, 4" onclick="selectCourseToExport(this.id)">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=GE" class="img-fluid mb-2" alt="white sample"/>
                                    </div>
                                    <div id="003" class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample" onclick="selectCourseToExport(this.id)">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=EM" class="img-fluid mb-2" alt="white sample"/>
                                    </div>
                                    <div id="004" class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample" onclick="selectCourseToExport(this.id)">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=GC" class="img-fluid mb-2" alt="white sample"/>
                                    </div>
                                    <div id="005" class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample" onclick="selectCourseToExport(this.id)">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=GQ" class="img-fluid mb-2" alt="white sample"/>
                                    </div>
                                    <div id="006" class="filtr-item col-sm-2" data-category="1" data-sort="white sample" onclick="selectCourseToExport(this.id)">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=GP" class="img-fluid mb-2" alt="white sample"/>
                                    </div>
                                    <div id="007" class="filtr-item col-sm-2" data-category="1" data-sort="white sample" onclick="selectCourseToExport(this.id)">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=SCE" class="img-fluid mb-2" alt="white sample"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <<script >
    function selectCourseToExport(id) {
        var e = document.getElementById(id);
        var c = window.getComputedStyle(e).border;
        console.log(c)
        if (c != "10px solid rgb(42, 108, 245)") {
            document.getElementById(id).style.border = "#2A6CF5";
            e.style.border = "10px solid rgb(42, 108, 245)";
            /* document.getElementById(id).style.background = "#2A6CF5"; */
        }
        else{
            e.style.border = "";
            /* document.getElementById(id).style.background = "#f4f6f9"; */
        }
    }
  </script>>
