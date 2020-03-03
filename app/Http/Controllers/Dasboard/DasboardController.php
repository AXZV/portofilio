<?php

namespace App\Http\Controllers\Dasboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\img_slider;

class DasboardController extends Controller
{
    public function index()
    {
        $img_slider1 = img_slider::find(1);
        $img_slider2 = img_slider::find(2);  
        $img_slider3 = img_slider::find(3);
        
        $data = [
            'slider1' => $img_slider1,
            'slider2' => $img_slider2,
            'slider3' => $img_slider3
        ];

        return view('dasboard')
        ->with(['img_slider1' => $img_slider1])
        ->with(['img_slider2' => $img_slider2])
        ->with(['img_slider3' => $img_slider3]);

    }
}
