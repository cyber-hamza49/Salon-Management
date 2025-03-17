@extends('./user/main')
@section('title', 'BarberX - Edit Appointment')
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

    <!-- Appointment Edit Form Start -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Edit Appointment</h3>
                    <form action="/update-appoint/{{ $appointment->id }}" method="POST" enctype="multipart/form-data">
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

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary px-4" onclick="return confirm('Appointment updated successfully.')">Update Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
