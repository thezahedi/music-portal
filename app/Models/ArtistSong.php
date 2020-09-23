<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArtistSong extends Pivot
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
