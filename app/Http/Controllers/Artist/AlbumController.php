<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;

class AlbumController extends Controller
{
    public function index(Artist $artist)
    {
        return $artist->albums()->get();
    }

    public function show(Artist $artist, Album $album)
    {
        return $album->load('songs');
    }
}
