<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    @yield("seo_title")

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/font-awesome/css/all.min.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/perfectscroll/perfect-scrollbar.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/plugins/apexcharts/apexcharts.css")}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>

    <link href="{{asset("back/assets/css/main.min.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/css/dark-theme.css")}}" rel="stylesheet">
    <link href="{{asset("back/assets/css/custom.css")}}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="page-container">
    <div class="page-header">
        <nav class="navbar navbar-expand-lg d-flex justify-content-between">
            <div class="" id="navbarNav">
                <ul class="navbar-nav" id="leftNav">
                    <li class="nav-item">
                        <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("panel.index")}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("panel.profile")}}">Profile Settings</a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
@include("back_layouts.sidebar")
@yield("content")
@include("back_layouts.footer")
