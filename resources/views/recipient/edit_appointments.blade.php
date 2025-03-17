@extends('./recipient/main')
@section('title', 'Edit Appointment')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Edit Appointment</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/update-appointmentr/{{ $appointment->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="UserName">User Name:</label>
                                <input type="text" name="UserName" id="UserName" class="form-control" value="{{ $appointment->user->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="ServiceName">Service Name:</label>
                                <input type="text" name="ServiceName" id="ServiceName" class="form-control" value="{{ $appointment->service->Name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Date">Date:</label>
                                <input type="date" name="Date" id="Date" class="form-control" value="{{ $appointment->date }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Time">Time:</label>
                                <input type="time" name="Time" id="Time" class="form-control" value="{{ $appointment->time }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Status">Status:</label>
                                <select name="Status" id="Status" class="form-control" required>
                                    <option value="1" {{ $appointment->status == 1 ? 'selected' : '' }}>Booked</option>
                                    <option value="0" {{ $appointment->status == 0 ? 'selected' : '' }}>Pending</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Appointment updated successfully.')">Update Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection