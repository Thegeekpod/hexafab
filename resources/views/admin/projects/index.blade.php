@extends('layouts.admin')

@section('page-title', 'Projects')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 text-dark">All Projects</h5>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Add New Project
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>
                            <img src="{{ asset($project->image_path) }}" alt="" style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                        </td>
                        <td><strong>{{ $project->title }}</strong></td>
                        <td><span class="badge bg-info">{{ $project->category }}</span></td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project?')">
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
                        <td colspan="4" class="text-center py-4 text-muted">No projects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
