@extends('layouts.app')

@section('title', 'Become a Partner - Hexafab steels Coated Steel')

@section('content')
<section class="internal-hero" style="background-image: url('{{ asset('images/partner-hero-bg.png') }}');">
      <div class="internal-hero-content">
        <p class="page-label" style="color: white; text-decoration: underline;">Partnership</p>
        <h1>Grow with Hexafab Steels</h1>
      </div>
    </section>

    <div class="breadcrumb-wrap">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <span class="current">Become a Partner</span>
      </div>
    </div>

    <section class="internal-content-section">
      <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
          <h2 style="font-size: 2.25rem; font-weight: 700; color: #1a1a1a;">Join our network of elite dealers and
            distributors</h2>
          <p style="color: #666; font-size: 1.1rem; margin-top: 1.5rem;">We are expanding our presence rapidly and
            looking for motivated partners who share our commitment to quality, innovation, and long-term relationships.
          </p>
        </div>

        <div class="benefits-grid">
          <div class="benefit-card">
            <h3>Premium Branding</h3>
            <p>Leverage the reputation of a market-leading brand known for its commitment to "Strong, Durable, and
              Sustainable" steel.</p>
          </div>
          <div class="benefit-card">
            <h3>Technical Support</h3>
            <p>Access our expert technical team for project planning, structural analysis, and product selection for
              your clients.</p>
          </div>
          <div class="benefit-card">
            <h3>Competitive Margins</h3>
            <p>Benefit from attractive wholesale pricing and reward programs designed to grow your profitable
              partnership.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="partner-form-section">
      <div class="container">
        <div class="partner-form-box">
          <h2 style="text-align: center; margin-bottom: 2rem;">Partnership Application</h2>

          @if(session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; border-radius: 8px; padding: 1.25rem; margin-bottom: 2rem; text-align: center; font-size: 1rem; font-weight: 500;">
              <i class="bi bi-check-circle-fill" style="margin-right: 0.5rem;"></i> {{ session('success') }}
            </div>
          @endif

          @if($errors->any())
            <div style="background-color: #f8d7da; color: #842029; border: 1px solid #f5c2c7; border-radius: 8px; padding: 1rem 1.25rem; margin-bottom: 2rem;">
              <ul style="margin: 0; padding-left: 1.25rem;">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('become-a-partner.submit') }}" method="POST">
            @csrf
            <div class="form-grid">
              <div class="form-group">
                <label style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8125rem;">FULL NAME
                  / BUSINESS OWNER <span style="color: #dc3545;">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required
                  style="width: 100%; padding: 0.75rem; border: 1px solid {{ $errors->has('name') ? '#dc3545' : '#e1e8ed' }}; border-radius: 8px;"
                  placeholder="Full name">
                @error('name')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8125rem;">COMPANY
                  NAME</label>
                <input type="text" name="company_name" value="{{ old('company_name') }}"
                  style="width: 100%; padding: 0.75rem; border: 1px solid {{ $errors->has('company_name') ? '#dc3545' : '#e1e8ed' }}; border-radius: 8px;"
                  placeholder="Company name">
                @error('company_name')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8125rem;">PHONE
                  NUMBER <span style="color: #dc3545;">*</span></label>
                <input type="tel" name="phone" value="{{ old('phone') }}" required
                  style="width: 100%; padding: 0.75rem; border: 1px solid {{ $errors->has('phone') ? '#dc3545' : '#e1e8ed' }}; border-radius: 8px;"
                  placeholder="Phone">
                @error('phone')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8125rem;">EMAIL
                  ADDRESS <span style="color: #dc3545;">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" required
                  style="width: 100%; padding: 0.75rem; border: 1px solid {{ $errors->has('email') ? '#dc3545' : '#e1e8ed' }}; border-radius: 8px;"
                  placeholder="Email">
                @error('email')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group form-full">
                <label
                  style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8125rem;">OPERATIONAL
                  ADDRESS <span style="color: #dc3545;">*</span></label>
                <textarea name="address" required rows="4"
                  style="width: 100%; padding: 0.75rem; border: 1px solid {{ $errors->has('address') ? '#dc3545' : '#e1e8ed' }}; border-radius: 8px;"
                  placeholder="Full address">{{ old('address') }}</textarea>
                @error('address')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <button type="submit"
              style="width: 100%; padding: 1rem; background: #3685b1; color: #fff; border: none; border-radius: 8px; font-weight: 700; margin-top: 2rem; cursor: pointer; transition: background 0.2s ease;">Submit
              Application</button>
          </form>
        </div>
      </div>
    </section>
@endsection
