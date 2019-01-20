@extends('layouts.app')

@section('content')
    <h2> EDIT EMPLOYEE FROM {{$company->name}} COMPANY</h2>

    <form action="{{route('employees.update')}}" method="POST">
        @include('employees.partials.form')

        <select class="form-control">
            @foreach($companies as $company)
                <option>{{$company->name}}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-success btn-lg" value="Add new employee">
    </form>

@endsection