@extends('layouts.main')

@section('title')
    {{ $post->title }}
@endsection

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        <p>Author: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> | <a href="/categories/{{ $post->category->slug }}" class="text-dark fw-bold text-decoration-none">{{ $post->category->name }}</a></p>

        <div class="mb-5"></div>

        {!! $post->body !!}
    </article>


    <a href="/posts" class="btn btn-dark my-3">Back to all posts</a>
@endsection



