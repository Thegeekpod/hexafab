@extends('layouts.admin')

@section('page-title', 'Products')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 text-dark">All Products</h5>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Add New Product
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Badge</th>
                    <th>Hero Subtitle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            @if($product->image_path)
                                <img src="{{ asset($product->image_path) }}" alt="" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td><strong>{{ $product->title }}</strong></td>
                        <td><span class="badge bg-secondary">{{ $product->badge ?: 'None' }}</span></td>
                        <td>{{ $product->hero_subtitle }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
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
                        <td colspan="5" class="text-center py-4 text-muted">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
