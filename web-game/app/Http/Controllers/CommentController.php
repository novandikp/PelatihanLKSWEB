<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::with('user', 'game')->get();
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'message' => 'required',
            'rate' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:games,id',
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        } else {
            return Comment::create($request->all());
        }
    }


    public function show($id)
    {
        $comment = Comment::with('user', 'game')->find($id);
        if ($comment) {
            return $comment;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }


    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $validation = Validator::make($request->all(), [
                'message' => 'required',
                'rate' => 'required|numeric',
                'user_id' => 'required|exists:users,id',
                'game_id' => 'required|exists:games,id',
            ]);
            if ($validation->fails()) {
                return response()->json($validation->errors(), 422);
            } else {
                $comment->update($request->all());
                return $comment;
            }
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
        } else {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        return $comment;
    }
}
