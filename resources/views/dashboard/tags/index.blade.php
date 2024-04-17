@extends('dashboard.layouts.main')

@section('contents')
<div class="container my-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
        <div>
            <h1 class="h2 fw-normal mb-2">My Tags</h1>
        </div>
        <span class="fw-normal text-secondary mb-2">My Tags</span>
    </div>
    <div class="row">
        <div class="col-lg-6">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="mb-3">
                <a href="/dashboard/tags/create" class="btn btn-sm btn-cream">Create New Tag</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover fs-6">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                            @if($tags->count()) 
                            @foreach ($tags as $tag)    
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="/dashboard/tags/{{ $tag->slug }}/edit" class="badge text-dark">
                                        <span data-feather="edit" class="align-text-bottom"></span>
                                    </a>
                                    <form action="/dashboard/tags/{{ $tag->slug }}" method="POST" class="d-inline">
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
                            <span class="text-center fs-5">No tags found</span>
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