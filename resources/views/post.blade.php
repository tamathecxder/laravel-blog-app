@extends('layouts.main')

@section('title')
    Single Post Example
@endsection

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        <p>Author: John Doe | <a href="/categories/{{ $post->category->slug }}" class="text-dark fw-bold text-decoration-none">{{ $post->category->name }}</a></p>
        {!! $post->body !!}
    </article>


    <a href="/posts" class="btn btn-dark my-3">Back to all posts</a>
@endsection

