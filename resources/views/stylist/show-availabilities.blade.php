@extends('./stylist/main')
@section('title', 'My Availabilities')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">My Availabilities</h1>
            <a href="{{ route('stylist.add-availability') }}" class="btn btn-primary float-end">Add New Availability</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Available Time Slots</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($availabilities as $availability)
                                <tr>
                                    <td>{{ $availability->start_date }}</td>
                                    <td>{{ $availability->end_date }}</td>
                                    <td>{{ $availability->start_time }}</td>
                                    <td>{{ $availability->end_time }}</td>
                                    <td>
                                        <form action="{{ route('stylist.delete-availability', $availability->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection