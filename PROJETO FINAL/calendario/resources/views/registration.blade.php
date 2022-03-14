<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ua Calendar | Registo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1><b>Ua Calendar</b></h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Criar uma nova conta</p>

            <form action="{{ route('register.custom') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="O seu nome" name="name" required autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Palavra-passe" name="password" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Registar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">Eu já tenho conta</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{(asset('/plugins/jquery/jquery.min.js'))}}"></script>
<!-- Bootstrap 4 -->
<script src="{{(asset('plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
<!-- AdminLTE App -->
<script src="{{(asset('/dist/js/adminlte.min.js'))}}s"></script>
</body>
</html>
