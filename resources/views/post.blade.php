@extends('layouts.main')

@section('title')
    {{ $post->title }}
@endsection

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <article>
                <h1>{{ $post->title }}</h1>
                <p>Author: <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> | <a
                        href="/posts?category={{ $post->category->slug }}"
                        class="text-dark fw-bold text-decoration-none">{{ $post->category->name }}</a></p>

                @if ($post->image)
                    <div style="max-height: 600px; overflow: hidden;">
                        <div class="my-2">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                class="img-fluid">
                        </div>
                    </div>
                @else
                    <div class="my-2">
                        <img src="https://source.unsplash.com/1200x598?{{ $post->category->name }}"
                            alt="{{ $post->title }}" class="img-fluid">
                    </div>
                @endif

                <div class="my-2 fs-5">
                    {!! $post->body !!}
                </div>
            </article>


            <a href="/posts" class="btn btn-dark my-3">Back to all posts</a>
        </div>
    </div>
@endsection
