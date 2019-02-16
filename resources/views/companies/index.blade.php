@extends('layouts.app')

@section('content')
    @auth
        <div style="padding: 20px">
            <a class="btn btn-success" href="{{route('companies.create')}}" role="button">Create new Company</a>
        </div>
    @endauth
    <div class="container" style="padding: 50px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Companies list</th>
                    </tr>
                    <tr>
                        <td>
                            <table class="table table-bordered" id="table_id">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Website</th>
                                    {{--@auth--}}
                                    <th scope="col">Actions</th>
                                    {{--@endauth--}}
                                </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        </div>
        @endsection
        @section('javascript')
            <script>
                $(document).ready(function () {
                    $('#table_id').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '/get_datatable',
                        columns: [
                            {data: "id"},
                            {
                                data: "logo", render: function (data) {
                                    return '<img src="storage/logo_companies/' + data + '" style="width:50px;height:50px;" />';
                                }
                            },
                            {data: "name"},
                            {data: "email"},
                            {data: "website"},
                            {data: "actions"}
                        ],
                        lengthMenu: [[2, 3, -1], [2, 3, "ALL"]]
                    });
                });
            </script>
@endsection