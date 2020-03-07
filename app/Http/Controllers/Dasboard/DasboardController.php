<?php

namespace App\Http\Controllers\Dasboard;

use App\Http\Controllers\Controller;

class DasboardController extends Controller
{
    public function index()
    {
        return view('dasboard');
    }
}
