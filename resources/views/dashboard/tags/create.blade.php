@extends('dashboard.layouts.main')
@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
    <div>
        <h1 class="h2 fw-normal mb-2">Create a new tag</h1>
    </div>
    <span class="fw-normal text-secondary mb-2"><a href="/dashboard/tags" class="text-decoration-none text-dark">My Tags</a> <i class="bi bi-arrow-right-short"></i> Create</span>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="/dashboard/tags" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug">
                  @error('slug')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-cream fw-bold w-100 my-2">Create</button>
            </form>
        </div>
    </div>
</div>
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', () => {
        fetch('/dashboard/tags/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })
</script>
@endsection