@extends('layouts.main')

@section('title')
    {{ $title }}
@endsection

@section('container')
    <div class="row">
        <div class="col-md-8">
            <span>Author: </span><h2 class="mb-4 text-decoration-underline">{{ $title }}</h2>
            @foreach ($posts as $post)
                <article class="mb-5">
                    <div class="card">
                        <div class="card-header bg-white">
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                <h2>{{ $post->title }}</h2>
                            </a>
                            <p>Author:
                                <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> |
                                <a href="/categories/{{ $post->category->slug }}"
                                    class="text-dark fw-bold text-decoration-none">{{ $post->category->name }}</a></p>
                        </div>
                        <div class="card-body">
                            <p>{{ $post->excerpt }}</p>

                            <a href="/posts/{{ $post->slug }}" class="btn btn-outline-primary">Read more...</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Popular Posts</h3>
                </div>
                <div class="card-body">
                    @foreach ($posts->take(5) as $post)
                        <article class="d-flex">
                            <span class="text-dark">{{ $i = isset($i) ? ++$i . '. ' : $i = 1 . '. ' }}</span>&nbsp;
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                <p>{{ $post->title }}1</p>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
