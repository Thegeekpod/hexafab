@extends('layouts.admin')

@section('page-title', 'Partner Application Details')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to All Applications
    </a>
</div>

<div class="row g-4">
    <!-- Main Details Column -->
    <div class="col-lg-8">
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-4">
                <div>
                    <h4 class="mb-1 text-dark fw-bold">{{ $partner->name }}</h4>
                    <span class="text-muted small">
                        <i class="bi bi-calendar-event me-1"></i> Applied on {{ $partner->created_at->format('F d, Y \a\t h:i A') }}
                    </span>
                </div>
                <div>
                    @if($partner->status === 'pending')
                        <span class="badge bg-warning text-dark fs-6 px-3 py-2"><i class="bi bi-clock me-1"></i> Pending</span>
                    @elseif($partner->status === 'contacted')
                        <span class="badge bg-info text-dark fs-6 px-3 py-2"><i class="bi bi-chat-dots me-1"></i> Contacted</span>
                    @elseif($partner->status === 'approved')
                        <span class="badge bg-success fs-6 px-3 py-2"><i class="bi bi-check-circle me-1"></i> Approved</span>
                    @elseif($partner->status === 'rejected')
                        <span class="badge bg-danger fs-6 px-3 py-2"><i class="bi bi-x-circle me-1"></i> Rejected</span>
                    @else
                        <span class="badge bg-secondary fs-6 px-3 py-2">{{ ucfirst($partner->status) }}</span>
                    @endif
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="text-secondary small fw-bold text-uppercase">Full Name / Owner</label>
                    <div class="fs-6 text-dark mt-1">{{ $partner->name }}</div>
                </div>

                <div class="col-md-6">
                    <label class="text-secondary small fw-bold text-uppercase">Company Name</label>
                    <div class="fs-6 text-dark mt-1">{{ $partner->company_name ?: 'Not Provided' }}</div>
                </div>

                <div class="col-md-6">
                    <label class="text-secondary small fw-bold text-uppercase">Phone Number</label>
                    <div class="fs-6 text-dark mt-1">
                        <a href="tel:{{ $partner->phone }}" class="text-decoration-none text-primary">
                            <i class="bi bi-telephone me-1"></i> {{ $partner->phone }}
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-secondary small fw-bold text-uppercase">Email Address</label>
                    <div class="fs-6 text-dark mt-1">
                        <a href="mailto:{{ $partner->email }}" class="text-decoration-none text-primary">
                            <i class="bi bi-envelope me-1"></i> {{ $partner->email }}
                        </a>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <label class="text-secondary small fw-bold text-uppercase">Operational Address</label>
                    <div class="p-3 bg-light rounded mt-1 border" style="white-space: pre-line;">
                        {{ $partner->address }}
                    </div>
                </div>

                @if($partner->notes)
                <div class="col-12 mt-3">
                    <label class="text-secondary small fw-bold text-uppercase">Internal Admin Notes</label>
                    <div class="p-3 bg-warning-subtle rounded mt-1 border border-warning">
                        {{ $partner->notes }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Status Update & Actions Column -->
    <div class="col-lg-4">
        <div class="card p-4 mb-4">
            <h5 class="mb-3 text-dark fw-bold">Update Status & Notes</h5>
            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold small">Application Status</label>
                    <select name="status" class="form-select" required>
                        <option value="pending" {{ $partner->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="contacted" {{ $partner->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="approved" {{ $partner->status === 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $partner->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small">Internal Notes</label>
                    <textarea name="notes" class="form-control" rows="4" placeholder="Add follow-up notes, discussion summary, etc.">{{ old('notes', $partner->notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-2">
                    <i class="bi bi-save me-1"></i> Save Changes
                </button>
            </form>

            <hr>

            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this application?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                    <i class="bi bi-trash me-1"></i> Delete Application
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
