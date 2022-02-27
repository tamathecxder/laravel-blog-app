<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            'title' => 'Example title for blogpost',
            'slug' => 'example-title-for-blogpost',
            'author' => 'John Doe',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum placeat voluptatem vitae reprehenderit? Ad fugiat impedit cupiditate voluptatem consectetur illum, laborum officia debitis mollitia tenetur harum, qui odio esse, natus commodi doloribus hic non aut aperiam dolores. Itaque saepe minus, rem id fuga consequatur. Assumenda reprehenderit molestias harum sapiente architecto explicabo natus qui ducimus libero ipsa nisi maxime quaerat at, debitis ut reiciendis quae expedita corrupti illum quod aperiam. Modi, voluptatibus voluptate! Cumque mollitia, iure, ipsa beatae reiciendis laboriosam quam eaque ab rem nobis unde necessitatibus tempore quia enim perferendis dignissimos eos? Adipisci facere inventore, dolor qui soluta accusamus. Iure.'
        ],
        [
            'title' => 'Example title for blogpost part 2',
            'slug' => 'example-title-for-blogpost-part-2',
            'author' => 'Jane Doe',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quibusdam fugit ex ratione facere, quia, aspernatur ipsa illo impedit eos accusantium doloribus nemo delectus reiciendis velit voluptatum incidunt vero sit sed porro doloremque at nisi animi aperiam. Voluptatum, beatae suscipit qui iure numquam facere delectus dolores repellat, et vitae voluptates soluta debitis repudiandae cum. Obcaecati dolore sapiente dolores rerum, eum soluta autem sunt voluptatem atque ad exercitationem molestias culpa dicta libero commodi veniam voluptates laboriosam doloremque excepturi expedita perferendis dignissimos ut provident possimus. Ipsam amet quos in neque saepe at ipsum suscipit, similique aliquam cum quam impedit dolorum rerum sint, beatae explicabo repellendus sequi quas hic iste, earum veniam odio dolore reprehenderit. Libero minus dolores nesciunt minima consequuntur, doloribus maxime.'
        ],
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
