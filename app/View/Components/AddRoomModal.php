<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddRoomModal extends Component
{
    public $roomTypes;

    public function __construct($roomTypes)
    {
        $this->roomTypes = $roomTypes;
    }

    public function render()
    {
        return view('components.add-room-modal');
    }
}
