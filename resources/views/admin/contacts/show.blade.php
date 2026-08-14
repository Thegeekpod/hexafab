@extends('layouts.admin')

@section('page-title', 'Contact Message Details')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to All Messages
    </a>
</div>

<div class="row g-4">
    <!-- Message Content Column -->
    <div class="col-lg-8">
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-4">
                <div>
                    <h4 class="mb-1 text-dark fw-bold">{{ $contact->subject ?: 'Contact Inquiry' }}</h4>
                    <span class="text-muted small">
                        <i class="bi bi-clock me-1"></i> Received on {{ $contact->created_at->format('F d, Y \a\t h:i A') }}
                    </span>
                </div>
                <div>
                    @if($contact->status === 'unread')
                        <span class="badge bg-warning text-dark fs-6 px-3 py-2"><i class="bi bi-envelope-exclamation me-1"></i> Unread</span>
                    @elseif($contact->status === 'read')
                        <span class="badge bg-info text-dark fs-6 px-3 py-2"><i class="bi bi-envelope-open me-1"></i> Read</span>
                    @elseif($contact->status === 'replied')
                        <span class="badge bg-success fs-6 px-3 py-2"><i class="bi bi-reply-fill me-1"></i> Replied</span>
                    @elseif($contact->status === 'archived')
                        <span class="badge bg-secondary fs-6 px-3 py-2"><i class="bi bi-archive me-1"></i> Archived</span>
                    @else
                        <span class="badge bg-secondary fs-6 px-3 py-2">{{ ucfirst($contact->status) }}</span>
                    @endif
                </div>
            </div>

            <!-- Sender Information Strip -->
            <div class="bg-light p-3 rounded mb-4 border">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="text-secondary small fw-bold text-uppercase">Sender Name</label>
                        <div class="fs-6 text-dark mt-1">{{ $contact->name }}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="text-secondary small fw-bold text-uppercase">Email</label>
                        <div class="fs-6 text-dark mt-1">
                            <a href="mailto:{{ $contact->email }}" class="text-decoration-none text-primary">
                                <i class="bi bi-envelope me-1"></i> {{ $contact->email }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="text-secondary small fw-bold text-uppercase">Phone</label>
                        <div class="fs-6 text-dark mt-1">
                            @if($contact->phone)
                                <a href="tel:{{ $contact->phone }}" class="text-decoration-none text-primary">
                                    <i class="bi bi-telephone me-1"></i> {{ $contact->phone }}
                                </a>
                            @else
                                <span class="text-muted">Not Provided</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Body -->
            <div class="mb-4">
                <label class="text-secondary small fw-bold text-uppercase mb-2 d-block">Message Content</label>
                <div class="p-4 bg-white rounded border shadow-sm" style="white-space: pre-line; line-height: 1.7; font-size: 1rem;">
                    {{ $contact->message }}
                </div>
            </div>

            <!-- Admin Notes Section -->
            @if($contact->notes)
            <div class="mt-4">
                <label class="text-secondary small fw-bold text-uppercase">Internal Admin Notes</label>
                <div class="p-3 bg-warning-subtle rounded mt-1 border border-warning">
                    {{ $contact->notes }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Actions & Reply Column -->
    <div class="col-lg-4">
        <!-- Reply Directly Card -->
        <div class="card p-4 mb-4">
            <h5 class="mb-3 text-dark fw-bold">Quick Actions</h5>
            
            <a href="mailto:{{ $contact->email }}?subject={{ urlencode('Re: ' . ($contact->subject ?: 'Hexafab Steels Inquiry')) }}" 
               class="btn btn-success w-100 mb-3">
                <i class="bi bi-reply-fill me-1"></i> Reply via Email
            </a>

            @if($contact->phone)
                <a href="tel:{{ $contact->phone }}" class="btn btn-outline-primary w-100 mb-3">
                    <i class="bi bi-telephone-outbound me-1"></i> Call Sender
                </a>
            @endif

            <hr>

            <!-- Status & Notes Form -->
            <h6 class="mb-3 text-dark fw-bold">Update Status & Notes</h6>
            <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold small">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="unread" {{ $contact->status === 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small">Internal Notes</label>
                    <textarea name="notes" class="form-control" rows="3" placeholder="Add follow-up notes, response summary...">{{ old('notes', $contact->notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-2">
                    <i class="bi bi-save me-1"></i> Save Changes
                </button>
            </form>

            <hr>

            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                    <i class="bi bi-trash me-1"></i> Delete Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
