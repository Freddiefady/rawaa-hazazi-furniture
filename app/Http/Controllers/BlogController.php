<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

final class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(): View
    {
        $posts = Post::query()->latest()->get();

        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Display the specified blog post.
     */
    public function show(string $id): View
    {
        $post = Post::query()->findOrFail($id);

        return view('blog.show', ['post' => $post]);
    }
}
