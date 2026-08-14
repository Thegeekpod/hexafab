@extends('layouts.app')

@section('title', 'Our Projects - Hexafab Steels')

@section('styles')
<style>
  /* Lightbox Overlay */
  .project-lightbox {
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(8, 20, 32, 0.94);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.3s ease;
    user-select: none;
    padding: 1.5rem;
  }

  .project-lightbox.active {
    opacity: 1;
    visibility: visible;
  }

  /* Lightbox Dialog */
  .lightbox-dialog {
    position: relative;
    max-width: 1100px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  /* Image Container */
  .lightbox-image-wrap {
    position: relative;
    max-width: 100%;
    max-height: 75vh;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
    background: #0a1e30;
  }

  .lightbox-image {
    max-width: 100%;
    max-height: 75vh;
    width: auto;
    height: auto;
    object-fit: contain;
    border-radius: 16px;
    transition: opacity 0.25s ease, transform 0.25s ease;
  }

  .lightbox-image.is-animating {
    opacity: 0;
    transform: scale(0.97);
  }

  /* Nav Buttons */
  .lightbox-btn {
    position: fixed;
    top: 50%;
    transform: translateY(-50%);
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 100000;
    backdrop-filter: blur(8px);
  }

  .lightbox-btn:hover {
    background: #3685b1;
    border-color: #3685b1;
    color: #ffffff;
    transform: translateY(-50%) scale(1.12);
    box-shadow: 0 8px 24px rgba(54, 133, 177, 0.45);
  }

  .lightbox-btn svg {
    width: 28px;
    height: 28px;
  }

  .lightbox-prev {
    left: 2rem;
  }

  .lightbox-next {
    right: 2rem;
  }

  /* Close Button */
  .lightbox-close {
    position: fixed;
    top: 1.75rem;
    right: 2rem;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 100001;
    backdrop-filter: blur(8px);
  }

  .lightbox-close:hover {
    background: #e63946;
    border-color: #e63946;
    color: #ffffff;
    transform: rotate(90deg) scale(1.1);
  }

  .lightbox-close svg {
    width: 24px;
    height: 24px;
  }

  /* Caption Info */
  .lightbox-caption {
    width: 100%;
    margin-top: 1.25rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #ffffff;
    padding: 0 0.5rem;
  }

  .lightbox-title-wrap {
    display: flex;
    flex-direction: column;
    text-align: left;
  }

  .lightbox-category {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: #5bb3e0;
    margin-bottom: 0.25rem;
  }

  .lightbox-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
  }

  .lightbox-counter {
    font-size: 0.875rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.85);
    background: rgba(255, 255, 255, 0.12);
    padding: 0.4rem 1rem;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    white-space: nowrap;
    margin-left: 1rem;
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .lightbox-prev {
      left: 1rem;
      width: 44px;
      height: 44px;
    }
    .lightbox-next {
      right: 1rem;
      width: 44px;
      height: 44px;
    }
    .lightbox-close {
      top: 1rem;
      right: 1rem;
      width: 42px;
      height: 42px;
    }
    .lightbox-image-wrap {
      max-height: 62vh;
    }
    .lightbox-image {
      max-height: 62vh;
    }
    .lightbox-title {
      font-size: 1rem;
    }
    .lightbox-caption {
      margin-top: 0.75rem;
    }
  }
</style>
@endsection

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