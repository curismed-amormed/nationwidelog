<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard">
    <meta name="author" content="Nationwide Log">
    <!-- Title -->
    <title>Nationwide Log</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo/favicon.png')}}">
    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('icon-fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('icon-bootstrap/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('icon-boxicons/css/boxicons.css')}}">
    <link rel="stylesheet" href="{{ asset('icon-remixicon/fonts/remixicon.css')}}">
    <!-- Plugin -->
    <link rel="stylesheet" href="{{ asset('vendor/metismenu-master/metisMenu.min.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>
    <div class="sign-in-page">
        <div id="particles-js"></div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-md-6 col-xl-4">
                    <div class="sign-in-from">
                        <img src="{{ asset('assets/images/logo/logo-large.png')}}" class="img-fluid d-block mx-auto mb-3" alt="">
                        <form class="needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input id="email" type="email" class="form-control mb-0" name="email" value="{{ old('email') }}"
                                    placeholder="Enter Email" required>
                                <div class="invalid-feedback">Enter Email</div>
                            </div>
                            <div class="mb-3 overflow-hidden">
                                <label for="exampleInputPassword1">Password</label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="float-end">Forgot Password?</a>
                                @endif
                                <input id="password" type="password" class="form-control mb-0" 
                                    placeholder="Password" name="password" required>
                                <div class="invalid-feedback">Enter Password</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="align-self-center">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">Remember
                                            Me
                                        </label>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <button type="submit" class="btn btn-sm btn-primary">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Js -->
    <script src="{{ asset('js/jquery-1.12.4.js')}}"></script>
    <!-- Popper Js -->
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- Plugin -->
    <script src="{{ asset('vendor/particle-js/particles.min.js')}}"></script>
    <script src="{{ asset('vendor/particle-js/app.js')}}"></script>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>