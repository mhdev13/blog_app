@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card p-3 py-4">
                    <div class="text-center"> <img src="/img/{{ $image_me }}" width="100" class="rounded-circle"> </div>
                    <div class="text-center mt-3">
                        <i class="bi bi-envelope"> {{ $email }} </i>
                        <h5 class="mt-3 mb-0">{{ $name }}</h5> 
                        <span>{{ $job }}</span>
                        <div class="px-4 mt-3">
                            <p class="fonts">{{ $about }}</p>
                        </div>
                        <div class="mt-3"> 
                            <ul class="list-inline dev-icons">
                                <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                                <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                                <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                                <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                                <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                                <li class="list-inline-item"><i class="fab fa-php"></i></li>
                                <li class="list-inline-item"><i class="fab fa-laravel"></i></li>
                                <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                            </ul>
                            <a href="https://github.com/ahmadpato" class="btn btn-outline-primary px-4 ms-3 social-link" button="submit" target="_blank">Visit My Github</a>
                            <a href="https://www.linkedin.com/in/muhammad-hidayaturrohman-0a1707a8/" class="btn btn-primary px-4 ms-3 social-link" button="submit" target="_blank">Visit My Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
   
