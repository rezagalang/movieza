<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-lg-0">
      <h1>Movieza<span>.</span></h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="#hero">Home</a></li>
        <li><a href="#premier">Premier</a></li>
        <li><a href="#favorite">Favorite</a></li>
        <li><a href="#gallery">Gallery</a></li>
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