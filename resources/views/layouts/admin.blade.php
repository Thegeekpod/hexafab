<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hexafab Steels - Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #f8fafc;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #0d2840;
            color: #fff;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            padding: 0.75rem 1.25rem;
            display: block;
            border-radius: 8px;
            margin-bottom: 0.25rem;
            transition: all 0.2s ease;
        }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            font-size: 1.25rem;
            font-weight: 700;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1.5rem;
        }
        .main-content {
            padding: 2rem;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 px-0 sidebar d-flex flex-column">
            <div class="sidebar-brand">
                <i class="bi bi-shield-lock-fill me-2"></i> Hexafab Admin
            </div>
            <div class="px-3 flex-grow-1">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam me-2"></i> Products
                </a>
                <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="bi bi-images me-2"></i> Projects
                </a>
                <a href="{{ route('admin.resources.index') }}" class="{{ request()->routeIs('admin.resources.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-pdf me-2"></i> PDF Resources
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper me-2"></i> Blogs & Insights
                </a>
                <a href="{{ route('admin.partners.index') }}" class="{{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                    <i class="bi bi-person-lines-fill me-2"></i> Partner Inquiries
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="bi bi-chat-left-text-fill me-2"></i> Contact Messages
                </a>
            </div>
            <div class="p-3 border-top border-secondary">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 main-content">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 mb-0">@yield('page-title', 'Dashboard')</h2>
                <div class="text-secondary">
                    Logged in as <strong>{{ auth()->user()?->name ?? 'Admin' }}</strong>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
