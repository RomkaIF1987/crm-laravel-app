@extends('layouts.app')

@section('content')
    <h2 class="text-center"> CREATE A NEW COMPANY</h2>

    <form action="{{route('companies.store')}}" method="POST" enctype='multipart/form-data' style="padding: 20px">
        @include('companies.partials.form')
        <input type="submit" class="btn btn-success btn-lg" value="Create new company">
    </form>

@endsection