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

            return redirect ()->route('user.index');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy($id)
    {
        $users = User::find($id)->delete();
        return redirect()->back();
    }

}
