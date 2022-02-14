<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videogame;

class ApiController extends Controller
{
    public function getGames() {
        // passa i dati della tabella videogames attraverso la rotta
        $videogames = Videogame::all();
        return json_encode($videogames);
    }
}
