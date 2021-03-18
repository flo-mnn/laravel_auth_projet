@extends('home')
@section('home-content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="text-right">
    <h1 class="text-primary">Manage your images here</h1>
    <p class="text-muted">Add your first image to erase the template ones and start your new gallery!</p>
</div>
<div class="separator rounded bg-primary" style="height: 3px;">
</div>
<div class="d-flex flex-column align-items-center">

    @if(count($categories) == 0)
        <div class="w-75 rounded bg-primary mt-5 p-2">
            <h5 class="text-light">no images category yet, please add one below</h5>
            <form action="/categories" method="POST">
                @csrf
                <input type="text" class="form-control" name="category">
                <button type="submit" class="btn btn-light text-primary my-2">add category</button>
            </form>
        </div>
    @else
        @foreach ($categories->sortBy('category') as $category)
        <h1 class="w-100 bg-primary text-light px-3 mb-0 py-1 text-capitalize {{$loop->iteration == 1 ? 'mt-5' : 'mt-2'}}">{{$category->category}} images</h1>
        <table class="table table-striped table-primary mb-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4">
                        <form action="/images" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="src" id="" class="form-control">
                            <input type="number" value="{{$category->id}}" class="d-none" name="category_id">
                            <button type="submit" class="btn btn-primary my-2">add image</button>
                        </form>
                    </td>
                </tr>
            @if(count($images->where('category_id',$category->id)) == 0)
            <tr>
                <td colspan="4">
                    No images in this category , please add one above
                </td>
            </tr>
            @else
                @foreach ($images->where('category_id',$category->id)->sortByDesc('created_at') as $image)
                <tr>
                    <th scope="row">{{$image->id}}</th>
                    <td><img src="storage/img/{{$image->src}}" alt="" height="100"></td>
                    <td><form action="/images/{{$image->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    {{-- select category id --}}
                    <select name="category_id">
                        @foreach ($categories as $category)
                        @if ($image->categories->id == $category->id)
                            <option value="{{$category->id}}" selected>{{$category->category}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @endif
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-warning">edit</button>
                </form></td>
                    <td>
                        <form action="/images/{{$image->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">del</button>
                </form>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        @endforeach
    @endif
</div>
@endsection