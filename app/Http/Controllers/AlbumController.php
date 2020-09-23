<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        return Album::with('artists')->withCount('songs')->get();
    }

    public function show(Album $album)
    {
        return $album->load('artists', 'songs');
    }
}
