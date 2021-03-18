@extends('home')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <h1>hello images</h1>
    {{-- sections by category, with inputs selected with selected on proper category below hidden, on click-> appears --}}
@endsection