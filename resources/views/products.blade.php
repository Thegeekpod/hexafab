@extends('layouts.app')

@section('title', 'Our Products - Hexafab Steels')

@section('content')
  <section class="internal-hero" style="background-image: url('{{ asset('images/Deck-sheets/HexaDecksheet1.png') }}');">
    <div class="internal-hero-content">
      <p class="page-label" style="color: white; text-decoration: underline;">What we offer</p>
      <h1>Our Premium Solutions</h1>
    </div>
  </section>

  <div class="breadcrumb-wrap">
    <div class="container">
      <a href="{{ route('home') }}">Home</a>
      <span class="separator">/</span>
      <span class="current">Products</span>
    </div>
  </div>

  <section class="internal-content-section" style="padding-top: 4rem; padding-bottom: 4rem;">
    <div class="container">
      <div class="section-header" style="text-align: center; margin-bottom: 2rem;">
        <p class="section-label" style="text-transform: uppercase; color: #3685b1; letter-spacing: 0.1em; font-weight: 700; margin-bottom: 0.5rem;">
          One-stop shop
        </p>
        @if(!empty($search))
          <h2 style="font-size: clamp(1.75rem, 3.5vw, 2.25rem); font-weight: 700; color: #1a1a1a;">
            Search Results for: <span style="color: #3685b1;">"{{ $search }}"</span>
          </h2>
          <div style="margin-top: 1rem;">
            <a href="{{ route('products') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: #e2e8f0; color: #334155; padding: 0.4rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; text-decoration: none; transition: background 0.2s ease;">
              <span>✕ Clear Search</span>
              <span>(View All Products)</span>
            </a>
          </div>
        @else
          <h2 style="font-size: clamp(2rem, 4vw, 2.5rem); font-weight: 700; color: #1a1a1a;">Explore our full range of products</h2>
        @endif
      </div>

      @if($products->isEmpty())
        <div style="text-align: center; padding: 4rem 1.5rem; background: #f8fafc; border-radius: 16px; border: 1px dashed #cbd5e1; max-width: 600px; margin: 0 auto;">
          <svg style="width: 48px; height: 48px; color: #94a3b8; margin-bottom: 1rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <h3 style="font-size: 1.25rem; font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">No products found</h3>
          <p style="color: #64748b; margin-bottom: 1.5rem;">We couldn't find any products matching "{{ $search }}". Try searching for "Standing Seam", "Purlin", "Deck Sheet", or browse our full catalogue.</p>
          <a href="{{ route('products') }}" class="btn-solid" style="display: inline-block; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none;">View All Products</a>
        </div>
      @else
        <div class="product-list-grid">
          @foreach($products as $product)
            <a href="{{ route('products.detail', $product->slug) }}" class="product-card">
              <div class="product-card-image">
                <img src="{{ asset($product->image_path) }}" alt="{{ $product->title }}" />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">{{ $product->title }}</h3>
                <p class="product-card-desc">{{ $product->hero_desc }}</p>
                <div class="product-card-link">
                  Explore Details 
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14m-7-7l7 7-7 7" />
                  </svg>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      @endif
    </div>
  </section>
@endsection