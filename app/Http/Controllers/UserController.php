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

    public function store(Request $request){
        $users = User::create ([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('roleselect'),
        ]);
        \Session::flash('sukses','User berhasil ditambahkan');
        return redirect ()->route('user.index');
    }

    public function update(Request $request){
        $users = User::find($request->id);
        $users -> name = $request ->input ('name');
        $users -> username = $request ->input ('username');
        $users -> email = $request ->input ('email');
        $users -> role_id = $request ->input ('roleselect');
        $users -> save();
        \Session::flash('sukses','User berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id){
        $users = User::find($id)->delete();
        \Session::flash('sukses','User berhasil dihapus');
        return redirect()->back();
    }
}
