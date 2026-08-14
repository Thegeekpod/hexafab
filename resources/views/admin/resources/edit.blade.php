@extends('layouts.admin')

@section('page-title', 'Edit Resource / Brochure')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.resources.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Resources
    </a>
</div>

<div class="card p-4" style="max-width: 800px;">
    <h5 class="mb-3 text-dark fw-bold">Edit Resource: {{ $resource->title }}</h5>
    <p class="text-muted small mb-4">Update brochure details, icon style, and attached PDF document.</p>

    <form action="{{ route('admin.resources.update', $resource->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-7 mb-3">
                <label for="title" class="form-label fw-semibold">Resource Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $resource->title) }}" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="icon_type" class="form-label fw-semibold">Card Icon Style <span class="text-danger">*</span></label>
                <select class="form-select" id="icon_type" name="icon_type" required>
                    <option value="brochure" {{ old('icon_type', $resource->icon_type) === 'brochure' ? 'selected' : '' }}>📄 Document / Brochure Icon</option>
                    <option value="manual" {{ old('icon_type', $resource->icon_type) === 'manual' ? 'selected' : '' }}>📖 Product Manual / Book Icon</option>
                    <option value="specs" {{ old('icon_type', $resource->icon_type) === 'specs' ? 'selected' : '' }}>📊 Technical Specs / Table Icon</option>
                    <option value="custom" {{ old('icon_type', $resource->icon_type) === 'custom' ? 'selected' : '' }}>🖼️ Custom Uploaded Icon</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $resource->description) }}</textarea>
        </div>

        <div class="card p-3 bg-light border mb-4">
            <h6 class="text-dark fw-bold mb-2">
                <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i> Attached PDF Document
            </h6>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="pdf_file" class="form-label small fw-semibold">Upload New PDF File</label>
                    <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf,application/pdf">
                    @if($resource->pdf_path)
                        <div class="mt-2 small">
                            <span class="text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i> Current PDF:</span>
                            <a href="{{ asset($resource->pdf_path) }}" target="_blank" class="text-primary text-decoration-none ms-1 fw-semibold">
                                <i class="bi bi-file-earmark-arrow-down me-1"></i> View / Download Current File
                            </a>
                        </div>
                    @else
                        <div class="form-text text-muted">No PDF uploaded yet. Max: 20MB.</div>
                    @endif
                </div>
                <div class="col-md-6 mb-2">
                    <label for="link_text" class="form-label small fw-semibold">Download Button Label</label>
                    <input type="text" class="form-control" id="link_text" name="link_text" value="{{ old('link_text', $resource->link_text) }}" placeholder="Download PDF">
                    <div class="form-text">Text displayed on the download button.</div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label fw-semibold">Custom Icon / Image (Optional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if($resource->image_path)
                <div class="form-text text-muted">Current image: <code>{{ $resource->image_path }}</code></div>
            @endif
        </div>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.resources.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update Resource
            </button>
        </div>
    </form>
</div>
@endsection
