<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Single extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_single')
            ->withPivot('id', 'role_id')
            ->using(ArtistSingle::class);
    }

    public function lyrics()
    {
        return $this->morphMany(Lyric::class, 'lyricable');
    }
}
