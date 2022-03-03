@extends('layouts.main')

@section('title')
    All Category
@endsection

@section('container')
    <h1 class="text-decoration-underline mb-4">Posts Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->slug }}" class="text-decoration-none">
                        <div class="card bg-dark text-white mb-5">
                            <img src="https://source.unsplash.com/500x600?{{ $category->name }}" alt="{{ $category->name }}" class="card-img opacity-75" style="filter: blur(0.7px)">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title flex-fill text-center py-2 fs-5" style="background-color: rgba(0,0,0,0.5)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
