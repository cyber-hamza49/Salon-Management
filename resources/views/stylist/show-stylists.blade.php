@extends('./stylist/main')
@section('title', 'Show Stylists')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>
            <a href="{{ url('/Addstylists') }}" class="btn btn-primary float-end">Add Profile</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">My Stylist Profile </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Commission(%)</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stylists as $stylist)
                                <tr>
                                    <td>{{ $stylist->name }}</td>
                                    <td>{{ $stylist->description }}</td>
                                    <td>{{ $stylist->commission_rate }}%</td>
                                    <td><img src="{{ asset('uploads/' . $stylist->image) }}" alt="Image" width="50"></td>       
                                    <td>
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $stylist->status == 1 ? 'btn-success text-white' : 'btn-warning text-dark' }}"
                                                    style="border-radius: 20px; padding: 5px 15px; font-weight: bold; font-size: 12px;">
                                                {{ $stylist->status == 1 ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>                  
                                  <td>
                                        <a href="/edit-stylist/{{ $stylist->id }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="/delete-stylist/{{ $stylist->id }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
