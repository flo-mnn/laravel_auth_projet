@extends('home')
@section('home-content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="text-right">
    <h1 class="text-primary">Find and manage users here</h1>
</div>
<div class="separator rounded bg-primary" style="height: 3px;">
</div>
<div>

</div>
    {{-- table with for each,user id name last name and  show--}}
  <table class="table table-striped table-primary mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col"><a href="{{route('users.create')}}" class="btn btn-light text-primary font-weight-bold">Add user</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td><a href="/users/{{$user->id}}" class="btn btn-light rounded-circle text-primary text-right"><i class="fas fa-address-card"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection