<?php

namespace Tests\Feature;

use App\Models\Artist;
use Database\Factories\ArtistFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    use RefreshDatabase;

    public function testAllArtistsShown()
    {
        Artist::factory(10)->create();

        $this->getJson('/api/artists')->assertJsonCount(10);
    }
}
