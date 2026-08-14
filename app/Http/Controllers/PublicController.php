<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Project;
use App\Models\ResourceItem;
use App\Models\PartnerApplication;
use App\Models\ContactMessage;

class PublicController extends Controller
{
    public function home()
    {
        return view('index', [
            'products' => Product::all(),
            'resources' => ResourceItem::latest()->take(4)->get(),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function products()
    {
        return view('products', [
            'products' => Product::all(),
        ]);
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product-detail', compact('product'));
    }

    public function projects()
    {
        return view('projects', [
            'projects' => Project::all(),
        ]);
    }

    public function resources()
    {
        return view('resources', [
            'resources' => ResourceItem::latest()->get(),
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:3000',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Thank you for reaching out! Your message has been received. Our team will get back to you shortly.');
    }

    public function storeLocator()
    {
        return view('store-locator');
    }

    public function becomePartner()
    {
        return view('become-a-partner');
    }

    public function submitBecomePartner(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:1000',
        ]);

        PartnerApplication::create($validated);

        return redirect()->route('become-a-partner')
            ->with('success', 'Thank you for your interest! Your partnership application has been submitted successfully. Our team will contact you soon.');
    }

    public function imsPolicy()
    {
        return view('ims-policy');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function blogDetails()
    {
        return view('blog-details');
    }
}
