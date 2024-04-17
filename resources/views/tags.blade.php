@extends('layouts.main')

@section('contents')
<div class="container col-lg-8 my-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
            <h1 class="fw-bold fs-1 border-md-0 border-sm-0 border-end">Tags</h1>
        </div>        
        <div class="col-lg-6">
            @if ($tags->count())
            @foreach ($tags as $tag)
                <a href="/blogs/{{ $tag->slug }}" class="badge bg-body-secondary text-muted text-uppercase text-decoration-none p-2 my-2 mx-2">{{ $tag->name }}</a>
            @endforeach
            @else
                <span class="fw-bold fs-4">Tags Not Found!</span>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection