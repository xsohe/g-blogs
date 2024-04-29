@extends('dashboard.layouts.main')
@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
    <div>
        <h1 class="h2 fw-normal mb-2">Show User</h1>
    </div>
    <span class="fw-normal text-secondary mb-2"><a href="/dashboard/users" class="text-decoration-none text-dark">User Settings</a> <i class="bi bi-arrow-right-short"></i> Show</span>
</div>
<div class="container">
    <div class="row justify-content-start">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="me-4">
                        <img src="https://source.unsplash.com/150x150?profile" alt="profile" class="img-fluid rounded-circle">
                    </div>
                    <div>
                        <h5 class="fw-bold mb-3">{{ $user->name }}
                            @if ($user->is_admin)
                                <i class="bi bi-patch-check-fill"></i>
                            @endif 
                        </h5>
                        <div class="mb-2">
                            <span class="fs-6"><i class="bi bi-person-square me-2"></i> {{ $user->username }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="fs-6"><i class="bi bi-envelope-at-fill me-2"></i> {{ $user->email }}</span>
                        </div>
                        <div class="mb-2">
                            @if($user->is_admin) 
                                <span class="fs-6"><i class="bi bi-person-vcard-fill me-2"></i> Administrator</span>
                                @else
                                <span class="fs-6"><i class="bi bi-person-vcard-fill me-2"></i> User</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col-lg-4 mb-3">
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
                  <h1 class="card-subtitle mb-2 fw-bold">{{ $user->blogs->count() }}</h1>
                  <a href="/blogs" class="card-link text-dark text-decoration-none">See more <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h4 class="card-title">Project</h4>
                        </div>
                        <div class="py-2 px-3 border rounded border-dark fs-3 border-opacity-25">
                            <i class="bi bi-terminal-fill"></i>
                        </div>
                    </div>
                  <h1 class="card-subtitle mb-2 fw-bold">{{ $user->projects->count() }}</h1>
                  <a href="/blogs" class="card-link text-dark text-decoration-none">See more <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
    </div>
  
</div>
@endsection