@extends('templates.master')
@section('title', 'Dashboard')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 mb-3">
                Welcome to Website List Movie
            </div>
            @foreach ($movies as $movie)
                <div class="col-lg-3">
                    <!-- Card with an image on top -->
                    <div class="card">
                        <a href="/movies/{{ $movie->id }}"><img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->title }}" class="card-img-top" style="max-height: 330px;"></a>
                        <div class="card-body">
                            <h5 class="card-title overflow-hidden" style="max-height: 65px;"><a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a></h5>
                            <div style="max-height: 100px;" class="overflow-hidden">
                                <p class="card-text">{{ $movie->description }}</p>
                            </div>
                        </div>
                    </div><!-- End Card with an image on top -->
                </div>
            @endforeach
        </div>
        @if (request()->segment(2) !== 'all')
            <a href="{{ route('dashboardAll') }}" class="d-flex justify-content-center"><u>show all</u></a>
        @endif
    </section>
@endsection
