<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Support\Facades\Request;

class BlogController extends Controller
{
    public function index() {
        // $blogs = Blog::with('tag', 'user')->latest()->paginate(3);
        // $blogs = Blog::latest()->paginate(3);
        // if(request('search')) {
        //     $blogs->where('title', 'like', '%' . request('search') . '%');
        // };

        return view('blogs', [
            'title' => 'Blogs',
            'blogs' => Blog::latest()->filter(request(['search', 'tag']))->paginate(4)->withQueryString(),
            'tags' => Tag::latest()->get()
        ]);
    }

    public function show(Blog $blog) {    
        return view('blog', [
            'title' => 'Blog',
            'blog' => $blog
        ]);
    }
}
