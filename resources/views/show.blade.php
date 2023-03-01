@extends('layout.main')
@section('container')
<div class="container my-3">
    <main class="">
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-1 border-bottom">
            <h1 class="h2 d-block">{{ $title }} <p class="d-blok fs-6"><small>made by <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>  on {{ $post->created_at->diffForHumans() }}</small></p></h1>
        </div>
    </main>
    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="d-block my-3 col-lg-7">
    {!! $post->body !!}
</div>
@endsection