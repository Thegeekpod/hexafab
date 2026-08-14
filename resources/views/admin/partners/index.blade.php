@extends('layouts.admin')

@section('page-title', 'Partner Applications')

@section('content')
<div class="card p-4">
    <!-- Header & Summary Filters -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="mb-1 text-dark fw-bold">Become a Partner Inquiries</h5>
            <p class="text-muted small mb-0">Manage and review all partnership applications submitted through the website.</p>
        </div>
    </div>

    <!-- Filter Badges / Tabs -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('admin.partners.index') }}" 
           class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}">
            All <span class="badge bg-light text-dark ms-1">{{ $statusCounts['all'] }}</span>
        </a>
        <a href="{{ route('admin.partners.index', ['status' => 'pending']) }}" 
           class="btn btn-sm {{ request('status') === 'pending' ? 'btn-warning text-dark' : 'btn-outline-warning text-dark' }}">
            Pending <span class="badge bg-warning text-dark ms-1">{{ $statusCounts['pending'] }}</span>
        </a>
        <a href="{{ route('admin.partners.index', ['status' => 'contacted']) }}" 
           class="btn btn-sm {{ request('status') === 'contacted' ? 'btn-info text-dark' : 'btn-outline-info text-dark' }}">
            Contacted <span class="badge bg-info text-dark ms-1">{{ $statusCounts['contacted'] }}</span>
        </a>
        <a href="{{ route('admin.partners.index', ['status' => 'approved']) }}" 
           class="btn btn-sm {{ request('status') === 'approved' ? 'btn-success' : 'btn-outline-success' }}">
            Approved <span class="badge bg-success ms-1">{{ $statusCounts['approved'] }}</span>
        </a>
        <a href="{{ route('admin.partners.index', ['status' => 'rejected']) }}" 
           class="btn btn-sm {{ request('status') === 'rejected' ? 'btn-danger' : 'btn-outline-danger' }}">
            Rejected <span class="badge bg-danger ms-1">{{ $statusCounts['rejected'] }}</span>
        </a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.partners.index') }}" method="GET" class="mb-4">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by name, company, email or phone..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search me-1"></i> Search
            </button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-1"></i> Reset
                </a>
            @endif
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Applicant / Owner</th>
                    <th>Company</th>
                    <th>Contact Info</th>
                    <th>Status</th>
                    <th>Submitted On</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>
                            <strong class="text-dark">{{ $app->name }}</strong>
                        </td>
                        <td>
                            {{ $app->company_name ?: '—' }}
                        </td>
                        <td>
                            <div><i class="bi bi-telephone me-1 text-muted"></i> <a href="tel:{{ $app->phone }}" class="text-decoration-none text-dark">{{ $app->phone }}</a></div>
                            <div class="small"><i class="bi bi-envelope me-1 text-muted"></i> <a href="mailto:{{ $app->email }}" class="text-decoration-none text-secondary">{{ $app->email }}</a></div>
                        </td>
                        <td>
                            @if($app->status === 'pending')
                                <span class="badge bg-warning text-dark px-2 py-1"><i class="bi bi-clock me-1"></i> Pending</span>
                            @elseif($app->status === 'contacted')
                                <span class="badge bg-info text-dark px-2 py-1"><i class="bi bi-chat-dots me-1"></i> Contacted</span>
                            @elseif($app->status === 'approved')
                                <span class="badge bg-success px-2 py-1"><i class="bi bi-check-circle me-1"></i> Approved</span>
                            @elseif($app->status === 'rejected')
                                <span class="badge bg-danger px-2 py-1"><i class="bi bi-x-circle me-1"></i> Rejected</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($app->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="text-muted small">{{ $app->created_at->format('M d, Y') }}</span>
                            <div class="text-muted small">{{ $app->created_at->format('h:i A') }}</div>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.partners.show', $app->id) }}" class="btn btn-outline-primary btn-sm me-1" title="View Details">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('admin.partners.edit', $app->id) }}" class="btn btn-outline-secondary btn-sm me-1" title="Edit Status/Notes">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.partners.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this application?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            No partner applications found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($applications->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $applications->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
