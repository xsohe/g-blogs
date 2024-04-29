@extends('dashboard.layouts.main')

@section('contents')
<div class="container my-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
        <div>
            <h1 class="h2 fw-normal mb-2">My Projects</h1>
        </div>
        <span class="fw-normal text-secondary mb-2">My Projects</span>
    </div>
    <div class="row">
        <div class="col-lg-8">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="mb-3">
                <a href="/dashboard/projects/create" class="btn btn-sm btn-cream">Create New Project</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover fs-6">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                            @if($projects->count()) 
                            @foreach ($projects as $project)    
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $project->name }}</td>
                                <td>
                                    @if($project->image)
                                        <img src="{{ asset('storage/' . $project->image ) }}" class="img-fluid rounded" alt="{{ $project->image }}" style="width: 80px">
                                    @else 
                                        <img src="https://source.unsplash.com/80x50?programming" alt="programming" class="img-fluid rounded">
                                    @endif
                                </td>
                                <td>
                                    <a href="/dashboard/projects/{{ $project->slug }}/edit" class="badge text-dark">
                                        <span data-feather="edit" class="align-text-bottom"></span>
                                    </a>
                                    <form action="/dashboard/projects/{{ $project->slug }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge text-dark border-0 bg-transparent" onclick="return confirm('Are you sure?')">
                                            <span data-feather="x-circle" class="align-text-bottom"></span>
                                        </button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center fs-5">
                                    <span class="text-center fs-6">No projects found</span>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- <div class="mt-4">
                        {{ $tags->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection