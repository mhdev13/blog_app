@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <p>By <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none"></a> 
                {{ $post->category->name }}</a>
                </p>

                <p>
                <span class="px-1"><img class="share-socmed mt-2 mb-2" src="/img/{{ $image_wa }}" width="30"></span> 
                <span class="px-1"><img class="share-socmed mt-2 mb-2" src="https://www.freeiconspng.com/uploads/facebook-f-logo-transparent-facebook-f-22.png" width="30"></span> 
                <span class="px-1"><img class="share-socmed mt-2 mb-2" src="https://www.freeiconspng.com/uploads/twitter-icon--basic-round-social-iconset--s-icons-0.png" width="30"></span>
                </p>

                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!!  $post->body !!}
                </article>
                
                <a href="/" class="d-block mt-3">Back to Posts</a>
            </div>
        </div>
    </div>

@endsection