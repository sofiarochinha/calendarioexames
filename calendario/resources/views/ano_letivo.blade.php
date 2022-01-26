@extends('layout.menu')
@section('ano_letivo')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ano letivo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Ano letivo</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Atual ano letivo - 2021-2022</h4>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="filter-container p-0 row">
                                        <div class="filtr-item col-sm-2" data-category="1">
                                            <a href="/calendarios/2021-2022/TI">
                                                <div>
                                                    <h3>Tecnologias informação</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4">
                                            <a href="/calendarios/2021-2022/EMI">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=EMI"
                                                     class="img-fluid mb-2" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                            <a href="/calendarios/2021-2022/EE">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=EE"
                                                     class="img-fluid mb-2" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                            <a href="/calendarios/2021-2022/GC">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=GC"
                                                     class="img-fluid mb-2" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                            <a href="/calendarios/2021-2022/GQ">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=GQ"
                                                     class="img-fluid mb-2" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="/calendarios/2021-2022/GP">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=GP"
                                                     class="img-fluid mb-2" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="/calendarios/2021-2022/SCE">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=SCE"
                                                     class="img-fluid mb-2" alt="white sample"/>
                                            </a>
                                        </div>
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
                                        <a href=/calendarios/{{'2020-2021'}}>
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2020-2021"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4">
                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2019-2020"
                                           data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2019-2020"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2018-2019"
                                           data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2018-2019"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2017-2018"
                                           data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2017-2018"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2016-2017"
                                           data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2016-2017"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2016-2017"
                                           data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2016-2017"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2015-2016"
                                           data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2015-2016"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2014-2015"
                                           data-toggle="lightbox" data-title="sample 2 - black">
                                            <img src="https://via.placeholder.com/300/FFFFFF?text=2014-2015"
                                                 class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                    </div>
                                    <!--<div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                      <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=2" class="img-fluid mb-2" alt="white sample"/>
                                      </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                      <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=2" class="img-fluid mb-2" alt="white sample"/>
                                      </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                      <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=2" class="img-fluid mb-2" alt="white sample"/>
                                      </a>
                                    </div>
                                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                      <a href="https://via.placeholder.com/1200/FFFFFF.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                                        <img src="https://via.placeholder.com/300/FFFFFF?text=2" class="img-fluid mb-2" alt="white sample"/>
                                      </a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <!--</div>-->
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4">
                        <a href="/calendarios/2019-2020">
                            <img src="https://via.placeholder.com/300/FFFFFF?text=2019-2020" class="img-fluid mb-2"
                                 alt="white sample"/>
                        </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                        <a href="/calendarios/2018-2019">
                            <img src="https://via.placeholder.com/300/FFFFFF?text=2018-2019" class="img-fluid mb-2"
                                 alt="white sample"/>
                        </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                        <a href="/calendarios/2017-2018">
                            <img src="https://via.placeholder.com/300/FFFFFF?text=2017-2018" class="img-fluid mb-2"
                                 alt="white sample"/>
                        </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                        <a href="/calendarios/2016-2017">
                            <img src="https://via.placeholder.com/300/FFFFFF?text=2016-2017" class="img-fluid mb-2"
                                 alt="white sample"/>
                        </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                        <a href="/calendarios/2015-2016">
                            <img src="https://via.placeholder.com/300/FFFFFF?text=2015-2016" class="img-fluid mb-2"
                                 alt="white sample"/>
                        </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                        <a href="/calendarios/2014-2015">
                            <img src="https://via.placeholder.com/300/FFFFFF?text=2014-2015" class="img-fluid mb-2"
                                 alt="white sample"/>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </div>
    </div>
    </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.content-wrapper -->


    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function () {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@stop