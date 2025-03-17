@extends('./stylist/main')
@section('title', 'Stylist Commission')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">My Commission</h1>
        </div>

        <div class="row">
            <!-- Commission Summary Card -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Commission Summary</h5>
                    </div>

                    <div class="card-body">
                        @if($stylist && $stylist->appointments->count() > 0)
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Total Appointments</th>
                                        <th>Total Service Price</th>
                                        <th>Commission Rate</th>
                                        <th>Total Commission Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $stylist->appointments->count() }}</td>
                                        <td>Rs. {{ number_format($totalServicePrice, 2) }}</td>
                                        <td>{{ $stylist->commission_rate }}%</td>
                                        <td>Rs. {{ number_format($totalCommission, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">No commission data available yet.</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Detailed Appointments Card -->
            @if($stylist && $appointmentDetails->count() > 0)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Appointment Details</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Service</th>
                                    <th>Service Price</th>
                                    <th>Commission Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointmentDetails as $detail)
                                <tr>
                                    <td>{{ date('Y-m-d', strtotime($detail['date'])) }}</td>
                                    <td>{{ date('H:i', strtotime($detail['time'])) }}</td>
                                    <td>{{ $detail['service_name'] }}</td>
                                    <td>Rs. {{ number_format($detail['service_price'], 2) }}</td>
                                    <td>Rs. {{ number_format($detail['commission_amount'], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</main>

@endsection