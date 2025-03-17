@extends('./recipient/main')
@section('title', 'Show service')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Show services</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Service List</h5>                       
                    </div>
                    <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
    @forelse($services as $service)
        <tr>
            <td>
                <img src="{{ asset('user_images/' . $service->Image) }}" alt="service Image" width="60" height="60">
            </td>
            <td>{{ $service->Name }}</td>
            <td>{{ $service->Description }}</td>
            <td>{{ $service->Price }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">No services available.</td>
        </tr>
    @endforelse
</tbody>

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
