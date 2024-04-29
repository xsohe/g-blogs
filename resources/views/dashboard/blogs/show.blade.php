@extends('dashboard.layouts.main')
<style>
    /* .body-content > img {
        width: 100% !important;
    } */
</style>
@section('contents')
<div class="container my-5">
    <header class="text-center mt-3">
        <span class="fw-bold fs-5">{{ $blog->updated_at->toFormattedDateString() }}</span>
        <h1 class="fw-bold fs-1">{{ $blog->title }}</h1>
        <hr class="text-secondary"/>
    </header>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <img src="https://source.unsplash.com/50x50?profile" alt="this is profile" class="img-fluid rounded-circle me-3">
                    <div>
                    <span class="fw-bold d-block">{{ $blog->user->name }}</span>
                    <span class="fw-light d-block text-secondary">Students</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                   <span class="fw-bold fs-5">Tags</span>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">{{ $blog->tag->name }}</li>
                </ul>
            </div>
            <div class="my-4 text-center">
                <a href="/dashboard/blogs" class="btn btn-sm btn-cream w-100"><i class="bi bi-arrow-left"></i> Back to blog</a>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card mb-3">
                <div class="card-body body-content">
                  <p>
                    {!! $blog->body !!}
                  </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection