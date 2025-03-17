@extends('admin/dashboard')
@section('title', 'Stylists')

@section('content')
<main>
    @if(Auth::user()->roles == 1)

   {{-- Stylists Table (Role 3) --}}
   <div class="container py-3">
    <h1 class="mb-4">Stylists</h1>
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
            @foreach ($stylists as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Stylist</td>
                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endif
</main>
@endsection