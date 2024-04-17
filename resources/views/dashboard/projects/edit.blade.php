@extends('dashboard.layouts.main')
@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
    <div>
        <h1 class="h2 fw-normal mb-2">Edit a project</h1>
    </div>
    <span class="fw-normal text-secondary mb-2"><a href="/dashboard/projects" class="text-decoration-none text-dark">My Projects</a> <i class="bi bi-arrow-right-short"></i> Edit</span>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="/dashboard/projects" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                  <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                  <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="stack" class="form-label @error('stack') is-invalid @enderror">Stack</label>
                  <input type="stack" class="form-control" id="stack" name="stack" value="{{ old('stack', $project->stack) }}">
                  @error('stack')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label @error('desc') is-invalid @enderror">Description</label>
                    <textarea id="editor" name="desc" id="desc">{{ old('desc', $project->desc) }}</textarea>
                    @error('desc')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>     
                <div class="mb-3">
                    <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="source" class="form-label @error('source') is-invalid @enderror">Github Link Project</label>
                  <input type="source" class="form-control" id="source" name="source" value="{{ old('source', $project->source) }}">
                  @error('source')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-cream fw-bold w-100 my-2">Update</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor.create(document.querySelector("#editor"), {
      ckfinder: {
          uploadUrl:
          "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
      },
  }).catch((error) => {
      console.error(error);
  });
</script>
@endsection