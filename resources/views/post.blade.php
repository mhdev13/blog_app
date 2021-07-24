
@extends('layouts.main')

@section('container')

    @foreach ($post as $p)
    <article class="mb-5"> 
        <h2>
            <a href="/posts/{{ $p->slug }}">{{ $p->title }} </a>
        </h2>
        <p> {{ $p->excerpt }}</p>
    </article>
   @endforeach

@endsection

