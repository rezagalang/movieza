<!DOCTYPE html>
<html lang="en">
@section('title', 'Detail Movies')
@include('templatesfront.header')

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>Movieza<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#about">Detail Movies</a></li>
                </ul>
            </nav><!-- .navbar -->

            @auth
                <nav id="navbar" class="navbar">
                    <ul>
                        <li class="dropdown"><a href="#"><span>{{ auth()->user()->username }}</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <a><button type="submit" class="dropdown-item">Logout
                                            </button></a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            @else
                <a class="btn-book-a-table" href="{{ route('login.index') }}">Login</a>
            @endauth

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <main id="main">
        <section id="about" class="about why-us section-bg">
            <div class="container aos-init aos-animate" data-aos="fade-up">

                <br><br>
                <div class="section-header">
                    <p><span>{{ $movie->title }}</span></p>
                </div>

                <div class="row gy-4 justify-content-center">
                    <div class="card col-lg-8">
                        <div class="card-body row">
                            @if ($movie->image)
                                <div class="col-lg-4 mt-3 d-flex align-items-end aos-init aos-animate"
                                    data-aos="fade-up" data-aos-delay="300">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $movie->image) }}" class="img-fluid"
                                            alt="">
                                        <a href="{{ asset('storage/' . $movie->image) }}"
                                            class="glightbox play-btn"></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <h6 style="font-weight: bold">Description :</h6>
                                    <p style="text-align: justify;">{{ $movie->description }}</p>
                                </div>
                                <h6>
                                    <span style="color: white"
                                        class="badge bg-primary rounded-pill mt-3">{{ $movie->year }}</span>
                                    @foreach ($movie->genre()->get() as $genre)
                                        <span style="color: black"
                                            class="badge bg-warning rounded-pill mb-2">{{ $genre->genre }}</span>
                                    @endforeach
                                </h6>
                            @endif
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" onclick="history.go(-1)" class="btn btn-sm btn-secondary"
                                title="Back">
                                Back
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('templatesfront.footer')
</body>

</html>
