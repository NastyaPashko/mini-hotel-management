@extends('layouts.app')

@section('content')
    <div class=" page-header container-fluid ">
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6.133 21C4.955 21 4 20.02 4 18.81v-8.802c0-.665.295-1.295.8-1.71l5.867-4.818a2.09 2.09 0 0 1 2.666 0l5.866 4.818c.506.415.801 1.045.801 1.71v8.802c0 1.21-.955 2.19-2.133 2.19z" />
                <path d="M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21" />
            </svg>
            &raquo;
            <p>
                Rooms
            </p>
        </nav>

        <h1>Available Rooms</h1>
        <p>Find your perfect room and make your stay unforgettable. Book now and enjoy a cozy experience!</p>
    </div>
    <div class="container-fluid d-flex flex-column flex-sm-row mt-2">

        <aside class=" sidebar p-4">
            <form method="GET" action="№" class="d-flex flex-column align-items-center gap-3">

                <!-- Room type -->
                <div class="select-item">
                    <label for="room_type" class="form-label">Room Type</label>
                    <select name="room_type" id="room_type" class="form-select w-100">
                        <option value="">All</option>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="suite">Suite</option>
                    </select>
                </div>

                <!-- Availability -->
                <div class="select-item">
                    <label for="available" class="form-label">Availability</label>
                    <select name="available" id="available" class="form-select w-100">
                        <option value="">All</option>
                        <option value="1">Available</option>
                        <option value="0">Occupied</option>
                    </select>
                </div>

                <!-- Capacity -->
                <div class="select-item">
                    <label for="capacity" class="form-label">Capacity</label>
                    <select name="capacity" id="capacity" class="form-select w-100">
                        <option value="">Any</option>
                        <option value="1">1 person</option>
                        <option value="2">2 persons</option>
                        <option value="3">3 persons</option>
                        <option value="4">4 persons</option>
                    </select>
                </div>

                <div class="w-100 d-flex align-items-center ">
                    <label for="price" class="form-label mb-0">Max Price:</label>
                    <span id="priceValue" style="width: 50px; text-align: right;">0$</span>
                </div>
                <input type="range" class="form-range w-100" id="price" name="price" min="0" max="500"
                    value="0" step="10" oninput="document.getElementById('priceValue').innerText=this.value+'$'">



                <button type="submit" class="site-btn">Apply Filters</button>
            </form>
        </aside>

        <main class="flex-grow-1 p-4 ">

            <div class="rooms-grid">
                <div class="room-card">
                    <div class="room-image">
                        <img src="{{ asset('images/istockphoto-2163985013-612x612.jpg') }}">
                    </div>
                    <div class="card-content">

                        <h3 class="text-dark">Room </h3>
                        <p>Single</p>
                        <p><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d='M21 19.75c0-2.09-1.67-5.068-4-5.727m-2 5.727c0-2.651-2.686-6-6-6s-6 3.349-6 6m9-12.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m3 3a3 3 0 1 0 0-6' />
                            </svg> 2 persons</p>
                        <p><span class="number">$120</span> / night</p>
                        <div class="d-flex justify-content-center flex-md-row flex-column">
                            <a class="card-btn " href="#"> View Rooms</a>
                            <a class="card-btn green-btn" href="#">
                                Book Now
                            </a>
                        </div>
                    </div>


                </div>


                <div class="room-card">
                    <div class="room-image">
                        <img src="{{ asset('images/enzian-small-075.jpg') }}">
                    </div>
                    <div class="card-content">

                        <h3 class="text-dark">Room </h3>
                        <p>Single</p>
                        <p><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d='M21 19.75c0-2.09-1.67-5.068-4-5.727m-2 5.727c0-2.651-2.686-6-6-6s-6 3.349-6 6m9-12.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m3 3a3 3 0 1 0 0-6' />
                            </svg> 2 persons</p>
                        <p><span class="number">$120</span> / night</p>
                        <div class="d-flex justify-content-center flex-md-row flex-column">
                            <a class="card-btn " href="#"> View Rooms</a>
                            <a class="card-btn green-btn" href="#">
                                Book Now
                            </a>
                        </div>
                    </div>


                </div>


                <div class="room-card">
                    <div class="room-image">
                        <img
                            src="{{ asset('images/pngtree-single-bed-hotel-room-warm-color-and-simple-style-picture-image_1679568.jpg') }}">
                    </div>
                    <div class="card-content">

                        <h3 class="text-dark">Room </h3>
                        <p>Single</p>
                        <p><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d='M21 19.75c0-2.09-1.67-5.068-4-5.727m-2 5.727c0-2.651-2.686-6-6-6s-6 3.349-6 6m9-12.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m3 3a3 3 0 1 0 0-6' />
                            </svg> 2 persons</p>
                        <p><span class="number">$120</span> / night</p>
                        <div class="d-flex justify-content-center flex-md-row flex-column">
                            <a class="card-btn " href="#"> View Rooms</a>
                            <a class="card-btn green-btn" href="#">
                                Book Now
                            </a>
                        </div>
                    </div>


                </div>

                <div class="room-card">
                    <div class="room-image">
                        <img src="{{ asset('images/istockphoto-2163985013-612x612.jpg') }}">
                    </div>
                    <div class="card-content">

                        <h3 class="text-dark">Room </h3>
                        <p>Single</p>
                        <p><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d='M21 19.75c0-2.09-1.67-5.068-4-5.727m-2 5.727c0-2.651-2.686-6-6-6s-6 3.349-6 6m9-12.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m3 3a3 3 0 1 0 0-6' />
                            </svg> 2 persons</p>
                        <p><span class="number">$120</span> / night</p>
                        <div class="d-flex justify-content-center flex-md-row flex-column">
                            <a class="card-btn " href="#"> View Rooms</a>
                            <a class="card-btn green-btn" href="#">
                                Book Now
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </main>
    </div>
@endsection
