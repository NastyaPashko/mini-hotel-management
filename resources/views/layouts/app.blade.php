<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Hotel Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><svg class="icon"viewBox="0 0 24 24">
                    <path
                        d='M14.7 2c1.68 0 2.52 0 3.162.34a3.06 3.06 0 0 1 1.311 1.359c.327.665.327 1.536.327 3.279v10.044c0 1.743 0 2.614-.327 3.28a3.06 3.06 0 0 1-1.311 1.359C17.22 22 16.38 22 14.7 22H9.3c-1.68 0-2.52 0-3.162-.34a3.06 3.06 0 0 1-1.311-1.359c-.327-.665-.327-1.536-.327-3.279V6.978c0-1.743 0-2.614.327-3.28A3.06 3.06 0 0 1 6.138 2.34C6.78 2 7.62 2 9.3 2z' />
                    <path d='M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21M10 6H8m2 4H8m8-4h-2m2 4h-2' />
                </svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-large  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Discounts</a>
                    </li>


                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                    @auth
                        <li class="nav-item mt-2 mt-lg-0 d-flex align-items-center">
                            <a href="#" class="site-btn site-btn-green d-flex align-items-center">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d='M15 7.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m4.5 13c-.475-9.333-14.525-9.333-15 0' />
                                </svg>
                                My Profile
                            </a>
                        </li>
                        @if (in_array(Auth::user()->role, ['admin', 'manager']))
                            <li class="nav-item mt-2 mt-lg-0 d-flex align-items-center">
                                <a href="#" class="site-btn site-btn-green">
                                    <svg width="24" height="24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round"
                                        stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d='M3.5 15h17M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z' />
                                    </svg>
                                    Admin Panel
                                </a>
                            </li>
                        @endif
                        <li class="nav-item mt-2 mt-lg-0">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="site-btn">
                                    <svg width="24" height="24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round"
                                        stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d='M13.496 21H6.5c-1.105 0-2-1.151-2-2.571V5.57c0-1.419.895-2.57 2-2.57h7M16 15.5l3.5-3.5L16 8.5m-6.5 3.496h10' />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item me-1 mt-2 mt-lg-0">
                            <a class="site-btn site-btn-green" href="/login">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d='M13.496 21H6.5c-1.105 0-2-1.151-2-2.571V5.57c0-1.419.895-2.57 2-2.57h7' />
                                    <path d='M13 15.5 9.5 12 13 8.5m6.5 3.496h-10' />
                                </svg>
                                Login
                            </a>
                        </li>
                        <li class="nav-item mt-2 mt-lg-0">
                            <a class="site-btn site-btn-green" href="/register">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d='M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2H9z' />
                                    <path d='M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2' />
                                </svg>
                                Register
                            </a>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>

    <main>
        @yield('content')
        </div>
    </main>
    <footer class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-md-4 mb-3 d-flex flex-column">
                <div class="d-flex">
                    <svg class="icon"viewBox="0 0 24 24">
                        <path
                            d='M14.7 2c1.68 0 2.52 0 3.162.34a3.06 3.06 0 0 1 1.311 1.359c.327.665.327 1.536.327 3.279v10.044c0 1.743 0 2.614-.327 3.28a3.06 3.06 0 0 1-1.311 1.359C17.22 22 16.38 22 14.7 22H9.3c-1.68 0-2.52 0-3.162-.34a3.06 3.06 0 0 1-1.311-1.359c-.327-.665-.327-1.536-.327-3.279V6.978c0-1.743 0-2.614.327-3.28A3.06 3.06 0 0 1 6.138 2.34C6.78 2 7.62 2 9.3 2z' />
                        <path d='M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21M10 6H8m2 4H8m8-4h-2m2 4h-2' />
                    </svg>
                    <h2>Mini-Hotel</h2>
                </div>
                <p>Your cozy getaway in the heart of the city. Comfort, style, and convenience all in one place.</p>

            </div>
            <div class="col-6 col-md-2 mb-3">
                <h5 class="fw-bold">Quick Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Rooms</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Services</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#"
                            class="nav-link p-0 text-body-secondary">Discounts</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#"
                            class="nav-link p-0 text-body-secondary">Dashboard</a>
                    </li>

                </ul>
            </div>
            <div class="col-6 col-md-4 mb-3">
                <h5 class="fw-bold">Contact</h5>
                <div> <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d='M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064 1.468-1.545-.19-3.31-1.108-4.609-1.723-2.435-5.504.927-5.39 3.066.363 6.746 7.66 14.74 14.726 14.042 2.21-.218 4.75-4.21 2.215-5.669-1.268-.73-3.009-2.17-4.343-.767' />
                    </svg> +1 (555) 123-4567

                </div>
                <div>
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d='m2.357 7.714 6.98 4.654c.963.641 1.444.962 1.964 1.087.46.11.939.11 1.398 0 .52-.125 1.001-.446 1.964-1.087l6.98-4.654M7.157 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327' />
                    </svg> nastya1200526@gmail.com
                </div>
                <div>
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d='M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181 5.181 5.116.056 12.196-4.773 15.64' />
                        <path d='M10.75 12a1 1 0 0 1-1-1V8.64L12 7l2.25 1.64V11a1 1 0 0 1-1 1z' />
                    </svg> 123 Luxury Ave, City

                </div>
            </div>
            <div class="col-6 col-md-2 mb-3 ">
                <h5 class="fw-bold">Reception Hours</h5>
                <p class="mb-1">Monday - Friday: 24/7</p>
                <p class="mb-0">Saturday - Sunday: 24/7</p>
            </div>

        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2025 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3 "><a class="link-body-emphasis" href="#" aria-label="Instagram"><svg
                            class="bi" width="24" height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#" aria-label="Facebook"><svg
                            class="bi" width="24" height="24" aria-hidden="true">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
