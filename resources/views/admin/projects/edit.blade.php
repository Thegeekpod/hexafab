@extends('layouts.admin')

@section('page-title', 'Edit Project')

@section('content')
<div class="card p-4">
    <h5 class="mb-4 text-dark">Edit Project</h5>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="standing-seam" {{ $project->category == 'standing-seam' ? 'selected' : '' }}>Standing Seam</option>
                    <option value="circular" {{ $project->category == 'circular' ? 'selected' : '' }}>Circular</option>
                    <option value="trapezoidal" {{ $project->category == 'trapezoidal' ? 'selected' : '' }}>Trapezoidal</option>
                    <option value="liner" {{ $project->category == 'liner' ? 'selected' : '' }}>Liner</option>
                    <option value="cz-purlin" {{ $project->category == 'cz-purlin' ? 'selected' : '' }}>C/Z Purlin</option>
                    <option value="deck-sheet" {{ $project->category == 'deck-sheet' ? 'selected' : '' }}>Deck Sheet</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <div class="form-text text-muted">Current image: <code>{{ $project->image_path }}</code></div>
        </div>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Project</button>
        </div>
    </form>
</div>
@endsection
