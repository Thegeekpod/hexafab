@extends('layouts.app')

@section('title', 'Privacy Policy - Hexafab steels Coated Steel')

@section('content')
<section class="internal-hero" style="background-image: url('{{ asset('images/factory-image.webp') }}');">
      <div class="internal-hero-content">
        <p class="page-label" style="color: white; text-decoration: underline;">Privacy</p>
        <h1>Protecting Your Data</h1>
      </div>
    </section>

    <div class="breadcrumb-wrap">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="separator">/</span>
        <span class="current">Privacy Policy</span>
      </div>
    </div>

    <section class="internal-content-section">
      <div class="container">
        <div class="policy-content">
          <p>Your privacy is important to us. It is Hexafab Steels' policy to respect your privacy regarding any
            information we may collect from you across our website, and other sites we own and operate.</p>

          <h2>Information We Collect</h2>
          <p>We only ask for personal information when we truly need it to provide a service to you. We collect it by
            fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how
            it will be used.</p>

          <h2>Data Retention & Security</h2>
          <p>We only retain collected information for as long as necessary to provide you with your requested service.
            What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as
            unauthorized access, disclosure, copying, use, or modification.</p>

          <h2>Sharing Information</h2>
          <p>We don’t share any personally identifying information publicly or with third-parties, except when required
            to by law.</p>

          <h2>Cookie Policy</h2>
          <p>Our website may use "cookies" to enhance the user experience. You may choose to set your web browser to
            refuse cookies, or to alert you when cookies are being sent. If you do so, note that some parts of the site
            may not function properly.</p>

          <p>Your continued use of our website will be regarded as acceptance of our practices around privacy and
            personal information. If you have any questions about how we handle user data and personal information, feel
            free to contact us.</p>
        </div>
      </div>
    </section>
@endsection
