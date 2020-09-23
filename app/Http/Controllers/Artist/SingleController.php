<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Single;

class SingleController extends Controller
{
    public function index(Artist $artist)
    {
        return $artist->singles()->get();
    }

    public function show(Artist $artist, Single $single)
    {
        return $single->load('artists', 'lyrics');
    }
}
