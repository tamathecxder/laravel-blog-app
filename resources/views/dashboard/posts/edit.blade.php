@extends('layouts.dashboard')

@section('title')
    Create Post Page
@endsection

@section('content')
    <h1 class="mb-5 h3">Edit selected post</h1>

    <div class="row">
        <div class="col-12">
            {{-- @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    <strong>Register Done!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Do something great!</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="{{ route('posts.update', $post->slug) }}" method="post"
                                enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Post title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ old('title', $post->title) }}" required autofocus>

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                        id="slug" value="{{ old('slug', $post->slug) }}" required readonly>

                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Category" class="form-label">Post category</label>
                                    <select name="category_id" class="form-select mb-3" required>
                                        <option selected disabled>Open this select menu</option>
                                        @foreach ($categories as $category)
                                            @if (old('category_id', $post->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="old_image" value="{{ $post->image }}">
                                    <label for="image" class="form-label">Posts banner image</label>
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" class="d-block img-preview img-fluid mb-3 col-sm-6">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-6">
                                    @endif

                                    <input class="form-control @error('image') is-invalid @enderror" name="image"
                                        type="file" id="image" onchange="previewImage()">

                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>

                                    @error('body')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                                    <trix-editor input="body"></trix-editor>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/post/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        // trix file tools remove behaviour
        document.addEventListener('trix-file-accept', function(event) {
            event.preventDefault();
        });

        $(document).ready(function() {
            $('#error-alert').fadeTo(4000, 500).slideUp(500, function() {
                $('#error-alert').slideUp(500);
            });

            $('#success-alert').fadeTo(4000, 500).slideUp(500, function() {
                $('#success-alert').slideUp(500);
            });
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
