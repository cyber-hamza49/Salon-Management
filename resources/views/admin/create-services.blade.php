
@extends('./admin/dashboard')
@section('title', 'Add Services')
@section('content')


<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Add Services</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">service Details</h5>
                    </div>
                    <div class="card-body">
                    <form action="/Addservices" method="POST" enctype="multipart/form-data">
                    @csrf
                            <!-- service Name -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter service Name" name="service_name" required>
                            </div>

                            <!-- service Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter service Description" name="service_description" required></textarea>
                            </div>

                            <!-- service Price -->
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" placeholder="Enter service Price" name="service_price" required>
                            </div>

                            <!-- service Quantity -->
                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" placeholder="Enter service Quantity" name="service_quantity" required>
                            </div>

                            <!-- service Image -->
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="service_image" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Add service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection