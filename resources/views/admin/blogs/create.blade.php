@extends('layouts.admin')

@section('page-title', 'Add Blog / Article')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Blogs
    </a>
</div>

<div class="card p-4" style="max-width: 900px;">
    <h5 class="mb-3 text-dark fw-bold">Create New Blog / Article</h5>
    <p class="text-muted small mb-4">This post will appear in the homepage slider ("Explore Innovations and Achievements in Solutions").</p>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="title" class="form-label fw-semibold">Article Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="e.g. From Straw To Steel: The Evolution Of Materials" value="{{ old('title') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="tag" class="form-label fw-semibold">Tag / Category <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tag" name="tag" placeholder="e.g. BLOG, CAMPAIGN, WEBINAR" value="{{ old('tag', 'BLOG') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-semibold">Featured Image <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                <div class="form-text">Recommended size: 600x400px or 16:9 ratio.</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="link_text" class="form-label fw-semibold">Card Action Text <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="link_text" name="link_text" value="{{ old('link_text', 'Read more →') }}" placeholder="e.g. Read more →, Explore campaign →, Watch webinar →" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="author" class="form-label fw-semibold">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', 'Hexafab Editorial Team') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="reading_time" class="form-label fw-semibold">Reading Time</label>
                <input type="text" class="form-control" id="reading_time" name="reading_time" value="{{ old('reading_time', '5 min read') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Short Summary (Homepage Card) <span class="text-danger">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief summary of the article displayed on the homepage card..." required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="content" class="form-label fw-semibold">Full Article Body (Optional / Blog Details)</label>
            <textarea class="form-control" id="content" name="content" rows="8" placeholder="Write or paste full article content here...">{{ old('content') }}</textarea>
        </div>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Save Blog Post
            </button>
        </div>
    </form>
</div>
@endsection
