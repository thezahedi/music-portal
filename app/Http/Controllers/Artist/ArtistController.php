<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        return Artist::all();
    }

    public function show(Artist $artist)
    {
        return $artist->load('albums.pivot.role', 'singles.pivot.role');
    }
}
