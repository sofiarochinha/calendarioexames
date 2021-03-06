<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{(asset('plugins/fontawesome-free/css/all.min.css'))}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css'))}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{(asset('dist/css/adminlte.min.css'))}}">
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h1"><b>Ua Calendar</b></a>
        </div>
        <div class="card-body">

            <form action="{{route("login.custom")}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email" required autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                @if (session()->has('message'))
                    <span class="text-danger">{{ session()->get('message') }}</span>
                @endif

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                </div>
            </form>
            <div>
                <button class="btn">
                    <a href="{{route("register-user")}}" class="text-center">Criar nova conta</a>
                </button>
            </div>

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{(asset('plugins/jquery/jquery.min.js'))}}"></script>
<!-- Bootstrap 4 -->
<script src="{{(asset('plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
<!-- AdminLTE App -->
<script src="{{(asset('dist/js/adminlte.min.js'))}}"></script>
</body>
</html>
