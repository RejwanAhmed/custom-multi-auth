<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

    <div class="container ">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh">
            <div class="col-lg-6 col-md-8 col-12 card shadow p-3 ">
                <div class="admin-login-header text-white">
                    <h1 class="text-center">Admin Login</h1>
                </div>
                <hr>
                @if (session('msg'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session('msg') }}</strong>
                    </div>
                @endif
                <form action="{{ route('admin.loginCheck') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="" class="form-label"><strong>Email:</strong></strong> </label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" value={{ old('email') }}>
                        @error('email')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label"><strong>Password:</strong> </label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                        @error('password')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <button class="btn btn-color">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
