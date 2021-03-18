@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="row justify-content-center">
        <div class="col-md-3 bg-primary text-light font-weight-bold">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span>Welcome {{ }}</span>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
@endsection
