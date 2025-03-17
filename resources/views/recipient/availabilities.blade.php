@extends('./recipient/main')
@section('title', 'Stylist Availabilities')
@section('content')
<main class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Stylist Availabilities</h1>
        </div>
        
        <!-- Availabilities Table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4">ID</th>
                                <th>Stylist Name</th>
                                <th>Date Range</th>
                                <th>Time Range</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($availabilities as $availability)
                                <tr>
                                    <td class="px-4">{{ $availability->id }}</td>
                                    <td>{{ $availability->stylist->name ?? 'N/A' }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($availability->start_date)->format('d-m-Y') }} to
                                        {{ \Carbon\Carbon::parse($availability->end_date)->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($availability->start_time)->format('h:i A') }} to
                                        {{ \Carbon\Carbon::parse($availability->end_time)->format('h:i A') }}
                                    </td>
                                    <td>{{ $availability->created_at->format('d-m-Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i data-feather="calendar" style="width: 20px; height: 20px;"></i>
                                        <p class="mb-0 mt-2">No availabilities found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if($availabilities->hasPages())
            <div class="mt-4">
                {{ $availabilities->links() }}
            </div>
        @endif
    </div>
</main>
@endsection
