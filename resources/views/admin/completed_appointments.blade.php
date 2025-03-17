@extends('./admin/dashboard')
@section('title', 'Completed Appointments')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Appointments</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Completed Appointments</h5>
                      
                    </div>
                    <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
    @forelse($appointments as $appointment)
        <tr>
            <td>{{ $appointment->user->name }}</td>
            <td>{{ $appointment->service->Name}}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>
            <td>
               {{ $appointment->appointment_status == 1 ? 'Completed' : 'Pending' }}
            </td>
            <td>{{ $appointment->payment_status }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">No Appointments available.</td>
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
