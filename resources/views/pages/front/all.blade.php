<!DOCTYPE html>
<html lang="en">
@section('title', 'All Movies')
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
        <li><a href="#allMovies">All Movies</a></li>
      </ul>
    </nav><!-- .navbar -->

    @auth
      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>{{ auth()->user()->username }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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
  <!-- ======= Movie Section ======= -->

  <section id="allMovies" class="chefs section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        &nbsp;
      </div>

      <div class="row gy-4">
        @foreach ($movies as $movie)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="chef-member">
            <div class="member-img"> 
              <img src="{{ asset('storage/' . $movie->image) }}" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <a href="/all/{{ $movie->id }}/detail"><h4 class="mb-3">{{ $movie->title }}</h4></a>
              @foreach ($movie->genre()->get() as $genre)
                    <span style="color: white" class="badge bg-primary rounded-pill mb-2">{{ $genre->genre }}</span> 
              @endforeach
            </div>
          </div>
        </div><!-- End Movie Member -->      
        @endforeach
      </div>      
    </div>
  </section><!-- End Movie Section -->
</main><!-- End #main -->

@include('templatesfront.footer')
</body>
</html>