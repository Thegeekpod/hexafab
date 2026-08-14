@extends('layouts.admin')

@section('page-title', 'Resources')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 text-dark">All Resources</h5>
        <a href="{{ route('admin.resources.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Add New Resource
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Link Text</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($resources as $resource)
                    <tr>
                        <td>
                            <img src="{{ asset($resource->image_path) }}" alt="" style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                        </td>
                        <td><strong>{{ $resource->title }}</strong></td>
                        <td><span class="badge bg-warning text-dark">{{ $resource->tag }}</span></td>
                        <td>{{ $resource->link_text }}</td>
                        <td>
                            <a href="{{ route('admin.resources.edit', $resource->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.resources.destroy', $resource->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this resource?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No resources found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
