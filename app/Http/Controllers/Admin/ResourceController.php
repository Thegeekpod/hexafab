<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ResourceItem;
use Illuminate\Support\Str;

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
            'description' => 'nullable|string',
            'icon_type' => 'required|string|in:brochure,manual,specs,custom',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480',
            'link_text' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if (empty($data['link_text'])) {
            $data['link_text'] = 'Download PDF';
        }

        if ($request->hasFile('pdf_file')) {
            $pdfName = time() . '_' . Str::slug($request->title) . '_manual.' . $request->pdf_file->extension();
            $request->pdf_file->move(public_path('documents/uploads'), $pdfName);
            $data['pdf_path'] = 'documents/uploads/' . $pdfName;
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $request->image->extension();
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
            'description' => 'nullable|string',
            'icon_type' => 'required|string|in:brochure,manual,specs,custom',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480',
            'link_text' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if (empty($data['link_text'])) {
            $data['link_text'] = 'Download PDF';
        }

        if ($request->hasFile('pdf_file')) {
            $pdfName = time() . '_' . Str::slug($request->title) . '_manual.' . $request->pdf_file->extension();
            $request->pdf_file->move(public_path('documents/uploads'), $pdfName);
            $data['pdf_path'] = 'documents/uploads/' . $pdfName;
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $request->image->extension();
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
