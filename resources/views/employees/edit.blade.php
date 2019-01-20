@extends('layouts.app')

@section('content')
    <h2> EDIT EMPLOYEE FROM {{$company->name}} COMPANY</h2>

    <form action="{{route('employees.update', ['employee' => $employee->id])}}" method="POST">
        @method('Patch')
        @include('employees.partials.form')
        <div> Choose Company
            <select class="form-control {{$errors->has('company_id') ? 'is-invalid' : ''}}" name="company_id"
                    id="company_id">
                @foreach($companies as $company)
                    <option value="{{old('company_id') ?? $company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-success btn-lg" value="Add new employee" style="margin: 20px 0">
    </form>

@endsection