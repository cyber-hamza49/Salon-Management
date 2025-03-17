@extends('./user/main')
@section('title', 'BarberX - Professional Salon')
@section('content')

<main>
	  
        <!-- Hero Start -->
        <div class="hero">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="hero-text">
                            <h1>Welcome to BarberX Salon</h1>
                            <p>
                                We are a team of professional barbers who are passionate about providing the best experience for our clients
                            </p>
                            <a class="btn" href="#book-appointment">Book Appointment</a>
                            {{-- href="https://htmlcodex.com/barber-shop-template" --}}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-none d-md-block">
                        <div class="hero-image">
                            <img src="{{asset('barber_user/img/hero.png')}}" alt="Hero Image">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-play" data-toggle="modal" data-src="#" data-target="#videoModal">
                    <span></span>
                </button>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Video Modal Start-->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" allow="autoplay" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{asset ('BarberX.mp4')}}" id="video"  allowscriptaccess="always" allow="autoplay" muted></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Video Modal End -->


        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="{{asset('barber_user/img/about.jpg')}}" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="section-header text-left">
                            <p style="color: #c2a160">Learn About Us</p>
                            <h2>25 Years Experience</h2>
                        </div>
                        <div class="about-text">
                            <p>
                                Founded in 1999 by Master Stylist Hamza Zaka, Modern Style Salon has been transforming looks and boosting confidence for over two decades. Our journey began with a vision to provide world-class hair care and styling services in a welcoming, professional environment.
                            </p>
                            <p>
                                Today, under the leadership of Hamza Zaka and our team of 15+ highly trained stylists and beauty experts, we've become one of the most trusted names in professional hair care and beauty services. Our commitment to continuous learning and adoption of latest techniques ensures you always get the best service.
                            </p>
                            <a class="btn" href="{{url ('/aboutus')}}">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p style="color: #c2a160">Our Salon Services</p>
                    <h2>Best Salon and Barber Services for You</h2>
                </div>
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-img">
                                <!-- Corrected the asset path -->
                                <img src="{{ asset('user_images/' . $service->Image) }}" alt="Image">
                            </div>
                            <h3>{{ $service->Name }}</h3>
                            <p>
                               {{ $service->Description }}
                            </p>
                            <p class="btn">
                                {{$service->Price . ' PKR'}}
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <img src="{{asset('barber_user/img/testimonial-1.jpg')}}" alt="Image">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut mollis mauris. Vivamus egestas eleifend dui ac consequat. Fusce venenatis at lectus in malesuada. Suspendisse sit amet dolor et odio varius mattis.
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <img src="{{asset('barber_user/img/testimonial-2.jpg')}}" alt="Image">
                        <p>
                            Phasellus pellentesque tempus pretium. Quisque in enim sit amet purus venenatis porttitor sed non velit. Vivamus vehicula finibus tortor. Aliquam vehicula molestie pulvinar. Sed varius libero in leo finibus, ac consectetur tortor rutrum.
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <img src="{{asset('barber_user/img/testimonial-3.jpg')}}" alt="Image">
                        <p>
                            Sed in lectus eu eros tincidunt cursus. Aliquam eleifend velit nisl. Sed et posuere urna, ut vestibulum massa. Integer quis magna non enim luctus interdum. Phasellus sed eleifend erat. Aliquam ligula ex, semper vel tempor pellentesque, pretium eu nulla.
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p style="color: #c2a160">Our Barber Team</p>
                    <h2>Meet Our Expert Barber</h2>
                </div>
                <div class="row">
                    @foreach($stylists as $stylist)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('uploads/' . $stylist->image) }}" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>{{ $stylist->name }}</h2>
                                <p>{{ $stylist->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->       
    
    <!-- Appointment Booking Section -->
    <div class="appointment-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5" id="book-appointment">
                <h6 class="fw-semibold mb-2" style="color: #c2a160">Book Your Appointment</h6>
                <h2 class="display-6 fw-bold mb-3">Schedule Your Visit</h2>
                <div class=" mx-auto"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4 p-md-5">
                        @if(Session::get('msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                {{Session::get('msg')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <!-- Booking Form -->
                            <form action="{{ url('/bookings') }}" method="POST" class="booking-form">
                            @csrf
                            <div class="row g-4">
                                <h5>Personal Information</h5>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Your Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Your Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Select Service</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="bi bi-scissors"></i>
                                            </span>
                                            <select class="form-select" name="service_id" required>
                                                <option value="" selected disabled>Choose a service</option>
                                                @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Select Stylist</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="bi bi-person-badge"></i>
                                            </span>
                                            <select class="form-select" name="stylist_id" required>
                                                <option value="" selected disabled>Choose a stylist</option>
                                                @foreach ($stylists as $stylist)
                                                <option value="{{ $stylist->id }}">{{ $stylist->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Preferred Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="bi bi-calendar"></i>
                                            </span>
                                            <input type="date" class="form-control" name="date" required min="<?php echo date('Y-m-d'); ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Preferred Time</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="bi bi-clock"></i>
                                            </span>
                                            <input type="time" class="form-control" name="time" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-lg w-100 custom-btn">
                                        <i class="bi bi-calendar-check me-2"></i>Book Appointment
                                    </button>
                                </div>
                            </div>
                        </form>
                            <!-- End Booking Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Appointment Booking Section -->
    
    <style>
    /* Custom Styles */
.custom-btn {
    background-color: #1D2434;
    color: #D5B981;
    transition: all 0.3s ease;
}

.custom-btn:hover {
    background-color: #D5B981;
    color: #1D2434;
}

.custom-btn:focus {
    box-shadow: 0 0 0 0.25rem rgba(213, 185, 129, 0.5);
}
    .appointment-section {
        background-color: #f8f9fa;
    }
    
    .separator {
        width: 50px;
        height: 3px;
        background-color: var(--bs-primary);
        margin-top: 15px;
    }
    
    .card {
        border-radius: 15px;
        transition: transform 0.2s;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .form-control, .form-select {
        padding: 0.6rem 1rem;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
    
    .input-group-text {
        border: 1px solid #dee2e6;
        border-radius: 8px 0 0 8px;
    }
    
    .input-group > :not(:first-child) {
        border-radius: 0 8px 8px 0;
        margin-left: -1px;
    }
    
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #495057;
    }
    
    .btn-primary {
        padding: 12px 24px;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.2);
    }
    
    .alert {
        border-radius: 10px;
        border: none;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 767px) {
        .card-body {
            padding: 1.5rem !important;
        }
        
        .btn-lg {
            padding: 10px 20px;
        }
        
        .display-6 {
            font-size: calc(1.2rem + 1.5vw);
        }
    }
    
    /* Validation Styles */
    .form-control.is-invalid, .form-select.is-invalid {
        border-color: #dc3545;
        background-image: none;
    }
    
    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
        margin-top: 0.25rem;
    }
    </style>
    
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const stylistSelect = document.querySelector('select[name="stylist_id"]');
    const dateInput = document.querySelector('input[name="date"]');
    const timeInput = document.querySelector('input[name="time"]');

    stylistSelect.addEventListener('change', function() {
        const stylist_id = this.value;
        if (!stylist_id) return;

        // Reset date and time inputs
        dateInput.value = '';
        timeInput.value = '';

        // Fetch stylist availability
        fetch(`/get-stylist-availability/${stylist_id}`)
            .then(response => response.json())
            .then(availabilities => {
                // Enable date input and set constraints
                dateInput.disabled = false;

                // Create array of available dates
                const availableDates = [];
                availabilities.forEach(availability => {
                    let currentDate = new Date(availability.start_date);
                    const endDate = new Date(availability.end_date);
                    
                    while (currentDate <= endDate) {
                        availableDates.push(currentDate.toISOString().split('T')[0]);
                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                });

                // Set min and max dates
                dateInput.min = availableDates[0];
                dateInput.max = availableDates[availableDates.length - 1];

                // Add event listener for date selection
                dateInput.addEventListener('change', function() {
                    const selectedDate = this.value;
                    const dateAvailability = availabilities.find(a => 
                        selectedDate >= a.start_date && selectedDate <= a.end_date
                    );

                    if (dateAvailability) {
                        timeInput.disabled = false;
                        timeInput.min = dateAvailability.start_time;
                        timeInput.max = dateAvailability.end_time;
                    }
                });
            });
    });
});
</script>
    
    @endsection