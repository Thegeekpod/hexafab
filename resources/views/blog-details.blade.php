@extends('layouts.app')

@section('title', 'The Future of Sustainable Steel | Hexafab Steels')

@section('content')
<section class="internal-hero" style="background-image: url('{{ asset('images/projects-hero-bg.png') }}');">
      <div class="internal-hero-content">
        <p class="page-label" style="color: white; text-decoration: underline;">Industry Insights</p>
        <h1>The Future of Sustainable Steel in Modern Architecture</h1>
      </div>
    </section>

    <div class="breadcrumb-wrap">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <a href="{{ route('resources') }}">Resources</a>
        <span class="separator">/</span>
        <span class="current">Blog Details</span>
      </div>
    </div>

    <section class="internal-content-section">
      <div class="container">
        <div class="blog-details-wrapper">
          <div class="blog-main-content">
            <div class="post-meta-top">
              <span class="author">By Hexafab Editorial Team</span>
              <span class="dot"></span>
              <span class="date">October 12, 2024</span>
              <span class="dot"></span>
              <span class="reading-time">6 min read</span>
            </div>

            <div class="article-rich-text">
              <p class="lead-paragraph">In an era where sustainability is no longer a choice but a necessity, the
                construction industry is undergoing a radical transformation. Leading this change is a material that has
                been the backbone of industrial progress for centuries: Steel.</p>

              <img src="{{ asset('images/Hero-banner-1.webp') }}" alt="Modern Industrial Building" class="main-featured-img" />

              <h2>The Shift Towards Greener Standards</h2>
              <p>Traditional materials often come at a high environmental cost. From the energy-intensive
                production of clay tiles to the non-recyclable nature of asphalt shingles, the footprint is significant.
                Coated steel, however, offers a compelling alternative. It is 100% recyclable, and modern production
                techniques have significantly reduced its carbon intensity.</p>

              <blockquote>
                "True sustainability in architecture isn't just about the 'now'—it's about the resilience of the
                materials for generations to come."
              </blockquote>

              <h2>Engineering for Longevity</h2>
              <p>Beyond the immediate environmental benefits, the longevity of coated steel solutions contributes to a
                more sustainable construction cycle. Reduced replacement frequency means fewer resources consumed over
                the building's lifecycle. At Hexafab, our <strong>Coral</strong> and <strong>Glitz</strong> ranges are
                engineered to maintain their thermal reflectivity and structural integrity for decades.</p>

              <h3>Key Advantages of Coated Steel:</h3>
              <ul class="styled-list">
                <li><strong>Solar Reflectance:</strong> Lower cooling loads and reduced urban heat island effect.</li>
                <li><strong>Structural Efficiency:</strong> High strength-to-weight ratio allows for leaner structural
                  designs.</li>
                <li><strong>LEED Compatibility:</strong> Contributes significantly to green building certifications.
                </li>
                <li><strong>Anti-Corrosive Tech:</strong> Proprietary coatings that resist chemical and salt-air
                  degradation.</li>
              </ul>

              <h2>Integrity in Every Layer</h2>
              <p>Manufacturing excellence at our facility ensures that every square meter of steel meets stringent
                international standards. Our commitment to quality control is part of our broader IMS policy, ensuring
                that performance is never sacrificed for speed.</p>
            </div>

            <div class="post-footer">
              <div class="post-tags">
                <a href="#">#SustainableSteel</a>
                <a href="#">#SteelTrends</a>
                <a href="#">#GreenBuilding</a>
              </div>
              <!-- <div class="post-share">
                <span>Share this article:</span>
                <div class="share-icons">
                  <a href="#"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" /></svg></a>
                  <a href="#"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" /><rect x="2" y="9" width="4" height="12" /><circle cx="4" cy="4" r="2" /></svg></a>
                </div>
              </div> -->
            </div>
          </div>

          <aside class="blog-sidebar">
            <div class="sidebar-box sticky-sidebar">
              <h3>Recent Articles</h3>
              <div class="side-post-list">
                <div class="side-post">
                  <span class="date">Oct 05, 2024</span>
                  <a href="#">How to Choose the Right Gauge for Industrial Sheds</a>
                </div>
                <div class="side-post">
                  <span class="date">Sep 28, 2024</span>
                  <a href="#">Maximizing Structural Integrity with deck sheets</a>
                </div>
                <div class="side-post">
                  <span class="date">Sep 15, 2024</span>
                  <a href="#">WeatherpLarge-Scale Commercial Projects</a>
                </div>
              </div>

              <div class="sidebar-cta">
                <h4>Need a Quote?</h4>
                <p>Connect with our experts today for your custom solution.</p>
                <a href="{{ route('contact') }}" class="btn-solid">Contact Us</a>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- <section class="related-posts-area">
      <div class="container">
        <h2 class="section-title">You Might Also Be Interested In</h2>
        <div class="related-grid">
           <a href="#" class="related-card">
              <div class="card-img"><img src="{{ asset('images/commercial-building-2.webp') }}" alt="Building" /></div>
              <div class="card-body">
                 <span class="label">Innovations</span>
                 <h3>Revolutionary Coating tech for extreme climates</h3>
              </div>
           </a>
           <a href="#" class="related-card">
              <div class="card-img"><img src="{{ asset('images/brandpurlioanner.webp') }}" alt="Building" /></div>
              <div class="card-body">
                 <span class="label">Case Study</span>
                 <h3>Industrial Purlins: Efficiency at scale</h3>
              </div>
           </a>
           <a href="#" class="related-card">
              <div class="card-img"><img src="{{ asset('images/residential-house1.webp') }}" alt="Building" /></div>
              <div class="card-body">
                 <span class="label">Residential</span>
                 <h3>Enhancing Curb Appeal with Modern Steel</h3>
              </div>
           </a>
        </div>
      </div>
    </section> -->
@endsection
