<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('dashboard', compact('blogs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'content' => 'required',
        ]);

        Blog::create($validated);

        return redirect()->route('dashboard')->with('success', 'Blog post created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('edit-blog', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog->update($validated);

        return redirect()->route('dashboard')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('dashboard')->with('success', 'Blog post deleted successfully!');
    }
}