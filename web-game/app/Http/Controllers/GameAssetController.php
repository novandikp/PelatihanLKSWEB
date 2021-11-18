<?php

namespace App\Http\Controllers;

use App\Models\GameAsset;
use Illuminate\Http\Request;

class GameAssetController extends Controller
{

    public function features()
    {
        return GameAsset::where('featured_image', 1)->with("game")->get();
    }

    public function create($id)
    {
        return view('gameaset.form', compact('id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'game_id' => 'required|exists:games,id',
            'featured_image' => 'required',
            'image_asset' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile("image_asset")) {
            $data['path'] = basename($request->file("image_asset")->store("public/images/game/{$data['game_id']}"));
        }

        $asset = GameAsset::create($data);
        return redirect()->route('game.show', $asset->game_id);
    }

    public function destroy(GameAsset $asset)
    {
        if ($asset) {
            $asset->delete();
            return redirect()->route('game.show', $asset->game_id);
        } else {
            return redirect()->back();
        }
    }
}
