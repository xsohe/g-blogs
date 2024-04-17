<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        return view('tags', [
            'title' => 'Tags',
            'tags' => Tag::latest()->get()
        ]);
    }

    public function show(Tag $tag) {
        return view('blogs', [
            'title' => 'Tags',
            'tags' => Tag::all(),
            'blogs' => Blog::where('tag_id', $tag->id)->paginate(2)
        ]);
    }
}
