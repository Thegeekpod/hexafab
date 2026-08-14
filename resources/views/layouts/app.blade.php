<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Hexafab Steels - Solutions')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/mobile-responsive.css') }}" />
  @yield('styles')
</head>

<body>
  <header class="site-header">
    <div class="header-inner">
      <a href="{{ route('home') }}" class="header-logo">
        <img src="{{ asset('images/Hexafab-logo.png') }}" alt="Hexafab Steels" />
      </a>
      <nav class="nav-main">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">HOME</a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">ABOUT US</a>
        <div class="nav-dropdown-wrapper">
          <a href="{{ route('products') }}" class="nav-item-dropdown {{ request()->routeIs('products*') ? 'active' : '' }}">
            OUR PRODUCTS
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M6 9l6 6 6-6" />
            </svg>
          </a>
          <div class="mega-dropdown">
            <a href="{{ route('products.detail', 'standing-seam-sheet') }}">
              <span>Standing Seam Sheet</span>
              <span class="item-tag">01</span>
            </a>
            <a href="{{ route('products.detail', 'circular-corrugated-sheet') }}">
              <span>Circular Corrugated Sheet</span>
              <span class="item-tag">02</span>
            </a>
            <a href="{{ route('products.detail', 'trapezoidal-sheet') }}">
              <span>Trapezoidal Sheet</span>
              <span class="item-tag">03</span>
            </a>
            <a href="{{ route('products.detail', 'liner-sheet') }}">
              <span>Liner Sheet</span>
              <span class="item-tag">04</span>
            </a>
            <a href="{{ route('products.detail', 'cz-purlin') }}">
              <span>C/Z Purlin</span>
              <span class="item-tag">05</span>
            </a>
            <a href="{{ route('products.detail', 'deck-sheet') }}">
              <span>Deck Sheet</span>
              <span class="item-tag">06</span>
            </a>
          </div>
        </div>
        <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">OUR PROJECTS</a>
        <a href="{{ route('become-a-partner') }}" class="{{ request()->routeIs('become-a-partner') ? 'active' : '' }}">BECOME A PARTNER</a>
        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">CONTACT US</a>
      </nav>
      <div class="header-actions">
        <button type="button" class="header-search" aria-label="Search" title="Search">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.35-4.35" />
          </svg>
        </button>
        <button type="button" class="menu-toggle" aria-label="Menu" title="Menu" id="hamburger">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </button>
      </div>
    </div>
  </header>

  <div class="header-search-overlay" id="headerSearchOverlay" aria-hidden="true">
    <div class="search-form-wrap">
      <button type="button" class="search-close" id="searchClose" aria-label="Close search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
      <form class="search-form" action="javascript:void(0);" method="get" role="search">
        <input type="search" name="s" class="search-input" placeholder="Search..." autocomplete="off" id="headerSearchInput" />
        <button type="submit" class="search-submit">Search</button>
      </form>
    </div>
  </div>

  <div class="offcanvas" id="offcanvasMenu" aria-hidden="true">
    <div class="offcanvas-backdrop" id="offcanvasBackdrop"></div>
    <div class="offcanvas-panel">
      <div class="offcanvas-header">
        <a href="{{ route('home') }}" class="offcanvas-logo">
          <img src="{{ asset('images/Hexafab-logo.png') }}" alt="Hexafab Steels" />
        </a>
      </div>
      <div class="offcanvas-body">
        <div class="offcanvas-col">
          <ul class="offcanvas-nav">
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="{{ route('about') }}">ABOUT US</a></li>
            <li class="offcanvas-has-sub">
              <a href="{{ route('products') }}" class="offcanvas-products-toggle">
                OUR PRODUCTS
                <svg class="sub-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M6 9l6 6 6-6" />
                </svg>
              </a>
              <ul class="offcanvas-submenu">
                <li><a href="{{ route('products.detail', 'standing-seam-sheet') }}">Standing Seam Sheet</a></li>
                <li><a href="{{ route('products.detail', 'circular-corrugated-sheet') }}">Circular Corrugated Sheet</a></li>
                <li><a href="{{ route('products.detail', 'trapezoidal-sheet') }}">Trapezoidal Sheet</a></li>
                <li><a href="{{ route('products.detail', 'liner-sheet') }}">Liner Sheet</a></li>
                <li><a href="{{ route('products.detail', 'cz-purlin') }}">C/Z Purlin</a></li>
                <li><a href="{{ route('products.detail', 'deck-sheet') }}">Deck Sheet</a></li>
              </ul>
            </li>
            <li><a href="{{ route('projects') }}">OUR PROJECTS</a></li>
            <li><a href="{{ route('become-a-partner') }}">BECOME A PARTNER</a></li>
            <li><a href="{{ route('contact') }}">CONTACT US</a></li>
            <li><a href="{{ route('store-locator') }}">STORE LOCATOR</a></li>
            <li><a href="{{ route('resources') }}">RESOURCES</a></li>
          </ul>
        </div>
      </div>
      <div class="offcanvas-footer">
        <div class="offcanvas-footer-btns">
          <a href="{{ route('store-locator') }}" class="btn-solid">Store locator</a>
        </div>
      </div>
    </div>
    <button type="button" class="offcanvas-close" id="offcanvasClose" aria-label="Close menu">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
      </svg>
    </button>
  </div>

  @yield('content')

  <footer class="site-footer">
    <div class="footer-top" style="padding-bottom: 0 !important;">

      <div class="footer-col footer-about">
        <div class="footer-logo" style="max-width: 200px">
          <img src="{{ asset('images/footer-logo.png') }}" alt="Hexafab steels" style="width: 100%" />
        </div>
        <p class="footer-desc">
          Hexafab steels specialize in manufacturing high-quality flat coated
          steel products and offer a comprehensive range of solutions,
          setting new standards of excellence in the industry.
        </p>
      </div>

      <div class="footer-col">
        <p class="footer-col-heading">QUICK LINKS</p>
        <ul class="footer-links">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('projects') }}">Gallery</a></li>
          <li><a href="{{ route('resources') }}">Resources</a></li>
          <li><a href="{{ route('store-locator') }}">Store Locator</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <p class="footer-col-heading">OUR PRODUCTS</p>
        <ul class="footer-links">
          <li><a href="{{ route('products.detail', 'standing-seam-sheet') }}">Standing Seam Sheet</a></li>
          <li><a href="{{ route('products.detail', 'circular-corrugated-sheet') }}">Circular Corrugated Sheet</a></li>
          <li><a href="{{ route('products.detail', 'trapezoidal-sheet') }}">Trapezoidal Sheet</a></li>
          <li><a href="{{ route('products.detail', 'liner-sheet') }}">Liner Sheet</a></li>
          <li><a href="{{ route('products.detail', 'cz-purlin') }}">C/Z Purlin</a></li>
          <li><a href="{{ route('products.detail', 'deck-sheet') }}">Deck Sheet</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <p class="footer-col-heading">GET IN TOUCH</p>
        <ul class="footer-links">
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
          <li><a href="{{ route('become-a-partner') }}">Become a partner</a></li>
        </ul>
        <p class="footer-col-heading" style="margin-top: 1.5rem">GALLERY</p>
        <ul class="footer-links">
          <li><a href="{{ route('projects') }}">Industrial</a></li>
          <li><a href="{{ route('projects') }}">Commercial</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <p class="footer-col-heading">RESOURCES</p>
        <ul class="footer-links">
          <li><a href="javascript:void(0);">Download Hexafab Steels Brochure</a></li>
        </ul>
      </div>

    </div>

    <div class="footer-top ccc" style="padding-top: 0 !important;">
      <div class="footer-contact-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
          <circle cx="12" cy="10" r="3" />
        </svg>
        <span><strong>Factory Address:</strong>
          NH6, GANESH COMPLEX VILL RAGHUDEVPUR P.S RAJAPUR PIN 711322</span>
      </div>
      <div class="footer-contact-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
          <circle cx="12" cy="10" r="3" />
        </svg>
        <span><strong>Billing Address:</strong>
          JEEWAN NIWAS 30A BLOCK - R, FLAT A-1 FIRST FLOOR NEW ALIPORE KOLKATA-700053</span>
      </div>
      <div class="footer-contact-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
        </svg>
        <a href="tel:+919932292163"><strong>Contact Us: </strong> (+91) 99322 92163 | (+91) 98748 62986 | (033) 4029 3266</a>
      </div>
      <div class="footer-contact-item combined-item">
        <div class="contact-sub-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 4h16a2 2 0 0 1 2 2v0l-10 7L2 6v0a2 2 0 0 1 2-2z" />
            <path d="M22 6v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6" />
          </svg>
          <a href="mailto:info@hexafabsteels.com"><strong>Email:</strong> info@hexafabsteels.com</a>
        </div>

        <div class="contact-sub-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
            <path d="M14 2v6h6" />
            <path d="M8 13h8" />
            <path d="M8 17h8" />
          </svg>
          <span><strong>GST NO:</strong> 19AAFCS4364R1ZI</span>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p class="footer-copyright">
        © Copyright 2024 Hexafab steels - All rights reserved
      </p>
      <div class="footer-policies">
        <a href="{{ route('ims-policy') }}">IMS Policy</a>
        <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
      </div>
      <div class="footer-social">
        <span class="footer-social-label">Follow us on:</span>
        <a href="javascript:void(0);" aria-label="Facebook" title="Facebook">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
          </svg>
        </a>
        <a href="javascript:void(0);" aria-label="LinkedIn" title="LinkedIn">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
            <rect x="2" y="9" width="4" height="12" />
            <circle cx="4" cy="4" r="2" />
          </svg>
        </a>
        <a href="javascript:void(0);" aria-label="Instagram" title="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
          </svg>
        </a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    // Search Overlay logic
    ;(function () {
      var searchBtn = document.querySelector(".header-search")
      var searchClose = document.getElementById("searchClose")
      var overlay = document.getElementById("headerSearchOverlay")
      var searchInput = document.getElementById("headerSearchInput")
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

    // Mobile offcanvas menu logic
    ;(function () {
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

    // Mobile offcanvas OUR PRODUCTS sub-menu toggle
    const productToggle = document.querySelector('.offcanvas-products-toggle');
    if (productToggle) {
      productToggle.addEventListener('click', function (e) {
        const parentLi = this.closest('.offcanvas-has-sub');
        const isOpen = parentLi.classList.contains('is-open');
        if (isOpen) {
          parentLi.classList.remove('is-open');
          e.preventDefault();
        } else {
          parentLi.classList.add('is-open');
          e.preventDefault();
        }
      });
    }
  </script>
  <script type="module">
    import Lenis from "https://cdn.jsdelivr.net/npm/lenis@1.3.18/dist/lenis.mjs"
    const lenis = new Lenis({
      duration: 1.2,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      orientation: "vertical",
      smoothWheel: true,
      wheelMultiplier: 1,
      touchMultiplier: 2,
    })
    function raf(time) {
      lenis.raf(time)
      requestAnimationFrame(raf)
    }
    requestAnimationFrame(raf)
  </script>
  @yield('scripts')
</body>
</html>
