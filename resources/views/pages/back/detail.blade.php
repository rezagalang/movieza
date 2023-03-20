@extends('templates.master')
@section('title', 'Detail Movie')

@section('content')
    <div class="pagetitle">
        <h1>Detail Movie</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title mb-0">{{ $movie->title }}&ensp;<span style="color: white" class="badge bg-info rounded-pill">{{ $movie->year }}</span></h5>
                      <h6>
                        @foreach ($movie->genre()->get() as $genre)
                            <span style="color: black" class="badge bg-warning rounded-pill mb-2">{{ $genre->genre }}</span> 
                        @endforeach  
                      </h6>
                      @if ($movie->image)
                      <div>
                        <img src="{{ asset('storage/'. $movie->image) }}" alt="{{ $movie->title }}" class="img-fluid mb-3">
                      </div>
                      @endif
                      {{ $movie->description }} <br><br>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" onclick="history.go(-1)" class="btn btn-sm btn-secondary" title="Back">
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
