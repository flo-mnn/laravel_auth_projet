@extends('home')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <h1>hello users</h1>
    {{-- table with for each,user id name last name and  show--}}
@endsection