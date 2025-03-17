@extends('./recipient/main')
@section('title', 'Stylist Commission')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Stylist Commission Tracking</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Commission List</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Stylist</th>
                                    <th>Total Appointments</th>
                                    <th>Total Service Price</th>
                                    <th>Commission %</th>
                                    <th>Total Commission Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($stylists as $stylist)
                                    @php
                                        $totalServicePrice = $stylist->appointments->sum(fn($appointment) => $appointment->service->Price);
                                        $totalCommission = ($totalServicePrice * $stylist->commission_rate) / 100;
                                    @endphp
                                    <tr>
                                        <td>{{ $stylist->name }}</td>
                                        <td>{{ $stylist->appointments->count() }}</td>
                                        <td>Rs. {{ number_format($totalServicePrice, 2) }}</td>
                                        <td>{{ $stylist->commission_rate }}%</td>
                                        <td>Rs. {{ number_format($totalCommission, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Commissions Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <h5>Total Commission Paid: <b>Rs. {{ number_format($stylists->sum(fn($stylist) => ($stylist->appointments->sum(fn($appointment) => $appointment->service->Price) * $stylist->commission_rate) / 100), 2) }}</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection
