<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tags.index', [
            'title' => 'My Tags',
            'tags' => Tag::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tags.create', [
            'title' => 'Tags create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:tags'],
            'slug' => ['required', 'unique:tags'],
        ]);

        Tag::create($validatedData);

        return redirect('/dashboard/tags')->with('success', 'Successfull, add new tag');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', [
            'title' => 'Dashboard edit tags',
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:tags'],
            'slug' => [!$tag ? Rule::unique('tags') : Rule::unique('tags')->ignore($tag->id)],
        ]);

        Tag::where('id', $tag->id)->update($validatedData);
        return redirect('/dashboard/tags')->with('success', 'Tag has beed updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Tag::destroy($tag->id);

        return redirect('/dashboard/tags')->with('success', 'Tag has been deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Tag::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
