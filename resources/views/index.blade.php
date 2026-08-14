@extends('layouts.app')

@section('title', 'Hexafab steels Coated Steel - Solutions')

@section('content')
<section class="hero">
    <div class="swiper hero-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('{{ asset('img/Banner/Banner-1.png') }}');">
          <div class="slide-content">
            <h1 class="heading">Robust Trapezoidal Profiles</h1>
            <p class="description">
              Engineered for maximum strength and efficient drainage in industrial and commercial projects.
            </p>
            <a href="{{ route('products.detail', 'trapezoidal-sheet') }}" class="btn">Read More →</a>
          </div>
        </div>
        <div class="swiper-slide" style="background-image: url('{{ asset('img/Banner/Banner-3.png') }}');">
          <div class="slide-content">
            <h1 class="heading">High-Performance Decking</h1>
            <p class="description">
              Superior structural decking solutions for composite slabs, ensuring speed and safety in construction.
            </p>
            <a href="{{ route('products.detail', 'deck-sheet') }}" class="btn">Read More →</a>
          </div>
        </div>
        <div class="swiper-slide" style="background-image: url('{{ asset('img/Banner/Banner-2.png') }}');">
          <div class="slide-content">
            <h1 class="heading">Precision C/Z Purlins</h1>
            <p class="description">
              High-strength structural support for industrial sheds, warehouses, and modern building frameworks.
            </p>
            <a href="{{ route('products.detail', 'cz-purlin') }}" class="btn">Read More →</a>
          </div>
        </div>
      </div>
    </div>

    <div class="hero-nav">
      <div class="swiper-button-prev"></div>
      <div class="slide-counter">
        <span class="current" id="currentSlide">01</span>
        <span> / </span>
        <span id="totalSlides">03</span>
      </div>
      <div class="swiper-button-next"></div>
    </div>
  </section>

  <section class="know-about">
    <div class="container">
      <div class="content">
        <p class="section-label">Know about us</p>
        <h2 class="section-heading">
          Welcome to Hexafab steels Coated Steel, a division of Hexafab steels
          Tubes Ltd
        </h2>
        <p class="section-desc">
          We specialize in manufacturing high-quality flat coated steel
          products and offer a comprehensive range of solutions,
          setting new standards of excellence in the industry.
        </p>
        <a href="{{ route('about') }}" class="read-more">Read More</a>
        <div class="stats">
          <div class="stat-item">
            <div class="stat-value">1.0</div>
            <div class="stat-label">MTPA Capacity</div>
          </div>
          <div class="stat-item">
            <div class="stat-value">100</div>
            <div class="stat-label">Acres Plant Spread</div>
          </div>
          <div class="stat-item">
            <div class="stat-value">100</div>
            <div class="stat-label">Acres Covered Area</div>
          </div>
        </div>
      </div>
      <div class="image-wrap">
        <img src="{{ asset('images/Deck-sheets/DackSheetBanner.png') }}" alt=" Hexafab steels Coated Steel facility" loading="lazy" />
      </div>
    </div>
  </section>

  <section class="key-features">
    <div class="container">
      <div class="section-header">
        <p class="section-label">key features</p>
        <h2 class="section-heading">One-Stop Shop for Solutions</h2>
      </div>
      <div class="features-grid">
        <div class="feature-item">
          <div class="feature-num">01</div>
          <h3 class="feature-title">Anti-Corrosion</h3>
          <p class="feature-desc">
            Provides Superior Protection Against Corrosion
          </p>
        </div>
        <div class="feature-item">
          <div class="feature-num">02</div>
          <h3 class="feature-title">High Durability</h3>
          <p class="feature-desc">
            Built to Withstand High Winds and Harsh Weather
          </p>
        </div>
        <div class="feature-item">
          <div class="feature-num">03</div>
          <h3 class="feature-title">Weather Resistance</h3>
          <p class="feature-desc">Withstands Extreme Weather Conditions</p>
        </div>
        <div class="feature-item">
          <div class="feature-num">04</div>
          <h3 class="feature-title">Eco-Friendly</h3>
          <p class="feature-desc">
            Sustainable, eco-friendly steel for a greener future
          </p>
        </div>
        <div class="feature-item">
          <div class="feature-num">05</div>
          <h3 class="feature-title">Leak-Proof</h3>
          <p class="feature-desc">
            Anti-Capillary Groove Ensures a Leak-Proof Roof
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="brands-section">
    <div class="container">
      <div class="section-header">
        <p class="section-label">Our Brands</p>
        <h2 class="section-heading">
          Comprehensive Solutions for Every Need
        </h2>
      </div>
    </div>
    <div class="slider-wrap">
      <div class="swiper brand-main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="
                background-image: url(&quot;images/Circular-Corrugated-Sheet/CircularCorrugatedSheetBanner.png&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Roof Tuff</p>
              <h2 class="heading">Rough & Tough Shield for your Roof</h2>
              <p class="sub-heading">
                From residential to industrial settings, RoofTuff offers
                unparalleled durability and strength to the roof
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
          <div class="swiper-slide" style="
                background-image: url(&quot;images/D-Brand-lumetuff.webp&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Lume Tuff</p>
              <h2 class="heading">Quality Made to Last</h2>
              <p class="sub-heading">
                Excels in harsh conditions and is widely used in,
                panels, walls, ducts, and more.
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
          <div class="swiper-slide" style="
                background-image: url(&quot;images/CZ-Purlin/czpurlin.png&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Coral</p>
              <h2 class="heading">Coral-Inspired Colours for Your Roof</h2>
              <p class="sub-heading">
                Discover our latest range of sheets. 12 Vibrant
                Colours | Ultimate Durability | 15-Year Warranty
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
          <div class="swiper-slide" style="
                background-image: url(&quot;images/CZ-Purlin/ZCPURLINBANNER.png&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Jumbo</p>
              <h2 class="heading">Industrial Strength</h2>
              <p class="sub-heading">
                Built for large-scale industrial and commercial applications
                with unmatched durability.
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
          <div class="swiper-slide" style="
                background-image: url(&quot;images/Deck-sheets/HexaDecksheet1.png&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Rakshak</p>
              <h2 class="heading">Protection You Can Trust</h2>
              <p class="sub-heading">
                Premium solutions designed for superior protection and
                long-lasting performance.
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
          <div class="swiper-slide" style="
                background-image: url(&quot;images/brandpurlioanner.webp&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Purlio</p>
              <h2 class="heading">Elegant Solutions</h2>
              <p class="sub-heading">
                Combining aesthetics with durability for residential and
                commercial projects.
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
          <div class="swiper-slide" style="
                background-image: url(&quot;images/brandglitzbanner.webp&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Glitz</p>
              <h2 class="heading">Premium Aesthetic</h2>
              <p class="sub-heading">
                Add a touch of elegance to your structures with our premium
                coated steel range.
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
          <div class="swiper-slide" style="
                background-image: url(&quot;images/factory-image.webp&quot;);
              ">
            <div class="brand-slide-content">
              <p class="label">Chaukhat</p>
              <h2 class="heading">Complete Door & Window Solutions</h2>
              <p class="sub-heading">
                High-quality door and window frames for modern construction
                needs.
              </p>
              <a href="product-details.html" class="btn">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="brand-thumbs">
        <div class="thumbs-strip">
          <div class="swiper brand-thumbs-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="{{ asset('images/Colorbond.png') }}" alt="Roof Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Prisma.png') }}" alt="Lume Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/TATA BlueScope.png') }}" alt="Coral" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Zincalume.png') }}" alt="Jumbo" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Colorbond.png') }}" alt="Roof Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Prisma.png') }}" alt="Lume Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/TATA BlueScope.png') }}" alt="Coral" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Zincalume.png') }}" alt="Jumbo" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Colorbond.png') }}" alt="Roof Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Prisma.png') }}" alt="Lume Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/TATA BlueScope.png') }}" alt="Coral" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Zincalume.png') }}" alt="Jumbo" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Colorbond.png') }}" alt="Roof Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Prisma.png') }}" alt="Lume Tuff" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/TATA BlueScope.png') }}" alt="Coral" class="thumb-logo" />
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/Zincalume.png') }}" alt="Jumbo" class="thumb-logo" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="top-brands">
    <div class="container">
      <div class="section-header">
        <p class="section-label">Top Products</p>
        <h2 class="section-heading">
          Innovative Solutions with Excellence
        </h2>
      </div>
      <div class="cards-grid">
        @foreach($products as $product)
          <a href="{{ route('products.detail', $product->slug) }}" class="card">
            <img src="{{ asset($product->image_path) }}" alt="{{ $product->title }}" class="card-image" loading="lazy" />
            @if($product->badge)
              <span class="card-badge">{{ $product->badge }}</span>
            @endif
            <span class="card-label">{{ $product->title }}</span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <section class="quick-access">
    <div class="container">
      <div class="section-header">
        <p class="section-label">Quick Access</p>
        <h2 class="section-heading">
          Committed to providing effortless solutions tailored for your needs
        </h2>
      </div>
      <div class="items-grid">
        <a href="javascript:void(0);" class="item">
          <div class="item-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" stroke="currentColor" stroke-width="1.5" fill="none"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3 class="item-title">Download Catalogue</h3>
          <p class="item-desc">
            Explore our products in detail with just a click
          </p>
        </a>
        <a href="{{ route('become-a-partner') }}" class="item">
          <div class="item-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3 class="item-title">Become a partner</h3>
          <p class="item-desc">
            Join us in shaping the future of solutions
          </p>
        </a>
        <a href="{{ route('store-locator') }}" class="item">
          <div class="item-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
                stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3 class="item-title">Store Locator</h3>
          <p class="item-desc">Find our products at a store near you</p>
        </a>
        <a href="{{ route('about') }}" class="item">
          <div class="item-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"
                stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <h3 class="item-title">Warranty</h3>
          <p class="item-desc">Explore our warranty coverage in a click</p>
        </a>
      </div>
    </div>
  </section>

  <section class="testimonial-section">
    <div class="container">
      <div class="section-header">
        <p class="section-label">Testimonials</p>
        <h2 class="section-heading">What do our customers say?</h2>
      </div>
      <div class="swiper testimonial-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="testimonial-card">
              <div class="image-wrap">
                <img src="{{ asset('images/Deck-sheets/DackSheetBanner.png') }}" alt="Residential" class="testimonial-image"
                  loading="lazy" />
              </div>
              <div class="testimonial-content">
                <div class="testimonial-stars">
                  <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="testimonial-quote">
                  Choosing Hexafab steels for our needs was one of the
                  best decisions we made during our home renovation. Our new
                  roof not only enhances the overall aesthetics of our
                  property but also provides superior protection against the
                  elements. Highly recommended!
                </p>
                <div class="testimonial-author-block">
                  <div class="testimonial-avatar">SS</div>
                  <div>
                    <span class="testimonial-author">Somya Sharma</span>
                    <span class="testimonial-role">Home Owner</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="testimonial-card">
              <div class="image-wrap">
                <img src="{{ asset('images/Circular-Corrugated-Sheet/CircularCorrugatedSheetBanner.png') }}" alt="Commercial"
                  class="testimonial-image" loading="lazy" />
              </div>
              <div class="testimonial-content">
                <div class="testimonial-stars">
                  <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="testimonial-quote">
                  Choosing Hexafab steels for our office was a
                  strategic decision. Their sheets improved our
                  workspace's look and provided durability and weather
                  resistance. Our clients and employees have given positive
                  feedback, reinforcing our trust in Hexafab steels.
                </p>
                <div class="testimonial-author-block">
                  <div class="testimonial-avatar">RS</div>
                  <div>
                    <span class="testimonial-author">Mr. Rakesh Sharma</span>
                    <span class="testimonial-role">Office Manager</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="testimonial-card">
              <div class="image-wrap">
                <img src="{{ asset('images/factory-image.webp') }}" alt="Industrial" class="testimonial-image" loading="lazy" />
              </div>
              <div class="testimonial-content">
                <div class="testimonial-stars">
                  <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="testimonial-quote">
                  We are very satisfied with Hexafab steels's for our
                  commercial space. The high-quality materials protect our
                  office from harsh weather while maintaining a professional
                  look. Hexafab steels sets the standard for
                  excellence.
                </p>
                <div class="testimonial-author-block">
                  <div class="testimonial-avatar">MK</div>
                  <div>
                    <span class="testimonial-author">Mr. Mohit Khurana</span>
                    <span class="testimonial-role">Commercial Builder</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="slider-controls">
          <div class="swiper-button-prev"></div>
          <span class="testimonial-counter" id="testimonialCounter">01 / 03</span>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="resources-section">
    <div class="container">
      <div class="section-header">
        <p class="section-label">Resources</p>
        <h2 class="section-heading">
          Explore Innovations and Achievements in Solutions
        </h2>
      </div>
      <div class="swiper resources-swiper">
        <div class="swiper-wrapper">
          @foreach($resources as $resource)
            <div class="swiper-slide">
              <a href="{{ route('blog-details') }}" class="resource-card">
                <div class="resource-card-image-wrap">
                  <img src="{{ asset($resource->image_path) }}" alt="{{ $resource->title }}" loading="lazy" />
                  <span class="resource-card-tag">{{ $resource->tag }}</span>
                </div>
                <div class="resource-card-body">
                  <h3 class="resource-card-title">
                    {{ $resource->title }}
                  </h3>
                  <p class="resource-card-desc">
                    {{ $resource->description }}
                  </p>
                  <span class="resource-card-link">{{ $resource->link_text }}</span>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="resources-swiper-nav">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
