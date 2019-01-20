@extends('layouts.app')

@section('content')

    <h2 class="text-center"> EDIT COMPANY - {{$company->name}}</h2>

    <form action="{{route('companies.update',['company' => $company->id])}}" method="POST"
          enctype='multipart/form-data' style="padding: 20px">
        @method('Patch')
        @include('companies.partials.form')
        <input type="submit" class="btn btn-success btn-lg" value="Update company">
    </form>

@endsection