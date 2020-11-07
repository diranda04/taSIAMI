<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{

    public function index(){
        $users = User::paginate(10);
        $roles = Role::all();
        return view('user.index', compact('users','roles'));
    }

    public function adduser(){
        $users = User::all();
        $roles = Role::all();
        return view('user.add', compact('users','roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $users = User::create ([
                'id' => $request->input('id'),
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role_id' => $request->input('roleselect'),
            ]);

            return redirect ()->route('user.index')->with('message', 'User berhasil ditambahkan');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function update(Request $request)
    {
        $users = User::find($request->id);
        $users -> name = $request ->input ('name');
        $users -> username = $request ->input ('username');
        $users -> email = $request ->input ('email');
        $users -> role_id = $request ->input ('roleselect');
        $users -> save();
        return redirect()->back()->with('message', 'User berhasil diubah');
    }


    public function destroy($id)
    {
        $users = User::find($id)->delete();
        return redirect()->back()->with('message', 'User berhasil dihapus');
    }

}
