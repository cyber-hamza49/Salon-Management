@extends('admin.dashboard')
@section('title', 'Edit Inventory')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Edit Inventory Item</h1>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Update Product Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name" value="{{ $inventory->product_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" name="description">{{ $inventory->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ $inventory->quantity }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="text" class="form-control" name="unit" value="{{ $inventory->unit }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Threshold Level</label>
                                <input type="number" class="form-control" name="threshold_level" value="{{ $inventory->threshold_level }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Supplier Name</label>
                                <input type="text" class="form-control" name="supplier_name" value="{{ $inventory->supplier_name }}">
                            </div>

                            <button type="submit" class="btn btn-success">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
