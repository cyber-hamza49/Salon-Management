@extends('./admin/dashboard')
@section('title', 'Dashboard')
@section('content')

<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

		<div class="row">
			<div class="col-xl-6 col-xxl-5 d-flex">
				<div class="w-100">
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total Appointments</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="scissors"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $totalAppointments }}</h1>
									<div class="mb-0">
										<span class="text-muted">Total bookings</span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Pending Appointments</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="loader"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $pendingAppointments }}</h1>
									<div class="mb-0">
										<span class="text-muted">Awaiting service</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total Earnings</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="dollar-sign"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">Rs. {{ number_format($totalEarnings) }}</h1>
									<div class="mb-0">
										<span class="text-muted">From paid appointments</span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Services</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="grid"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $services->count() }}</h1>
									<div class="mb-0">
										<span class="text-muted">Available services</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<h5 class="card-title mb-0">Recent Movement</h5>
					</div>
					<div class="card-body py-3">
						<div class="chart chart-sm">
							<canvas id="chartjs-dashboard-line"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-8 col-xxl-9 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<h5 class="card-title mb-0">Recent Appointments</h5>
					</div>
					<table class="table table-hover my-0">
						<thead>
							<tr>
								<th>Service</th>
								<th>Date</th>
								<th>Time</th>
								<th>Status</th>
								<th>Payment</th>
							</tr>
						</thead>
						<tbody>
							@foreach($appointments->take(8) as $appointment)
							<tr>
								<td>{{ optional($services->find($appointment->service_id))->Name }}</td>
								<td>{{ $appointment->date }}</td>
								<td>{{ $appointment->time }}</td>
								<td>
									@if($appointment->appointment_status == 1)
										<span class="badge bg-success">Completed</span>
									@else
										<span class="badge bg-warning">Pending</span>
									@endif
								</td>
								<td>
									@if($appointment->payment_status == 'paid')
										<span class="badge bg-success">Paid</span>
									@else
										<span class="badge bg-danger">Pending</span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-12 col-lg-4 col-xxl-3 d-flex">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<h5 class="card-title mb-0">Inventory Status</h5>
					</div>
					<div class="card-body d-flex w-100">
						<div class="align-self-center chart chart-lg">
							<table class="table mb-0">
								<tbody>
									@foreach($inventory as $item)
									<tr>
										<td>{{ $item->product_name }}</td>
										<td class="text-end">{{ $item->quantity }} {{ $item->unit }}</td>
									</tr>
									@endforeach
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