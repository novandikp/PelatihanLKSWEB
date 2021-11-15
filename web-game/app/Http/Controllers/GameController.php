<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('game.index', compact('games'));
    }


    public function create()
    {

        $users = User::where("role", "Developer")->get();
        return view('game.form', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'developer_id' => 'required',
            'enabled' => 'required',
            'homepage' => 'required',
        ]);

        $game = Game::create($request->all());
        return redirect()->route('game.index');
    }


    public function show(Game $game)
    {
        $game = $game->load("asset");

        $users = User::where("role", "Developer")->get();
        return view('game.detail', compact('game', 'users'));
    }


    public function edit(Game $game)
    {

        $users = User::where("role", "Developer")->get();
        return view('game.formedit', compact('users', 'game'));
    }


    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'developer_id' => 'required',
            'enabled' => 'required',
            'homepage' => 'required',
        ]);
        $game->update($request->all());
        return redirect()->route('game.index');
    }


    public function destroy(Game $game)
    {
        //
        $game->delete();
        return redirect()->route('game.index');
    }
}
