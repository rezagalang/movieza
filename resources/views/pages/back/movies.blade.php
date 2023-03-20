@extends('templates.master')
@section('title', 'Movies')

@section('content')
    <div class="pagetitle">
        <h1>Movies</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <!-- Recent Movies -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-header list-group-item d-flex justify-content-between align-items-start">
                        <h5>List Movies</h5>
                        <button type="button" onclick="location.href='{{ route('movies.create') }}'" class="btn btn-sm btn-primary" title="Add">
                            <i class="fas fa-plus-square" aria-hidden="true"></i>
                        </button>
                    </div>
                  <div class="card-body">
                    <table class="table table-borderless datatable table-hover table-striped">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Genre</th>
                          <th scope="col">Year</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; ?>
                        @foreach ($movies as $movie)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $movie->title }}</td>
                            <td>
                                @foreach ($movie->genre()->get() as $genre)
                                    <span style="color: black" class="badge bg-warning rounded-pill mb-2">{{ $genre->genre }}</span> 
                                @endforeach
                            </td>
                            <td>{{ $movie->year }}</td>
                            <td align="center">
                                <button type="button" onclick="location.href='/movies/{{ $movie->id }}'" class="btn btn-sm btn-secondary rounded-pill swal-del" title="Detail">
                                    <i class="far fa-eye"></i>
                                </button>&ensp;
                                <button type="button" onclick="location.href='/movies/{{ $movie->id }}/edit'" class="btn btn-sm btn-success rounded-pill swal-del" title="Detail">
                                    <i class="far fa-edit"></i>
                                </button>&ensp;
                                <button type="button" class="btn btn-sm btn-danger rounded-pill del" data-id="{{ $movie->id }}" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div><!-- End Recent Movies -->
        </div>
    </section>
@endsection