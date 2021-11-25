<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameApiController extends Controller
{

    public function index()
    {
        $game = Game::with('developer', 'asset')->get();
        return $game;
    }


    public function show($id)
    {
        $game = Game::where('homepage', $id)->with(
            'developer',
            'asset',
            'comments'
        )->first();
        $game->comments->load('user');
        return $game;
    }
}
