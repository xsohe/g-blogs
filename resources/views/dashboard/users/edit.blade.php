@extends('dashboard.layouts.main')
@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4">
    <div>
        <h1 class="h2 fw-normal mb-2">Edit a user</h1>
    </div>
    <span class="fw-normal text-secondary mb-2"><a href="/dashboard/users" class="text-decoration-none text-dark">User Settings</a> <i class="bi bi-arrow-right-short"></i> Edit</span>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="/dashboard/users" method="POST">
                @csrf
                 @method('patch')
                <div class="mb-3">
                  <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label @error('username') is-invalid @enderror">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}">
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                    <div class="mb-3">
                    <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-cream fw-bold w-100 my-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection