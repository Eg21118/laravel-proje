<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    @include("front_layouts.navbar")

    <h3 class="mb-1 mt-4">Continents</h3>
    <div class="row mt-5">
        @foreach(\App\Models\continents::all() as $row)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset("continent")}}/{{\App\Models\photos::getSinglePhoto($row->id,"continent")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$row->continent_name}}</h5>
                        <p class="card-text">{{substr(\App\Models\information::getİnformation($row->id,"continent"),0,200)}}</p>
                        <a href="{{route("continents.detail",$row->id)}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <h3 class="mb-1 mt-4">Countries</h3>
    <div class="row mt-5">
        @foreach(\App\Models\countries::all() as $row)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset("country")}}/{{\App\Models\photos::getSinglePhoto($row->id,"country")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$row->country_name}}</h5>
                        <p class="card-text">{{substr(\App\Models\information::getİnformation($row->id,"country"),0,200)}}</p>
                        <a href="{{route("countries.detail",$row->id)}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <h3 class="mb-1 mt-4">Cities</h3>
    <div class="row mt-5">
        @foreach(\App\Models\cities::all() as $row)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset("city")}}/{{\App\Models\photos::getSinglePhoto($row->id,"city")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$row->city_name}}</h5>
                        <p class="card-text">{{substr(\App\Models\information::getİnformation($row->id,"city"),0,200)}}</p>
                        <a href="{{route("cities.detail",$row->id)}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

</body>
</html>
