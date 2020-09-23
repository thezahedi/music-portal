<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;

class SongController extends Controller
{
    public function show(Artist $artist, Album $album, Song $song)
    {
        return $song->load('artists.pivot.role', 'lyrics');
    }
}
