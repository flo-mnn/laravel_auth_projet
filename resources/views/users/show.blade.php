@extends('home')
@section('home-content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="text-right">
    <h1 class="text-primary text-capitalize">{{$user->name}}'s profile</h1>
</div>
<div class="separator rounded bg-primary" style="height: 3px;">
</div>
<div class="container d-flex justify-content-center mt-5">
    <div class="profile w-50 border border-primary rounded">
        <div class="profile-head w-100 bg-primary text-light d-flex justify-content-between">
            <h1 class="text-capitalize mx-1">{{$user->name}}</h1>
            <div class="d-flex">
                <a href="/users/{{$user->id}}/edit" class="btn btn-transparent text-warning mx-2"><i class="fas fa-user-edit"></i></a>
                <form action="/users/{{$user->id}}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-transparent text-danger mx-2"><i class="fas fa-user-minus"></i></button>
                </form>
            </div>
        </div>
        <div class="profile-body d-flex flex-column align-items-center">
            <img src="/storage/img/{{$user->avatars->src}}" alt="" width="200">
            <span class="text-muted">{{$user->age}} y. old</span>
            <h5>{{$user->email}}</h5>
        </div>
    </div>
</div>
    {{-- mini profil --}}
@endsection