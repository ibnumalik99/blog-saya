@extends('layout.main')
@section('container')
<main class="px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="d-flex justify-content-center">{{ $posts->links() }}</div>
        <form action="/blog">
            <div class="input-group">
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <input type="text" name="search" id="" class="form-control" placeholder="Search..." autofocus value="{{ request('search') }}" autocomplete="off">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </form>
    </div>
</main>
<div class="container mb-5">
    @if ($posts->count())    
        <div class="row justify-content-center">
            <a href="/blog/{{ $posts[0]->slug }}" class="d-block col-lg-10 mt-1 mb-3">
                <div class="card text-bg-dark position-relative" style="max-height: 400px; overflow:hidden;">
                @if($posts[0]->image)
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img" alt="...">
                @else
                <img src="/img/image-not-found.png" class="card-img" alt="...">
                @endif
                <div class="card-img-overlay position-absolute mb-3" style="height:100%; background-color: rgba(0, 0, 0, 0.5)">
                    <h5 class="card-title">{{ $posts[0]->title }}</h5>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    <p class="card-text position-absolute bottom-0 mb-2"><small>{{ $posts[0]->updated_at->diffForHumans() }}</small></p>
                </div>
                </div>
            </a>
        </div>
        <div class="row">
        @foreach ($posts->skip(1) as $post)
            <a href="/blog/{{ $post->slug }}" class="d-block col-sm-4 my-1">
                <div class="card text-bg-dark position-relative">
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img" alt="...">
                @else
                <img src="/img/image-not-found.png" class="card-img" alt="...">
                @endif
                <div class="card-img-overlay position-absolute mb-3" style="height:100%; background-color: rgba(0, 0, 0, 0.5)">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <p class="card-text position-absolute bottom-0 mb-2"><small>{{ $post->updated_at->diffForHumans() }}</small></p>
                </div>
                </div>
            </a>
        @endforeach
        </div>
    @else
         <p class="text-center">Not Post Fond</p>
    @endif
</div>
@endsection