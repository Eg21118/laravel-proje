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
                            <form action="{{route("panel.continent.addContinent")}}" enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Continent Name
                                    </label>
                                    <input type="text" value="{{old("continentname")}}" placeholder="Continent Name"
                                           class="form-control" name="continentname">
                                    @error("continentname")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        İnformation
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
                                        İmage
                                    </label>
                                    <input type="file" class="form-control" multiple name="images[]">
                                    @error("images")
                                    <small style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-success" value="Add Continent">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
