<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="/sb_admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="/sb_admin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        @if ($msgType != '')
            <div class="col-8 mx-auto mt-3">
                <div class="alert alert-{{$msgType}} alert-dismissible fade show" role="alert">
                    <strong>{{ucwords($msgType)}}</strong> {{$msgStr}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="row justify-content-center mt-3">
            <div class="col-xl-5 col-lg-5 col-sm-7 col-xs-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-header">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900">Login</h1>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <form class="user" action="/login" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control form-control-user" placeholder="Username..." autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password...">
                            </div>
                            <button type="submit" name="sumbit" class="btn btn-primary btn-user btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
                            <hr>
                        </form>
                        <div class="text-center">
                            <a class="small" href="/register">Buat Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/sb_admin2/vendor/jquery/jquery.min.js"></script>
    <script src="/sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/sb_admin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sb_admin2/js/sb-admin-2.min.js"></script>

</body>

</html>
