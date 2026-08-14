<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $messages = $query->paginate(15)->withQueryString();

        $statusCounts = [
            'all' => ContactMessage::count(),
            'unread' => ContactMessage::where('status', 'unread')->count(),
            'read' => ContactMessage::where('status', 'read')->count(),
            'replied' => ContactMessage::where('status', 'replied')->count(),
            'archived' => ContactMessage::where('status', 'archived')->count(),
        ];

        return view('admin.contacts.index', compact('messages', 'statusCounts'));
    }

    public function show(ContactMessage $contact)
    {
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(ContactMessage $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, ContactMessage $contact)
    {
        $data = $request->validate([
            'status' => 'required|in:unread,read,replied,archived',
            'notes' => 'nullable|string',
        ]);

        $contact->update($data);

        return redirect()->route('admin.contacts.show', $contact->id)->with('success', 'Contact message updated successfully.');
    }

    public function destroy(ContactMessage $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact message deleted successfully.');
    }
}
