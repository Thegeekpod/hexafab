<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Project;
use App\Models\ResourceItem;
use App\Models\PartnerApplication;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'productsCount' => Product::count(),
            'projectsCount' => Project::count(),
            'resourcesCount' => ResourceItem::count(),
            'partnersCount' => PartnerApplication::count(),
            'pendingPartnersCount' => PartnerApplication::where('status', 'pending')->count(),
            'recentPartners' => PartnerApplication::latest()->take(5)->get(),
            'contactsCount' => ContactMessage::count(),
            'unreadContactsCount' => ContactMessage::where('status', 'unread')->count(),
            'recentContacts' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
