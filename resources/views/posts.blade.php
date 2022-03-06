@extends('layouts.main')

@section('title')
    All popular posts
@endsection

@section('container')
    <h1 class="text-decoration-underline mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center my-1">
        <div class="col-md-6">
            <form action="/posts" method="get">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search posts..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit" id="searchButton">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-black text-center">
                        @if ($posts[0]->image)
                            <div style="max-height: 400px; overflow: hidden;">
                                <div class="my-2">
                                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->title }}"
                                        class="img-fluid">
                                </div>
                            </div>
                        @else
                            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                            class="card-img-top" alt="{{ $posts[0]->title }}">
                        @endif
                        <h3 class="card-title mt-3">{{ $posts[0]->title }}</h3>
                    </a>
                    <div class="card-body text-center">
                        <p>Author:
                            <small class="text-muted">
                                <a href="/posts?author={{ $posts[0]->author->username }}"
                                    class="text-decoration-none">{{ $posts[0]->author->name }}</a> |
                                <a href="/posts?category={{ $posts[0]->category->slug }}"
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

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4">
                        <article class="mb-5">
                            <div class="card">
                                <div class="position-absolute bg-dark py-2 px-2 text-white opacity-75">
                                    <a href="/posts?category={{ $post->category->slug }}"
                                        class="text-decoration-none text-light">{{ $post->category->name }}</a>
                                </div>

                                @if ( $post->image )
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="card-img-top">
                                @else
                                    <img src="https://source.unsplash.com/1000x800?{{ $post->category->name }}" alt="{{ $post->title }}" class="card-img-top">
                                @endif

                                <div class="card-body">
                                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                        <h2>{{ $post->title }}</h2>
                                    </a>
                                    <p class="mb-5">Author:
                                        <a href="/posts?author={{ $post->author->username }}"
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
    @else
        <p class="fs-2 text-center">No posts found...</p>
    @endif

    <div class="d-flex justify-content-end mb-5">
        {{ $posts->links() }}
    </div>
@endsection
