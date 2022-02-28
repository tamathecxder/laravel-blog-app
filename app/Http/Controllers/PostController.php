<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Unsplash;

class PostController extends Controller
{
    public function index() {
        // $image = Unsplash::search()
        //     ->term('programming')
        //     ->toJson();

		// 	$img = json_decode(json_encode($image), TRUE);

        //     $getVal = $img['results'];

        //     $emptyImage = array();
        //     foreach ($getVal as $key => $value) {
        //         $emptyImage = $value['urls']['regular'] . "<br>";
        //         $arr = array();

        //         $arr = $emptyImage;
        //     }

		// 	dd($arr);

        // $example = Unsplash::photos()->toJson();

        // $toArray = json_decode(json_encode($example), true);
        // $image = $toArray[0]['urls']['regular'];

        return view('posts', [
            'posts' => Post::latest()->get(),
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
