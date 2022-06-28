@extends("back_layouts.header")
@section("seo_title")
    <title>İndex</title>
@endsection
@section("content")

    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(session("status"))
                                    <div class="alert alert-{{session("status")["type"]}}">
                                        {{session("status")["text"]}}
                                    </div>
                                @endif
                                <table id="myTable" class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Continent Name</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td><?php echo $row->continent_name ?></td>
                                            <td>
                                                <a class="btn btn-success"
                                                   href="{{route("panel.continent.edit",$row->id)}}">
                                                    Edit Continent
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                   href="{{route("panel.continent.delete",$row->id)}}">
                                                    Delete Continent
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section("customjs")
    <script>
        $('#myTable').DataTable({});
    </script>
@endsection
@endsection
