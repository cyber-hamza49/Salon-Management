@extends('./recipient/main')
@section('title', 'Profile')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>
            <a class="badge bg-dark text-white ms-2" href="#">
                Get more page examples
            </a>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('admin/img/avatars/avatar.png') }}" alt="{{ Auth::user()->name }}" 
                             class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0">{{ Auth::user()->name }}</h5>
                        <div class="text-muted mb-2">
    {{ ['1' => 'Admin', '2' => 'Recipient', '3' => 'Stylist', '4' => 'User'][Auth::user()->roles] ?? 'Unknown' }}
</div>


                        <div>
                            <a class="btn btn-primary btn-sm" href="#">Follow</a>
                            <a class="btn btn-primary btn-sm" href="#">
                                <span data-feather="message-square"></span> Message
                            </a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Skills</h5>
                        @foreach(Auth::user()->skills ?? ['Skill 1', 'Skill 2'] as $skill)
                            <a href="#" class="badge bg-primary me-1 my-1">{{ $skill }}</a>
                        @endforeach
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">
                                <span data-feather="home" class="feather-sm me-1"></span> 
                                Lives in <a href="#">{{ Auth::user()->city ?? 'Unknown' }}</a>
                            </li>
                            <li class="mb-1">
                                <span data-feather="briefcase" class="feather-sm me-1"></span> 
                                Works at <a href="#">{{ Auth::user()->company ?? 'Not Available' }}</a>
                            </li>
                            <li class="mb-1">
                                <span data-feather="map-pin" class="feather-sm me-1"></span> 
                                From <a href="#">{{ Auth::user()->hometown ?? 'Not Available' }}</a>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Elsewhere</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a href="#">{{ Auth::user()->website ?? 'Website Not Linked' }}</a></li>
                            <li class="mb-1"><a href="#">{{ Auth::user()->twitter ?? 'Twitter Not Linked' }}</a></li>
                            <li class="mb-1"><a href="#">{{ Auth::user()->facebook ?? 'Facebook Not Linked' }}</a></li>
                            <li class="mb-1"><a href="#">{{ Auth::user()->instagram ?? 'Instagram Not Linked' }}</a></li>
                            <li class="mb-1"><a href="#">{{ Auth::user()->linkedin ?? 'LinkedIn Not Linked' }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Activities</h5>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" 
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i data-feather="more-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Filter Alerts</a></li>
                                <li><a class="dropdown-item" href="#">Mark All as Read</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body h-100">
                        <!-- Regular Activities Section -->
                        @forelse(Auth::user()->activities ?? [] as $activity)
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('admin/img/avatars/avatar-2.jpg') }}" 
                                     width="36" height="36" class="rounded-circle me-2" 
                                     alt="{{ $activity->user->name ?? 'User' }}">
                                <div class="flex-grow-1">
                                    <small class="float-end text-navy">{{ $activity->created_at->diffForHumans() }}</small>
                                    <strong>{{ $activity->user->name ?? 'User' }}</strong> {{ $activity->description ?? '' }}<br />
                                    <small class="text-muted">{{ $activity->created_at }}</small>
                                </div>
                            </div>
                            <hr/>
                        @empty
                            <p class="text-muted text-center mb-0">No recent activities</p>
                        @endforelse

                        <div class="d-grid">
                            <a href="#" class="btn btn-primary">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
