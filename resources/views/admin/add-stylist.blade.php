@extends('./admin/dashboard')
@section('title', 'Add Stylist')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Add Stylist</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Stylist Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="/Addstylists" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Stylist Name -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Stylist Name" name="stylist_name" required>
                            </div>
                        
                            <!-- Stylist Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter Stylist Description" name="stylist_description" required></textarea>
                            </div>
                        
                            <!-- Stylist Commission -->
                            <div class="mb-3">
                                <label class="form-label">Commission Rate (%)</label>
                                <input type="number" class="form-control" placeholder="Enter Commission Rate" name="stylist_commission_rate" required>
                            </div>
                        
                            <!-- Stylist Image -->
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="stylist_image" required>
                            </div>
                        
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Add Stylist</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
