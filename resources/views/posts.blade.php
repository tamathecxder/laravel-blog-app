@extends('layouts.main')

@section('title')
    All popular posts
@endsection

@section('container')
    <h1 class="text-decoration-underline mb-3">All Posts</h1>

    @if ($posts->count())
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-black text-center">
                        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                            class="card-img-top" alt="{{ $posts[0]->title }}">
                        <h3 class="card-title mt-3">{{ $posts[0]->title }}</h3>
                    </a>
                    <div class="card-body text-center">
                        <p>Author:
                            <small class="text-muted">
                                <a href="/authors/{{ $posts[0]->author->username }}"
                                    class="text-decoration-none">{{ $posts[0]->author->name }}</a> |
                                <a href="/categories/{{ $posts[0]->category->slug }}"
                                    class="text-dark fw-bold text-decoration-none">{{ $posts[0]->category->name }}</a> |
                                <span class="badge bg-danger">{{ $posts[0]->created_at->diffForHumans() }}</span>
                            </small>
                        </p>
                        <p class="card-text">{{ $posts[0]->excerpt }}</p>

                        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-outline-primary">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="fs-4">No posts found.</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4">
                    <article class="mb-5">
                        <div class="card">
                            <div class="position-absolute bg-dark py-2 px-2 text-white opacity-75">
                                <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-light">{{ $post->category->name }}</a>
                            </div>
                            <img src="https://source.unsplash.com/1000x800?{{ $post->category->name }}"
                                class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body">
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                    <h2>{{ $post->title }}</h2>
                                </a>
                                <p class="mb-5">Author:
                                    <a href="/authors/{{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </p>
                                <p>{{ Str::limit($post->excerpt, 200, '...') }}</p>

                                <a href="/posts/{{ $post->slug }}" class="btn btn-outline-primary">Read more...</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Popular Posts</h3>
                </div>
                <div class="card-body">
                    @foreach ($posts->take(10) as $post)
                        <article class="d-flex">
                            <span
                                class="text-dark">{{ $i = isset($i) ? ++$i . '. ' : ($i = 1 . '. ') }}</span>&nbsp;
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
