@extends('./admin/dashboard')
@section('title', 'Edit service')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Edit service</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/update-service/{{ $service->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Name">service Name:</label>
                                <input type="text" name="Name" id="Name" class="form-control" value="{{ $service->Name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description:</label>
                                <textarea name="Description" id="Description" class="form-control" required>{{ $service->Description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Price">Price:</label>
                                <input type="number" name="Price" id="Price" class="form-control" value="{{ $service->Price }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Image">Image:</label>
                                <input type="file" name="Image" id="Image" class="form-control">
                                <img class="mt-2" src="{{ asset('user_images/' . $service->Image) }}" alt="service Image" width="100" >
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('service Updated Successfully.')">Update service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection





