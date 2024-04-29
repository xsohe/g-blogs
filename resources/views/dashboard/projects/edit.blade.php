@extends('dashboard.layouts.main')
@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
    <div>
        <h1 class="h2 fw-normal mb-2">Edit a project</h1>
    </div>
    <span class="fw-normal text-secondary mb-2"><a href="/dashboard/projects" class="text-decoration-none text-dark">My Projects</a> <i class="bi bi-arrow-right-short"></i> Edit</span>
</div>
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-6">
            <form action="/dashboard/projects/{{ $project->slug }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                  <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
                  <input type="slug" class="form-control" id="slug" name="slug" value="{{ old('slug', $project->slug) }}">
                  @error('slug')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Stack</label>
                    <select class="form-select" name="stack_id">
                        @foreach ($stacks as $stack)
                        @if (old('stack_id', $stack->id) == $stack->id)
                            <option value="{{ $stack->id }}" selected>{{ $stack->name }}</option>
                        @else
                            <option value="{{ $stack->id }}">{{ $stack->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label @error('desc') is-invalid @enderror">Description</label>
                    <textarea id="editor" name="desc" id="desc">{{ old('desc', $project->desc) }}</textarea>
                    @error('desc')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>     
                <div class="mb-3">
                    <label for="image" class="form-label d-block @error('image') is-invalid @enderror">Image</label>
                    @if($project->image) 
                        <img src="{{ asset('/storage/' . $project->image) }}" alt="{{ $project->image }}" class="img-fluid mb-3 col-lg-4 rounded">
                    @else 
                        <img src="https://placehold.co/600x400/png" class="img-fluid mb-3 col-lg-4 rounded img-preview" alt="programming">
                    @endif
                        <input type="hidden" name="oldImage" value="{{ $project->image }}">
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
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

  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', () => {
    fetch('/dashboard/projects/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
  })
  
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = (oFREvent) => {
        imgPreview.src = oFREvent.target.result;
    }

  }
</script>
@endsection