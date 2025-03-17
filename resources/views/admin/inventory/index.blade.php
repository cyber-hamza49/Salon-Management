@extends('admin.dashboard')
@section('title', 'Inventory List')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h3 mb-0">Inventory Management</h1>
                    </div>
                    <a href="{{ route('inventory.create') }}" class="btn btn-primary px-4 rounded-pill">
                        <i data-feather="plus-circle" class="me-2" style="width: 16px; height: 16px;"></i>
                        Add New Product
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

        <!-- Inventory Table Card -->
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 text-dark">
                        <i class="me-2" style="width: 18px; height: 18px;"></i>
                        Manage Inventory
                    </h5>
                </div>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4" width="60">#</th>
                                <th>Product Name</th>
                                <th class="text-center">Quantity</th>
                                <th>Unit</th>
                                <th>Supplier</th>
                                <th class="text-end px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventory as $item)
                            <tr>
                                <td class="px-4 fw-medium">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $item->product_name }}</td>
                                <td class="text-center">
                                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                                        {{ $item->quantity }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $item->unit }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i data-feather="truck" class="me-2 text-muted" style="width: 14px; height: 14px;"></i>
                                        {{ $item->supplier_name }}
                                    </div>
                                </td>
                                <td class="text-end px-4">
                                    <div class="btn-group">
                                        <a href="{{ route('inventory.edit', $item->id) }}" 
                                           class="btn btn-warning btn-sm me-2 rounded">
                                            <i data-feather="edit-2" class="me-1" style="width: 14px; height: 14px;"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('inventory.destroy', $item->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm rounded"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                <i data-feather="trash-2" class="me-1" style="width: 14px; height: 14px;"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @if($inventory->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i data-feather="box" style="width: 24px; height: 24px;"></i>
                                        <p class="mt-2 mb-0">No inventory items available.</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection