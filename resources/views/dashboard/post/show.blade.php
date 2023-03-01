@extends('dashboard.layout.main')
@section('container')
<div class="container my-3">
    <h2>{{ $post->title }}</h2>
    <a class="btn btn-outline-primary" href="/dashboard/posts/{{ $post->slug }}/edit" title="Edit Post"><span data-feather="edit" class="align-text-bottom"></span></a>
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline" title="Delete Post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are You Sure?')"><span data-feather="trash-2" class="align-text-bottom"></span></button>
    </form>
    @if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="d-block my-3">
    @else
    <img src="/img/image-not-found.png" alt="" class="d-block my-3">
    @endif
    {!! $post->body !!}
</div>
@endsection