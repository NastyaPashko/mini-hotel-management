@extends('layouts.app')

@section('content')
    <div id="sidebar">
        <div class="filter-header">
            <span class="filter-title"> Filters
            </span>
            <span id="closeSidebar" class="cross-icon">
                <svg viewBox="0 0 25 25" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-467.000000, -1039.000000)"
                            fill="#000000">
                            <path
                                d="M489.396,1061.4 C488.614,1062.18 487.347,1062.18 486.564,1061.4 L479.484,1054.32 L472.404,1061.4 C471.622,1062.18 470.354,1062.18 469.572,1061.4 C468.79,1060.61 468.79,1059.35 469.572,1058.56 L476.652,1051.48 L469.572,1044.4 C468.79,1043.62 468.79,1042.35 469.572,1041.57 C470.354,1040.79 471.622,1040.79 472.404,1041.57 L479.484,1048.65 L486.564,1041.57 C487.347,1040.79 488.614,1040.79 489.396,1041.57 C490.179,1042.35 490.179,1043.62 489.396,1044.4 L482.316,1051.48 L489.396,1058.56 C490.179,1059.35 490.179,1060.61 489.396,1061.4 L489.396,1061.4 Z M485.148,1051.48 L490.813,1045.82 C492.376,1044.26 492.376,1041.72 490.813,1040.16 C489.248,1038.59 486.712,1038.59 485.148,1040.16 L479.484,1045.82 L473.82,1040.16 C472.257,1038.59 469.721,1038.59 468.156,1040.16 C466.593,1041.72 466.593,1044.26 468.156,1045.82 L473.82,1051.48 L468.156,1057.15 C466.593,1058.71 466.593,1061.25 468.156,1062.81 C469.721,1064.38 472.257,1064.38 473.82,1062.81 L479.484,1057.15 L485.148,1062.81 C486.712,1064.38 489.248,1064.38 490.813,1062.81 C492.376,1061.25 492.376,1058.71 490.813,1057.15 L485.148,1051.48 L485.148,1051.48 Z"
                                id="cross" sketch:type="MSShapeGroup">

                            </path>
                        </g>
                    </g>
                </svg>
            </span>
        </div>

        <form method="GET" action="№" class="d-flex flex-column align-items-center gap-3 p-4">

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
    </div>
    <div id="overlay"></div>
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



        <main>

            <button class="card-btn green-btn" id="openSidebar">
                <svg class="filter-icon " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15 10.5A3.502 3.502 0 0 0 18.355 8H21a1 1 0 1 0 0-2h-2.645a3.502 3.502 0 0 0-6.71 0H3a1 1 0 0 0 0 2h8.645A3.502 3.502 0 0 0 15 10.5zM3 16a1 1 0 1 0 0 2h2.145a3.502 3.502 0 0 0 6.71 0H21a1 1 0 1 0 0-2h-9.145a3.502 3.502 0 0 0-6.71 0H3z"
                        fill="currentColor" />
                </svg>
                Filters
            </button>
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

    <script src="{{ asset('js/filter.js') }}"></script>
@endsection
