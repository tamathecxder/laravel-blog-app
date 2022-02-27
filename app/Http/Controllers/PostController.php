<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            'posts' => Post::all(),
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post,
        ]);
    }
}























    // Assign posts array to an single post
    // $new_post = [];
    // foreach ($blog_posts as $post) {
    //     if ( $post['slug'] === $slug ) {
    //         $new_post = $post;
    //     }
    // }
