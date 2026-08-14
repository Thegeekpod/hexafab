@extends('layouts.app')

@section('title', ($blog->title ?? 'Blog Details') . ' - Hexafab Steels')

@section('content')
  <!-- Hero Section -->
  <section class="blog-hero" style="background-image: url('{{ asset($blog->image_path ?: 'images/projects-hero-bg.png') }}');">
    <div class="container">
      <div class="blog-hero-content">
        <span class="blog-tag-badge">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
            <line x1="7" y1="7" x2="7.01" y2="7"></line>
          </svg>
          {{ $blog->tag ?? 'INDUSTRY INSIGHT' }}
        </span>
        <h1 class="blog-hero-title">{{ $blog->title ?? 'The Future of Sustainable Steel in Modern Architecture' }}</h1>
        <div class="blog-hero-meta">
          <span class="blog-hero-meta-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            {{ $blog->author ?? 'Hexafab Editorial Team' }}
          </span>
          <span class="blog-hero-meta-dot"></span>
          <span class="blog-hero-meta-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
              <line x1="16" y1="2" x2="16" y2="6"></line>
              <line x1="8" y1="2" x2="8" y2="6"></line>
              <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            {{ optional($blog->created_at ?? now())->format('M d, Y') }}
          </span>
          <span class="blog-hero-meta-dot"></span>
          <span class="blog-hero-meta-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            {{ $blog->reading_time ?? '5 min read' }}
          </span>
        </div>
      </div>
    </div>
  </section>

  <!-- Breadcrumbs -->
  <div class="blog-breadcrumb-bar">
    <div class="container">
      <div class="blog-breadcrumb-links">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <a href="{{ route('home') }}#resources">Blogs & Insights</a>
        <span class="separator">/</span>
        <span class="current">{{ Str::limit($blog->title ?? 'Blog Details', 35) }}</span>
      </div>
    </div>
  </div>

  <!-- Content Section -->
  <section class="blog-details-section">
    <div class="container">
      <div class="blog-layout-grid">
        
        <!-- Main Article Column -->
        <article class="article-card-main">
          <!-- Featured Image -->
          <div class="article-featured-img-wrap">
            <img src="{{ asset($blog->image_path ?: 'images/Hero-banner-1.webp') }}" alt="{{ $blog->title }}" class="article-featured-img" />
          </div>

          <!-- Lead Summary -->
          @if($blog->description)
            <div class="article-lead-box">
              <p class="article-lead-text">
                {{ $blog->description }}
              </p>
            </div>
          @endif

          <!-- Body Content -->
          <div class="article-body-content">
            @if($blog->content)
              <div class="article-custom-body">
                {!! nl2br(e($blog->content)) !!}
              </div>
            @else
              <h2>The Shift Towards Greener Standards</h2>
              <p>Traditional materials often come at a high environmental cost. From the energy-intensive production of clay tiles to the non-recyclable nature of asphalt shingles, the environmental footprint is significant. Coated steel, however, offers a compelling alternative. It is 100% recyclable, and modern precision production techniques have significantly reduced its carbon intensity.</p>

              <blockquote>
                "True sustainability in industrial and commercial architecture isn't just about the 'now'—it's about the resilience and integrity of the materials for generations to come."
              </blockquote>

              <h2>Engineering for Longevity & Thermal Efficiency</h2>
              <p>Beyond the immediate environmental benefits, the longevity of coated steel solutions contributes to a more sustainable construction cycle. Reduced replacement frequency means fewer resources consumed over the building's lifecycle. At Hexafab, our <strong>Coral</strong> and <strong>Glitz</strong> ranges are engineered to maintain their thermal reflectivity and structural integrity for decades.</p>

              <h3>Key Advantages of Coated Steel:</h3>
              <ul class="styled-features-list">
                <li><strong>High Solar Reflectance:</strong> Lower cooling loads and reduced urban heat island effect across commercial roof surfaces.</li>
                <li><strong>Structural Efficiency:</strong> High strength-to-weight ratio allows for leaner structural designs and wider purlin spans.</li>
                <li><strong>LEED Compatibility:</strong> Contributes significantly to green building ratings and environmental sustainability certifications.</li>
                <li><strong>Advanced Anti-Corrosive Tech:</strong> Proprietary coatings that resist industrial emissions, chemical fumes, and salt-air degradation.</li>
              </ul>

              <h2>Integrity in Every Layer</h2>
              <p>Manufacturing excellence at our facility ensures that every square meter of steel meets stringent international standards. Our commitment to quality control is part of our broader IMS policy, ensuring that performance and structural reliability are never compromised.</p>
            @endif
          </div>

          <!-- Tags & Share Footer -->
          <div class="article-footer-bar">
            <div class="article-tags-wrap">
              <span class="article-tag-chip">#{{ $blog->tag ?? 'SteelSolutions' }}</span>
              <span class="article-tag-chip">#HexafabSteels</span>
              <span class="article-tag-chip">#ModernArchitecture</span>
              <span class="article-tag-chip">#SustainableBuild</span>
            </div>

            <div class="article-share-wrap">
              <span class="article-share-label">Share:</span>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-icon-btn" title="Share on Facebook" aria-label="Share on Facebook">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                </svg>
              </a>
              <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" target="_blank" class="share-icon-btn" title="Share on WhatsApp" aria-label="Share on WhatsApp">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>
              </a>
              <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="share-icon-btn" title="Share on LinkedIn" aria-label="Share on LinkedIn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                  <rect x="2" y="9" width="4" height="12"></rect>
                  <circle cx="4" cy="4" r="2"></circle>
                </svg>
              </a>
              <a href="javascript:void(0);" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied to clipboard!');" class="share-icon-btn" title="Copy Link" aria-label="Copy Link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                  <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                </svg>
              </a>
            </div>
          </div>

          <!-- Author Box -->
          <div class="author-profile-box">
            <div class="author-avatar-wrap">
              {{ strtoupper(substr($blog->author ?? 'H', 0, 1)) }}
            </div>
            <div class="author-info">
              <h4>{{ $blog->author ?? 'Hexafab Editorial Team' }}</h4>
              <p>Specialized technical authors and industrial structural steel specialists delivering insights on high-durability coated steel technology and modern building envelope solutions.</p>
            </div>
          </div>
        </article>

        <!-- Sidebar Column -->
        <aside class="blog-sidebar-wrap">
          
          <!-- Recent Articles Widget -->
          <div class="sidebar-card-widget">
            <h3 class="sidebar-widget-title">Recent Articles</h3>
            <div class="recent-posts-list">
              @if(isset($recent_blogs) && $recent_blogs->count())
                @foreach($recent_blogs as $recent)
                  <a href="{{ route('blog.show', $recent->slug) }}" class="recent-post-item">
                    <div class="recent-post-thumb">
                      <img src="{{ asset($recent->image_path ?: 'images/Hero-banner-1.webp') }}" alt="{{ $recent->title }}" loading="lazy" />
                    </div>
                    <div class="recent-post-meta">
                      <span class="recent-post-date">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                          <line x1="16" y1="2" x2="16" y2="6"></line>
                          <line x1="8" y1="2" x2="8" y2="6"></line>
                          <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        {{ $recent->created_at->format('M d, Y') }}
                      </span>
                      <h4 class="recent-post-title">{{ $recent->title }}</h4>
                    </div>
                  </a>
                @endforeach
              @else
                <p class="text-muted small mb-0">No other recent articles.</p>
              @endif
            </div>
          </div>

          <!-- Quick Navigation / Topics -->
          <div class="sidebar-card-widget">
            <h3 class="sidebar-widget-title">Explore Topics</h3>
            <div class="d-flex flex-wrap gap-2">
              <a href="{{ route('home') }}#resources" class="article-tag-chip">Coated Steel</a>
              <a href="{{ route('home') }}#resources" class="article-tag-chip">Industrial Roofing</a>
              <a href="{{ route('home') }}#resources" class="article-tag-chip">Standing Seam</a>
              <a href="{{ route('home') }}#resources" class="article-tag-chip">Technical Specs</a>
              <a href="{{ route('home') }}#resources" class="article-tag-chip">Sustainability</a>
            </div>
          </div>

          <!-- CTA Consultation Box -->
          <div class="sidebar-cta-box">
            <div class="sidebar-cta-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
              </svg>
            </div>
            <h4>Have a Custom Project?</h4>
            <p>Connect directly with our engineering team for technical guidance and custom steel specifications.</p>
            <a href="{{ route('contact') }}" class="sidebar-cta-btn">
              <span>Contact Engineering</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
          </div>

        </aside>

      </div>
    </div>
  </section>
@endsection
