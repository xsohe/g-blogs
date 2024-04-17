<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Stack;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.projects.index', [
            'title' => 'My Projects',
            'projects'=> Projects::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.create', [
            'title' => 'Projects create',
            'stacks' => Stack::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'slug' => ['required', 'unique:projects'],
            'stack_id' => ['required'],
            'desc' => ['required'],
            'image' => ['required', 'file', 'max:1024'],
            'source' => ['required'],
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('projects-img');
        }

        $validatedData['user_id'] = auth()->user()->id;
        // dd($validatedData);
        Projects::create($validatedData);
        return redirect('/dashboard/projects')->with('success', 'Project has been added!');
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
    public function edit(Projects $project)
    {
        return view('dashboard.projects.edit', [
            'title' => 'Dashboar edit project',
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Projects::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
