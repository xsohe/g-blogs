@extends('dashboard.layouts.main')
@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
    <div>
        <h1 class="h2 fw-normal mb-2">Create a new blog</h1>
    </div>
    <span class="fw-normal text-secondary mb-2"><a href="/dashboard/blogs" class="text-decoration-none text-dark">My Blogs</a> <i class="bi bi-arrow-right-short"></i> Create</span>
</div>
<div class="container mb-4">
    <div class="row">
        <div class="col-lg-8">
            <form action="/dashboard/blogs" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label @error('title') is-invalid @enderror">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                  @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                  @error('slug')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <select class="form-select" name="tag_id">
                        @foreach ($tags as $tag)
                        @if (old('tag_id') == $tag->id)
                            <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                        @else
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label @error('body') is-invalid @enderror">Description</label>
                    <textarea id="editor" name="body" id="body">{{ old('body') }}</textarea>
                    @error('body')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>                  
                <button type="submit" class="btn btn-cream fw-bold w-100 my-2">Create</button>
            </form>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script> --}}
<script src="{{ asset('js/ckeditor.js') }}"></script>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/decoupled-document/ckeditor.js"></script> --}}
<script>
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    title.addEventListener("change", () => {
        fetch("/dashboard/blogs/checkSlug?title=" + title.value)
            .then((response) => response.json())
            .then((data) => (slug.value = data.slug));
    });

    ClassicEditor.create(document.querySelector("#editor"), {
        ckfinder: {
            uploadUrl:
            "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        },
        codeBlock: {
            languages: [
                { language: 'css', label: 'CSS' },
                { language: 'html', label: 'HTML' },
                { language: 'java', label: 'Java' },
	            { language: 'javascript', label: 'JavaScript' },
                { language: 'php', label: 'PHP' },
                { language: 'python', label: 'Python' },
                { language: 'typescript', label: 'TypeScript' },
                { language: 'c', label: 'C' },
                { language: 'cs', label: 'C#' },
                { language: 'cpp', label: 'C++' },
            ]
        }
    }).catch((error) => {
        console.error(error);
    });
</script>


@endsection