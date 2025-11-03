<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showRoomsPage(){


        return view('hotel-rooms');
    }
}
