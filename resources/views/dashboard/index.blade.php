@extends('dashboard.layouts.main')

@section('contents')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h4 class="card-title">Blog</h4>
                            </div>
                            <div class="py-2 px-3 border rounded border-dark fs-3 border-opacity-25">
                                <i class="bi bi-grid-1x2-fill"></i>
                            </div>
                        </div>
                      <h1 class="card-subtitle mb-2 fw-bold">{{ $blogs->count() }}</h1>
                      <a href="/blogs" class="card-link text-dark text-decoration-none">See more <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h4 class="card-title">Projects</h4>
                            </div>
                            <div class="py-2 px-3 border rounded border-dark fs-3 border-opacity-25">
                                <i class="bi bi-terminal-fill"></i>
                            </div>
                        </div>
                      <h1 class="card-subtitle mb-2 fw-bold">{{ $projects->count() }}</h1>
                      <a href="#" class="card-link text-dark text-decoration-none">See more <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="py-2 px-3 border rounded border-dark fs-3 border-opacity-25">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                      <h1 class="card-subtitle mb-2 fw-bold">{{ $users->count() }}</h1>
                      <a href="#" class="card-link text-dark text-decoration-none">See more <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h4 class="card-title">Stacks</h4>
                            </div>
                            <div class="py-2 px-3 border rounded border-dark fs-3 border-opacity-25">
                                <i class="bi bi-stack"></i>
                            </div>
                        </div>
                      <h1 class="card-subtitle mb-2 fw-bold">{{ $users->count() }}</h1>
                      <a href="#" class="card-link text-dark text-decoration-none">See more <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-4 mb-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="col-lg-4">
                        <img src="{{ asset('images/Teddy bear.gif') }}" alt="teddy-bear" class="img-fluid" style="width: 350px">
                    </div>
                    <div class="col-lg-8">
                        <h1 class="h2 fw-normal mb-2 text-start">Welcome back, <span class="fw-bold">{{ auth()->user()->name }}</span></h1>
                        <p class="text-start fs-5 mt-4">
                            Share your creativity : Upload, Showcase, and Collaborate on Projects with Our Community :)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection