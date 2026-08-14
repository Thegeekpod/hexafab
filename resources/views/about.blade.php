@extends('layouts.app')

@section('title', 'About Us - Hexafab steels Coated Steel')

@section('content')
<section class="internal-hero"
      style="background-image: url('{{ asset('images/Trapezoidal-Sheet/TrapezoidalSheetBanner.png') }}');">
      <div class="internal-hero-content">
        <p class="page-label" style="color: white; text-decoration: underline;">Beyond Steel</p>
        <h1>Engineering a Greener and Stronger Future</h1>
      </div>
    </section>

    <div class="breadcrumb-wrap">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <span class="current">About Us</span>
      </div>
    </div>

    <!-- Our Story Section -->
    <section class="internal-content-section">
      <div class="container">
        <div class="content-grid-2">
          <div class="content-text">
            <h2>Pioneering the Future of Coated Steel</h2>
            <p>
              Hexafab steels Coated Steel, a division of Hexafab steels Tubes Ltd, is built on a foundation of
              industrial expertise and a passion for engineering excellence. We specialize in flat-coated steel products
              that redefine durability and design.
            </p>
            <p>
              Our journey began with a simple vision: to provide the construction industry with and structural
              solutions that are not only robust but also aesthetically pleasing. Today, we are proud to be one of
              India's leading providers in the coated steel segment.
            </p>
            <p>
              We don't just sell steel; we provide stability for your homes, industrial warehouses, and commercial
              spaces through precision engineering and high-quality raw materials.
            </p>
          </div>
          <div class="content-image">
            <img src="{{ asset('images/Deck-sheets/DackSheetBanner.png') }}" alt="Infrastructure" />
          </div>
        </div>
      </div>
    </section>

    <!-- Excellence Section -->
    <section class="internal-content-section" style="background: #f8fafc;">
      <div class="container">
        <div style="text-align: center; margin-bottom: 3.5rem;">
          <p class="page-label" style="color: #3685b1; font-weight: 700; letter-spacing: 0.1em;">OUR CORE VALUES</p>
          <h2 style="font-size: 2.25rem; font-weight: 700; color: #1a1a1a;">What Drives Hexafab Steels</h2>
        </div>
        <div class="values-grid">
          <div class="value-box">
            <h3>Innovating Strength</h3>
            <p>We believe in continuous transformation. From R&D to final product delivery, we push the boundaries of
              steel engineering to offer smarter, stronger solutions.</p>
          </div>
          <div class="value-box">
            <h3>Sustainable Practices</h3>
            <p>Our commitment to a greener future is visible in our eco-friendly manufacturing processes, focusing on
              longevity and material recyclability.</p>
          </div>
          <div class="value-box">
            <h3>Customer Centricity</h3>
            <p>We build relationships that last as long as our roofs. Every project is unique, and we tailor our
              solutions to meet the specific requirements of every client.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Manufacturing Infrastructure -->
    <section class="internal-content-section">
      <div class="container">
        <div class="content-grid-2">
          <div class="content-image" style="order: 2;">
            <img src="{{ asset('images/Trapezoidal-Sheet/TrapezoidalSheetBanner.png') }}" alt="Plant Capacity" />
          </div>
          <div class="content-text" style="order: 1;">
            <h2>Manufacturing Excellence</h2>
            <p>
              Our state-of-the-art facility is a testament to our industrial capability. Spanning over <strong>100
                acres</strong>, our plant is a synchronized ecosystem of advanced machinery and expert craftsmanship.
            </p>
            <p>
              With an <strong>1.0 MTPA capacity</strong>, we ensure that no project is too large for us to handle. Our
              strategic location and massive covered area allow us to maintain a consistent supply chain and rapid
              delivery times across the country.
            </p>
            <div class="about-stats">
              <div class="about-stat-item">
                <h4>100</h4>
                <p>Acres Area</p>
              </div>
              <div class="about-stat-item">
                <h4>1.0 MTPA</h4>
                <p>Production</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
