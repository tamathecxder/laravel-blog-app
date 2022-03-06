@extends('layouts.dashboard')

@section('title')
    My Posts
@endsection

@section('content')
    <h1 class="h3 mb-3">My Posts</h1>

    <div class="row">
        <div class="col-12 col-md-6">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    <strong>Successfull!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create new post</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Adding new post here, just click the button and then it will redirect to create
                        post page.</p>
                    <a href="{{ route('posts.create') }}" class="card-link btn btn-dark">Go to page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xxl-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Latest Projects</h5>
                                </div>
                                <div class="table-responsive-xl">
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th class="d-xl-table-cell">No.</th>
                                                <th class="d-xl-table-cell">Title</th>
                                                <th class="d-xl-table-cell">Category</th>
                                                <th class="d-xl-table-cell text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td class="d-xl-table-cell">{{ $loop->iteration }}</td>
                                                    <td class="d-xl-table-cell">{{ $post->title }}</td>
                                                    <td class="d-xl-table-cell">{{ $post->category->name }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ route('posts.show', $post->slug) }}"><span
                                                                    class="badge bg-info">More <i class="align-middle"
                                                                        data-feather="maximize"></i></span></a> &nbsp;
                                                            <a href="{{ route('posts.edit', $post->slug) }}"><span class="badge bg-success">Edit <i
                                                                        class="align-middle"
                                                                        data-feather="edit"></i></span></a> &nbsp;
                                                            <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="button" class="badge bg-danger text-white border-0 btn-delete"
                                                                    id="idBtnDelete"> Delete
                                                                    <i class="align-middle"
                                                                        data-feather="trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#error-alert').fadeTo(4000, 500).slideUp(500, function() {
                $('#error-alert').slideUp(500);
            });

            $('#success-alert').fadeTo(4000, 500).slideUp(500, function() {
                $('#success-alert').slideUp(500);
            });

            $('.btn-delete').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Post will be removed!',
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
                        swal.close()
                    }
                });
            });
        });
    </script>
@endpush
