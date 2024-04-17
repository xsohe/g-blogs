@extends('layouts.main')

@section('contents')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-5">
            <h3 class="h4 mb-5 fw-normal text-center">Registration Form</h3>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                  @error('name')  
                    <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username">
                  @error('username')  
                    <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email">
                  @error('email')  
                    <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                  @error('password')  
                    <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
                </div>
                <button type="submit" class="btn btn-cream fw-bold w-100 my-2">Register</button>
            </form>
            <small class="mt-3 text-center d-block">
                Already Registered?
                <a href="/login" class="text-decoration-underline">login</a>
            </small>
        </div>
    </div>
</div>
@endsection