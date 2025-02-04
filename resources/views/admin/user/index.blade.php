
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
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create New User</a>
    <h1 class="display-4 mb-2 text-primary">All Users</h1>
    <table class="table">
    <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{$user->usertype}}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
</table>
  </div>
</div>
@endsection
