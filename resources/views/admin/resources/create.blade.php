@extends('layouts.admin')

@section('page-title', 'Create Resource / Brochure')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.resources.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Resources
    </a>
</div>

<div class="card p-4" style="max-width: 800px;">
    <h5 class="mb-3 text-dark fw-bold">Add New Downloadable Resource</h5>
    <p class="text-muted small mb-4">Add a new brochure, manual, or technical specification sheet with an attached PDF.</p>

    <form action="{{ route('admin.resources.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-7 mb-3">
                <label for="title" class="form-label fw-semibold">Resource Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Main Brochure, Product Manual, Technical Specs" value="{{ old('title') }}" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="icon_type" class="form-label fw-semibold">Card Icon Style <span class="text-danger">*</span></label>
                <select class="form-select" id="icon_type" name="icon_type" required>
                    <option value="brochure" {{ old('icon_type') === 'brochure' ? 'selected' : '' }}>📄 Document / Brochure Icon</option>
                    <option value="manual" {{ old('icon_type') === 'manual' ? 'selected' : '' }}>📖 Product Manual / Book Icon</option>
                    <option value="specs" {{ old('icon_type') === 'specs' ? 'selected' : '' }}>📊 Technical Specs / Table Icon</option>
                    <option value="custom" {{ old('icon_type') === 'custom' ? 'selected' : '' }}>🖼️ Custom Uploaded Icon</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief summary of the document (e.g. Comprehensive catalog of our complete product range and technical specifications.)">{{ old('description') }}</textarea>
        </div>

        <div class="card p-3 bg-light border mb-4">
            <h6 class="text-dark fw-bold mb-2">
                <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i> Attached PDF Document
            </h6>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="pdf_file" class="form-label small fw-semibold">Upload PDF File</label>
                    <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf,application/pdf">
                    <div class="form-text">Upload PDF brochure/manual (Max: 20MB).</div>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="link_text" class="form-label small fw-semibold">Download Button Label</label>
                    <input type="text" class="form-control" id="link_text" name="link_text" value="{{ old('link_text', 'Download PDF') }}" placeholder="Download PDF">
                    <div class="form-text">Text displayed on the download button.</div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label fw-semibold">Custom Icon / Image (Optional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <div class="form-text">Optional if using "Custom Uploaded Icon" style.</div>
        </div>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.resources.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Save Resource
            </button>
        </div>
    </form>
</div>
@endsection
