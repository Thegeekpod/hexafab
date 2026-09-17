@extends('layouts.admin')

@section('page-title', 'Edit Product')

@section('content')
<div class="card p-4">
    <h5 class="mb-4 text-dark">Edit Product: {{ $product->title }}</h5>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Product Title (e.g. Standing Seam Sheet)</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $product->title) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="hero_title" class="form-label">Hero Main Title (e.g. The Engineering Standard — Hexa Standing Seam Series)</label>
                <input type="text" class="form-control" id="hero_title" name="hero_title" value="{{ old('hero_title', $product->hero_title) }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="badge" class="form-label">Badge Label</label>
                <input type="text" class="form-control" id="badge" name="badge" value="{{ old('badge', $product->badge) }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
                <input type="text" class="form-control" id="hero_subtitle" name="hero_subtitle" value="{{ old('hero_subtitle', $product->hero_subtitle) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="image" class="form-label">Cover Image (Products List Card)</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($product->image_path)
                    <div class="form-text text-muted">Current: <code>{{ $product->image_path }}</code></div>
                @endif
            </div>
            <div class="col-md-4 mb-3">
                <label for="hero_img" class="form-label">Hero Right Image (Detail Page)</label>
                <input type="file" class="form-control" id="hero_img" name="hero_img">
                @if($product->hero_image)
                    <div class="form-text text-muted">Current: <code>{{ $product->hero_image }}</code></div>
                @endif
            </div>
            <div class="col-md-4 mb-3">
                <label for="drawing_img" class="form-label">Sheet Drawing Image (Tech Details Section)</label>
                <input type="file" class="form-control" id="drawing_img" name="drawing_img">
                @if($product->drawing_image)
                    <div class="form-text text-muted">Current: <code>{{ $product->drawing_image }}</code></div>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label for="hero_desc" class="form-label">Description / Hero Description</label>
            <textarea class="form-control" id="hero_desc" name="hero_desc" rows="3">{{ old('hero_desc', $product->hero_desc) }}</textarea>
        </div>

        <!-- Technical Details Section -->
        <div class="card p-3 bg-light border mb-4">
            <h6 class="text-dark fw-bold mb-3"><i class="bi bi-gear-wide-connected text-primary me-1"></i> Technical Details & Features (Tech Section Left Content)</h6>
            <div id="tech-details-container">
                @php $techIndex = 0; @endphp
                @if($product->tech_details && is_array($product->tech_details) && count($product->tech_details) > 0)
                    @foreach($product->tech_details as $item)
                        @php
                            $techVal = is_array($item) ? ($item['value'] ?? $item['title'] ?? '') : (string)$item;
                        @endphp
                        <div class="row g-2 mb-2 tech-detail-row">
                            <div class="col">
                                <input type="text" class="form-control" name="tech_details[{{ $techIndex }}]" value="{{ $techVal }}" placeholder="e.g. 300-350 MPA or Thickness: .50 - .70 mm">
                            </div>
                        </div>
                        @php $techIndex++; @endphp
                    @endforeach
                @else
                    <div class="row g-2 mb-2 tech-detail-row">
                        <div class="col">
                            <input type="text" class="form-control" name="tech_details[0]" placeholder="e.g. 300-350 MPA or Thickness: .50 - .70 mm">
                        </div>
                    </div>
                    @php $techIndex = 1; @endphp
                @endif
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addTechDetailField()">
                <i class="bi bi-plus-lg"></i> Add Tech Detail Point
            </button>
        </div>

        <!-- Spec Bar -->
        <h6 class="mt-4 mb-3 text-secondary">Horizontal Specifications Bar (e.g. SUBSTRATE, SEAM HEIGHT)</h6>
        <div id="spec-bar-container">
            @php $barIndex = 0; @endphp
            @if($product->spec_bar && is_array($product->spec_bar))
                @foreach($product->spec_bar as $spec)
                    <div class="row g-2 mb-2 spec-bar-row">
                        <div class="col">
                            <input type="text" class="form-control" name="spec_bar[{{ $barIndex }}][label]" value="{{ $spec['label'] }}" placeholder="Label">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="spec_bar[{{ $barIndex }}][value]" value="{{ $spec['value'] }}" placeholder="Value">
                        </div>
                    </div>
                    @php $barIndex++; @endphp
                @endforeach
            @else
                <div class="row g-2 mb-2 spec-bar-row">
                    <div class="col">
                        <input type="text" class="form-control" name="spec_bar[0][label]" placeholder="Label">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="spec_bar[0][value]" placeholder="Value">
                    </div>
                </div>
                @php $barIndex = 1; @endphp
            @endif
        </div>
        <button type="button" class="btn btn-outline-secondary btn-sm mb-4" onclick="addSpecBarField()">
            <i class="bi bi-plus-lg"></i> Add Spec Bar Field
        </button>

        <!-- Applications Heading -->
        <h6 class="mt-2 mb-3 text-secondary border-top pt-3">Applications Section</h6>
        <div class="mb-3">
            <label for="app_heading" class="form-label">Applications Section Header (e.g. Precision Engineering for Diverse Environments)</label>
            <input type="text" class="form-control" id="app_heading" name="app_heading" value="{{ old('app_heading', $product->app_heading) }}">
        </div>

        <!-- Applications: Commercial -->
        <h6 class="mt-2 mb-3 text-secondary border-top pt-1">Application Card 1: Commercial</h6>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="app_commercial_title" class="form-label">Commercial Card Title</label>
                <input type="text" class="form-control" id="app_commercial_title" name="app_commercial_title" value="{{ old('app_commercial_title', $product->app_commercial_title) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="app_commercial_img" class="form-label">Commercial Card Image</label>
                <input type="file" class="form-control" id="app_commercial_img" name="app_commercial_img">
                @if($product->app_commercial_image)
                    <div class="form-text text-muted">Current: <code>{{ $product->app_commercial_image }}</code></div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="app_commercial_desc" class="form-label">Commercial Card Description</label>
            <textarea class="form-control" id="app_commercial_desc" name="app_commercial_desc" rows="2">{{ old('app_commercial_desc', $product->app_commercial_desc) }}</textarea>
        </div>

        <!-- Applications: Industrial -->
        <h6 class="mt-2 mb-3 text-secondary border-top pt-3">Application Card 2: Industrial</h6>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="app_industrial_title" class="form-label">Industrial Card Title</label>
                <input type="text" class="form-control" id="app_industrial_title" name="app_industrial_title" value="{{ old('app_industrial_title', $product->app_industrial_title) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="app_industrial_img" class="form-label">Industrial Card Image</label>
                <input type="file" class="form-control" id="app_industrial_img" name="app_industrial_img">
                @if($product->app_industrial_image)
                    <div class="form-text text-muted">Current: <code>{{ $product->app_industrial_image }}</code></div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="app_industrial_desc" class="form-label">Industrial Card Description</label>
            <textarea class="form-control" id="app_industrial_desc" name="app_industrial_desc" rows="2">{{ old('app_industrial_desc', $product->app_industrial_desc) }}</textarea>
        </div>

        <!-- Performance Core Details -->
        <h6 class="mt-4 mb-3 text-secondary border-top pt-3">Performance Core Details</h6>
        <div id="details-container">
            @php $detailIndex = 0; @endphp
            @if($product->details && is_array($product->details))
                @foreach($product->details as $det)
                    <div class="row g-2 mb-2 detail-row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="details[{{ $detailIndex }}][title]" value="{{ $det['title'] }}" placeholder="Feature Title (e.g. Mechanical Seaming)">
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="details[{{ $detailIndex }}][desc]" value="{{ $det['desc'] }}" placeholder="Feature Description">
                        </div>
                    </div>
                    @php $detailIndex++; @endphp
                @endforeach
            @else
                <div class="row g-2 mb-2 detail-row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="details[0][title]" placeholder="Feature Title">
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="details[0][desc]" placeholder="Feature Description">
                    </div>
                </div>
                @php $detailIndex = 1; @endphp
            @endif
        </div>
        <button type="button" class="btn btn-outline-secondary btn-sm mb-4" onclick="addDetailField()">
            <i class="bi bi-plus-lg"></i> Add Performance Feature
        </button>

        <div class="d-flex justify-content-end gap-2 border-top pt-3">
            <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>

