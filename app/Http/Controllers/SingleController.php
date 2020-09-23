<?php

namespace App\Http\Controllers;

use App\Models\Single;

class SingleController extends Controller
{
    public function index()
    {
        return Single::with('artists')->get();
    }

    public function show(Single $single)
    {
        return $single->load('artists');
    }
}
