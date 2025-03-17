@extends('./admin/dashboard')
@section('title', 'Stylist List')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Stylists List</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Available Stylists</h5>
                    </div>
                    <div class="card-body">
                        {{-- <form method="GET" action="/Showstylists">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Search stylists..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form> --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Commission Rate (%)</th>
                                    <th>Image</th>
                                    <th>Status</th>
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
                                        <form action="/toggle-status/stylist/{{ $stylist->id }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $stylist->status == 1 ? 'btn-success text-white' : 'btn-warning text-dark' }}"
                                                    style="border-radius: 20px; padding: 5px 15px; font-weight: bold; font-size: 12px;">
                                                {{ $stylist->status == 1 ? 'Active' : 'Inactive' }}
                                            </button>
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
