@extends('admin/dashboard')
@section('title', 'Edit User')

@section('content')
<main>
    <div class="container py-3">
        <h1 class="mb-4">Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="roles" class="form-label">Role</label>
                <select class="form-select @error('roles') is-invalid @enderror" 
                        name="roles" id="roles" required>
                    <option value="">Select Role</option>
                    <option value="1" {{ old('roles', $user->roles) == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ old('roles', $user->roles) == 2 ? 'selected' : '' }}>Recipient</option>
                    <option value="3" {{ old('roles', $user->roles) == 3 ? 'selected' : '' }}>Stylist</option>
                    <option value="4" {{ old('roles', $user->roles) == 4 ? 'selected' : '' }}>User</option>
                </select>
                @error('roles')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</main>
@endsection