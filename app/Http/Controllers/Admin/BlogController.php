<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string|max:100',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:3072',
            'link_text' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'reading_time' => 'nullable|string|max:100',
        ]);

        $data['slug'] = Str::slug($request->title);
        
        // Ensure slug uniqueness
        $count = Blog::where('slug', 'like', $data['slug'] . '%')->count();
        if ($count > 0) {
            $data['slug'] = $data['slug'] . '-' . ($count + 1);
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('images/uploads'), $imageName);
            $data['image_path'] = 'images/uploads/' . $imageName;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string|max:100',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:3072',
            'link_text' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'reading_time' => 'nullable|string|max:100',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('images/uploads'), $imageName);
            $data['image_path'] = 'images/uploads/' . $imageName;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog article deleted successfully.');
    }
}
