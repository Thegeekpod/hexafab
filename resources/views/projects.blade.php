@extends('layouts.app')

@section('title', 'Our Projects - Hexafab Steels')

@section('content')
  <section class="internal-hero" style="background-image: url('{{ asset('images/Trapezoidal-Sheet/Trapezoidal1.png') }}');">
    <div class="internal-hero-content">
      <p class="page-label" style="color: white; text-decoration: underline;">Showcase</p>
      <h1>Our Iconic Projects Portfolio</h1>
    </div>
  </section>

  <div class="breadcrumb-wrap">
    <div class="container">
      <a href="{{ route('home') }}">Home</a>
      <span class="separator">/</span>
      <span class="current">Projects</span>
    </div>
  </div>

  <section class="internal-content-section" style="padding-top: 4rem; padding-bottom: 4rem;">
    <div class="container">
      <div class="gallery-filters mb-4 text-center">
        <button class="filter-btn active" data-filter="all">All Projects</button>
        <button class="filter-btn" data-filter="industrial">Industrial</button>
        <button class="filter-btn" data-filter="commercial">Commercial</button>
      </div>

      <div class="projects-grid">
        @foreach($projects as $project)
          @php
            // Categorize category for filter purposes
            $filterCat = 'industrial';
            if (in_array($project->category, ['deck-sheet', 'circular', 'cz-purlin', 'trapezoidal', 'liner'])) {
                $filterCat = 'industrial';
            } else if ($project->category == 'standing-seam') {
                $filterCat = 'commercial';
            }
          @endphp
          <div class="project-item" 
               data-category="{{ $filterCat }}" 
               data-src="{{ asset($project->image_path) }}" 
               data-title="{{ $project->title }}" 
               data-type="{{ ucfirst($project->category) }}">
            <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" />
            <div class="project-overlay">
              <span class="project-type">{{ ucfirst($project->category) }}</span>
              <h3 class="project-title">{{ $project->title }}</h3>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Lightbox Modal -->
  <div id="projectLightbox" class="project-lightbox" aria-hidden="true" role="dialog">
    <!-- Close Button -->
    <button type="button" class="lightbox-close" id="lightboxClose" aria-label="Close Lightbox">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>

    <!-- Previous Button -->
    <button type="button" class="lightbox-btn lightbox-prev" id="lightboxPrev" aria-label="Previous Image">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"></polyline>
      </svg>
    </button>

    <!-- Next Button -->
    <button type="button" class="lightbox-btn lightbox-next" id="lightboxNext" aria-label="Next Image">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="9 18 15 12 9 6"></polyline>
      </svg>
    </button>

    <!-- Lightbox Main Content -->
    <div class="lightbox-dialog" id="lightboxDialog">
      <div class="lightbox-image-wrap">
        <img src="" alt="" class="lightbox-image" id="lightboxImage" />
      </div>
      <div class="lightbox-caption">
        <div class="lightbox-title-wrap">
          <span class="lightbox-category" id="lightboxCategory">Industrial</span>
          <h4 class="lightbox-title" id="lightboxTitle">Project Title</h4>
        </div>
        <div class="lightbox-counter" id="lightboxCounter">1 / 1</div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // 1. Filtering Logic
      const filterBtns = document.querySelectorAll('.filter-btn');
      const projectItems = document.querySelectorAll('.project-item');

      filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
          filterBtns.forEach(b => b.classList.remove('active'));
          this.classList.add('active');

          const filter = this.getAttribute('data-filter');
          projectItems.forEach(item => {
            if (filter === 'all' || item.getAttribute('data-category') === filter) {
              item.style.display = 'block';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });

      // 2. Lightbox Logic
      const lightbox = document.getElementById('projectLightbox');
      const lightboxImage = document.getElementById('lightboxImage');
      const lightboxTitle = document.getElementById('lightboxTitle');
      const lightboxCategory = document.getElementById('lightboxCategory');
      const lightboxCounter = document.getElementById('lightboxCounter');
      const closeBtn = document.getElementById('lightboxClose');
      const prevBtn = document.getElementById('lightboxPrev');
      const nextBtn = document.getElementById('lightboxNext');

      let currentVisibleItems = [];
      let currentIndex = 0;

      function getVisibleItems() {
        return Array.from(projectItems).filter(item => item.style.display !== 'none');
      }

      function updateLightbox(index) {
        if (!currentVisibleItems.length) return;
        if (index < 0) index = currentVisibleItems.length - 1;
        if (index >= currentVisibleItems.length) index = 0;
        currentIndex = index;

        const item = currentVisibleItems[currentIndex];
        const src = item.getAttribute('data-src');
        const title = item.getAttribute('data-title');
        const category = item.getAttribute('data-type');

        lightboxImage.classList.add('is-animating');

        setTimeout(() => {
          lightboxImage.src = src;
          lightboxImage.alt = title;
          lightboxTitle.textContent = title;
          lightboxCategory.textContent = category;
          lightboxCounter.textContent = `${currentIndex + 1} / ${currentVisibleItems.length}`;
          lightboxImage.classList.remove('is-animating');
        }, 150);
      }

      function openLightbox(clickedItem) {
        currentVisibleItems = getVisibleItems();
        currentIndex = currentVisibleItems.indexOf(clickedItem);
        if (currentIndex === -1) currentIndex = 0;

        updateLightbox(currentIndex);
        lightbox.classList.add('active');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
      }

      function closeLightbox() {
        lightbox.classList.remove('active');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      }

      function nextImage() {
        updateLightbox(currentIndex + 1);
      }

      function prevImage() {
        updateLightbox(currentIndex - 1);
      }

      // Open on card click
      projectItems.forEach(item => {
        item.addEventListener('click', function(e) {
          e.preventDefault();
          openLightbox(this);
        });
      });

      // Close events
      closeBtn.addEventListener('click', closeLightbox);
      
      lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox || e.target.closest('#lightboxDialog') === null && !e.target.closest('.lightbox-btn') && !e.target.closest('.lightbox-close')) {
          closeLightbox();
        }
      });

      // Prev / Next button events
      prevBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        prevImage();
      });

      nextBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        nextImage();
      });

      // Keyboard navigation
      document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('active')) return;

        if (e.key === 'Escape') {
          closeLightbox();
        } else if (e.key === 'ArrowRight') {
          nextImage();
        } else if (e.key === 'ArrowLeft') {
          prevImage();
        }
      });

      // Touch / Mobile Swipe Navigation
      let touchStartX = 0;
      let touchEndX = 0;

      lightbox.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
      }, { passive: true });

      lightbox.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        const diffX = touchStartX - touchEndX;
        if (Math.abs(diffX) > 40) {
          if (diffX > 0) {
            nextImage(); // Swiped left -> show next
          } else {
            prevImage(); // Swiped right -> show prev
          }
        }
      }, { passive: true });
    });
  </script>
@endsection