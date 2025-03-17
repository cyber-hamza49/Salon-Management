@extends('./user/main')
@section('title', 'BarberX - Barbers Team')
@section('content')

<main>
   
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Barber</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Barber</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

          <!-- Team Start -->
          <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Barber Team</p>
                    <h2>Meet Our Expert Barber</h2>
                </div>
                <div class="row">
                    @foreach($barbers as $stylist)
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


</main>

@endsection