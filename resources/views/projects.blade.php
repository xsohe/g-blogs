@extends('layouts.main')
@section('contents')
<div class="container col-lg-8 my-5">
    <header>
        <h1 class="fw-bold fs-1">Projects</h1>
        <hr class="text-secondary"/>
    </header>
    <div class="row">
        @if ($projects->count())
            @foreach ($projects as $project )    
                <div class="col-lg-6">
                    <div class="card mb-4">
                        @if($project->image) 
                            <img src="{{ asset("/storage/" . $project->image) }}" class="card-img-top img-fluid" alt="{{ $project->image }}">
                        @else
                         <img src="https://source.unsplash.com/400x200?programing" class="card-img-top img-fluid" alt="">
                        @endif
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="h3 fw-bolder mt-2"><a href="/project/{{ $project->slug }}  " class="text-decoration-none">{{ $project->name }}</a></h1>
                            <small class="text-secondary">{{ $project->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="my-2">
                            <a href="" class="badge bg-body-secondary text-muted text-uppercase text-decoration-none">{{ $project->stack->name }}</a>
                        </div>
                        <p>
                           {!! $project->desc !!}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ $project->source }}" class="fs-4"><i class="bi bi-github"></i></a>
                            </div>
                            <a href="/project/{{ $project->slug }}" class="text-decoration-none btn btn-sm btn-cream">See more <i class="bi bi-arrow-right"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else 
            <div class="text-center">
                <h3 class="fw-bold fs-3">No Blogs Found</h3>
            </div>
        @endif  
    </div>
</div>
@endsection