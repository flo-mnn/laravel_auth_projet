@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="row justify-content-center">
        <div class="col-md-3 bg-primary text-light font-weight-bold" style="height: 100vh; position: fixed; top: 0; left: 0; padding-top: 100px;">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="text-right mx-3">Welcome <span class="text-capitalize">{{Auth::user()->name}}</span></h5>
                    <div class="px-3">
                        <a href="{{route('users.index')}}" class="btn btn-light text-primary font-weight-bold my-2">Users</a><br>
                        <a href="{{route('avatars.index')}}" class="btn btn-light text-primary font-weight-bold my-2">Avatars</a><br>
                        <a href="{{route('images.index')}}" class="btn btn-light text-primary font-weight-bold my-2">Images</a><br>
                        <a href="{{route('categories.index')}}" class="btn btn-light text-primary font-weight-bold my-2">Image Categories</a><br>
                    </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-9">
            @yield('home-content')
        </div>
    </div>
</div>
@endsection
