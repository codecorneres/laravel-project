

@extends('layouts.dashboard-app-layout')

@section('title', 'Admin Dashboard')

@section('content')

<div class="jumbotron jumbotron-fluid rounded bg-white border-0 shadow-sm border-left px-4">
  <div class="container">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <h1 class="display-4 mb-2 text-primary">Create New User</h1>
    <form method="POST" action="{{ route('admin.users.store') }}" class="p-4 border rounded shadow-sm bg-white">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Create User</button>
</form>

  </div>
</div>
@endsection