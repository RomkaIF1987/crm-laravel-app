@extends('layouts.app')

@section('content')
    <h2> Company {{$company->name}}</h2>

    @auth
        <div style="padding: 20px">
            <a class="btn btn-success" href="{{route('employees.create', ['company' => $company->id])}}" role="button">Add
                new Employee</a>
        </div>
    @endauth
    <div class="table-responsive" style="padding: 50px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Employees list</th>
            </tr>
            <tr>
                <td>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            @auth
                                <th scope="col">Actions</th>
                            @endauth
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($company->employees as $employee)
                            <tr>
                                <th scope="row" class="text-center">{{$employee->id}}</th>
                                <td class="text-center">{{$employee->first_name}}</td>
                                <td class="text-center">{{$employee->last_name}}</td>
                                <td class="text-center">{{$employee->email}}</td>
                                <td class="text-center">{{$employee->phone}}</td>
                                @auth
                                    <td>
                                        <a href="{{route('employees.edit', ['employee' => $employee->id])}}"
                                           class="btn btn-primary">Edit</a>
                                        <form action="{{route('employees.destroy', ['$employee' => $employee])}}"
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