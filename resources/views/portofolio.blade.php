@extends('layouts.main')

@section('container')

  <div class="album py-5">
    <div class="container">
      <div class="header text-center text-primary">
        <h1>Portofolio</h1>
      </div>
     
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
            @if ($portofolio)
              @foreach ($portofolio as $p)
              <div class="col">
                <div class="card shadow-sm mt-3 bg-light" style="border-radius: 15px;">
                  <div class="card-body text-center">
                    <b>{{ $p['title'] }}</b>
                    <p><a href='{{ $p['url'] }}' target="_blank" class="link-dark ms-1">{{ $p['url'] }}</a></p>
                  </div>
                  <div class="card-body">
                    <img src="{{ asset('storage/'. $p['image']) }}" class="img-fluid" alt="">
                  </div>
                  <div class="card-body">
                    <p class="card-text">{{ $p['description'] }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                      <?php
                          if($p['category'] == 'main'){
                            echo "<span class='badge bg-primary'>Main Job</span>";
                          } elseif($p['category'] == 'freelance') {
                            echo "<span class='badge bg-success'>Freelance</span>";
                          } else {
                            echo "<span class='badge bg-warning'>Self Employeed</span>";
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @endif
          </div>
          <div class="mt-3">
            {{ $portofolio->links() }}
          </div>
    </div>
    
  </div>
@endsection