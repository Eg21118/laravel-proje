<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <title>Register Page</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/font-awesome/css/all.min.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/perfectscroll/perfect-scrollbar.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/apexcharts/apexcharts.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/css/main.min.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/css/dark-theme.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/css/custom.css")}}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class='loader'>
    <div class='spinner-grow text-primary' role='status'>
        <span class='sr-only'>Loading...</span>
    </div>
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-4">
            <div class="card login-box-container">
                <div class="card-body">
                    <div class="authent-logo">
                        <img src="../../assets/images/logo@2x.png" alt="">
                    </div>
                    <div class="authent-text">
                        <p>Login</p>
                        @if(session("status"))
                            <div class="alert alert-{{session("status")['type']}} mt-2 mb-4">
                                {{session("status")['text']}}
                            </div>
                        @endif
                    </div>

                    <form action="{{route("panel.register_post")}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                                <label for="floatingInput">Email</label>
                                @error("email")
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error("password")
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-info m-b-xs">Register</button>
                        </div>
                    </form>
                    <a href="{{route("panel.login")}}">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Javascripts -->
<script src="{{asset("back/assets/plugins/jquery/jquery-3.4.1.min.js")}}"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{asset("back/assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{asset("back/assets/plugins/perfectscroll/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("back/assets/plugins/apexcharts/apexcharts.min.js")}}"></script>
<script src="{{asset("back/assets/js/main.min.js")}}"></script>
<script src="{{asset("back/assets/js/pages/dashboard.js")}}"></script>
</body>
</html>
