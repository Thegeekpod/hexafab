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
          <div class="project-item" data-category="{{ $filterCat }}">
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
@endsection

@section('scripts')
  <script>
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.project-item').forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
  </script>
@endsection