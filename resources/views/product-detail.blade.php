@extends('layouts.app')

@section('title', $product->title . ' - Hexafab Steels')

@section('content')
  <div class="breadcrumb-wrap">
    <div class="container">
      <a href="{{ route('home') }}">Home</a>
      <span class="separator">/</span>
      <a href="{{ route('products') }}">Products</a>
      <span class="separator">/</span>
      <span class="current">{{ $product->title }}</span>
    </div>
  </div>

  <main>
    <section class="product-hero">
      <div class="hero-grid-container">
        <div class="hero-split-layout">
          <div class="hero-content-left">
            @if($product->hero_subtitle)
              <p class="hero-subtitle">{{ $product->hero_subtitle }}</p>
            @endif
            <h1 class="hero-main-title">
              {{ $product->hero_title ?? $product->title }}
            </h1>
            <p class="hero-desc">
              {{ $product->hero_desc }}
            </p>
            @if($product->pdf_path)
              <a href="{{ asset($product->pdf_path) }}" target="_blank" download class="hero-download-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                  <polyline points="7 10 12 15 17 10" />
                  <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                <span>{{ $product->pdf_button_text ?: 'Download Technical Manual (PDF)' }}</span>
              </a>
            @else
              <a href="{{ route('contact') }}" class="hero-download-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                  <polyline points="7 10 12 15 17 10" />
                  <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                <span>{{ $product->pdf_button_text ?: 'Request Technical Manual (PDF)' }}</span>
              </a>
            @endif
          </div>
          <div class="hero-image-right">
            <img src="{{ asset($product->hero_image ?? $product->image_path) }}" alt="{{ $product->title }}" />
          </div>
        </div>

        @if($product->spec_bar && is_array($product->spec_bar))
          <div class="hero-specs-bar">
            @foreach($product->spec_bar as $spec)
              <div class="spec-bar-item">
                <span class="spec-bar-label">{{ $spec['label'] }}</span>
                <span class="spec-bar-value">{{ $spec['value'] }}</span>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    <!-- Applications Section -->
    <section class="applications-section">
      <div class="section-header-center">
        <span class="section-label">Where It Excels</span>
        <h2>{!! $product->app_heading ?? 'Precision Engineering for <br>Diverse Environments' !!}</h2>
      </div>
      <div class="apps-grid two-cols">
        @if($product->app_commercial_title)
          <div class="app-card">
            <div class="app-image">
              <img src="{{ asset($product->app_commercial_image) }}" alt="{{ $product->app_commercial_title }}" />
            </div>
            <div class="app-content">
              <h3 class="app-title">{{ $product->app_commercial_title }}</h3>
              <p class="app-desc">{{ $product->app_commercial_desc }}</p>
            </div>
          </div>
        @endif
        @if($product->app_industrial_title)
          <div class="app-card">
            <div class="app-image">
              <img src="{{ asset($product->app_industrial_image) }}" alt="{{ $product->app_industrial_title }}" />
            </div>
            <div class="app-content">
              <h3 class="app-title">{{ $product->app_industrial_title }}</h3>
              <p class="app-desc">{{ $product->app_industrial_desc }}</p>
            </div>
          </div>
        @endif
      </div>
    </section>

    <!-- Detailed Performance Core Section -->
    @if($product->details && is_array($product->details))
      <section class="detailed-info">
        <div class="info-container">
          <div class="section-header-center">
            <span class="section-label">Performance Core</span>
            <h2 style="color:#0d2840">Technical Excellence & Engineering Details</h2>
          </div>
          <div class="info-grid">
            @foreach($product->details as $detail)
              <div class="info-item">
                <div class="info-icon">
                  @switch($detail['icon'] ?? 'shield')
                    @case('shield')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                      </svg>
                      @break
                    @case('thermal')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4.93 4.93l14.14 14.14M2 12h20M12 2v20"></path>
                      </svg>
                      @break
                    @case('clock')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 8v4l3 3"></path>
                      </svg>
                      @break
                    @case('acoustic')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                      </svg>
                      @break
                    @case('alu-zinc')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 1-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                      </svg>
                      @break
                    @case('solar')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                      </svg>
                      @break
                    @case('lightning')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                      </svg>
                      @break
                    @case('water')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                      </svg>
                      @break
                    @case('sun')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                      </svg>
                      @break
                    @case('rupee')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                      </svg>
                      @break
                    @case('walk')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                      </svg>
                      @break
                    @case('flag')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                        <line x1="4" y1="22" x2="4" y2="15"></line>
                      </svg>
                      @break
                    @case('square')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                      </svg>
                      @break
                    @case('check')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                      </svg>
                      @break
                    @case('pin')
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"></path>
                      </svg>
                      @break
                  @endswitch
                </div>
                <h4>{{ $detail['title'] }}</h4>
                <p>{{ $detail['desc'] }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif
  </main>
@endsection
