<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Hexafab Steels</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
        }
        .btn-primary {
            background-color: #0d2840;
            border-color: #0d2840;
        }
        .btn-primary:hover {
            background-color: #164066;
            border-color: #164066;
        }
    </style>
</head>
<body>

<div class="card login-card p-4">
    <div class="text-center mb-4">
        <h2 class="h3 font-weight-bold text-dark">Hexafab Admin</h2>
        <p class="text-muted">Sign in to manage your website</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', 'admin@hexafab.com') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Sign In</button>
    </form>
</div>

</body>
</html>
