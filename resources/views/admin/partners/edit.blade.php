@extends('layouts.admin')

@section('page-title', 'Edit Partner Application')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to All Applications
    </a>
</div>

<div class="card p-4" style="max-width: 700px;">
    <h5 class="mb-3 text-dark fw-bold">Edit Status & Notes for: {{ $partner->name }}</h5>
    <p class="text-muted small">Update review status and internal notes for this partner inquiry.</p>

    <div class="bg-light p-3 rounded mb-4 border">
        <div class="row g-2 small">
            <div class="col-6"><strong>Company:</strong> {{ $partner->company_name ?: 'N/A' }}</div>
            <div class="col-6"><strong>Email:</strong> {{ $partner->email }}</div>
            <div class="col-6"><strong>Phone:</strong> {{ $partner->phone }}</div>
            <div class="col-6"><strong>Date:</strong> {{ $partner->created_at->format('M d, Y') }}</div>
        </div>
    </div>

    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Application Status <span class="text-danger">*</span></label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $partner->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="contacted" {{ $partner->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                <option value="approved" {{ $partner->status === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $partner->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Internal Admin Notes</label>
            <textarea name="notes" class="form-control" rows="5" placeholder="Add follow-up notes, discussion summary, qualification details...">{{ old('notes', $partner->notes) }}</textarea>
            <div class="form-text">These notes are for admin team reference only.</div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update Application
            </button>
            <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-outline-secondary">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
