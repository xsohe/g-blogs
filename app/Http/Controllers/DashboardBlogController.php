<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DashboardBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.blogs.index', [
            'title' => 'Dashboard Blog',
            'blogs' => Blog::where('user_id', auth()->user()->id)->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create', [
            'title' => 'Dashboard Creat Blog',
            'tags' => Tag::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'slug' => ['required', 'unique:blogs', 'min:3'],
            'tag_id' => ['required'],
            'body' => ['required'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        Blog::create($validatedData);
        
        return redirect('/dashboard/blogs')->with('success', 'Successfull, A new blog has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('dashboard.blogs.show', [
            'title' => 'Dashboard Blog',
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', [
            'title' => 'Dashboard Blog Edit',
            'tags' => Tag::all(),
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'slug' => [!$blog ? Rule::unique('blogs') : Rule::unique('blogs')->ignore($blog->id)],
            'tag_id' => ['required'],
            'body' => ['required'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Blog::where('id', $blog->id)->update($validatedData);
        return redirect('/dashboard/blogs')->with('success', 'Blog has beed updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $dom = new DOMDocument();
        $dom->loadHTML(strip_tags($blog->body, '<img>'));

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            $path = Str::after($src, '/storage/');

            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }

        // $blog->delete();
        Blog::destroy($blog->id);
        return redirect('/dashboard/blogs')->with('success', 'Blog has been deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('media', $fileName);
    
            $url = asset('storage/' . $filePath);
    
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    
}
