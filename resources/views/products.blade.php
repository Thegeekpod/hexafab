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
        <h2 style="font-size: clamp(2rem, 4vw, 2.5rem); font-weight: 700; color: #1a1a1a;">Explore our full range of products</h2>
      </div>

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
    </div>
  </section>
@endsection