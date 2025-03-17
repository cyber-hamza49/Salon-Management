@extends('./admin/dashboard')
@section('title', 'Edit Stylist')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Edit Stylist</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Stylist Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="/updatestylist/{{ $stylist->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Stylist Name -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="stylist_name" value="{{ $stylist->name }}" required>
                            </div>

                            <!-- Stylist Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" name="stylist_description" required>{{ $stylist->description }}</textarea>
                            </div>

                          <!-- Change Price to Commission Rate -->
                            <div class="mb-3">
                                <label class="form-label">Commission Rate (%)</label>
                                <input type="number" class="form-control" name="stylist_commission_rate" value="{{ $stylist->commission_rate }}" required>
                            </div>

                            <!-- Stylist Image -->
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="stylist_image">
                            <img src="{{ asset('uploads/' . $stylist->image) }}" alt="Stylist Image" width="50">                  
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Stylist</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
