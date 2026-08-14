@extends('layouts.app')

@section('title', 'Store Locator - Hexafab steels Coated Steel')

@section('content')
<section class="internal-hero" style="background-image: url('{{ asset('images/store-hero-bg.png') }}');">
      <div class="internal-hero-content">
        <p class="page-label" style="color: white; text-decoration: underline;">Find Us</p>
        <h1>Store & Dealer Locator</h1>
      </div>
    </section>

    <div class="breadcrumb-wrap">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <span class="current">Store Locator</span>
      </div>
    </div>

    <!-- <section class="location-finder-wrap">
      <div class="container">
        <div style="text-align: center; max-width: 700px; margin: 0 auto;">
          <h2 style="font-size: 2.25rem; font-weight: 700; color: #1a1a1a;">Find Your Nearest Location</h2>
          <p style="color: #64748b; margin-top: 1rem; font-size: 1.1rem;">Search by city or select your state to find authorized Hexafab Steels dealers and experience centers near you.</p>
        </div>

        <div class="finder-controls">
          <div class="finder-input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <input type="text" class="finder-input" placeholder="Search by city or pincode...">
          </div>
          <select class="finder-select">
            <option value="">All States</option>
            <option value="west-bengal">West Bengal</option>
            <option value="gujarat">Gujarat</option>
            <option value="maharashtra">Maharashtra</option>
            <option value="odisha">Odisha</option>
          </select>
          <button class="btn-solid" style="padding: 0 2rem; border-radius: 10px;">Find Now</button>
        </div>
      </div>
    </section> -->

    <section class="internal-content-section">
      <div class="container">
        <div class="store-grid">
          <div class="store-card">
            <span class="store-tag">Head Office</span>
            <h3 class="store-name">Kolkata Corporate Office</h3>
            <p class="store-address">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
              JEEWAN NIWAS 30A BLOCK - R, Flat A-1 First Floor, New Alipore, Kolkata-700053
            </p>
            <div class="store-action">
              <a href="javascript:void(0);" class="btn-icon btn-directions">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polygon points="3 11 22 2 13 21 11 13 3 11" />
                </svg>
                Directions
              </a>
              <a href="tel:+03340293266" class="btn-icon btn-call">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                Call
              </a>
            </div>
          </div>

          <div class="store-card">
            <span class="store-tag">Manufacturing Unit</span>
            <h3 class="store-name">Howrah Manufacturing Facility</h3>
            <p class="store-address">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
              NH6, Ganesh Complex, Vill Raghudevpur, P.S Rajapur, Howrah-711322
            </p>
            <div class="store-action">
              <a href="javascript:void(0);" class="btn-icon btn-directions">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polygon points="3 11 22 2 13 21 11 13 3 11" />
                </svg>
                Directions
              </a>
              <a href="tel:+919932292163" class="btn-icon btn-call">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                Call
              </a>
            </div>
          </div>

          <div class="store-card">
            <span class="store-tag">Partner Outlet</span>
            <h3 class="store-name">Ahmedabad Experience Center</h3>
            <p class="store-address">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
              Plot No. 45, GIDC Industrial Estate, Phase II, Vatva, Ahmedabad, Gujarat-382445
            </p>
            <div class="store-action">
              <a href="javascript:void(0);" class="btn-icon btn-directions">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polygon points="3 11 22 2 13 21 11 13 3 11" />
                </svg>
                Directions
              </a>
              <a href="javascript:void(0);" class="btn-icon btn-call">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                Call
              </a>
            </div>
          </div>
        </div>

        <div class="map-placeholder-section">
          <img src="{{ asset('images/factory-image.webp') }}" alt="Map Background">
          <div class="map-overlay-card">
            <div class="map-pulse"></div>
            <span>Exploring our nationwide network...</span>
          </div>
        </div>
      </div>
    </section>
@endsection
