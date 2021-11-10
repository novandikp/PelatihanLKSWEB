<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function detail($id)
    {
        return $id;
    }


    public function add(Request $request)
    {
    }


    public function edit(Request $request)
    {
    }


    public function delete($id)
    {
    }
}
