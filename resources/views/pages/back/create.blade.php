@extends('templates.master')
@section('title', 'Add Movie')

@section('content')
    <div class="pagetitle">
        <h1>Add Movie</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/movies') }}">Home</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body row g-3">
                        <h5 class="card-title">Form Movie</h5>
                        <!-- Add Form -->
                        <form action="{{ route('movies.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="genre" class="form-label">Genre</label>
                                <select class="form-select @error('genre') is-invalid @enderror" name="genre[]" id="genre" multiple="true" required>
                                    <option value="Action">Action</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Animated">Animated</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Fantasy">Fantasy</option>
                                    <option value="Historical">Historical</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Thriller">Thriller</option>
                                </select>
                                @error('genre')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="year" class="form-label">When is the release year?</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}">
                                @error('year')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div>
                                  <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="height: 100px">{{ old('description') }}</textarea>
                                  @error('description')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="image" class="form-label">Image</label>
                                <div style="max-height: 570px; max-width: 350px; overflow: hidden;">
                                    <img class="img-preview img-fluid mb-3">
                                </div>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>&ensp;
                                <button type="button" onclick="history.go(-1)" class="btn btn-sm btn-danger">Cancel</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection