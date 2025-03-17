@extends('./admin/dashboard')
@section('title', 'Appointments List')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h3 mb-0">Appointments Overview</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i data-feather="calendar" class="me-2" style="width: 18px; height: 18px;"></i>
                                Appointment List
                            </h5>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="px-4">User</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Appointment</th>
                                        <th class="px-4">Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments as $appointment)
                                    <tr>
                                        <td class="px-4">
                                            <div class="d-flex align-items-center">
                                                <i data-feather="user" class="me-2 text-muted" style="width: 14px; height: 14px;"></i>
                                                {{ $appointment->user->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i data-feather="package" class="me-2 text-muted" style="width: 14px; height: 14px;"></i>
                                                {{ $appointment->service->Name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i data-feather="calendar" class="me-2 text-muted" style="width: 14px; height: 14px;"></i>
                                                {{ $appointment->date }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i data-feather="clock" class="me-2 text-muted" style="width: 14px; height: 14px;"></i>
                                                {{ $appointment->time }}
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" 
                                                    class="btn btn-sm rounded-pill px-3 {{ $appointment->status == 1 
                                                        ? 'btn-success-subtle text-success' 
                                                        : 'btn-warning-subtle text-warning' }}">
                                                <i data-feather="{{ $appointment->status == 1 ? 'check-circle' : 'clock' }}" 
                                                   class="me-1" 
                                                   style="width: 14px; height: 14px;"></i>
                                                {{ $appointment->status == 1 ? 'Booked' : 'Pending' }}
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" 
                                                    class="btn btn-sm rounded-pill px-3 {{ $appointment->appointment_status == 1 
                                                        ? 'btn-success-subtle text-success' 
                                                        : 'btn-warning-subtle text-warning' }}">
                                                <i data-feather="{{ $appointment->appointment_status == 1 ? 'check-circle' : 'clock' }}" 
                                                   class="me-1" 
                                                   style="width: 14px; height: 14px;"></i>
                                                {{ $appointment->appointment_status == 1 ? 'Completed' : 'Pending' }}
                                            </button>
                                        </td>
                                        <td class="px-4">
                                            <span class="badge {{ $appointment->payment_status == 'Paid' 
                                                ? 'bg-success-subtle text-success' 
                                                : 'bg-danger-subtle text-danger' }} rounded-pill px-3">
                                                {{ $appointment->payment_status }}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="text-muted">
                                                <i data-feather="calendar" style="width: 24px; height: 24px;"></i>
                                                <p class="mt-2 mb-0">No appointments available.</p>
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