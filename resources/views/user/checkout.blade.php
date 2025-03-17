@extends('./user/main')
@section('title', 'BarberX - Check Out')
@section('content')

<main>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Check Out</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Appointments</a>
                    <a href="">Check Out</a>
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
                        <h5 class="card-title mb-0">Check Out</h5>
                    </div>
                    <div class="card-body">
                        @if(Session::get('error'))
                                    <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
                                    @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Stylist Name</th>
                                    <th>Service Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->stylist->name }}</td>
                                        <td>{{ $appointment->service->Name }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->service->Price }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No active appointments.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <td>
                            <form action="{{ url('/stripe') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary" 
                                        style="border-radius: 20px; padding: 5px 15px; font-weight: bold; font-size: 12px;">
                                    Pay Now
                                </button>
                            </form>
                        </td>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{url('/user-appointments')}}" class="btn btn-link text-decoration-none py-2 fw-semibold">
                            <i class="bi bi-arrow-left me-1"></i> Back to Appointments
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
