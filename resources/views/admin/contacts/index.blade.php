@extends('layouts.admin')

@section('page-title', 'Contact Messages')

@section('content')
<div class="card p-4">
    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="mb-1 text-dark fw-bold">Contact Inquiries & Messages</h5>
            <p class="text-muted small mb-0">View, manage, and respond to contact form submissions from website visitors.</p>
        </div>
    </div>

    <!-- Filter Badges / Tabs -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('admin.contacts.index') }}" 
           class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}">
            All <span class="badge bg-light text-dark ms-1">{{ $statusCounts['all'] }}</span>
        </a>
        <a href="{{ route('admin.contacts.index', ['status' => 'unread']) }}" 
           class="btn btn-sm {{ request('status') === 'unread' ? 'btn-warning text-dark' : 'btn-outline-warning text-dark' }}">
            Unread <span class="badge bg-warning text-dark ms-1">{{ $statusCounts['unread'] }}</span>
        </a>
        <a href="{{ route('admin.contacts.index', ['status' => 'read']) }}" 
           class="btn btn-sm {{ request('status') === 'read' ? 'btn-info text-dark' : 'btn-outline-info text-dark' }}">
            Read <span class="badge bg-info text-dark ms-1">{{ $statusCounts['read'] }}</span>
        </a>
        <a href="{{ route('admin.contacts.index', ['status' => 'replied']) }}" 
           class="btn btn-sm {{ request('status') === 'replied' ? 'btn-success' : 'btn-outline-success' }}">
            Replied <span class="badge bg-success ms-1">{{ $statusCounts['replied'] }}</span>
        </a>
        <a href="{{ route('admin.contacts.index', ['status' => 'archived']) }}" 
           class="btn btn-sm {{ request('status') === 'archived' ? 'btn-secondary' : 'btn-outline-secondary' }}">
            Archived <span class="badge bg-secondary ms-1">{{ $statusCounts['archived'] }}</span>
        </a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.contacts.index') }}" method="GET" class="mb-4">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by name, email, phone, subject or message..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search me-1"></i> Search
            </button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
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
                    <th>Sender Name</th>
                    <th>Contact Info</th>
                    <th>Subject & Message</th>
                    <th>Status</th>
                    <th>Received On</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                    <tr class="{{ $msg->status === 'unread' ? 'table-warning-subtle fw-semibold' : '' }}">
                        <td>{{ $msg->id }}</td>
                        <td>
                            <strong class="text-dark">{{ $msg->name }}</strong>
                            @if($msg->status === 'unread')
                                <span class="badge bg-warning text-dark ms-1 small">New</span>
                            @endif
                        </td>
                        <td>
                            <div><i class="bi bi-envelope me-1 text-muted"></i> <a href="mailto:{{ $msg->email }}" class="text-decoration-none text-dark">{{ $msg->email }}</a></div>
                            @if($msg->phone)
                                <div class="small text-muted"><i class="bi bi-telephone me-1 text-muted"></i> <a href="tel:{{ $msg->phone }}" class="text-decoration-none text-secondary">{{ $msg->phone }}</a></div>
                            @endif
                        </td>
                        <td>
                            <div class="text-dark">{{ $msg->subject ?: '(No Subject)' }}</div>
                            <div class="text-muted small text-truncate" style="max-width: 280px;">
                                {{ Str::limit($msg->message, 80) }}
                            </div>
                        </td>
                        <td>
                            @if($msg->status === 'unread')
                                <span class="badge bg-warning text-dark px-2 py-1"><i class="bi bi-envelope-exclamation me-1"></i> Unread</span>
                            @elseif($msg->status === 'read')
                                <span class="badge bg-info text-dark px-2 py-1"><i class="bi bi-envelope-open me-1"></i> Read</span>
                            @elseif($msg->status === 'replied')
                                <span class="badge bg-success px-2 py-1"><i class="bi bi-reply-fill me-1"></i> Replied</span>
                            @elseif($msg->status === 'archived')
                                <span class="badge bg-secondary px-2 py-1"><i class="bi bi-archive me-1"></i> Archived</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($msg->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="text-muted small">{{ $msg->created_at->format('M d, Y') }}</span>
                            <div class="text-muted small">{{ $msg->created_at->format('h:i A') }}</div>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.contacts.show', $msg->id) }}" class="btn btn-outline-primary btn-sm me-1" title="View Message">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('admin.contacts.edit', $msg->id) }}" class="btn btn-outline-secondary btn-sm me-1" title="Edit Status/Notes">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
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
                            No contact messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($messages->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $messages->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
