@extends('./recipient/main')
@section('title', 'Appointments List')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Show Appointments</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Appointment List</h5>
                      
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
                                        <th>Appointment</th>
                                        <th>Payment</th>
                                        <th>Actions</th>       
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
                {{-- <form action="{{ route('toggle.appointment', $appointment->id) }}" method="POST">
                    @csrf --}}
                    <button type="submit" 
                            class="btn btn-sm {{ $appointment->status == 1 ? 'btn-success text-white' : 'btn-warning text-dark' }}"
                            style="border-radius: 20px; padding: 5px 15px; font-weight: bold; font-size: 12px;">
                        {{ $appointment->status == 1 ? 'Booked' : 'Pending' }}
                    </button>
                {{-- </form> --}}
            </td>
            <td>
                <button type="submit" 
                class="btn btn-sm {{ $appointment->appointment_status == 1 ? 'btn-success text-white' : 'btn-warning text-dark' }}"
                style="border-radius: 20px; padding: 5px 15px; font-weight: bold; font-size: 12px;">
            {{ $appointment->appointment_status == 1 ? 'Completed' : 'Pending' }}
        </button>
            </td>
            <td>{{ $appointment->payment_status }}</td>
            
            <td>
            <a href="/edit-appointmentr/{{ $appointment->id }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="/delete-appointmentr/{{ $appointment->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Appointment?')">Delete</button>
                </form>
            </td>
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
