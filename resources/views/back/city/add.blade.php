@extends("back_layouts.header")
@section("seo_title")
    <title>Add City</title>
@endsection
@section("content")

    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @if(session("status"))
                                <div class="alert alert-{{session("status")["type"]}} mb-3">
                                    {{session("status")["text"]}}
                                </div>
                            @endif
                            <form action="{{route("panel.city.addCity")}}" enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        City Name
                                    </label>
                                    <input type="text" value="{{old("countryname")}}" placeholder="City Name"
                                           class="form-control" name="cityname">
                                    @error("cityname")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Continent
                                    </label>
                                    <select name="continent" class="form-control continent" style="color: white">
                                        <option value="0">
                                            Select Continent
                                        </option>
                                        @foreach(\App\Models\continents::all() as $row)
                                            <option @if($row->id==old("continent")) selected
                                                    @endif value="{{$row->id}}">
                                                {{$row->continent_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error("continent")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Country
                                    </label>
                                    <select name="country" class="form-control country" style="color: white">

                                    </select>
                                    @error("country")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Information
                                    </label>
                                    <textarea style="color: white" class="form-control" rows="5" name="information" placeholder="İnformation">{{old("information")}}</textarea>
                                    @error("information")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Image
                                    </label>
                                    <input type="file" class="form-control" multiple name="images[]">
                                    @error("images")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-success" value="Add Country">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section("customjs")
    <script>
        $(".continent").on("change",function () {
            $.ajax({
                url  : "{{route("panel.city.ajax")}}",
                type : "POST",
                data : {
                    "_token":"{{csrf_token()}}",
                    "getcountry":"ok",
                    "continent":$(".continent").val()
                },
                success:function (result){
                    $(".country").html(result)
                }
            });
        })
    </script>
@endsection
@endsection
