@extends('layouts.dashboard')

@section('title')
    Homepage
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <article>
                                <h1>{{ $post->title }}</h1>
                                <div class="d-flex flex-row my-0">
                                    <a href="{{ route('posts.index') }}" class="btn btn-info my-3">Previous page <i class="align-middle" data-feather="maximize"></i></a> &nbsp;
                                    <a href="{{ route('posts.index') }}" class="btn btn-success my-3">Edit this post <i class="align-middle" data-feather="edit"></i></a> &nbsp;
                                    <a href="{{ route('posts.index') }}" class="btn btn-danger my-3">Delete <i class="align-middle" data-feather="trash"></i></a>
                                </div>

                                <div class="my-2">
                                    <img src="https://source.unsplash.com/1200x598?{{ $post->category->name }}" alt="{{ $post->title }}" class="img-fluid">
                                </div>

                                <div class="my-3 fs-4">
                                    {!! $post->body !!}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


