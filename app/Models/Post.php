<?php

namespace App\Models;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body'];

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['author', 'category'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeFilter($query, array $filters) {
        //Example for using isset and ternary operator
        if ( isset($filters['search']) ? $filters['search'] : false ) {
            return $query->where('title', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        }

        // Implements nulls qoalescing operator and when notation
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas( 'category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // Implements arrow function
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author',  fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


}

