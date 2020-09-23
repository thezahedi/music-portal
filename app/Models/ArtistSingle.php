<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArtistSingle extends Pivot
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
