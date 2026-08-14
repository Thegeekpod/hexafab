@extends('layouts.admin')

@section('page-title', 'Create Product')

@section('content')
<div class="card p-4">
    <h5 class="mb-4 text-dark">Add New Product</h5>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="badge" class="form-label">Badge Label (e.g. Premium, Classic)</label>
                <input type="text" class="form-control" id="badge" name="badge">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
                <input type="text" class="form-control" id="hero_subtitle" name="hero_subtitle">
            </div>
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>

        <div class="mb-3">
            <label for="hero_desc" class="form-label">Description / Hero Description</label>
            <textarea class="form-control" id="hero_desc" name="hero_desc" rows="3"></textarea>
        </div>

        <h6 class="mt-4 mb-3 text-secondary">Specifications</h6>
        <div id="specifications-container">
            <div class="row g-2 mb-2 spec-row">
                <div class="col">
                    <input type="text" class="form-control" name="specifications[0][label]" placeholder="Specification Label (e.g. PROFILE DEPTH)">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="specifications[0][value]" placeholder="Value (e.g. 65mm)">
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-outline-secondary btn-sm mb-4" onclick="addSpecField()">
            <i class="bi bi-plus-lg"></i> Add Specification Field
        </button>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
</div>

<script>
    let specIndex = 1;
    function addSpecField() {
        const container = document.getElementById('specifications-container');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 spec-row';
        row.innerHTML = `
            <div class="col">
                <input type="text" class="form-control" name="specifications[${specIndex}][label]" placeholder="Specification Label">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="specifications[${specIndex}][value]" placeholder="Value">
            </div>
        `;
        container.appendChild(row);
        specIndex++;
    }
</script>
@endsection
