@extends('layouts.app')
@section('content')
<section class="mt-5">


    <div class="nak-gallery nlg1" id="gallery">
        @foreach ($images->sortByDesc('created_at') as $image)
        {{-- no way to get the jquery file workin ... idk no time today--}}
        <a  class="revGallery-anchor" href="/dowload/{{$image->id}}">
            <img class="img-responsive" src="/storage/img/{{$image->src}}">
            <div style="overflow:hidden">
            <div class="nak-gallery-poster" style="background-image:url('/storage/img/{{$image->src}}');background-size:cover;background-repeat:no-repeat;background-position:center center;display: block;width: 100%;">
                
            </div>
            </div>
            <div class="gal-overlay">
            <div class="photo"></div>
            </div>
        </a>	
        @endforeach
    </div>
</section>
@endsection