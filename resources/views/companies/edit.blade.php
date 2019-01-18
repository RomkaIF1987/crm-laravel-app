@extends('layouts.app')

@section('content')

    <h2> EDIT COMPANY - {{$company->name}}</h2>

    <form action="{{route('companies.update',['company' => $company->id])}}" method="POST"
          enctype='multipart/form-data'>
        @method('Patch')
        @include('companies.partials.form')
        <input type="submit" class="btn btn-success btn-lg" value="Update company">
    </form>

@endsection