@extends('layouts.app')

@section('content')
    <h2> ADD NEW EMPLOYEE FROM COMPANY</h2>

    <form action="{{route('employees.store')}}" method="POST">
        @include('employees.partials.form')
        <div>
            <input type="hidden" name="company_id" value="{{old('company_id') ?? $company_id}}">
        </div>
        <input type="submit" class="btn btn-success btn-lg" value="Add new employee">
    </form>

@endsection