@extends('layouts.admin')

@section('page-title', 'Downloadable Resources & Brochures')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1 text-dark fw-bold">All Downloadable Resources</h5>
            <p class="text-muted small mb-0">Manage brochures, technical manuals, and product spec sheets for the Resources & Downloads page.</p>
        </div>
        <a href="{{ route('admin.resources.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Resource
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 70px;">Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>PDF File</th>
                    <th>Button Label</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($resources as $resource)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center justify-content-center bg-light border rounded" style="width: 46px; height: 46px; color: #3685b1;">
                                @if($resource->icon_type === 'manual')
                                    <i class="bi bi-book fs-4"></i>
                                @elseif($resource->icon_type === 'specs')
                                    <i class="bi bi-table fs-4"></i>
                                @elseif($resource->image_path)
                                    <img src="{{ asset($resource->image_path) }}" alt="" style="width: 32px; height: 32px; object-fit: contain;">
                                @else
                                    <i class="bi bi-file-earmark-text fs-4"></i>
                                @endif
                            </div>
                        </td>
                        <td>
                            <strong class="text-dark">{{ $resource->title }}</strong>
                            <div class="small text-muted">Type: {{ ucfirst($resource->icon_type ?? 'brochure') }}</div>
                        </td>
                        <td class="text-muted small" style="max-width: 300px;">
                            {{ Str::limit($resource->description, 100) }}
                        </td>
                        <td>
                            @if($resource->pdf_path)
                                <a href="{{ asset($resource->pdf_path) }}" target="_blank" class="btn btn-sm btn-outline-danger py-1 px-2">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> View PDF
                                </a>
                            @else
                                <span class="badge bg-secondary">No PDF</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2 py-1">
                                <i class="bi bi-download me-1"></i> {{ $resource->link_text ?: 'Download PDF' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.resources.edit', $resource->id) }}" class="btn btn-outline-secondary btn-sm me-1" title="Edit Resource">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.resources.destroy', $resource->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this resource?')">
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
                            <i class="bi bi-file-earmark-arrow-down fs-1 d-block mb-2 text-secondary"></i>
                            No resources found. Click <strong>"Add New Resource"</strong> to create one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
