@extends('layouts.app')

@section('title', 'IMS Policy - Hexafab steels Coated Steel')

@section('content')
<section class="internal-hero" style="background-image: url('{{ asset('images/factory-image.webp') }}');">
      <div class="internal-hero-content">
        <p class="page-label" style="color: white; text-decoration: underline;">Standards</p>
        <h1>Integrated Management System Policy</h1>
      </div>
    </section>

    <div class="breadcrumb-wrap">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <span class="current">IMS Policy</span>
      </div>
    </div>

    <section class="internal-content-section">
      <div class="container">
        <div class="policy-content">
          <h2 style="margin-top: 0;">Our Commitment to Quality & Environment</h2>
          <p>At Hexafab Steels, we are committed to achieving sustained business growth by consistently providing
            high-quality coated steel products and solutions that meet and exceed our customers' expectations.
          </p>

          <p>Our Integrated Management System (IMS) follows international standards for Quality, Environmental, and
            Health & Safety Management. We believe that sustainable development is integral to our success as a
            world-class manufacturing facility.</p>

          <h2>Core Policy Statements</h2>
          <ul>
            <li>To comply with all applicable legal, regulatory, and other requirements related to our products and
              operations.</li>
            <li>To prevent pollution by minimizing waste generation, optimizing resource utilization, and adopting clean
              manufacturing technologies.</li>
            <li>To ensure a safe and healthy working environment for all our employees, contractors, and visitors by
              eliminating hazards and reducing risks.</li>
            <li>To continuously improve our integrated management system and its performance through regular monitoring,
              internal audits, and management reviews.</li>
            <li>To foster a culture of quality consciousness and environmental responsibility among all our stakeholders
              through training and effective communication.</li>
          </ul>

          <h2>Operational Excellence</h2>
          <p>We believe that operational excellence is a journey, not a destination. Our IMS provides the framework for
            setting and reviewing our objectives, ensuring that every level of our organization is aligned with our
            broader vision of industrial leadership and sustainability.</p>
        </div>
      </div>
    </section>
@endsection
