@extends('./user/main')
@section('title', 'BarberX - About Us')
@section('content')

<main>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>About Us</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">About Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="about">
        <div class="container">
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
                                <p>Learn About Us</p>
                                <h2>25 Years Experience</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Founded in 1999 by Master Stylist Hamza Zaka, Modern Style Salon has been transforming looks and boosting confidence for over two decades. Our journey began with a vision to provide world-class hair care and styling services in a welcoming, professional environment.
                                </p>
                                <p>
                                    Today, under the leadership of Hamza Zaka and our team of 15+ highly trained stylists and beauty experts, we've become one of the most trusted names in professional hair care and beauty services. Our commitment to continuous learning and adoption of latest techniques ensures you always get the best service.
                                </p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-highlights mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Our Expertise</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check-circle"></i> Hair Styling  & Cutting</li>
                            <li><i class="fa fa-check-circle"></i> Color Treatments</li>
                            <li><i class="fa fa-check-circle"></i> Menicure & Pedicure</li>
                            <li><i class="fa fa-check-circle"></i> Skin Care Treatments</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Contact Information</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-map-marker"></i> Location: Aptech - Metro Star Gate</li>
                            <li><i class="fa fa-phone"></i> Appointments: +92 332 3500430</li>
                            <li><i class="fa fa-clock"></i> Hours: 10:00 AM - 8:00 PM</li>
                            <li><i class="fa fa-envelope"></i> Email: hamzaka549@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Additional Salon Information -->
            <div class="row mt-5">
                <div class="col-lg-4 col-md-6">
                    <div class="info-box text-center p-4">
                        <i class="fa fa-cut fa-3x mb-3"></i>
                        <h3>Expert Team</h3>
                        <p>Our stylists regularly train with industry leaders to master the latest techniques and trends in hair care.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="info-box text-center p-4">
                        <i class="fa fa-spa fa-3x mb-3"></i>
                        <h3>Premium Products</h3>
                        <p>We use only the highest quality products from renowned brands to ensure the best results for your hair.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="info-box text-center p-4">
                        <i class="fa fa-heart fa-3x mb-3"></i>
                        <h3>Client Satisfaction</h3>
                        <p>Your satisfaction is our priority. We ensure personalized attention to every client who visits us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
</main>

<style>
.about-highlights {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
    margin: 20px 0;
}

.about-highlights h4 {
    color: #333;
    margin-bottom: 15px;
    font-size: 1.2rem;
}

.about-highlights ul li {
    margin-bottom: 10px;
    color: #666;
}

.about-highlights i {
    color: #D5B981;
    margin-right: 10px;
}

.info-box {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    margin-bottom: 20px;
}

.info-box:hover {
    transform: translateY(-5px);
}

.info-box i {
    color: #D5B981;
}

.info-box h3 {
    color: #333;
    font-size: 1.5rem;
    margin: 15px 0;
}

.info-box p {
    color: #666;
}

.team-item {
    position: relative;
    margin-bottom: 30px;
}

.team-img img {
    width: 100%;
    border-radius: 5px;
}

.team-text {
    position: relative;
    padding: 25px 15px;
    text-align: center;
    background: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 0 0 5px 5px;
}

.team-text h2 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 5px;
}

.team-text p {
    margin: 0;
    color: #666;
}

@media (max-width: 768px) {
    .about-highlights .col-md-6:first-child {
        margin-bottom: 20px;
    }
    
    .info-box {
        margin-bottom: 20px;
    }

    .team-item {
        margin-bottom: 30px;
    }
}
</style>

@endsection