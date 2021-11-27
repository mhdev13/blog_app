@extends('layouts.main')

@section('container')

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="header text-center">
        <h1>My Portofolio</h1>
      </div>
      @if ($portofolio)
        @foreach ($portofolio as $p)
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
            <div class="col">
              <div class="card shadow-sm">
                  <img src="{{ asset('storage/'. $p['image']) }}" class="img-fluid" alt="">
                <div class="card-body">
                  <p class="card-text">{{ $p['description'] }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <span class="badge bg-primary">{{ $p['category'] }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div

@endsection