@extends('layouts.admin')

@section('page-title', 'Create Resource')

@section('content')
<div class="card p-4">
    <h5 class="mb-4 text-dark">Add New Resource</h5>

    <form action="{{ route('admin.resources.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Resource Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tag" class="form-label">Tag (e.g. BLOG, CAMPAIGN, WEBINAR)</label>
                <input type="text" class="form-control" id="tag" name="tag" placeholder="BLOG" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="link_text" class="form-label">Link Text</label>
                <input type="text" class="form-control" id="link_text" name="link_text" value="Read more →" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label">Resource Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.resources.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Resource</button>
        </div>
    </form>
</div>
@endsection
