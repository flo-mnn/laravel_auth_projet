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
          <th scope="col">Category</th>
          <th scope="col">Edit</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @if(count($categories) == 0)
        <tr>
            <td colspan="4">
                No category yet, please add one below
            </td>
        </tr>
        @else
        @foreach ($categories as $category)
        <tr>
          <th scope="row">{{$category->id}}</th>
          <td>{{$category->category}}</td>
          <td><form action="/categories/{{$category->id}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="text" name="category" value="{{old('category') ? old('category') : $category->category}}">
            <button type="submit" class="btn btn-warning">edit</button>
        </form></td>
          <td>
              <form action="/categories/{{$category->id}}" method="POST">
            @csrf
        @method('DELETE')
                <button type="submit" class="btn btn-danger">del</button>
        </form>
          </td>
        </tr>
        @endforeach
        @endif
        <tr>
            <td colspan="4">
                <form action="/categories" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="category">
                    <button type="submit" class="btn btn-primary my-2">add category</button>
                </form>
            </td>
        </tr>
      </tbody>
    </table>
</div>
@endsection