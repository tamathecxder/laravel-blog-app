@extends('layouts.main')

@section('title')
    All popular posts
@endsection

@section('container')
    @foreach ($posts as $post)
        <article class="mb-5">
            <div class="card">
                <div class="card-header">
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                        <h2>{{ $post->title }}</h2>
                    </a>
                </div>
                <div class="card-body">
                    <p>{{ $post->excerpt }}</p>
                </div>
            </div>
        </article>
    @endforeach
@endsection
