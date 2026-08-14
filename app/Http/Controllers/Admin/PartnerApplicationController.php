<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerApplication;

class PartnerApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = PartnerApplication::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $applications = $query->paginate(15)->withQueryString();

        $statusCounts = [
            'all' => PartnerApplication::count(),
            'pending' => PartnerApplication::where('status', 'pending')->count(),
            'contacted' => PartnerApplication::where('status', 'contacted')->count(),
            'approved' => PartnerApplication::where('status', 'approved')->count(),
            'rejected' => PartnerApplication::where('status', 'rejected')->count(),
        ];

        return view('admin.partners.index', compact('applications', 'statusCounts'));
    }

    public function show(PartnerApplication $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    public function edit(PartnerApplication $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, PartnerApplication $partner)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,contacted,approved,rejected',
            'notes' => 'nullable|string',
        ]);

        $partner->update($data);

        return redirect()->route('admin.partners.show', $partner->id)->with('success', 'Partner application updated successfully.');
    }

    public function destroy(PartnerApplication $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner application deleted successfully.');
    }
}
