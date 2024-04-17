<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        return view('projects', [
            'title' => 'All Projects',
            'projects' => Projects::with('stack', 'user')->latest()->get()
        ]);
    }

    public function show() {
    }
}