<script>
    let techIndex = {{ $techIndex }};
    function addTechDetailField() {
        const container = document.getElementById('tech-details-container');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 tech-detail-row';
        row.innerHTML = `
            <div class="col">
                <input type="text" class="form-control" name="tech_details[${techIndex}]" placeholder="e.g. 300-350 MPA or Thickness: .50 - .70 mm">
            </div>
        `;
        container.appendChild(row);
        techIndex++;
    }

    let barIndex = {{ $barIndex }};
    function addSpecBarField() {
        const container = document.getElementById('spec-bar-container');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 spec-bar-row';
        row.innerHTML = `
            <div class="col">
                <input type="text" class="form-control" name="spec_bar[${barIndex}][label]" placeholder="Label">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="spec_bar[${barIndex}][value]" placeholder="Value">
            </div>
        `;
        container.appendChild(row);
        barIndex++;
    }

    let detailIndex = {{ $detailIndex }};
    function addDetailField() {
        const container = document.getElementById('details-container');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 detail-row';
        row.innerHTML = `
            <div class="col-md-4">
                <input type="text" class="form-control" name="details[${detailIndex}][title]" placeholder="Feature Title">
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="details[${detailIndex}][desc]" placeholder="Feature Description">
            </div>
        `;
        container.appendChild(row);
        detailIndex++;
    }
</script>
@endsection
