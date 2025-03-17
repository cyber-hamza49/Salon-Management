@extends('./admin/dashboard')
@section('title', 'Service List')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-0">Service Management</h1>
                    <a href="{{ url('/Addservices') }}" class="btn btn-primary px-4 rounded-pill">
                        <i data-feather="plus-circle" class="me-2" style="width: 16px; height: 16px;"></i>
                        Add New Service
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0 text-dark">Service List</h5>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="px-4">Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th class="text-end px-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($services as $service)
                                        <tr>
                                            <td class="px-4">
                                                <img src="{{ asset('user_images/' . $service->Image) }}" 
                                                     alt="service Image" 
                                                     class="rounded-3 shadow-sm"
                                                     width="60" 
                                                     height="60"
                                                     style="object-fit: cover;">
                                            </td>
                                            <td class="fw-medium">{{ $service->Name }}</td>
                                            <td class="text-muted">
                                                {{ \Str::limit($service->Description, 50) }}
                                            </td>
                                            <td class="fw-medium">
                                                ${{ number_format($service->Price, 2) }}
                                            </td>
                                            <td>
                                                <form action="{{ route('toggle.service', $service->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="btn btn-sm {{ $service->Status == 1 
                                                                ? 'btn-success-subtle text-success' 
                                                                : 'btn-warning-subtle text-warning' }} rounded-pill px-3">
                                                        <i data-feather="{{ $service->Status == 1 ? 'check-circle' : 'alert-circle' }}" 
                                                           class="me-1" 
                                                           style="width: 14px; height: 14px;"></i>
                                                        {{ $service->Status == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-end px-4">
                                                <div class="btn-group">
                                                    <a href="/edit-service/{{ $service->id }}" 
                                                       class="btn btn-warning btn-sm me-2 rounded">
                                                        <i data-feather="edit-2" class="me-1" style="width: 14px; height: 14px;"></i>
                                                        Edit
                                                    </a>
                                                    <form action="/delete-service/{{ $service->id }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-danger btn-sm rounded"
                                                                onclick="return confirm('Are you sure you want to delete this service?')">
                                                            <i data-feather="trash-2" class="me-1" style="width: 14px; height: 14px;"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i data-feather="package" style="width: 24px; height: 24px;"></i>
                                                    <p class="mt-2 mb-0">No services available.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection