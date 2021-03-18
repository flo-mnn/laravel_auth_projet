@extends('home')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <h1></h1>
    {{-- form edit --}}
@endsection