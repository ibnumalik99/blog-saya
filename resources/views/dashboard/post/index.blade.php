{{-- @extends('dashboard.layout.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>
    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
    <div class="table-responsive col-lg-8">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>
              <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
@endsection --}}


@extends('dashboard.layout.main')
@section('container')
<main class="px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post</h1>
    </div>
</main>
<a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="row">
  @foreach ($posts as $post)
    <a href="/dashboard/posts/{{ $post->slug }}" class="d-block col-sm-4 my-1">
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
@endsection