@extends('./stylist/main')
@section('title', 'Stylist Inventory')
@section('content')

<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark mb-0">Stylist Inventory Management</h2>
    </div>

   
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Supplier</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventory as $item)
                        <tr class="{{ $item->quantity <= $item->threshold_level ? 'table-warning' : '' }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>
                                <span class="badge {{ $item->quantity <= $item->threshold_level ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ $item->quantity }}
                                </span>
                            </td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->supplier_name }}</td>
                            <td>
                                <form action="{{ route('decrease-inventory', $item->id) }}" method="POST" class="d-flex justify-content-center gap-2">
                                    @csrf
                                    <input type="number" name="quantity" min="1" max="{{ $item->quantity }}" required 
                                           class="form-control form-control-sm" style="max-width: 60px;" value="1">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-minus-circle me-1"></i>Decrease
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

@endsection