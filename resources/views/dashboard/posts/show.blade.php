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
                                <div class=" my-0">
                                    <a href="{{ route('posts.index') }}" class="btn btn-info my-3">Previous page <i class="align-middle" data-feather="maximize"></i></a> &nbsp;
                                    <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-success my-3">Edit this post <i class="align-middle" data-feather="edit"></i></a> &nbsp;
                                    <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger"
                                            id="btn-delete"> Delete
                                            <i class="align-middle"
                                                data-feather="trash"></i></button>
                                    </form>
                                </div>

                                @if ( $post->image )
                                    <div style="max-height: 600px; overflow: hidden;">
                                        <div class="my-2">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                        </div>
                                    </div>
                                @else
                                    <div class="my-2">
                                        <img src="https://source.unsplash.com/1200x598?{{ $post->category->name }}" alt="{{ $post->title }}" class="img-fluid">
                                    </div>
                                @endif

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

@push('script')
    <script>
        $(document).ready(function () {
            $('#btn-delete').on('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Post will be removed',
                    text: 'Are you sure?',
                    icon: 'warning',
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(e.target).closest('form').submit()
                    } else {
                        swal.close();
                    }
                });

            })
        });
    </script>

@endpush

