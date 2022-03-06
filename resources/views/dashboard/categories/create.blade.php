@extends('layouts.dashboard')

@section('title')
    Create Category Page
@endsection

@section('content')
    <h1 class="mb-5 h3">Create new categories</h1>

    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    <strong>Successfull!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Do something great!</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                        id="slug" value="{{ old('slug') }}" required readonly>

                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
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
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        $(document).ready(function () {
            $('#error-alert').fadeTo(4000, 500).slideUp(500, function() {
                $('#error-alert').slideUp(500);
            });

            $('#success-alert').fadeTo(4000, 500).slideUp(500, function() {
                $('#success-alert').slideUp(500);
            });
        });
    </script>
@endpush
