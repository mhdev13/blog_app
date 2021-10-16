@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card p-3 py-4">
                    <div class="text-center"> <img src=" https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" width="100" class="rounded-circle"> </div>
                    <div class="text-center mt-3">
                        <i class="bi bi-envelope"> {{ $email }} </i>
                        <h5 class="mt-3 mb-0">{{ $name }}</h5> 
                        <span>{{ $job }}</span>
                        <div class="px-4 mt-3">
                            <p class="fonts">{{ $about }}</p>
                        </div>
                        <div class="mt-3"> 
                            <a href="https://github.com/ahmadpato" class="btn btn-outline-primary px-4 ms-3 social-link" button="submit" target="_blank">Follow My Github</a>
                            <a href="https://www.linkedin.com/in/muhammad-hidayaturrohman-0a1707a8/" class="btn btn-primary px-4 ms-3 social-link" button="submit" target="_blank">Follow My Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
   
