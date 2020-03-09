<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth']);
    }
    public function index()
    {   
        return view('/guru/guru_dasboard');
    }
}
