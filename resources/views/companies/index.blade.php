@extends('layouts.app')

@section('content')
    @auth
        <div style="padding: 20px">
            <a class="btn btn-success" href="{{route('companies.create')}}" role="button">Create new Company</a>
        </div>
    @endauth
    <div class="table-responsive" style="padding: 50px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Companies list</th>
            </tr>
            <tr>
                <td>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            @auth
                                <th scope="col">Actions</th>
                            @endauth
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <th scope="row" class="text-center">{{$company->id}}</th>
                                <td class="text-center"><a
                                            href="{{route('companies.show', ['id' => $company->id])}}"><img
                                                src="storage/logo_companies/{{$company->logo}}" width="70"
                                                height="70"></a></td>
                                <td class="text-center"><a
                                            href="{{route('companies.show', ['id' => $company->id])}}">{{$company->name}}</a>
                                </td>
                                <td class="text-center">{{$company->email}}</td>
                                <td class="text-center">{{$company->website}}</td>
                                @auth
                                    <td>
                                        <a href="{{route('companies.edit', ['id' => $company->id])}}"
                                           class="btn btn-primary">Edit</a>
                                        <form action="{{route('companies.destroy', ['$company' => $company])}}"
                                              method="POST"
                                              style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            </thead>
        </table>
    </div>
@endsection