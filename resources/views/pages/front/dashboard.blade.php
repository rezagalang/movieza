@extends('templatesfront.master')
@section('title', 'Movieza')

@section('content')
    <!-- ======= Events Section ======= -->
    <section id="premier" class="events">
    
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-header">
                <p>Movies <span>Update</span></p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($movies as $movie)
                    <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url({{ asset('storage/' . $movie->image) }})">
                        <h3>{{ $movie->title }}</h3>
                        <div class="price align-self-start">
                            @foreach ($movie->genre()->get() as $genre)
                            <span style="color: white" class="badge bg-primary rounded-pill mb-2">{{ $genre->genre }}</span> 
                            @endforeach
                        </div>
                        <p class="description">
                            Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere. Enim facilis veritatis id est rem repudiandae nulla expedita quas.
                        </p>
                    </div><!-- End Event item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Events Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="favorite" class="chefs section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
        <p>Movies <span>Popular</span></p>
        </div>

        <div class="row gy-4">
        @foreach ($movies->take(3) as $movie)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
            <div class="member-img"> 
                <img src="{{ asset('storage/' . $movie->image) }}" class="img-fluid" alt="" style="background-image: inherit">
            </div>
            <div class="member-info">
                <h4 class="mb-3">{{ $movie->title }}</h4>
                @foreach ($movie->genre()->get() as $genre)
                    <span style="color: white" class="badge bg-primary rounded-pill mb-2">{{ $genre->genre }}</span> 
                @endforeach
            </div>
            </div>
        </div><!-- End Chefs Member -->      
        @endforeach
        </div>      
    </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
        <a href="{{ route('frontAll') }}"><p>Check <span style="color: black">Our Gallery</span></p></a>
        </div>

        <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
            @foreach ($movies as $movie)
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('storage/' . $movie->image) }}"><img src="{{ asset('storage/' . $movie->image) }}" class="img-fluid" alt=""></a></div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        </div>

    </div>
    </section><!-- End Gallery Section -->
@endsection