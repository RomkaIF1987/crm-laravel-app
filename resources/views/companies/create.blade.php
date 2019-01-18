@extends('layouts.app')

@section('content')
    <h2> CREATE A NEW COMPANY</h2>

    <form action="{{route('companies.store')}}" method="POST" enctype='multipart/form-data'>
        @include('companies.partials.form')
        <input type="submit" class="btn btn-success btn-lg" value="Create new company">
    </form>

@endsection