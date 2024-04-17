@extends('layouts.main')

@section('contents')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-5">
            @if (session('loginFail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginFail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="d-flex justify-content-center mb-2">
                <img src="{{ asset('images/hero.png') }}" alt="programming" class="img-fluid" style="width: 12rem">
            </div>
            {{-- <h3 class="h4 mb-5 fw-normal text-center">Share Your Creations: Upload, Showcase, and Collaborate on Projects with Our Community</h3> --}}
            <h3 class="h4 mb-5 fw-normal text-center">Upload, Showcase, and Collaborate on Projects with Our Community</h3>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label @error('email') is-invalid @enderror">Email address</label>
                  <input type="email" class="form-control" id="email" name="email">
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-cream fw-bold w-100 my-2">Login</button>
            </form>
            <small class="mt-3 text-center d-block">
                Not Registered?
                <a href="/register" class="text-decoration-underline">registered</a>
            </small>
        </div>
    </div>
</div>
@endsection