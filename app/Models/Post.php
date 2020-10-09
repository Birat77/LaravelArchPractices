<?php

namespace App\Models;

use App\Models\Post;
use App\QueryFilters\Sort;
use App\QueryFilters\Active;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'active',
        'description',
    ];

    public static function allPosts()
    {
        return  app(Pipeline::class)
            ->send(Post::query())
            ->through([
                Active::class,
                Sort::class
            ])
            ->thenReturn()
            ->get();
    }
}
