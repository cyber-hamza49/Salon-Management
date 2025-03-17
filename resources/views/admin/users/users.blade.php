@extends('admin/dashboard')
@section('title', 'Logged Users')

@section('content')
<main class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Logged Users</h1>
            <a href="/users/create" class="btn btn-success px-4 rounded-pill">
                <i data-feather="plus" class="me-1" style="width: 18px; height: 18px;"></i>
                Add User
            </a>
        </div>

        <!-- Search Bar -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('users.all') }}">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i data-feather="search" style="width: 18px; height: 18px;"></i>
                        </span>
                        <input type="text" 
                               class="form-control border-start-0 ps-0" 
                               name="search" 
                               placeholder="Search users by name, email or role..." 
                               value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary px-4">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th class="text-end px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allusers as $user)
                                <tr>
                                    <td class="px-4">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                    @php
                                        $roleNames = [
                                            1 => 'Admin',
                                            2 => 'Recipient',
                                            3 => 'Stylist',
                                            4 => 'Client'
                                        ];
                                    @endphp
                                    <span class="badge bg-info-subtle text-info px-3 rounded-pill">
                                        {{ $roleNames[$user->roles] ?? 'User' }}
                                    </span>
                                </td>
                                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                    <td class="text-end px-4">
                                        <div class="btn-group">
                                            <a href="{{ route('users.edit', $user->id) }}" 
                                               class="btn btn-warning btn-sm me-2 rounded">
                                                <i data-feather="edit-2" style="width: 14px; height: 14px;"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm rounded"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <i data-feather="trash-2" style="width: 14px; height: 14px;"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i data-feather="users" style="width: 20px; height: 20px;"></i>
                                        <p class="mb-0 mt-2">No users found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection