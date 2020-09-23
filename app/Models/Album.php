<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;

    public function songs()
    {
        return $this->hasMany(Song::class, 'album_id');
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_album')
            ->withPivot('id', 'role_id')
            ->using(ArtistAlbum::class);
    }
}
