@extends('home')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <h1>hello avatars</h1>
    {{-- loop for with 1+5 slots, first one no delete possibility --}}
    {{-- modal for edit and add --}}
@endsection