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
    <hr>
    <h3 class="mt-4">Photos</h3>
    <div class="row mt-5">
        @foreach($images as $row)
            <div class="col-md-4">
                <img src="{{asset("continent")}}/{{$row['photo_path']}}" class="card-img-top" alt="...">
            </div>
        @endforeach
    </div>
    <br><br>
    <b>Continent Name : </b>{{$data['continent_name']}}<br>
    <b>Continent İnformation : </b>{{$information['information_detail']}}

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

</body>
</html>
