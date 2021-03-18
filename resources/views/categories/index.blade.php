@extends('home')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <h1>categories</h1>
    {{-- foreach, edit and delete btn in a table with add one in the thead --}}
@endsection