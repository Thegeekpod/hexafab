<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'hero_img' => 'nullable|image|max:2048',
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_desc' => 'nullable|string',
            'specifications' => 'nullable|array',
            'spec_bar' => 'nullable|array',
            'app_heading' => 'nullable|string|max:255',
            'app_commercial_title' => 'nullable|string|max:255',
            'app_commercial_desc' => 'nullable|string',
            'app_commercial_img' => 'nullable|image|max:2048',
            'app_industrial_title' => 'nullable|string|max:255',
            'app_industrial_desc' => 'nullable|string',
            'app_industrial_img' => 'nullable|image|max:2048',
            'details' => 'nullable|array',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time() . '_cover.' . $request->image->extension();
            $request->image->move(public_path('images/uploads'), $imageName);
            $data['image_path'] = 'images/uploads/' . $imageName;
        }

        if ($request->hasFile('hero_img')) {
            $imageName = time() . '_hero.' . $request->hero_img->extension();
            $request->hero_img->move(public_path('images/uploads'), $imageName);
            $data['hero_image'] = 'images/uploads/' . $imageName;
        }

        if ($request->hasFile('app_commercial_img')) {
            $imageName = time() . '_comm.' . $request->app_commercial_img->extension();
            $request->app_commercial_img->move(public_path('images/uploads'), $imageName);
            $data['app_commercial_image'] = 'images/uploads/' . $imageName;
        }

        if ($request->hasFile('app_industrial_img')) {
            $imageName = time() . '_ind.' . $request->app_industrial_img->extension();
            $request->app_industrial_img->move(public_path('images/uploads'), $imageName);
            $data['app_industrial_image'] = 'images/uploads/' . $imageName;
        }

        if (isset($data['specifications'])) {
            $data['specifications'] = array_values(array_filter($data['specifications'], function($item) {
                return !empty($item['label']) && !empty($item['value']);
            }));
        }

        if (isset($data['spec_bar'])) {
            $data['spec_bar'] = array_values(array_filter($data['spec_bar'], function($item) {
                return !empty($item['label']) && !empty($item['value']);
            }));
        }

        if (isset($data['details'])) {
            $data['details'] = array_values(array_filter($data['details'], function($item) {
                return !empty($item['title']) && !empty($item['desc']);
            }));
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'hero_img' => 'nullable|image|max:2048',
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_desc' => 'nullable|string',
            'specifications' => 'nullable|array',
            'spec_bar' => 'nullable|array',
            'app_heading' => 'nullable|string|max:255',
            'app_commercial_title' => 'nullable|string|max:255',
            'app_commercial_desc' => 'nullable|string',
            'app_commercial_img' => 'nullable|image|max:2048',
            'app_industrial_title' => 'nullable|string|max:255',
            'app_industrial_desc' => 'nullable|string',
            'app_industrial_img' => 'nullable|image|max:2048',
            'details' => 'nullable|array',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time() . '_cover.' . $request->image->extension();
            $request->image->move(public_path('images/uploads'), $imageName);
            $data['image_path'] = 'images/uploads/' . $imageName;
        }

        if ($request->hasFile('hero_img')) {
            $imageName = time() . '_hero.' . $request->hero_img->extension();
            $request->hero_img->move(public_path('images/uploads'), $imageName);
            $data['hero_image'] = 'images/uploads/' . $imageName;
        }

        if ($request->hasFile('app_commercial_img')) {
            $imageName = time() . '_comm.' . $request->app_commercial_img->extension();
            $request->app_commercial_img->move(public_path('images/uploads'), $imageName);
            $data['app_commercial_image'] = 'images/uploads/' . $imageName;
        }

        if ($request->hasFile('app_industrial_img')) {
            $imageName = time() . '_ind.' . $request->app_industrial_img->extension();
            $request->app_industrial_img->move(public_path('images/uploads'), $imageName);
            $data['app_industrial_image'] = 'images/uploads/' . $imageName;
        }

        if (isset($data['specifications'])) {
            $data['specifications'] = array_values(array_filter($data['specifications'], function($item) {
                return !empty($item['label']) && !empty($item['value']);
            }));
        }

        if (isset($data['spec_bar'])) {
            $data['spec_bar'] = array_values(array_filter($data['spec_bar'], function($item) {
                return !empty($item['label']) && !empty($item['value']);
            }));
        }

        if (isset($data['details'])) {
            $data['details'] = array_values(array_filter($data['details'], function($item) {
                return !empty($item['title']) && !empty($item['desc']);
            }));
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
