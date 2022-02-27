@extends('layouts.main')

@section('title')
    All Category
@endsection

@section('container')
    <h1 class="text-decoration-underline mb-4">Posts Categories</h1>

    @foreach ($categories as $category)
        <div class="row">
            <div class="col-md-8">
                <article class="mb-3">
                    <div class="card rounded">
                        <div class="card-header bg-white">
                            <a href="/categories/{{ $category->slug }}" class="text-decoration-none">
                                <h2>{{ $category->name }}</h2>
                            </a>
                        </div>
                        <div class="card-body">
                            <p>{{ $category->name }}</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    @endforeach

@endsection
