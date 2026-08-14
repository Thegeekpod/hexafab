@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3">
    <!-- Products Card -->
    <div class="col-md-4 col-xl-2">
        <div class="card p-3 bg-white d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <h6 class="text-secondary text-uppercase mb-1" style="font-size: 0.75rem; font-weight: 700;">Products</h6>
                <h4 class="mb-0 text-dark">{{ $productsCount }}</h4>
            </div>
            <div class="fs-2 text-primary">
                <i class="bi bi-box-seam"></i>
            </div>
        </div>
    </div>

    <!-- Projects Card -->
    <div class="col-md-4 col-xl-2">
        <div class="card p-3 bg-white d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <h6 class="text-secondary text-uppercase mb-1" style="font-size: 0.75rem; font-weight: 700;">Projects</h6>
                <h4 class="mb-0 text-dark">{{ $projectsCount }}</h4>
            </div>
            <div class="fs-2 text-success">
                <i class="bi bi-images"></i>
            </div>
        </div>
    </div>

    <!-- Resources Card -->
    <div class="col-md-4 col-xl-2">
        <div class="card p-3 bg-white d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <h6 class="text-secondary text-uppercase mb-1" style="font-size: 0.75rem; font-weight: 700;">PDF Resources</h6>
                <h4 class="mb-0 text-dark">{{ $resourcesCount }}</h4>
            </div>
            <div class="fs-2 text-info">
                <i class="bi bi-file-earmark-pdf"></i>
            </div>
        </div>
    </div>

    <!-- Blogs Card -->
    <div class="col-md-4 col-xl-2">
        <div class="card p-3 bg-white d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <h6 class="text-secondary text-uppercase mb-1" style="font-size: 0.75rem; font-weight: 700;">Blogs & Posts</h6>
                <h4 class="mb-0 text-dark">{{ $blogsCount }}</h4>
            </div>
            <div class="fs-2 text-primary">
                <i class="bi bi-newspaper"></i>
            </div>
        </div>
    </div>

    <!-- Partner Applications Card -->
    <div class="col-md-6 col-xl-2">
        <div class="card p-3 bg-white d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <h6 class="text-secondary text-uppercase mb-1" style="font-size: 0.75rem; font-weight: 700;">Partner Inquiries</h6>
                <div class="d-flex align-items-baseline gap-2">
                    <h4 class="mb-0 text-dark">{{ $partnersCount }}</h4>
                    @if($pendingPartnersCount > 0)
                        <span class="badge bg-warning text-dark small">{{ $pendingPartnersCount }} new</span>
                    @endif
                </div>
            </div>
            <div class="fs-2 text-warning">
                <i class="bi bi-person-lines-fill"></i>
            </div>
        </div>
    </div>

    <!-- Contact Messages Card -->
    <div class="col-md-6 col-xl-2">
        <div class="card p-3 bg-white d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <h6 class="text-secondary text-uppercase mb-1" style="font-size: 0.75rem; font-weight: 700;">Contact Messages</h6>
                <div class="d-flex align-items-baseline gap-2">
                    <h4 class="mb-0 text-dark">{{ $contactsCount }}</h4>
                    @if($unreadContactsCount > 0)
                        <span class="badge bg-danger small">{{ $unreadContactsCount }} unread</span>
                    @endif
                </div>
            </div>
            <div class="fs-2 text-danger">
                <i class="bi bi-chat-left-text-fill"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <!-- Recent Contact Messages -->
    <div class="col-lg-6">
        <div class="card p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 text-dark fw-bold">Recent Contact Messages</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentContacts as $contact)
                            <tr class="{{ $contact->status === 'unread' ? 'table-warning-subtle' : '' }}">
                                <td>
                                    <strong class="text-dark">{{ $contact->name }}</strong>
                                    <div class="small text-muted">{{ $contact->email }}</div>
                                </td>
                                <td>
                                    <div class="small text-truncate" style="max-width: 150px;">{{ $contact->subject ?: '(No Subject)' }}</div>
                                </td>
                                <td>
                                    @if($contact->status === 'unread')
                                        <span class="badge bg-warning text-dark">Unread</span>
                                    @elseif($contact->status === 'read')
                                        <span class="badge bg-info text-dark">Read</span>
                                    @elseif($contact->status === 'replied')
                                        <span class="badge bg-success">Replied</span>
                                    @elseif($contact->status === 'archived')
                                        <span class="badge bg-secondary">Archived</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($contact->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No contact messages yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Partner Applications -->
    <div class="col-lg-6">
        <div class="card p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 text-dark fw-bold">Recent Partner Applications</h5>
                <a href="{{ route('admin.partners.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Applicant</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPartners as $partner)
                            <tr>
                                <td>
                                    <strong>{{ $partner->name }}</strong>
                                    <div class="small text-muted">{{ $partner->phone }}</div>
                                </td>
                                <td>{{ $partner->company_name ?: '—' }}</td>
                                <td>
                                    @if($partner->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($partner->status === 'contacted')
                                        <span class="badge bg-info text-dark">Contacted</span>
                                    @elseif($partner->status === 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($partner->status === 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($partner->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No partner applications yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
