@extends('layouts.main')
@section('contents')
<div class="container col-lg-8 my-5">
    <header class="d-flex justify-content-between align-items-center">
      <div class="me-3">
        <h1 class="fw-bold fs-1">Blog</h1>
      </div>
      <form action="/blogs">
        <div class="input-group absolute">
          @if(request('tag'))
            <input type="hidden" name="tag" value="{{ request('tag') }}"> 
          @endif
          <input type="text" class="form-control search-input" placeholder="Search a blog" name="search" value="{{ request('search') }}">
          <button class="btn btn-search" type="submit" id="search">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>
    </header>
    <hr class="border-1"/>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <div class="card">
                <div class="card-header">
                   <span class="fw-bold fs-5">All Tags</span>
                </div>
                <ul class="list-group list-group-flush">
                  @foreach ($tags as $tag)
                    <li class="list-group-item"><a href="/blogs?tag={{ $tag->slug }}" class="text-decoration-none">{{ $tag->name }}</a></li>
                  @endforeach
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
          @if($blogs->count())
          @foreach ($blogs as $blog)  
            <div class="card mb-3">
                <div class="card-body">
                  <small class="text-secondary">By : {{ $blog->user->name }} <span class="text-primary ps-3">{{ $blog->created_at->diffForHumans() }}</span></small>
                  <h1 class="h3 fw-bolder mt-2"><a href="/blog/{{ $blog->slug }}" class="text-decoration-none">{{ $blog->title }}</a></h1>
                  <div class="my-2">
                    @if($blog->tag)
                    <a href="/blog/{{ $blog->slug }}" class="badge bg-secondary-subtle text-secondary text-uppercase text-decoration-none">{{ $blog->tag->name }}</a>
                    @endif
                  </div>
                  <p>
                      {{ $blog->excerpt }}
                  </p>
                </div>
            </div>
          @endforeach
          @else 
            <div class="text-center">
              <h3 class="fw-bold fs-3">No Blogs Found</h3>
            </div>
          @endif
        </div>
        <div class="mt-3">
          {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection