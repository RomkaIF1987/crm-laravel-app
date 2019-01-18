@extends('layouts.app')

@section('content')
    <h2> ADD NEW EMPLOYEE FROM {{$company->name}} COMPANY</h2>

    <form action="{{route('employees.store')}}" method="POST" enctype='multipart/form-data'>
        @include('employees.create')
        <input type="submit" class="btn btn-success btn-lg" value="Create new company">
    </form>

@endsection