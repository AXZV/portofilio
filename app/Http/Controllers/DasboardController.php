<?php

namespace App\Http\Controllers\Dasboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        return view('dasboard');
    }
}
