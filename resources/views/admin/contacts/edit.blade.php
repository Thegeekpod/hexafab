@extends('layouts.admin')

@section('page-title', 'Edit Contact Message')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to All Messages
    </a>
</div>

<div class="card p-4" style="max-width: 700px;">
    <h5 class="mb-3 text-dark fw-bold">Edit Status & Notes for Message #{{ $contact->id }}</h5>
    <p class="text-muted small">Update review status and internal notes for this message.</p>

    <div class="bg-light p-3 rounded mb-4 border">
        <div class="row g-2 small">
            <div class="col-6"><strong>Sender:</strong> {{ $contact->name }}</div>
            <div class="col-6"><strong>Email:</strong> {{ $contact->email }}</div>
            <div class="col-6"><strong>Phone:</strong> {{ $contact->phone ?: 'N/A' }}</div>
            <div class="col-6"><strong>Date:</strong> {{ $contact->created_at->format('M d, Y') }}</div>
            <div class="col-12 mt-2"><strong>Subject:</strong> {{ $contact->subject ?: '(No Subject)' }}</div>
        </div>
    </div>

    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Message Status <span class="text-danger">*</span></label>
            <select name="status" class="form-select" required>
                <option value="unread" {{ $contact->status === 'unread' ? 'selected' : '' }}>Unread</option>
                <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Internal Admin Notes</label>
            <textarea name="notes" class="form-control" rows="5" placeholder="Add follow-up notes, response log, discussion details...">{{ old('notes', $contact->notes) }}</textarea>
            <div class="form-text">These notes are for admin team reference only.</div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update Status & Notes
            </button>
            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-outline-secondary">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
