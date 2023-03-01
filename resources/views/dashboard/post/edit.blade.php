@extends('dashboard.layout.main')
@section('container')
<main class="col-md-9 col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
</main>
<div class="container col-lg-10">
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if ($post->image)
            <img alt="" src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img alt="" src="/img/image-not-found.png" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @endif
            <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" required value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <input type="hidden" id="slug" name="slug">
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
<script>
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');
title.addEventListener('keyup', function () {
    fetch('/dashboard/posts/checkSlug?title=' + title.value) 
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});

document.addEventListener('trix-file-accept', function (e) {
    e.preventDefault();
});
function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = "block";
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection