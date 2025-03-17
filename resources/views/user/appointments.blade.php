@extends('./user/main')
@section('title', 'BarberX - Appointments')
@section('content')

<main>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Appointments</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Appointments</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Active Appointments -->
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Active Appointments</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Stylist Name</th>
                                    <th>Service Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->stylist->name }}</td>
                                        <td>{{ $appointment->service->Name }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>
                                            <button type="submit" 
                                            class="btn btn-sm {{ $appointment->status == 1 ? 'btn-success text-white' : 'btn-warning text-dark' }}"
                                            style="border-radius: 20px; padding: 5px 15px; font-weight: bold; font-size: 12px;">
                                        {{ $appointment->status == 1 ? 'Booked' : 'Pending' }}
                                    </button>
                                </td>
                                <td>{{ $appointment->payment_status }}</td>
                                <td>
                                    <a href="{{url('/edit-appoint/'.$appointment->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{url('/delete-appoint/'.$appointment->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No active appointments.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <td>
                            <a href="{{url('/checkout')}}" class="btn btn-sm btn-primary"
                               style="border-radius: 20px; padding: 5px 15px; font-weight: bold; font-size: 12px;">
                               Go to Payment
                            </a>
                        </td>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{url('/userdashboard')}}" class="btn btn-link text-decoration-none py-2 fw-semibold">
                            <i class="bi bi-arrow-left me-1"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Previous Appointments -->
    <div class="container-fluid p-0 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Previous Appointments</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Stylist Name</th>
                                    <th>Service Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($completed_appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->stylist->name }}</td>
                                        <td>{{ $appointment->service->Name }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No previous appointments.</td>
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
