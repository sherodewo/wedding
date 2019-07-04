<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('admin.frontend.index');
    }
}