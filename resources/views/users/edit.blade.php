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
<form action="/users/{{$user->id}}" method="POST">
    @csrf
    @method('PATCH')
<div class="container d-flex justify-content-center mt-5">
    <div class="profile w-50 border border-primary rounded">
        <div class="profile-head w-100 bg-primary text-light d-flex justify-content-between">
            <h1 class="text-capitalize mx-1"><input type="text" class="form-control" name="name" value="{{old('name')? old('name') : $user->name}}"></h1>
            <div class="d-flex">
                <a href="/users" class="text-dark font-weight-bold mx-2">back</a>
            </div>
        </div>
        <div class="profile-body d-flex flex-column align-items-center">
            <img src="/storage/img/{{$user->avatars->src}}" alt="" width="200">
            <div class="form-check form-check-inline my-2">
                @foreach ($avatars as $avatar)
                <div class="col d-flex flex-column align-items-center">
                    <label class="form-check-label" for="avatar{{$loop->iteration}}">
                    <img src="/storage/img/{{$avatar->src}}" alt="avatar" width="50">
                    </label><br>
                    @if ($user->avatars->id == $avatar->id)
                    <input class="form-check-input" type="radio" id="avatar{{$loop->iteration}}" value="{{$avatar->id}}" name="avatar_id" checked>
                    @else 
                    <input class="form-check-input" type="radio" id="avatar{{$loop->iteration}}" value="{{$avatar->id}}" name="avatar_id">
                    @endif
                </div>
                @endforeach
            </div>
            <span class="text-muted"><input type="number" class="form-control my-2" name="age" value="{{old('age')? old('age') : $user->age}}"></span>
            <h5><input type="email" name="email" class="form-control my-2" value="{{old('email')? old('email') : $user->email}}"></h5>
            <button type="submit" class="btn btn-primary my-2 text-right mx-2">Update</button>
        </div>
    </div>
</div>
</form>
@endsection