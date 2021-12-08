@extends('layout.menu')
@section('curso')

    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                    <div class="filtr-item col-sm-2" data-category="1">
                                        <a href=/calendarios/atual/{{'TI'}}>
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=Tecnologias da Informação" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4">
                                        <a href=/calendarios/atual/{{'GE'}} data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=GE" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                        <a href=/calendarios/atual/{{'EM'}} data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=EM" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                        <a href=/calendarios/atual/{{'text'}} data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=text" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                        <a href=/calendarios/atual/{{'text'}} data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=text" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                        <a href=/calendarios/atual/{{'text'}} data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=text" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                        <a href=/calendarios/atual/{{'text'}} data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=text" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                        <a href=/calendarios/atual/{{'text'}} data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=text" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
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


    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>

@stop
