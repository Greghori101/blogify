<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('status', 'published');

        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        $posts = $query->latest()->paginate(6)->withQueryString();

        $sources = Post::select('source')->distinct()->pluck('source');

        return view('public.posts.index', compact('posts', 'sources'));
    }

    public function show(Post $post)
    {
        abort_if($post->status !== 'published', 404);
        return view('public.posts.show', compact('post'));
    }
}
