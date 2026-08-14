@extends('layouts.app')

@section('title', 'Contact Us - Hexafab steels Coated Steel')

@section('content')
<section class="internal-hero" style="background-image: url('{{ asset('images/contact-hero-bg.png') }}');">
      <div class="internal-hero-content">
        <p class="page-label" style="color: white; text-decoration: underline;">Get in touch</p>
        <h1>Connect with our Experts</h1>
      </div>
    </section>

    <div class="breadcrumb-wrap">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <span class="current">Contact Us</span>
      </div>
    </div>

    <section class="internal-content-section">
      <div class="container">
        <div class="contact-wrapper">
          <div class="contact-info">
            <h2 style="font-size: 2.25rem; font-weight: 700; color: #1a1a1a; margin-bottom: 3rem;">We are here to help
              you build better.</h2>

            <div class="contact-info-list">
              <div class="info-card">
                <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                    <circle cx="12" cy="10" r="3" />
                  </svg></div>
                <div class="info-content">
                  <h3>Factory Address</h3>
                  <p>NH6, GANESH COMPLEX VILL RAGHUDEVPUR P.S RAJAPUR PIN 711322</p>
                </div>
              </div>

              <div class="info-card">
                <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="5" width="20" height="14" rx="2" />
                    <line x1="2" y1="10" x2="22" y2="10" />
                  </svg></div>
                <div class="info-content">
                  <h3>Billing Address</h3>
                  <p>JEEWAN NIWAS 30A BLOCK - R, FLAT A-1 FIRST FLOOR NEW ALIPORE KOLKATA-700053</p>
                </div>
              </div>

              <div class="info-card">
                <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path
                      d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                  </svg></div>
                <div class="info-content">
                  <h3>Phone Numbers</h3>
                  <a href="tel:+919932292163">(+91) 99322 92163</a><br>
                  <a href="tel:+919874862986">(+91) 98748 62986</a> /
                  <a href="tel:0334029 3266">(033) 4029 3266</a>
                </div>
              </div>

              <div class="info-card">
                <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                  </svg></div>
                <div class="info-content">
                  <h3>Email Addresses</h3>
                  <a href="mailto:info@hexafabsteels.com">info@hexafabsteels.com</a>
                </div>
              </div>

              <div class="info-card">
                <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <path d="M9 15l2 2 4-4" />
                  </svg></div>
                <div class="info-content">
                  <h3>GST No.</h3>
                  <a href="#">19AAFCS4364R1ZI</a>
                </div>
              </div>
            </div>
          </div>

          <div class="contact-form-box">
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

            <form action="{{ route('contact.submit') }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Full Name <span style="color: #dc3545;">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
                @error('name')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>Email Address <span style="color: #dc3545;">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phone" class="form-control" placeholder="Enter your phone (optional)" value="{{ old('phone') }}">
                @error('phone')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" placeholder="Requirement subject" value="{{ old('subject') }}">
                @error('subject')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>Message <span style="color: #dc3545;">*</span></label>
                <textarea name="message" class="form-control" rows="5" placeholder="Tell us about your project..." required>{{ old('message') }}</textarea>
                @error('message')
                  <small style="color: #dc3545; display: block; margin-top: 0.25rem;">{{ $message }}</small>
                @enderror
              </div>
              <button type="submit" class="btn-submit">Send Message</button>
            </form>
          </div>
        </div>

        <div class="map-section">
          <!-- Placeholder for map -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d139882.64660726406!2d88.26495171551592!3d22.53556493536826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e1!3m2!1sen!2sin!4v1775721400735!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
@endsection
