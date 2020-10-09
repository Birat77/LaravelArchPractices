<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Channel;
use App\QueryFilters\Sort;
use App\QueryFilters\Active;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function index()
    {
        /**
         * convention
         */
        // $posts  = Post::query();
        // if (request()->has('active')) {
        //     $posts->where('active', request()->get('active'));
        // }
        // if (request()->has('sort')) {
        //     $posts->orderBy('title', request()->get('sort'));
        // }
        // $posts = $posts->get();
        /**
         * pipeline method
         */

        $posts = Post::allPosts();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        // $channels = Channel::all()->sortBy('name');
        // return view('post.create', compact('channels'));
        return view('post.create');
    }
}
