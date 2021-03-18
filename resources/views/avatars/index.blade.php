@extends('home')
@section('home-content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="home-content mx-5">

    <div class="text-right">
        <h1 class="text-primary">Here are your avatars</h1>
        <p class="text-muted">Add up to 5 avatars, extra to the default one</p>
        <p class="text-muted" style="font-size: 11px"> Please note that when you delete an avatar, users related to it will be assigned the default one.</p>
        @if ($avatars[0]->src != 'avatar.jpg')
            <p class="text-muted" style="font-size: 11px">You can reset the default avatar by pressing <i class="fas fa-user text-primary"></i> under it.</p>
        @endif
    </div>
    <div class="separator rounded bg-primary" style="height: 3px;">
    </div>
</div>
    <div class="row my-5">
        @for ($i = 0; $i < count($avatars); $i++)
        <div class="col-lg-2 col-md-4">
            <div class="inner-col m-2 d-flex flex-column justify-content-between">
                <div class="top d-flex justify-content-center">
                    <img src="/storage/img/{{$avatars[$i]->src}}" alt="avatar" height="100">
                </div>
                <div class="bottom d-flex justify-content-between">
                    <button type="button" class="btn btn-transparent text-warning" type="button" data-toggle="modal" data-target="#editAvatar{{$avatars[$i]->id}}"><i class="fas fa-edit"></i></button>
                    @if ($i != 0)
                        <form action="/avatars/{{$avatars[$i]->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-transparent text-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        @else
                        @if ($avatars[0]->src != 'avatar.jpg')
                            <form action="{{route('reset')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-transparent text-primary"><i class="fas fa-user"></i></button>
                            </form>
                        @endif
                        
                    @endif
                </div>
            </div>
        </div>
        <!-- Modal edit-->
        <div class="modal fade" id="editAvatar{{$avatars[$i]->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit avatar image #{{$avatars[$i]->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/avatars/{{$avatars[$i]->id}}" method="POST" enctype="multipart/form-data" id="changeAvatar{{$avatars[$i]->id}}">
                        @csrf
                        @method('PATCH')
                    <div class="form-group">
                        <label for="addFile">Add an image</label>
                        <input type="file" id="addFile" class="form-control" name="src">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="changeAvatar{{$avatars[$i]->id}}">Change the avatar</button>
                </div>
            </div>
            </div>
        </div>
        
        @endfor
        @for ($i = count($avatars); $i < 6; $i++)
        <div class="col-lg-2 col-md-4">
            <div class="inner-col m-2 d-flex flex-column justify-content-between">
                <div class="top  d-flex justify-content-center">
                    <div class="d-flex justify-content-center align-items-center bg-dark text-light" style="height: 100px; width: 100px;">
                        <button type="button" class="btn btn-transparent rounded-circle" data-toggle="modal" data-target="#createAvatar"><i class="fas fa-plus-circle fa-3x"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>

  <!-- Modal -->
  <div class="modal fade" id="createAvatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add an avatar image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/avatars" id="addAvatar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="addFile">Add an image</label>
                <input type="file" id="addFile" class="form-control" name="src">
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" form="addAvatar">Add an avatar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

