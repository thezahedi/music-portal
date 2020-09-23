<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'artist_album')
            ->withPivot('id', 'role_id')
            ->using(ArtistAlbum::class);
    }

    public function singles()
    {
        return $this->belongsToMany(Single::class, 'artist_single')
            ->withPivot('id', 'role_id')
            ->using(ArtistSingle::class);
    }
}
