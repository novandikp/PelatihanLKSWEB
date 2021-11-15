<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {


        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $users = User::where('name', 'like', "%$keyword%")->get();
        } else {
            $users = User::all();
        }
        return view('users.index', compact('users'));
    }

    public function detail($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('users.detail', compact('user'));
        } else {
            return redirect("/user");
        }
    }


    public function add()
    {
        return view('users.form');
    }

    // user/form/2
    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('users.formedit', compact('user'));
        } else {
            return redirect("/user");
        }
    }


    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect("/user");
    }


    public function store(Request $request)
    {
        //Validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //Membuat user baru
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role = $request->role;

        $path = $request->file('image')->store('public/images/avatar');
        $users->avatar = basename($path);

        $users->save();
        return redirect('/user');
    }


    public function update($id, Request $request)
    {
        //Validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //Mengambil data user
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->has('password')) {
            $users->password = Hash::make($request->password);
        }

        $users->role = $request->role;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images/avatar');
            $users->avatar = basename($path);
        }


        $users->save();
        return redirect('/user');
    }
}
