(function () {
  'use strict';

  function initMotionSystem() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return;
    }

    // 1. Elements that Slide in from LEFT
    const leftSelectors = [
      '.know-about .content',
      '.content-text',
      '.tech-content-left',
      '.about-content-left',
      '.contact-info',
      '.contact-info-card',
      '.partner-intro-text',
      '.why-choose-left',
      '.story-text',
      '.testimonial-content',
      '.brand-slide-content',
    ];

    // 2. Elements that Slide in from RIGHT
    const rightSelectors = [
      '.know-about .image-wrap',
      '.content-image',
      '.tech-image-right',
      '.tech-drawing-box',
      '.about-image-right',
      '.contact-form-wrap',
      '.partner-form-card',
      '.contact-form',
      '.why-choose-right',
      '.story-image',
      '.testimonial-card .image-wrap',
    ];

    // 3. Elements that Slide UP from BOTTOM
    const upSelectors = [
      '.section-header',
      '.section-header-center',
      '.tech-full-header',
      '.internal-hero-content',
      '.page-header-center',
      '.section-title-wrap',
      '.cta-banner',
      '.breadcrumb-wrap',
      '.policy-container',
      '.store-filter-wrap',
      '.projects-filter-bar',
      '.slider-wrap',
      '.resources-swiper',
      '.testimonial-section .section-header',
    ];

    // 4. Elements that Zoom / Scale Pop
    const scaleSelectors = [
      '.tech-drawing-full',
      '.full-preview',
      '.hero-specs-bar',
      '.about-stats',
    ];

    // 5. Staggered Container Grids (Children pop in one-by-one)
    const staggerContainers = [
      '.features-grid',
      '.cards-grid',
      '.items-grid',
      '.stats',
      '.values-grid',
      '.apps-grid',
      '.info-grid',
      '.tech-specs-list',
      '.products-grid',
      '.projects-grid',
      '.store-grid',
      '.resources-grid',
      '.blog-grid',
      '.about-stats',
      '.footer-top',
      '.info-container',
      '.grid-cards',
      '.stats-grid',
    ];

    // Helper to apply classes
    function applyMotionClass(selectors, motionClass) {
      selectors.forEach(function (sel) {
        document.querySelectorAll(sel).forEach(function (el) {
          if (!el.closest('.motion-stagger')) {
            el.classList.add(motionClass);
          }
        });
      });
    }

    applyMotionClass(leftSelectors, 'motion-left');
    applyMotionClass(rightSelectors, 'motion-right');
    applyMotionClass(upSelectors, 'motion-up');
    applyMotionClass(scaleSelectors, 'motion-scale');

    // Stagger containers and index children
    staggerContainers.forEach(function (containerSelector) {
      document.querySelectorAll(containerSelector).forEach(function (container) {
        if (!container.classList.contains('motion-stagger')) {
          container.classList.add('motion-stagger');
          Array.from(container.children).forEach(function (child, index) {
            child.style.setProperty('--motion-index', index);
          });
        }
      });
    });

    // Continuous 2-way IntersectionObserver (Scroll Down & Scroll Up)
    var observerOptions = {
      root: null,
      rootMargin: '0px 0px -40px 0px',
      threshold: 0.08,
    };

    var motionObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
        } else {
          // Reset when leaving viewport so it triggers on every scroll up and down
          entry.target.classList.remove('is-visible');
        }
      });
    }, observerOptions);

    // Observe all motion elements
    document.querySelectorAll('.motion-up, .motion-down, .motion-left, .motion-right, .motion-scale, .motion-stagger').forEach(function (el) {
      motionObserver.observe(el);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMotionSystem);
  } else {
    initMotionSystem();
  }
})();
