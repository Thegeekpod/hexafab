@extends('layouts.admin')

@section('page-title', 'Create Project')

@section('content')
<div class="card p-4">
    <h5 class="mb-4 text-dark">Add New Project</h5>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="standing-seam">Standing Seam</option>
                    <option value="circular">Circular</option>
                    <option value="trapezoidal">Trapezoidal</option>
                    <option value="liner">Liner</option>
                    <option value="cz-purlin">C/Z Purlin</option>
                    <option value="deck-sheet">Deck Sheet</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Project</button>
        </div>
    </form>
</div>
@endsection
