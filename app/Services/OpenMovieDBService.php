<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenMovieDBService
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.omdb.api_key');
    }

    public function searchByTitle($title)
    {
        $response = Http::get('http://www.omdbapi.com', [
            'apikey' => $this->apiKey,
            't' => $title,
        ]);

        return $response->json();
    }
}
