@extends('layouts.main')

@section('title')
    {{ $category->name }}
@endsection

@section('container')
    <span>Category: </span><h2 class="text-decoration-underline mb-4">{{ $category->name }}</h2>

    @foreach ($posts as $post)
        <article class="mb-5">
            <div class="card">
                <div class="card-header bg-white">
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <p>Author:
                        <a href="/authors/{{ $post->author->username }}"
                            class="text-decoration-none">{{ $post->author->name }}</a> |
                        <a href="/categories/{{ $post->category->slug }}"
                            class="text-dark fw-bold text-decoration-none">{{ $post->category->name }}</a>
                    </p>
                </div>
                <div class="card-body">
                    <p>{{ $post->excerpt }}</p>

                    <a href="/posts/{{ $post->slug }}" class="btn btn-outline-primary">Read more...</a>
                </div>
            </div>
        </article>
    @endforeach
@endsection





{{-- Post::create([
    'title' => 'Making async page with Vue JS',
    'slug' => 'making-async-page-with-vue-js',
    'category_id' => 1,
    'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium necessitatibus rem recusandae natus sequi, quaerat dicta minus quam hic consequatur quisquam assumenda molestiae officia saepe tempore',
    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium necessitatibus rem recusandae natus sequi, quaerat dicta minus quam hic consequatur quisquam assumenda molestiae officia saepe tempore, eaque est incidunt aperiam aliquid eligendi nulla iusto harum ipsa numquam. Laudantium rerum adipisci iure voluptatem error delectus necessitatibus debitis? Quis recusandae ad consectetur, nam animi quam doloremque placeat dolores minus earum rerum numquam a adipisci aperiam tempora deleniti fugit asperiores non soluta vitae ut enim possimus? Minus labore quis sint modi atque ratione voluptatum architecto corrupti voluptas ea. Quasi debitis quidem vitae, dolores, officia neque consequuntur odit quaerat culpa natus ratione placeat dolor omnis qui eveniet molestias perspiciatis cumque deleniti inventore iure at fugit. Exercitationem aspernatur quis sit dolore qui, nulla vel expedita nisi veniam ut saepe. Quo accusantium dolorum fugit dolore, odio suscipit et natus soluta dolor beatae recusandae nisi odit cupiditate vero magnam qui iusto minus voluptatibus eum alias? Recusandae, delectus.',
]); --}}
