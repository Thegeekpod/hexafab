@extends('layouts.admin')

@section('page-title', 'Homepage Blogs & Insights')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1 text-dark fw-bold">All Blogs & Insights</h5>
            <p class="text-muted small mb-0">Manage articles, campaigns, and webinars displayed in the "Explore Innovations and Achievements" homepage slider.</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Blog / Post
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 100px;">Cover</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Link Action</th>
                    <th>Author / Time</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>
                            @if($blog->image_path)
                                <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}" style="width: 90px; height: 60px; object-fit: cover; border-radius: 6px;">
                            @else
                                <div class="bg-light text-muted d-flex align-items-center justify-content-center border rounded" style="width: 90px; height: 60px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong class="text-dark">{{ $blog->title }}</strong>
                            <div class="small text-muted text-truncate" style="max-width: 320px;">
                                {{ $blog->description }}
                            </div>
                        </td>
                        <td>
                            @php
                                $badgeClass = match(strtoupper($blog->tag)) {
                                    'BLOG' => 'bg-primary-subtle text-primary-emphasis border-primary-subtle',
                                    'CAMPAIGN' => 'bg-warning-subtle text-warning-emphasis border-warning-subtle',
                                    'WEBINAR' => 'bg-info-subtle text-info-emphasis border-info-subtle',
                                    default => 'bg-secondary-subtle text-secondary-emphasis border-secondary-subtle'
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }} border px-2 py-1">
                                {{ $blog->tag }}
                            </span>
                        </td>
                        <td>
                            <span class="small fw-semibold text-secondary">
                                {{ $blog->link_text }}
                            </span>
                        </td>
                        <td class="small text-muted">
                            <div>{{ $blog->author ?? 'Hexafab Team' }}</div>
                            <div>{{ $blog->reading_time ?? '5 min' }}</div>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-outline-secondary btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
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
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-journal-richtext fs-1 d-block mb-2 text-secondary"></i>
                            No blog posts found. Click <strong>"Add New Blog / Post"</strong> to create one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
