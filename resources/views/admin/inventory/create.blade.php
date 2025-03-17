@extends('admin.dashboard')
@section('title', 'Add Inventory')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Add Inventory Item</h1>
        </div>

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('inventory.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" placeholder="Enter product name" name="product_name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter product description" name="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" placeholder="Enter quantity" name="quantity" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="text" class="form-control" placeholder="pcs, ml, kg" name="unit" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Threshold Level (Low Stock Alert)</label>
                                <input type="number" class="form-control" placeholder="Enter minimum stock level" name="threshold_level" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Supplier Name</label>
                                <input type="text" class="form-control" placeholder="Enter supplier name" name="supplier_name">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
