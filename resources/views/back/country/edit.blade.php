@extends("back_layouts.header")
@section("seo_title")
    <title>Edit Country</title>
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
                            <form action="{{route("panel.country.editCountry",$data['id'])}}" enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Country Name
                                    </label>
                                    <input type="text" value="{{$data["country_name"]}}" placeholder="Country Name"
                                           class="form-control" name="countryname">
                                    @error("countryname")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Continent
                                    </label>
                                    <select name="continent" class="form-control" style="color: white">
                                        <option value="0">
                                            Select Continent
                                        </option>
                                        @foreach(\App\Models\continents::all() as $row)
                                            <option @if($row->id==$data['country_continent']) selected
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
                                        İnformation
                                    </label>
                                    <textarea style="color: white" class="form-control" rows="5" name="information" placeholder="İnformation">{{$information['information_detail']}}</textarea>
                                    @error("information")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        İmage
                                    </label>
                                    <input type="file" class="form-control" multiple name="images[]">
                                    @error("images")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        @foreach($images as $row)

                                            <div style="border: 1px solid white;padding: 5px; margin-right: 5px;" class="col-md-3">
                                                <img style="max-width: 100%" src="{{asset("country")}}/{{$row['photo_path']}}" alt=""><br><br>
                                                <button type="button" class="deleteimage" data="{{$row['id']}}">
                                                    Delete Photo
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-success" value="Edit Country">
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

            $(".deleteimage").on("click",function () {
                $.ajax({
                    url  : "{{route("panel.country.deleteimage")}}",
                    type : "POST",
                    data : {
                        "_token":"{{csrf_token()}}",
                        "deleteimage":"ok",
                        "image":$(this).attr("data")
                    },
                    success:function (result){
                        if(result=="ok") {
                            alert("photo deleted")
                            window.location.reload()
                        }else if(result=="no") {
                            alert("System error occurred.")
                        }else if(result=="nodata") {
                            alert("System error occurred.")
                        }else {
                            console.log(result)
                        }
                    }
                });
            })
        </script>
    @endsection

@endsection
