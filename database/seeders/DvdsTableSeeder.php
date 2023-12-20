<?php

namespace Database\Seeders;

use App\Models\Dvd;
use App\Models\Format;
use App\Models\Type;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DvdsTableSeeder extends Seeder
{
    private $apiKey = '2a1fcd3';
    private $baseUrl = 'http://www.omdbapi.com/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you have created default Format, Type, and Location entries
        $format = Format::first();
        $type = Type::first();
        $location = Location::first();
        $movieLocation = Location::where('name', 'Spindle 1')->first();
        $tvLocation = Location::where('name', 'Spindle 2')->first();


        $dvds = [
            [
                'name' => 'Blade Runner',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 8.1,
                'number_of_discs' => 1,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BNzQzMzJhZTEtOWM4NS00MTdhLTg0YjgtMjM4MDRkZjUwZDBlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg',
                'official_website' => 'https://www.warnerbros.com/movies/blade-runner',
                'imdb_link' => 'https://www.imdb.com/title/tt0083658/',
                'number_of_episodes' => null,
            ],
            [
                'name' => 'The Thin Red Line',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 7.6,
                'number_of_discs' => 1,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BMTM5OTMyMjIxOV5BMl5BanBnXkFtZTcwNzU4OTQwNQ@@._V1_SX300.jpg',
                'official_website' => null,
                'imdb_link' => 'https://www.imdb.com/title/tt0120863/',
                'number_of_episodes' => null,
            ],
            [
                'name' => 'Serenity',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 7.8,
                'number_of_discs' => 1,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BMTI1MTY2OTIxNV5BMl5BanBnXkFtZTYwNjQ4NjY3._V1_SX300.jpg',
                'official_website' => null,
                'imdb_link' => 'https://www.imdb.com/title/tt0379786/',
                'number_of_episodes' => null,
            ],
            [
                'name' => 'The Fifth Element',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 7.7,
                'number_of_discs' => 1,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BNDcxODkyMjY4MF5BMl5BanBnXkFtZTgwOTc1Mjg0MzE@._V1_SX300.jpg',
                'official_website' => 'https://www.sonypictures.com/movies/thefifthelement',
                'imdb_link' => 'https://www.imdb.com/title/tt0119116/',
                'number_of_episodes' => null,
            ],
            [
                'name' => 'The Matrix',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 8.7,
                'number_of_discs' => 1,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg',
                'official_website' => 'https://www.warnerbros.com/movies/matrix',
                'imdb_link' => 'https://www.imdb.com/title/tt0133093/',
                'number_of_episodes' => null,
            ],
            [
                'name' => 'Ran',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 8.2,
                'number_of_discs' => 1,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BZDBjZTM4ZmEtOTA5ZC00NTQzLTk0ODUtNzQ0Y2U2YjVmYTE3XkEyXkFqcGdeQXVyMTAwMzUyOTc@._V1_SX300.jpg',
                'official_website' => null,
                'imdb_link' => 'https://www.imdb.com/title/tt0089881/',
                'number_of_episodes' => null,
            ],
            [
                'name' => 'Twin Peaks',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 8.8,
                'number_of_discs' => 10,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BZjZlZDlkYTktZjUwZS00YmFkLTg0MjktYmEzYzYyZTYzODE1XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg',
                'official_website' => 'https://www.sho.com/twin-peaks',
                'imdb_link' => 'https://www.imdb.com/title/tt0098936/',
                'number_of_episodes' => 48,
            ],
            [
                'name' => 'Stargate SG:1',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 8.4,
                'number_of_discs' => 54,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BNzQ2NjQyMjI5OF5BMl5BanBnXkFtZTgwOTcwNTg4MTE@._V1_SX300.jpg',
                'official_website' => 'https://www.mgm.com/television/stargate-sg-1',
                'imdb_link' => 'https://www.imdb.com/title/tt0118480/',
                'number_of_episodes' => 214,
            ],
            [
                'name' => 'Stargate Atlantis',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 8.1,
                'number_of_discs' => 26,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BMTg0NTk4NzUwN15BMl5BanBnXkFtZTgwMjEwOTg4MTE@._V1_SX300.jpg',
                'official_website' => 'https://www.mgm.com/television/stargate-atlantis',
                'imdb_link' => 'https://www.imdb.com/title/tt0374455/',
                'number_of_episodes' => 100,
            ],
            [
                'name' => 'Firefly',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 9.0,
                'number_of_discs' => 4,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BMTU1ODMxNjIzMF5BMl5BanBnXkFtZTgwMzM0ODg4MTE@._V1_SX300.jpg',
                'official_website' => 'https://www.syfy.com/syfy-wire/topic/firefly',
                'imdb_link' => 'https://www.imdb.com/title/tt0303461/',
                'number_of_episodes' => 14,
            ],
            [
                'name' => 'Farscape',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 8.3,
                'number_of_discs' => 26,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BMTU4OTk4OTI0Nl5BMl5BanBnXkFtZTgwMTU5OTg4MTE@._V1_SX300.jpg',
                'official_website' => 'https://www.henson.com/farscape/',
                'imdb_link' => 'https://www.imdb.com/title/tt0187636/',
                'number_of_episodes' => 88,
            ],
            [
                'name' => 'Band of Brothers',
                'format_id' => $format->id,
                'type_id' => $type->id,
                'location_id' => $location->id,
                'rating' => 9.4,
                'number_of_discs' => 6,
                'cover_image' => 'https://m.media-amazon.com/images/M/MV5BYjllYzVkYzQtOTQyZC00YTY2LWE1NTAtM2JjZmQ2NmYwYmUwXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',
                'official_website' => 'https://www.hbo.com/band-of-brothers',
                'imdb_link' => 'https://www.imdb.com/title/tt0185906/',
                'number_of_episodes' => 10,
            ],
        ];


        foreach ($dvds as $dvdData) {
            $movieData = $this->fetchMovieData($dvdData['name']);
            if (!empty($movieData)) {
                $locationId = is_null($dvdData['number_of_episodes']) ? $movieLocation->id : $tvLocation->id;

                Dvd::create([
                    'name' => $movieData['Title'],
                    'format_id' => $format->id,
                    'type_id' => $type->id,
                    'location_id' => $locationId,
                    'rating' => $movieData['imdbRating'],
                    'cover_image' => $movieData['Poster'],
                    'number_of_discs' => $dvdData['number_of_discs'],
                    'official_website' => $dvdData['official_website'],
                    'imdb_link' => $dvdData['imdb_link'],
                    'number_of_episodes' => $dvdData['number_of_episodes'],
                ]);
            }
        }
    }

    private function fetchMovieData($title)
    {
        $response = Http::get($this->baseUrl, [
            'apikey' => $this->apiKey,
            't' => $title,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
