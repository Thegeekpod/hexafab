<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ResourceItem;

class ResourceController extends Controller
{
    public function index()
    {
        return view('admin.resources.index', [
            'resources' => ResourceItem::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.resources.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'link_text' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/uploads'), $imageName);
            $data['image_path'] = 'images/uploads/' . $imageName;
        }

        ResourceItem::create($data);

        return redirect()->route('admin.resources.index')->with('success', 'Resource created successfully.');
    }

    public function edit($id)
    {
        $resource = ResourceItem::findOrFail($id);
        return view('admin.resources.edit', compact('resource'));
    }

    public function update(Request $request, $id)
    {
        $resource = ResourceItem::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'link_text' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/uploads'), $imageName);
            $data['image_path'] = 'images/uploads/' . $imageName;
        }

        $resource->update($data);

        return redirect()->route('admin.resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy($id)
    {
        $resource = ResourceItem::findOrFail($id);
        $resource->delete();
        return redirect()->route('admin.resources.index')->with('success', 'Resource deleted successfully.');
    }
}
