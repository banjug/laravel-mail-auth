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
    public function deleteGames($id) {
        // funzione per cancellare il singolo elemento nel db trmite id
        $videogame = Videogame::findOrFail($id);
        $videogame->delete();
        // il redirect serve se utilizziamo la delete tramite href
        // return redirect()->route('games');
        // se usiamo una chiamata api per la delete tramite axios si utilizza json_encode
        return json_encode($videogame);
    }
}
