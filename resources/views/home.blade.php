@extends('layouts.app')

@section('content')
    <!-- Welcome Banner -->

    <main>
        <section id="welcome-banner" class=" position-relative">
            <img id="img-banner" src="{{ 'images/hotel-bg.jpg' }}" />
            <div id="banner-overlay"></div>
            <div id="banner-content">
                <h1>Welcome to Mini-Hotel</h1>
                <p>Your comfort is our priority</p>
                <div class="d-flex justify-content-center flex-md-row flex-column">
                    <button class="site-btn">
                        View Rooms
                    </button>
                    <button class="site-btn">
                        Book Now
                    </button>
                </div>
            </div>
        </section>

        <div class="container mt-3 w-50 mx-auto">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success')}}
            </div>
            @endif
        </div>
        <!-- Pluses -->
        <section id="hotel-features" class="container my-5">
            <h2 class="title"> Why Choose Us</h2>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="p-4 rounded shadow-sm bg-white h-100 text-center">
                        <div class="icon-circle mx-auto mb-3 ">
                            <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d='M6.133 21C4.955 21 4 20.02 4 18.81v-8.802c0-.665.295-1.295.8-1.71l5.867-4.818a2.09 2.09 0 0 1 2.666 0l5.866 4.818c.506.415.801 1.045.801 1.71v8.802c0 1.21-.955 2.19-2.133 2.19z' />
                                <path d='M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21' />
                            </svg>
                        </div>
                        <h5 class="fw-bold">Cozy Atmosphere</h5>
                        <p class="text-muted">Enjoy a warm, home-like environment where every detail is made for your
                            comfort.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="p-4 rounded shadow-sm bg-white h-100 text-center">
                        <div class="icon-circle mx-auto mb-3">
                            <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d='M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181 5.181 5.116.056 12.196-4.773 15.64' />
                                <path d='M12 12a2 2 0 1 0 0-4 2 2 0 0 0 0 4' />
                            </svg>
                        </div>
                        <h5 class="fw-bold">Perfect Location</h5>
                        <p class="text-muted"> Situated in the city center, our hotel is close to major attractions, cafes,
                            and transport — everything you need within walking distance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-4">
                    <div class="p-4 rounded shadow-sm bg-white h-100 text-center">
                        <div class="icon-circle mx-auto mb-3">
                            <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d='M12 6.167V4m0 2.167a8 8 0 0 1 8 8V17H4v-2.833a8 8 0 0 1 8-8M3 20h18' />
                            </svg>
                        </div>
                        <h5 class="fw-bold">Exceptional Service</h5>
                        <p class="text-muted"> Our friendly staff is always ready to help, ensuring your stay is
                            comfortable, relaxing, and truly memorable.
                        </p>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
