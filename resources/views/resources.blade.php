@extends('layouts.app')

@section('title', 'Resources & Downloads - Hexafab Steels')

@section('content')
  <section class="internal-hero" style="background-image: url('{{ asset('images/brandglitzbanner.webp') }}');">
    <div class="internal-hero-content">
      <p class="page-label" style="color: white; text-decoration: underline;">Documentation</p>
      <h1>Resources & Downloads</h1>
    </div>
  </section>

  <div class="breadcrumb-wrap">
    <div class="container">
      <a href="{{ route('home') }}">Home</a>
      <span class="separator">/</span>
      <span class="current">Resources</span>
    </div>
  </div>

  <section class="internal-content-section" style="padding-top: 4rem; padding-bottom: 4rem;">
    <div class="container">
      <div style="text-align: center; max-width: 800px; margin: 0 auto 4rem;">
        <h2 style="font-size: 2.25rem; font-weight: 700; color: #1a1a1a; margin-bottom: 1rem;">Everything you need to know about our products</h2>
        <p style="color: #666; font-size: 1.1rem;">Download our latest brochures, technical data sheets, and installation guides to help you make the right choice for your project.</p>
      </div>

      <div class="resource-grid">
        <a href="javascript:void(0);" class="resource-card">
          <div class="resource-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
              <polyline points="14 2 14 8 20 8" />
              <line x1="16" y1="13" x2="8" y2="13" />
              <line x1="16" y1="17" x2="8" y2="17" />
              <polyline points="10 9 9 9 8 9" />
            </svg>
          </div>
          <h3>Main Brochure</h3>
          <p>Comprehensive catalog of our complete product range and technical specifications.</p>
          <div class="download-link">Download PDF <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
              <polyline points="7 10 12 15 17 10" />
              <line x1="12" y1="15" x2="12" y2="3" />
            </svg></div>
        </a>

        <a href="javascript:void(0);" class="resource-card">
          <div class="resource-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
              <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
            </svg>
          </div>
          <h3>Product Manual</h3>
          <p>Step-by-step installation guides and maintenance tips for sheets.</p>
          <div class="download-link">Download PDF <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
              <polyline points="7 10 12 15 17 10" />
              <line x1="12" y1="15" x2="12" y2="3" />
            </svg></div>
        </a>

        <a href="javascript:void(0);" class="resource-card">
          <div class="resource-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
              <line x1="3" y1="9" x2="21" y2="9" />
              <line x1="9" y1="21" x2="9" y2="9" />
            </svg>
          </div>
          <h3>Technical Specs</h3>
          <p>Detailed material properties, load capacity tables, and environmental certifications.</p>
          <div class="download-link">Download PDF <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
              <polyline points="7 10 12 15 17 10" />
              <line x1="12" y1="15" x2="12" y2="3" />
            </svg></div>
        </a>
      </div>

    </div>
  </section>
@endsection