<script>
const heroSwiper = new Swiper(".hero-swiper", {
      loop: true,
      speed: 1000,
      effect: "creative",
      creativeEffect: {
        prev: {
          shadow: true,
          translate: ["-20%", 0, -1],
        },
        next: {
          translate: ["100%", 0, 0],
        },
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".hero-nav .swiper-button-next",
        prevEl: ".hero-nav .swiper-button-prev",
      },
      on: {
        init: function () {
          updateCounter(this)
        },
        slideChange: function () {
          updateCounter(this)
        },
      },
    })

    function updateCounter(swiper) {
      const current = swiper.realIndex + 1
      const total = swiper.slides.length
      const currentEl = document.getElementById("currentSlide")
      const totalEl = document.getElementById("totalSlides")
      if (currentEl) currentEl.textContent = String(current).padStart(2, "0")
      if (totalEl) totalEl.textContent = String(total).padStart(2, "0")
    }

    const brandThumbsSwiper = new Swiper(".brand-thumbs-swiper", {
      spaceBetween: 16,
      slidesPerView: "auto",
      freeMode: true,
      watchSlidesProgress: true,
    })

    const brandMainSwiper = new Swiper(".brand-main-swiper", {
      loop: true,
      speed: 600,
      effect: "fade",
      fadeEffect: { crossFade: true },
      thumbs: {
        swiper: brandThumbsSwiper,
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
    })

    const testimonialSwiper = new Swiper(".testimonial-swiper", {
      effect: "creative",
      grabCursor: true,
      creativeEffect: {
        prev: {
          shadow: true,
          origin: "left center",
          translate: ["-5%", 0, -200],
          rotate: [0, 100, 0],
        },
        next: {
          origin: "right center",
          translate: ["5%", 0, -200],
          rotate: [0, -100, 0],
        },
      },
      slidesPerView: 1,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 5500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".testimonial-section .swiper-button-next",
        prevEl: ".testimonial-section .swiper-button-prev",
      },
      on: {
        init: function () {
          updateTestimonialCounter(this)
        },
        slideChange: function () {
          updateTestimonialCounter(this)
        },
      },
    })

    function updateTestimonialCounter(swiper) {
      const current = swiper.realIndex + 1
      const total = swiper.slides.length
      const el = document.getElementById("testimonialCounter")
      if (el)
        el.textContent =
          String(current).padStart(2, "0") +
          " / " +
          String(total).padStart(2, "0")
    }

    ; (function () {
      var searchBtn = document.querySelector(".header-search")
      var overlay = document.getElementById("headerSearchOverlay")
      var searchInput = document.getElementById("headerSearchInput")
      var searchClose = document.getElementById("searchClose")
      if (!searchBtn || !overlay) return
      function openSearch() {
        document.body.classList.add("is-search-open")
        overlay.setAttribute("aria-hidden", "false")
        if (searchInput) {
          searchInput.focus()
        }
      }
      function closeSearch() {
        document.body.classList.remove("is-search-open")
        overlay.setAttribute("aria-hidden", "true")
      }
      searchBtn.addEventListener("click", openSearch)
      searchClose.addEventListener("click", closeSearch)
      overlay.addEventListener("click", function (e) {
        if (e.target === overlay) closeSearch()
      })
      document.addEventListener("keydown", function (e) {
        if (
          e.key === "Escape" &&
          document.body.classList.contains("is-search-open")
        )
          closeSearch()
      })
    })()
      ; (function () {
        var menuToggle = document.querySelector(".menu-toggle")
        var offcanvas = document.getElementById("offcanvasMenu")
        var offcanvasClose = document.getElementById("offcanvasClose")
        var offcanvasBackdrop = document.getElementById("offcanvasBackdrop")
        if (!menuToggle || !offcanvas) return
        function openOffcanvas() {
          document.body.classList.add("is-offcanvas-open")
          offcanvas.setAttribute("aria-hidden", "false")
        }
        function closeOffcanvas() {
          document.body.classList.remove("is-offcanvas-open")
          offcanvas.setAttribute("aria-hidden", "true")
        }
        menuToggle.addEventListener("click", openOffcanvas)
        offcanvasClose.addEventListener("click", closeOffcanvas)
        if (offcanvasBackdrop)
          offcanvasBackdrop.addEventListener("click", closeOffcanvas)
        document.addEventListener("keydown", function (e) {
          if (
            e.key === "Escape" &&
            document.body.classList.contains("is-offcanvas-open")
          )
            closeOffcanvas()
        })
      })()

    const resourcesEl = document.querySelector(".resources-swiper")
    if (resourcesEl) {
      new Swiper(".resources-swiper", {
        slidesPerView: 3,
        spaceBetween: 24,
        loop: true,
        speed: 500,
        autoplay: {
          delay: 4500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl:
            ".resources-section .resources-swiper-nav .swiper-button-next",
          prevEl:
            ".resources-section .resources-swiper-nav .swiper-button-prev",
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          },
        },
      })
    }
</script>
@endsection
