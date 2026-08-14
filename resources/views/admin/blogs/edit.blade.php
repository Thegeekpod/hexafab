@extends('layouts.admin')

@section('page-title', 'Edit Blog / Article')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Blogs
    </a>
</div>

<div class="card p-4" style="max-width: 900px;">
    <h5 class="mb-3 text-dark fw-bold">Edit Blog / Article: {{ $blog->title }}</h5>
    <p class="text-muted small mb-4">Update the article's card presentation and detail page contents.</p>

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="title" class="form-label fw-semibold">Article Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="tag" class="form-label fw-semibold">Tag / Category <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tag" name="tag" value="{{ old('tag', $blog->tag) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-semibold">Featured Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @if($blog->image_path)
                    <div class="mt-2 d-flex align-items-center gap-2">
                        <img src="{{ asset($blog->image_path) }}" alt="" style="width: 70px; height: 45px; object-fit: cover; border-radius: 4px;">
                        <span class="text-muted small">Current: <code>{{ $blog->image_path }}</code></span>
                    </div>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="link_text" class="form-label fw-semibold">Card Action Text <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="link_text" name="link_text" value="{{ old('link_text', $blog->link_text) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="author" class="form-label fw-semibold">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $blog->author) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="reading_time" class="form-label fw-semibold">Reading Time</label>
                <input type="text" class="form-control" id="reading_time" name="reading_time" value="{{ old('reading_time', $blog->reading_time) }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Short Summary (Homepage Card) <span class="text-danger">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $blog->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="content" class="form-label fw-semibold">Full Article Body (Optional / Blog Details)</label>
            <textarea class="form-control" id="content" name="content" rows="8">{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update Blog Post
            </button>
        </div>
    </form>
</div>
@endsection
