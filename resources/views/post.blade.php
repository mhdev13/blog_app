
@extends('layouts.main')

@section('container')

    @foreach ($post as $p)
    <article class="mb-5"> 
        <h2>
            <a href="/posts/{{ $p["slug"] }}">{{ $p["title"] }} </a>
        </h2>
        <h5>By : {{ $p["author"] }}</h5>
        <p> {{ $p["body"] }}</p>
    </article>
   @endforeach

@endsection

