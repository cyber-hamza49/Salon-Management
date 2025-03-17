@extends('admin/dashboard')
@section('title', 'Clients')

@section('content')
<main>
    @if(Auth::user()->roles == 1)

     {{-- Clients Table (Role 4) --}}
     <div class="container py-3">
        <h1 class="mb-4">Clients</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Client</td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @endif
</main>
@endsection